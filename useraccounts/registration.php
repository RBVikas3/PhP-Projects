<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User  Registration in php</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div>
	<?php
	if(isset($_POST['create'])){
		$firstname   = $_POST['firstname'];
		$lastname    = $_POST['lastname'];
		$email       = $_POST['email'];
		$phonenumber = $_POST['phonenumber'];
		$password    = $_POST['password'];
         $sql = "INSERT INTO users (firstname, lastname, email, phonenumber, password) values(?,?,?,?,?)";
         $stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$firstname, $lastname, $email, $phonenumber, $password]);
		if($result){
			echo 'Successfully saved';
		}else{
			echo 'There were errors while saving the data.';
		}

	}
	?>
</div>
<div>
    <form action="registration.php" method="post">
    	<div class="container">
    	<div class="row">
        <div class="col-sm-3">

    		<h1>Registration</h1>
    		<p>Fill up the form with correct values.</p>
    		<hr class="mb-3">
            <label for="firstname"><b>First Name</b></label>
    		<input class="form-control" id="firstname" type="text" name="firstname" required>

    		<label for="lastname"><b>Last Name</b></label>
    		<input class="form-control" id="lastname" type="text" name="lastname" required>

    		<label for="email"><b>Email Address</b></label>
    		<input class="form-control" id="email" type="email" name="email" required>

    		 <label for="phonenumber"><b>Phone Number</b></label>
    		<input class="form-control"  id="phonenumber" type="text" name="phonenumber" required>

    		 <label for="password"><b>Password</b></label>
    		<input class="form-control" id="password" type="password" name="password" required>
             <hr class="mb-3">
    		<input class="btn btn-primary" type="submit" id="register" name="create" value="Sign up">
      </div>
    </div>
  </div>
 </form> 


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){ 
           var vaild = this.form.CheckValidity();

			
           if(vaild){


           	var firstname = $('#fisrtname').val();
			var lastname  = $('#lastname').val();
			var email     = $('#email').val();
			var phonenumber = $('#phonenumber').val();
			var password = $('#password').val();

           	    e.preventDefault();

           	    $.ajax({
           	    	type: 'POST',
           	    	url:  'process.php',
           	    	data:  {firstname: firstname,lastname: lastname,email: email,phonenumber: phonenumber,password: password},
           	    	success: function(data){
           	    	Swal.fire({
			                   'title': 'Successful',
			                   'text' : 'Successfully registered.',
			                   'type' : 'Success'
			               })


           	    	},
           	    	error: function(data){
           	    		Swal.fire({
			                   'title': 'Errors',
			                   'text' : 'There were errors while saving the data.',
			                   'type' : 'error'
			               })

	           	    }

           	    });
           	   
           }else{
               
           
           }


			
		});
		
		
		
	});
</script>
</body>
</html>