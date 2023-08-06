<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>SMS Login page</title>
</head>
<body>
	<center> 
		<br>
		<h3>Admin Login Page</h3><br>	
		<form action="" method="post">
			<label>Enter Email</label>
			<br>
			<input type="text" name="email" required>
			<br>
			<label>Enter Password</label>
			<br>
			<input type="password" name="password" required> 
			<br> <br>
			<input type="submit" name="submit">
		</form><br>
		<?php 
		     session_start();
         if(isset($_POST['submit'])){
           $con = mysqli_connect("localhost","root","");
           $db=mysqli_select_db($con,"sms");
           $query = "SELECT * From admin_login WHERE email='$_POST[email]' ";
           $result = mysqli_query($con,$query);
           while($row = mysqli_fetch_assoc($result)){
           	if ($row['email'] == $_POST['email']) {
           		if ($row['password'] == $_POST['password']) {
           			$_SESSION['email'] = $row['email'];
           			$_SESSION['name'] = $row['name'];
           			header("Location: admin_dashboard.php");
           		}
           		else{
           			echo "Wrong Password";
           		}
           	}
           	else{
           		echo "Wrong Email";
           	}
           }
         }
		?>
	</center>

</body>
</html>