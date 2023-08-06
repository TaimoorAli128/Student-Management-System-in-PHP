<script type="text/javascript">
   if(confirm("Are you sure you want to delete ?")){
document.write("<?php 
        $con = mysqli_connect("localhost","root","");
        $db=mysqli_select_db($con,"sms");
        $query = "delete from student_login where roll_no=$_POST[roll_no]"; 
        $result = mysqli_query($con,$query);
?>
")
     window.location.href = "admin_dashboard.php";
   }
   else{
        window.location.href = "admin_dashboard.php";
   }
</script>

<?php 
 $con = mysqli_connect("localhost","root","");
 $db=mysqli_select_db($con,"sms");
 $query = ""; 
 $result = mysqli_query($con,$query);
?>