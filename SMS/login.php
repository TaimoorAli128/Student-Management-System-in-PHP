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
		<h3>Student Managment System</h3> <br>
		<form action="" method="post">
			<input type="submit" name="admin_login" value="Admin Login">
			<input type="submit" name="student_login" value="Student Login"> 
		</form>
		<?php 
           if (isset($_POST['admin_login'])) {
           	   header("Location:admin_login.php");
           }
           if (isset($_POST['student_login'])) {
           	   header("Location:student_login.php");
           }
		?>
	</center>

</body>
</html>