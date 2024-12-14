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

if(isset($_GET['matric'])) {

    $matric = mysqli_real_escape_string($conn, $_GET['matric']);

$sql= "DELETE FROM users WHERE matric = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $matric);


if($stmt->execute()){
    echo "<p style='color:green;'>User deleted successfully.</p>";
} else{
    echo  "<p style='color:red;'>Error deleting user: " .$conn->error. "</p>";
}


$stmt->close();

}


mysqli_close($conn);
header("Location:display.php");
exit;

?>