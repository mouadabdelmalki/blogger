<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


define("DB_HOST" , "localhost");
define("DB_LOGIN", "root");
define("DB_PASS", "");
define("DB_BDD" , "blog");



$connect= mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS);
$bdd= mysqli_select_db($connect,DB_BDD);
mysqli_set_charset($connect, "utf8");
?>
