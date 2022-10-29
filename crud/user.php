<?php 
include 'connect.php';
if(isset($_POST['submit'])){
     $name=$_POST['name'];
     $Email=$_POST['Email'];
     $mobile=$_POST['mobile'];
     $password=$_POST['password'];

     $query= mysqli_query($con, "SELECT * FROM crud WHERE Email='$Email' ");
     if(mysqli_num_rows($query)>0)
     {
          echo "Email id already use";
     }
     else{





     $sql="INSERT INTO crud (name,Email,mobile,password) 
     values ('$name','$Email','$mobile','$password')";
     $result=mysqli_query($con, $sql);
     if($result){
         // echo "Data inserted successfully";
          header('location:display.php');
     }else{
          die(mysqli_error($con));
     }
     
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
               <h1>Registration Form</h1>
          <p>Fill up the form with correct values.</p>
  
     <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder= "Enter your name" name=
    "name" autocomplete="off">
    </div>
   
  
     <div class="form-group">
    <label>Email</label>
    <input type="Email" class="form-control" placeholder= "Enter your Email" name=
    "Email" autocomplete="off">
    </div>



     <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" placeholder= "Enter your mobile number" name=
    "mobile" autocomplete="off">
    </div>




     <div class="form-group">
    <label>password</label>
    <input type="text" class="form-control" placeholder= "Enter your password" name=
    "password" autocomplete="off">
    </div>



  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
     </div>
</body>
</html>