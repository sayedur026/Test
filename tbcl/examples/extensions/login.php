<?php  
ob_start();
include '../view/db.php';  
 session_start();  
 if(isset($_SESSION["myspecialusername"]))  
 {  
      header("location:index.php");  
 } 

 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
		   console.log("No Input!");
      }  
      else  
      {  
           $myspecialusername = mysqli_real_escape_string($conn, $_POST["username"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT mode FROM users WHERE username = '$myspecialusername' AND password = '$password'";  
           $result = mysqli_query($conn, $query);  
		   
           if(mysqli_num_rows($result) > 0)  
           {
				$row = $result->fetch_assoc();
				$mode = $row['mode'];
				$_SESSION['specialUserMode'] = $mode;
                $_SESSION['myspecialusername'] = $myspecialusername; 
console.log("logged in ok");				
                header("location:index.php");  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Login | Inventory Database</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Login | Inventory Database</h3>  
                <br /> 
                <form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" value="Login" class="btn btn-info" />  
                     <br />  
                </form>
           </div>  
      </body>  
 </html>