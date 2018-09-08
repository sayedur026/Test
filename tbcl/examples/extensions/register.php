<?php  
include '../view/db.php';  
 session_start();  
 /*if(isset($_SESSION["username"]))  
 {  
      header("location:index.php");  
 }  */
if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($conn, $_POST["username"]);  
           $password = mysqli_real_escape_string($conn, $_POST["password"]);  
           $password = md5($password);  
           $mode = mysqli_real_escape_string($conn, $_POST["mode"]);
		   $sql = "SELECT COUNT(id) as c FROM users WHERE username='$username'";
		   $res = mysqli_query($conn, $sql);
		   $row = $res->fetch_assoc();
		   $count = $row['c'];
		   if(!$count==0){
			   echo '<script>alert("User Already Exists!")</script>';
		   }else{
			   $query = "INSERT INTO users (username, password, mode) VALUES('$username', '$password', '$mode')";  
			   if(mysqli_query($conn, $query))  
			   {  
					echo '<script>alert("Registration Done")</script>';  
			   }  
		   }
      }  
 }    
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Register | Inventory Database</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Register | Inventory Database</h3>  
                <br />  
				<form method="post">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
					 <label>User Mode</label>
					 <select name="mode" id="mode" class="form-control">
						  <option value="0">Read</option>
						  <option value="1">Write</option>
						  <option value="2">Admin</option>
					 </select>
					 <br />
                     <input type="submit" name="register" value="Register" class="btn btn-info" />  
                     <br />  
                </form>
           </div>  
      </body>  
 </html>