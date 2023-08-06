<?php 
 $con = mysqli_connect("localhost","root","");
 $db=mysqli_select_db($con,"sms");
 $query ="update student_login set name='$_POST[name]', father_name='$_POST[father_name]', class=$_POST[class], mobile='$_POST[mobile]',email='$_POST[email]',password='$_POST[password]',remark='$_POST[remark]' where roll_no= $_POST[roll_no] ";
 $result = mysqli_query($con,$query);
?>

<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "admin_dashboard.php";
</script>