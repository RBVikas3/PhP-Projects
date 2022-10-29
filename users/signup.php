 <?php
 session_start();


       include("connection.php");
       include("function.php");

       if($_SERVER['REQUEST_METHOD'] == "POST")
       {

         //something was posted
         $username = $_POST['username'];
         $password = $_POST['password'];

         if(!empty($username) && !empty($password) && !is_numeric($username))
         { 
            //save to datebase
            $user_id = random_num(20);
            $query = "insert into users (user_id,username,password) values ('$user_id','$username','$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
         }else
         {
            echo "please enter some vaild inforamtion!";
         }
       }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup</title>
</head>
<body>

    <style type="text/css">
    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border:  solid thin #aaa;
        width: 100%;
    }
    #button{

        padding:  10px;
        width:  100px;
        color: white;
        background-color: lightblue;
        border:  none;

    }

    #box{
        background-color:  grey;
        margin:  auto;
        width:  300px;
        padding:  20px;
    }
    </style>
 <div id="box">
        <form method="post">
            <div style="font-size: 20px; Margin: 10px; color: white;">signup</div>
            <input id= "text" type="text" name="username"><br><br>
            <input id= "text"  type="password" name= "password"><br><br>
            <input id= "button" type="submit" value="signup"><br><br>

            <a href="login.php">Click to Login</a><br><br>      
        </form> 
    </div>


</body>
</html>