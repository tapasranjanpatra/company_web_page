<?php
 include('_bdconnection.php');
 
 
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password1 = $_POST['password'];
    $role = $_POST['role'];
//******************************** 
   
    
    $query = "SELECT * FROM `comapny` WHERE `email`=? AND `password`=? AND `role`=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $email, $password1, $role);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
  
    if ($count == 1) {
        session_start();
        $_SESSION['id']= $data['id'];
        $_SESSION['role']= $data['role'];
        header('location:Home.php');



        echo 'User found';
    } else {
        echo 'User not found';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>




<!DOCTYPE html>

<html>
<head>
    <title>Login </title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- nav -->
    <?php 
    include('header.php');
   ?>


    

   

    <!-- below are login -->
    <div id="login">
     
        <form id="login-form" method="post">
            
            <h2>Login</h2>
          <!--  -->
          <label for="course"> Select Login as</label>
                    <select name="role" id="" required>
                        <option value="employee">Employee</option>
                        <option value="admin">Admin</option>
                  </select>


            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" name="submit" value="Login">
           
        </form>
       
    </div>
    
    <!-- <script src="login.js"></script> -->
</body>
</html>
