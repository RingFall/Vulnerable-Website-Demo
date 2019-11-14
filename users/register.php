<?php
error_reporting(0);
require_once("../include/users.php");
require_once("../include/html_functions.php");
require_once("../include/functions.php");

session_start();

$error = False;
if (isset($_POST['firstname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['againpass']) && isset($_POST['lastname'])
    && $_POST['username'] && $_POST['password'] && $_POST['againpass'] && $_POST['firstname'] && $_POST['lastname'])
{
   if ($_POST['password'] != $_POST['againpass'])
   {
      $flash['error'] = "The passwords do not match. Try again";
      $error = True;
   }
   else if ($new_id = Users::create_user($_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], False))
   {
      Users::login_user($new_id);
      http_redirect(Users::$HOME_URL);
   }
   else
   {
      if (mysql_errno() == 1062)
      {
	 $flash['error'] = "Username '{$_POST['username']}' is already in use.";
      }
      $error = True;
   }
}
else
{
   $flash['error'] = "All fields are required";
   $error = True;
}

if ($error)
{
   our_header();
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
<div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('https://mdbootstrap.com/img/Photos/Others/img%20%2848%29.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
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
                    <form action="<?=h( $_SERVER['PHP_SELF'] )?>" method="POST">
                    <div class="card wow fadeInRight" data-wow-delay="0.3s">
                      <div class="card-body">
                        <!--Header-->
                        <div class="text-center">
                          <h3 class="white-text">
                            <i class="fas fa-user white-text"></i>Register for an account!</h3>
                            <h7 class="white-text"><?php error_message() ?></h7>
                          <hr class="hr-light">
                          
                        </div>
                        
                        <!--Body-->
                        <div class="md-form">
                          <i class="fas fa-user prefix white-text active"></i>
                          <input type="text" id="form3" class="white-text form-control" name="username">
                          <label for="form3" class="active">Username</label>
                        </div>
                        <div class="md-form">
                          <i class="fas fa-user prefix white-text active"></i>
                          <input type="text" id="form3" class="white-text form-control" name="firstname">
                          <label for="form3" class="active">First name</label>
                        </div>
                        <div class="md-form">
                          <i class="fas fa-user prefix white-text active"></i>
                          <input type="text" id="form3" class="white-text form-control" name="lastname">
                          <label for="form3" class="active">Last name</label>
                        </div>
                        <div class="md-form">
                          <i class="fas fa-lock prefix white-text active"></i>
                          <input type="password" id="form4" class="white-text form-control" name="password">
                          <label for="form4">Password</label>
                        </div>
                        <div class="md-form">
                          <i class="fas fa-lock prefix white-text active"></i>
                          <input type="password" id="form4" class="white-text form-control" name="againpass">
                          <label for="form4">Password Again</label>
                        </div>
                        <div class="text-center mt-4">
                          <button class="btn btn-indigo" type="submit" value="Create Account!">Create Account!</button>
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