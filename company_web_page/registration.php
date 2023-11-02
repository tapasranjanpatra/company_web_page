   
   
  
  
   
<?php
 include('_bdconnection.php');  //this syntax for connection one page to another



if (isset($_POST['submit'])) {
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];
    $email = $_POST["email"];
   $password1 = $_POST["password"];
// **********************************
    $role = $_POST["role"];
    
   
    
    $query = "INSERT INTO `comapny` (`fname`,`mname`,`lname`,`age`,`email`,`password`,`role`) VALUES(?,?,?,?,?,?,?)";
    $mysql = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($mysql, "sssisss", $fname, $mname, $lname, $age, $email, $password1, $role);
    
    $result = mysqli_stmt_execute($mysql);
    
    if ($result == true) {
        echo 'Data inserted successfully';
    } else {
        echo 'Data not inserted. Error: ' . mysqli_error($conn);
    }
}
?>

 





<!DOCTYPE html>
<html>
<head>
    <title>Register - Company Employee Portal</title>
   <link rel="stylesheet" href="style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <!-- this nav bar -->
    <?php 
    include('header.php');
   ?>



    <!-- below are the  -->



    <div id="registration">
        <form id="registration-form" method="post" name="registration">
            <h2>Registration</h2>
                <div>
                    <label for="course"> Select REG As</label>
                    <select name="role" id="role">
                        <option value="employee">Employee</option>
                        <option value="admin">Admin</option>
                        
        
                    </select>
                </div>
             



            <label for="name">First Name:</label>
            <input type="text" id="name" name="fname" required>

            <label for="name">Middle Name:</label>
            <input type="text" id="name" name="mname" required>

            <label for="name">Last Name:</label>
            <input type="text" id="name" name="lname" required>
            <label for="name">Age</label>
            <input type="number" name="age" id="name">


            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>
    <script>

$(document).ready(function(){
  //$('#row_dim').hide(); 
  $('#role').change(function(){
      if($('#role').val() != 'admin') {
          $('.admin').show(); 
      } else {
          $('.admin').hide(); 
      } 
     // alert('hello');
  });
});
 </script>
</body>
</html>
