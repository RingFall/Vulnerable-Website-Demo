<?php
error_reporting(0);
class DB
{
   public $conn;
   
   function __construct($server, $user_name, $pass, $db)
   {
      $this->conn = mysql_connect($server, $user_name, $pass);
      mysql_select_db($db, $this->conn);
      mysql_set_charset('utf8');
   }

   function __destruct()
   {
      mysql_close($this->conn);
   }
}
?>