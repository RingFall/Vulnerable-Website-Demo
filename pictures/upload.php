<?php
error_reporting(0);
require_once("../include/users.php");
require_once("../include/pictures.php");
require_once("../include/html_functions.php");
require_once("../include/functions.php");

session_start();
require_login();

$user = Users::current_user_coo();

$file_uploaded = False;
if (isset($_POST['tag']) && isset($_POST['name']) && isset($_FILES['pic']) && isset($_POST['price']) && isset($_POST['title']))
{
  $type = array("jpg","png");

   if ($_POST['tag'] == "" || $_POST['name'] == "" || $_POST['price'] == "" || $_POST['title'] == "")
   {
      $flash['error'] = "Must include all fields";
   }
   //elseif (!in_array(explode('.', $_POST['name'])[1],$type))
   //{
   //  $flash['error'] = explode('.', $_POST['name'])[1]." Not a picture!";
   //}
   else
   {
      $_POST['name'] = str_replace("..", "", $_POST['name']);
      $_POST['name'] = str_replace(" ", "", $_POST['name']);
      $_POST['name'] = str_replace("/", "", $_POST['name']);
      if (!file_exists("../upload/{$_POST['tag']}/"))
      {
	 mkdir("../upload/{$_POST['tag']}", 0777, True);
      }
      $filename = "../upload/{$_POST['tag']}/{$_POST['name']}";
      $relfilename = "{$_POST['tag']}/{$_POST['name']}";
      if ($_POST['price'] < 0)
      {
	 $_POST['price'] = abs($_POST['price']);
      }
      if (file_exists($filename))
      {
	 $new_name = tempnam("../upload", $filename);
	 move_uploaded_file($_FILES['pic']['tmp_name'], $new_name);
	 $id = Pictures::add_conflict($filename, $new_name, $_POST['tag'], $_POST['title'], $_POST['price'], $user['id']);
	 http_redirect(Pictures::$CONFLICT_URL . "?conflictid={$id}");
      }
      else
      {
	 if (move_uploaded_file($_FILES['pic']['tmp_name'], $filename))
	 {
	    
	    if ($id = Pictures::create_picture($_POST['title'], 128, 128, $_POST['tag'], $relfilename, $_POST['price'], $user['id']))
	    {
	       $main = ".550.jpg";
	       $side = ".128.jpg";
	       $thumb= ".128_128.jpg";
	       Pictures::resize_image($filename, $filename . $main, 550, 10000000);
	       Pictures::resize_image($filename, $filename . $side, 128, 10000000);
	       Pictures::resize_image($filename, $filename . $thumb, 128, 128);
	       
	       http_redirect(Pictures::$VIEW_PIC_URL . "?picid={$id}");
	       $file_uploaded = True;
	    }
	    else
	    {
	       $flash['error'] = "Couldn't create your picture, something wrong with the database";
	    }
	 }
	 else
	 {
	    $flash['error'] = "Couldn't move picture";
	 }
      }
   }
}


if (!$file_uploaded)
{

   our_header("upload");
?>

<script type="text/javascript">
// Animations init
new WOW().init();
</script>
<style>
  .card {
    background-color: rgba(126, 123, 215, 0.2);
  }

</style>
<div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <!-- Mask & flexbox options-->
            <div class="mask rgba-gradient align-items-center">
              <!-- Content -->
              <div class="container">
                <!--Grid row-->
                <div class="row mt-5">
                  <!--Grid column-->
                 
                  <!--Grid column-->
                  <!--Grid column-->
                  <div class="mx-auto col-md-6 col-xl-5 mb-4">
                    <!--Form-->
                    <form enctype="multipart/form-data" action="<?=h( $_SERVER['PHP_SELF'] )?>" method="POST">
                      <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <div class="card wow fadeInRight" data-wow-delay="0.3s">
                      <div class="card-body">
                        <!--Header-->
                        <div class="text-center">
                          <h3 class="white-text">
                            Upload a Picture!</h3>
                            <h7 class="white-text"><?php error_message() ?></h7>
                          <hr class="hr-light">
                        </div>
                        <!--Body-->
                        <div class="md-form">
                          
                          <input type="text" id="form3" class="white-text form-control" name="tag">
                          <label for="form3" class="active">tag</label>
                        </div>
                        <div class="md-form">
                          
                          <input type="text" id="form4" class="white-text form-control" name="name">
                          <label for="form3" class="active">File name</label>
                        </div>
                        <div class="md-form">
                          
                          <input type="text" id="form5" class="white-text form-control" name="title">
                          <label for="form3" class="active">Title</label>
                        </div>
                        <div class="md-form">
                          
                          <input type="text" id="form6" class="white-text form-control" name="price">
                          <label for="form3" class="active">Price</label>
                        </div>


                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                              aria-describedby="inputGroupFileAddon01" name="pic"/>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                          </div>
                        </div>

                        <div class="text-center mt-4">
                          <button class="btn btn-indigo" type="submit" value="Upload File">Upload</button>
                          <hr class="hr-light mb-3 mt-4">
                          
                        </div>
                      </div>
                    </div>
                  </form>
                    <!--/.Form-->
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
          </div>


<?php
    our_footer();
}
?>