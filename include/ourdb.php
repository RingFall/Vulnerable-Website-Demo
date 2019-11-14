<?php
error_reporting(0);

$username = "root";
$pass = "lxz";
$database = "wackopicko";

require_once("database.php");
$db = new DB("127.0.0.1", $username, $pass, $database);
/*
$pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8",'root','lxz');
$pdo->exec('set names utf8');
$id = '0 or 1 =1 order by id desc';
$sql = "select * from article where id = ?";
$statement = $pdo->prepare($sql);
$statement->bindParam(1, $id);
$statement->execute();
*/
?>