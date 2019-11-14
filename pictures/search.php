<?php
error_reporting(0);
require_once("../include/pictures.php");
require_once("../include/comments.php");
require_once("../include/cart.php");
require_once("../include/html_functions.php");
require_once("../include/functions.php");

session_start();

if (!isset($_GET['query']))
{
   http_redirect("/error.php?msg=Error, need to provide a query to search");
}
$query = $_GET['query'];
//$query = xsswaf($_GET['query']);
//$query = sqlwaf($_GET['query']);
$pictures = Pictures::get_all_pictures_by_tag($query);

?>

<?php our_header("", $query, $pictures); ?>
<?php
//$query = sprintf("SELECT *, UNIX_TIMESTAMP(created_on) as created_on_unix from pictures where tag like '%s'", $_GET['query']);
//echo $query;
?>
<?php our_footer(); ?>