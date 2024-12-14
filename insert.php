<?php
require_once 'session.php';

$servername = "localhost";
$username="root";
$password="";
$dbname="lab_5b";

$conn=mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
$matric = mysqli_real_escape_string($conn, $_POST['matric']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$role = mysqli_real_escape_string($conn, $_POST['role']);

$sql= "INSERT INTO users (matric, name, password, role) VALUES('$matric', '$name', '$password', '$role')";


if(mysqli_query($conn, $sql)){
    header("Location:display.php");
} else {
    echo "Error :" .$sql. "<br>" .mysqli_error($conn);
}

}


mysqli_close($conn);
exit;

?>