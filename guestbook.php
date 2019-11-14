<?php
error_reporting(0);
require_once("include/html_functions.php");
require_once("include/guestbook.php");

if (isset($_POST["name"]) && isset($_POST["comment"]))
{
   if ($_POST['name'] == "" || $_POST['comment'] == "")
   {
      $flash['error'] = "Must include both the name and comment field!";
   }
   else
   {
      $res = Guestbook::add_guestbook($_POST["name"], $_POST["comment"], False);
      if (!$res)
      {
	 die(mysql_error());
      }      
   }
}

$guestbook = Guestbook::get_all_guestbooks();
?>

<?php our_header("guestbook"); ?>

<br><br><div class="container">
  <div class="text-center">
<h2>Guestbook</h2>
<?php error_message(); ?>
<h4>See what people are saying about us!</h4><hr>
</div>
<?php
   if ($guestbook)
   { 
     foreach ($guestbook as $guest)
     {
    	?>
      <blockquote class="blockquote bq-primary">
      <p class="bq-title"><?= ($guest["comment"]) ?></p>
      <p> - by <?=h( ($guest["name"]) ) ?> 
      </p>
      </blockquote>
	<?php
     } ?>
<?php
   }
?>



<!-- Button trigger modal -->
<div class="text-center">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalContactForm">
  Leave a message!
</button>
</div><br><br>

<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<!--Modal: Contact form-->
<div class="modal-dialog cascading-modal" role="document">

    <!--Content-->
    <div class="modal-content">

    <form action="<?=h( Guestbook::$GUESTBOOK_URL )?>" method="POST">
        <!--Header-->
        <div class="modal-header primary-color white-text">
            <h4 class="title">
                <i class="fa fa-pencil-alt"></i> Contact form</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <!--Body-->
        <div class="modal-body">

            <!-- Material input name -->
            <div class="md-form form-sm">
                <i class="fa fa-envelope prefix"></i>
                <input type="text" id="materialFormNameModalEx1" class="form-control form-control-sm" name="name">
                <label for="materialFormNameModalEx1">Your name</label>
            </div>

            <!-- Material textarea message -->
            <div class="md-form form-sm">
                <i class="fa fa-pencil-alt prefix"></i>
                <textarea type="text" id="materialFormMessageModalEx1" class="md-textarea form-control" name="comment"></textarea>
                <label for="materialFormMessageModalEx1">Your message</label>
            </div>

            <div class="text-center mt-4 mb-2">
                <button class="btn btn-primary" value="Submit">Send
                    <i class="fa fa-send ml-2"></i>
                </button>
            </div>

        </div>
    </div>
</form>
    <!--/.Content-->
</div>
<!--/Modal: Contact form-->
</div>

</div>
</div>
<?php
   our_footer();
?>