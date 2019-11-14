<?php
error_reporting(0);
require_once("../include/users.php");
require_once("../include/html_functions.php");
require_once("../include/functions.php");

// login requires username and password both as POST. 
$bad_login = !(isset($_POST['username']) && isset($_POST['password']));
if (isset($_POST['username']) && isset($_POST['password']))
{
   if ($user = Users::check_login($_POST['username'], $_POST['password'], True))
   {
      Users::login_user_coo($user['id']);
      setcookie("session", md5($id),time()+3600,"/");
      if (isset($_POST['next']))
      {
	 http_redirect($_POST['next']);
      }
      else
      {
	 http_redirect(Users::$HOME_URL);
      }
   }
   else
   {
      $bad_login = True;
      $flash['error'] = "The username/password combination you have entered is invalid";
   }
}
if ($bad_login)
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
<div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/img%20%2848%29.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
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
                            <i class="fas fa-user white-text"></i>Login:</h3>
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
                          <i class="fas fa-lock prefix white-text active"></i>
                          <input type="password" id="form4" class="white-text form-control" name="password">
                          <label for="form4">Password</label>
                        </div>
                        <div class="text-center mt-4">
                          <button class="btn btn-indigo" type="submit" value="login">Login</button>
                          <hr class="hr-light mb-3 mt-4">
                          <p>Not a member?
        <a href="/users/register.php">Register</a>
      </p>
                          <div class="inline-ul text-center">
                            <a class="p-2 m-2 tw-ic">
                              <i class="fab fa-twitter white-text"></i>
                            </a>
                            <a class="p-2 m-2 li-ic">
                              <i class="fab fa-linkedin-in white-text"> </i>
                            </a>
                          </div>
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