<?php
error_reporting(0);
require_once("../include/users.php");
require_once("../include/pictures.php");
require_once("../include/html_functions.php");
require_once("../include/functions.php");

session_start();

require_login();

$user = Users::current_user_coo();

if(isset($_GET['picid'])){
	Pictures::purchase($user['id'],$_GET['picid']);
	//$query = sprintf("UPDATE update pictures set user_id='%d' where id='%d';", mysql_real_escape_string($user['id']),mysql_real_escape_string($_GET['picid']));
	//echo $user['id'];
}

$pictures = Pictures::get_purchased_pictures($user['id']);

?>

<?php our_header(); ?>
<div class="column prepend-1 span-24 first last">
<h2>You have purchased the following pictures: </h2>
   <?php thumbnail_pic_list($pictures, true); ?>
</div>


<?php our_footer(); ?>