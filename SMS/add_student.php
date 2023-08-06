<?php 
 $con = mysqli_connect("localhost","root","");
 $db=mysqli_select_db($con,"sms");
 $query = "insert into student_login values('','$_POST[name]','$_POST[email]','$_POST[password]',$_POST[roll_no], $_POST[class],'$_POST[father_name]',$_POST[mobile],'$_POST[remark]') "; 
 $result = mysqli_query($con,$query);
?>

<script type="text/javascript">
	alert("Student Added successfully.");
	window.location.href = "admin_dashboard.php";
</script>