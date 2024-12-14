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
$role = mysqli_real_escape_string($conn, $_POST['role']);

$sql= "UPDATE  users  SET name = ?, role = ? where matric = ?";
$stmt=$conn->prepare($sql);
$stmt->bind_param('sss', $name, $role, $matric);


if($stmt->execute()){
   echo "<p style= 'color:green;'>User Updated successfully.</p>";
}else{
    echo "<p style='color:red;'>Error: Could not update user." .$conn->error.  "</p>";
}

$stmt->close();


}  else{
    echo "<p style='color:red;'>Invalid request method.</p>";
}


mysqli_close($conn);
header("Refresh:2; url=display.php");
exit;

?>


?>