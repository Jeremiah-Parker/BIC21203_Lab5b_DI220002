<?php
session_start();
$servername = "localhost";
$username="root";
$password="";
$dbname="lab_5b";

session_unset();
session_destroy();

header("Location:login.php");
exit;

?>