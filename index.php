<?php
error_reporting(0);
require_once("include/html_functions.php");

?>

<?php our_header("home"); ?>



<!-- Section: Blog v.1 -->
<div class="container">
<section class="my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">漏洞列表</h2>
  <!-- Section description -->
  <p class="text-center w-responsive mx-auto mb-5">本站点目前包含的漏洞极其介绍~待续qvq</p>

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
        <img class="img-fluid" src="https://images.idgesg.net/images/article/2018/02/security_risk_assessment_analysis_vulnerability_danger_thinkstock_902893076-100750007-large.jpg" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Category -->
      <a href="#!" class="green-text">
        <h6 class="font-weight-bold mb-3"><i class="fas fa-bug pr-2"></i>Cross Site Scripting</h6>
      </a>
      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>XSS - 跨站脚本攻击</strong></h3>
      <!-- Excerpt -->
      <p>XSS攻击通常指的是通过利用网页开发时留下的漏洞，通过巧妙的方法注入恶意指令代码到网页，使用户加载并执行攻击者恶意制造的网页程序。攻击成功后，攻击者可能得到更高的权限、私密网页内容、会话和cookie等各种内容。</p>
      <!-- Post data -->
      <p>by <a><strong>RingFa1l</strong></a>, 1/06/2019</p>
      <!-- Read more button -->
      <a class="btn btn-success btn-md" href="https://zh.wikipedia.org/wiki/%E8%B7%A8%E7%B6%B2%E7%AB%99%E6%8C%87%E4%BB%A4%E7%A2%BC">Read more</a>

      <a class="btn btn-success btn-md" href="/guestbook.php">TRY IT!</a>
    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Category -->
      <a href="#!" class="pink-text">
        <h6 class="font-weight-bold mb-3"><i class="fas fa-syringe pr-2"></i>SQL injection</h6>
      </a>
      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>SQL注入攻击</strong></h3>
      <!-- Excerpt -->
      <p>SQL注入，是发生于应用程序与数据库层的安全漏洞。简而言之，是在输入的字符串之中注入SQL指令，在设计不良的程序当中忽略了字符检查，那么这些注入进去的恶意指令就会被数据库服务器误认为是正常的SQL指令而运行，因此遭到破坏或是入侵。</p>
      <!-- Post data -->
      <p>by <a><strong>RingFa1l</strong></a>, 1/06/2019</p>
      <!-- Read more button -->
      <a class="btn btn-pink btn-md mb-lg-0 mb-4" href="https://zh.wikipedia.org/wiki/SQL%E6%B3%A8%E5%85%A5">Read more</a>
      <a class="btn btn-pink btn-md mb-lg-0 mb-4" href="/pictures/search.php?query=sqli">TRY IT!</a>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2">
        <img class="img-fluid" src="https://www.ed.youth4work.com/vDocuments/Education/PreviewPic/2b2e3e83-c0ea-49cd-958e-d55fde80ac83.png" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
        <img class="img-fluid" src="https://blog.phpbb.com/wp-content/uploads/2008/11/csrf.png" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Category -->
      <a href="#!" class="indigo-text">
        <h6 class="font-weight-bold mb-3"><i class="fas fa-suitcase pr-2"></i>Cross-site request forgery</h6>
      </a>
      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>CSRF - 跨站点请求伪造攻击</strong></h3>
      <!-- Excerpt -->
      <p>跨站请求伪造，也被称为 one-click attack 或者 session riding，通常缩写为 CSRF 或者 XSRF， 是一种挟制用户在当前已登录的Web应用程序上执行非本意的操作的攻击方法。 跟跨网站脚本（XSS）相比，XSS 利用的是用户对指定网站的信任，CSRF 利用的是网站对用户网页浏览器的信任。</p>
      <!-- Post data -->
      <p>by <a><strong>RingFa1l</strong></a>, 1/06/2019</p>
      <!-- Read more button -->
      <a class="btn btn-indigo btn-md" href="https://zh.wikipedia.org/wiki/%E8%B7%A8%E7%AB%99%E8%AF%B7%E6%B1%82%E4%BC%AA%E9%80%A0">Read more</a>

      <a class="btn btn-indigo btn-md" href="/guestbook.php">TRY IT!</a>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">

  
  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Category -->
      <a href="#!" class="yellow-text">
        <h6 class="font-weight-bold mb-3"><i class="fas fa-image pr-2"></i>File Upload</h6>
      </a>
      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>文件上传攻击</strong></h3>
      <!-- Excerpt -->
      <p>文件上传漏洞是指网络攻击者上传了一个可执行的文件到服务器并执行。这里上传的文件可以是木马，病毒，恶意脚本或者WebShell等。这种攻击方式是最为直接和有效的，部分文件上传漏洞的利用技术门槛非常的低，对于攻击者来说很容易实施。</p>
      <!-- Post data -->
      <p>by <a><strong>RingFa1l</strong></a>, 1/06/2019</p>
      <!-- Read more button -->
      <a class="btn btn-yellow btn-md mb-lg-0 mb-4" href="https://paper.seebug.org/560/">Read more</a>

      <a class="btn btn-yellow btn-md mb-lg-0 mb-4" href="/pictures/upload.php">TRY IT!</a>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2">
        <img class="img-fluid" src="https://s1.ax1x.com/2018/11/20/F9G4w4.jpg" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
</div>
<!-- Section: Blog v.1 -->




<?php our_footer(); ?>
