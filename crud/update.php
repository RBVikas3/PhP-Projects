<?php 
include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from crud where id=$id";
$result=mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];




if(isset($_POST['submit'])){
     $name=$_POST['name'];
     $Email=$_POST['Email'];
     $mobile=$_POST['mobile'];
     $password=$_POST['password'];


     $sql="update crud set id=$id,name='$name', Email='$Email', mobile='$mobile', password='$password' where id=$id ";
     
     $result=mysqli_query($con, $sql);
     if($result){
         //echo "updated successfully";
          header('location:display.php');
     }else{
          die(mysqli_error($con));
     }
     
} 






?>










<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>Crud operation</title>
</head>
<body>
     <div class="container my-5">
     	<form method="post">
  
     <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder= "Enter your name" name=
    "name" autocomplete="off" 
    value=<?php echo $name;?>>
    </div>
   
  
     <div class="form-group">
    <label>Email</label>
    <input type="Email" class="form-control" placeholder= "Enter your Email" name=
    "Email" autocomplete="off" value=<?php echo $email;?>>
    </div>



     <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" placeholder= "Enter your mobile number" name=
    "mobile" autocomplete="off" value=<?php echo $mobile;?>>
    </div>




     <div class="form-group">
    <label>password</label>
    <input type="text" class="form-control" placeholder= "Enter your password" name=
    "password" autocomplete="off" value=<?php echo $password;?>>
    </div>



  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
     </div>
</body>
</html>