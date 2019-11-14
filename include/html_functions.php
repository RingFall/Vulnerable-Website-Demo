<?php
error_reporting(0);
require_once("users.php");
require_once("functions.php");
//session_start();

function xsswaf($query = "")
{
  $q = htmlspecialchars($query);
  return $q;
}

function sqlwaf($query = "")
{
  $q = mysql_real_escape_string($query);
  return $q;
}

function our_header($selected = "", $search_terms = "", $pictures = "")
{
   ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>RingFa1l哒漏洞演示站</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="/mdb/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="/mdb/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="/mdb/css/style.css" rel="stylesheet">
  <link href="/mdb/css/spe.css" rel="stylesheet">

</head>

<html class="full-height">
<!--Main Navigation-->
<header>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
      <?php if (Users::is_logged_in()){ ?>
      <a class="navbar-brand" href="/users/logout.php"><strong>Logout</strong></a>
      <?php } else { ?>
      <a class="navbar-brand" href="/users/login.php"><strong>Login</strong></a>
      <?php } ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if($selected == "home"){ echo 'active'; } ?>">
          <a class="nav-link" href="/users/home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php if($selected == "upload"){ echo 'active'; } ?>">
          <a class="nav-link" href="/pictures/upload.php">Upload</a>
        </li>
        <li class="nav-item <?php if($selected == "recent"){ echo 'active'; } ?>">
          <a class="nav-link" href="/pictures/recent.php">Recent</a>
        </li>
        <li class="nav-item <?php if($selected == "guestbook"){ echo 'active'; } ?>">
          <a class="nav-link" href="/guestbook.php">Guestbook</a>
        </li>
      </ul>
    </div>
    <form class="form-inline ml-auto" action="/pictures/search.php" method="get">
      <div class="md-form my-0">
        <input class="form-control" type="text" name="query" placeholder="try xss or sqli here~" aria-label="Search"  value="<?=h($search_terms) ?>">
      </div>
      <button href="#!" class="btn btn-outline-white btn-md my-0 ml-sm-2" type="submit">Search</button>
    </form>
  </nav>

  <div class="view intro-2" style="">
    <div class="full-bg-img">
      <div class="mask rgba-purple-light flex-center">
        <div class="container text-center white-text wow fadeInUp">
          <h2>RingFa1l's Vulnerable Website</h2>
          <br>
          <h5><?php 
          if($search_terms===""){
            echo "Try XSS, SQLi, CSRF, File upload freely~";
          }
             else{
              echo "Pictures that are tagged as '".$search_terms."'<hr>";
              thumbnail_pic_list($pictures);
            }
            ?></h5>
          <p></p>
          <br>
          <p></p>
        </div>
      </div>
    </div>
  </div>

</header>
<!--Main Navigation-->

  <body>
    




   <?php
}

function error_message()
{
   global $flash;
   if ($flash['error'])
   {
      ?>
<p class="span-10 error">
	 <?= h($flash['error']) ?>
</p>
      <?php
   }
}

function our_footer()
{
   ?>

<!-- Footer -->
<footer class="page-footer font-small unique-color-dark pt-4">

  <!-- Footer Elements -->
  <div class="container">


       <div>
  <ul class="list-unstyled list-inline text-center">
    <li class="list-inline-item"><a href="/">Home</a>  |</li>
    <li class="list-inline-item"><a href="mailto:08163337@cumt.edu.cn">Contact</a></li>
  </ul>
      </div>


    <!-- Social buttons -->
    <ul class="list-unstyled list-inline text-center">
      <li class="list-inline-item">
        <a class="btn-floating btn-fb mx-1">
          <i class="fab fa-facebook-f"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-tw mx-1">
          <i class="fab fa-twitter"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-gplus mx-1">
          <i class="fab fa-google-plus-g"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-li mx-1">
          <i class="fab fa-linkedin-in"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-dribbble mx-1">
          <i class="fab fa-dribbble"> </i>
        </a>
      </li>
    </ul>
    <!-- Social buttons -->



  </div>
  <!-- Footer Elements -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a href="https://ringfall.top"> RingFa1l</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="/mdb/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="/mdb/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="/mdb/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="/mdb/js/mdb.min.js"></script>
  </body>
</html>
   <?php

}

function thumbnail_pic_list($pictures, $high_quality = False)
{
   ?>
<div class="column prepend-1 span-21 first last" style="margin-bottom: 2em;">
      <?php if ($pictures) { ?>
<ul class="thumbnail-pic-list">
<?php
 
   for ($i = 0; $i < count($pictures); $i++)
   {
      $link_to = '';
      if (!$high_quality)
      {
        $link_to = Pictures::$VIEW_PIC_URL . "?";
      }
      else
      {
        $link_to = Pictures::$HIGH_QUALITY_URL . "?";
      }
      $pic = $pictures[$i];
      if ($i != 0 && (($i % 4) == 0))
      {
	 ?>
</ul>
</div>
<div class="column prepend-1 span-21 first last" style="margin-bottom: 2em;">
<ul class="thumbnail-pic-list">
	 <?php
      }
$link_to = $link_to . "picid=" . $pic['id'];
if ($high_quality)
{
  $link_to = $link_to . "&key=" . urlencode($pic['high_quality']);
}
?>
<div class="d-inline-block">

<a href="<?=h($link_to) ?>"><img src="/upload/<?=h( $pic['filename']) ?>.550.jpg"  alt="thumbnail" class="img-thumbnail hoverable" alt="hoverable" style="width: 300px"/> <p class="white-text"> <?php  echo $pictures[$i]['title'].'<br>'; ?></p>
</a>

</div>
<?php

   }
?>
<?php }
   else { ?>
<h3 class="error">No pictures here...</h3>


<?php } ?>
</ul>
</div>
<?php
}

function high_quality_item_link($item)
{
   $name = url_origin($_SERVER);
   $high_quality_encoded = urlencode($item['high_quality']);
   $link = $name . Pictures::$HIGH_QUALITY_URL . "?picid={$item['id']}&key={$high_quality_encoded}";
   return "<a href='{$link}'>{$link}</a>";
}


?>