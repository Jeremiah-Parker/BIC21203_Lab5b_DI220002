<?php
session_start();


$servername = "localhost";
$username="root";
$password="";
$dbname="lab_5b";

$conn=mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

$error_message = "";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $matric = mysqli_real_escape_string($conn, $_POST['matric']);
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE matric= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $matric);
    $stmt->execute();
    $result = $stmt->get_result();
   

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password'])){
            $_SESSION['logged_in'] = true;
            $_SESSION['matric'] = $row['matric'];
            header("Location: display.php");
            exit;
        }else{
            $error_message = "Invalid Matric or Password. Try Log in again";
        }
        
    }
    else{
        $error_message = "Invalid Matric or Password. Try Log in again";
    }
}

?>


<!DOCTYPE html> 
    <html lang="en"> 
      <head> 
      <link rel="stylesheet" href="css/style.css">
        <title>Lab 5b</title> 

     </head> 
   <body> 
      <form method="POST" action="">
         <h2>Login Page</h2>
       <label for="matric">Matric:</label>
       <input type="text" name="matric" id="matric" placeholder="ID Matric" required><br>

       <label for="Password">Password:</label>
       <input type="password" name="password" id="password" placeholder="Password" required><br>

       <?php if($_SERVER["REQUEST_METHOD"] === "POST" && !empty($error_message)){ ?>
        <div class="error"> <?php echo $error_message; ?> </div>
        <?php 
       } ?>
          
          
       <button type="submit" class="login">Login</login>
       <div class="link">
       <a href="register.php">Don't have account yet?Register now.</a>
      </div>
      </form>
    
     
    </body>

</html>