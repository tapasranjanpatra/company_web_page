<?php 
 session_start();

 $id = $_SESSION['id'];
 $role = $_SESSION['role'];

 include('_bdconnection.php');

 $query = "select * from `comapny` where id='$id'";
 $result = mysqli_query($conn,$query);

 $data = mysqli_fetch_assoc($result);


 if($role=='employee'){
    $query = "select * from `comapny` where role='admin'";
    $result = mysqli_query($conn,$query);
    
    
 }else{
    $query = "select * from `comapny` where role='employee'";
    $result = mysqli_query($conn,$query);
    
 }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Home- Company Employee Portal</title>
   <link rel="stylesheet" href="style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <!-- this nav bar -->
    <?php 
    include('header.php');
   ?>

    
        
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                </tr>
                <?php } ?>
               
            </tbody>
        </table>
    </body>
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
    </html>
    