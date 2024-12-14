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

$query = "SELECT matric, name, role AS accessLevel FROM users";
$result = mysqli_query($conn, $query);

?>


<!DOCTYPE html> 
    <html lang="en"> 
      <head> 
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Lab 5b</title> 
        
     </head> 
   <body> 
    <h2>User Information <a href="logout.php"><i class="fa fa-sign-out" style="font-size:24px"></i></a></h2>
    <table>
        <thead>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Access Level</th>
                 <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>"   .$row['matric'].  "</td>";
                    echo "<td>"   .$row['name']. "</td>";
                    echo "<td>"   .$row['accessLevel'].  "</td>";
                    echo "<td>
                    <a  href='updateForm.php?matric=" . urlencode($row['matric']) . "'>Update</a> |
                    <a class='delete' href='delete.php?matric=" . urlencode($row['matric']) . "' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                  </td>";
                  echo "</tr>";
                }
            }  else{
                echo "No Records dound";
            }
            ?>
         </tbody>

    <table>
      
    </body>

</html>