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

if(isset($_GET['matric'])){
$matric = $_GET['matric'];

$query = "SELECT * FROM users WHERE matric = ? ";
$stmt = $conn->prepare($query);

if($stmt){

    $stmt->bind_param("s", $matric);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
    } else{
        die("No user found with the specified Matric ID.");
    }

    $stmt->free_result();
    $stmt->close();
} else{
    die("Error preparing query: .$conn->error");
}

}  else{
    die("No user specified.");
}

mysqli_close($conn);

?>




<!DOCTYPE html> 
    <html lang="en"> 
      <head>
      <link rel="stylesheet" href="css/style.css"> 
        <title>Lab 5b</title> 
     </head> 
   <body> 
    <form action="update.php" method="post">
    <h2>Update User</h2>
      <label for="matrics">Matrics:</label>
      <input type="text" id="matric" name="matric" value="<?php echo htmlspecialchars($user['matric']);  ?>"><br>

       <label for="name">Name:</label>
       <input type="text" id="name" name="name"  value="<?php echo htmlspecialchars($user['name']);  ?>"required><br>

    
      
      
       <label for="role">Access Level:</label>
       <select id="role" name="role"  required>
           <option value="">Please select</option>
           <option value="student"  <?php echo ($user['role'] == 'student')? 'selected' : ''; ?>>Student</option>
           <option value="admin" <?php echo ($user['role'] == 'admin')? 'selected' : ''; ?>>Admin</option>
           <option value="lecturer" <?php echo ($user['role'] == 'lecturer')? 'selected' : ''; ?>>Lecturer</option>
         </select><br>

         <button type="submit" class="update">Submit</button>

     </form> 
      
    </body>

</html>