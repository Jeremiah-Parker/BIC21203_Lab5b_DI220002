<!DOCTYPE html> 
    <html lang="en"> 
      <head> 
      <link rel="stylesheet" href="css/style.css">
        <title>Lab 5b</title> 
     </head> 
   <body> 
    <form class="register" action="insert.php" method="post">
      <h2>Register Form</h1>
      <label for="matrics">Matrics:</label>
      <input type="text" id="matric" name="matric"   placeholder="Please enter your ID Matric"required><br>

       <label for="name">Name:</label>
       <input type="text" id="name" name="name"   placeholder="Please enter your Name"required><br>

       <label for="name">Password:</label>
       <input type="password" id="password" name="password"   placeholder="Please enter your Password"required><br>
      
      
       <label for="role">Role:</label>
       <select id="role" name="role" required>
           <option value="">Please select</option>
           <option value="student">Student</option>
           <option value="admin">Admin</option>
           <option value="lecturer">Lecturer</option>
         </select><br>

         <button type="submit" class="submit">Submit</button>
               
         <div class="login-link">
         <a href="login.php">Already have account? Log in Now</a>
         </div>
     </form> 
      
    </body>

</html>