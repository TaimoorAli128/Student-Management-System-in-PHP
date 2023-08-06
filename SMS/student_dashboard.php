<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Student dashboard</title>
	<style type="text/css">
		#header{
			height: 10%;
			width: 100%;
			/*top: 2%;*/
			background-color: black ;
			position: fixed;
			color: white;
		}
		#left{
			height: 75%;
			width: 15%;
			top: 18%;
			position: fixed;
		}
		#right{
			height: 75%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
	</style>
	<?php
      session_start();
      $con = mysqli_connect("localhost","root","");
      $db=mysqli_select_db($con,"sms");
	?>
</head>
<body>
	<div id="header">
		<br>
		<center><strong>Student Management System &nbsp;&nbsp;&nbsp;&nbsp;</strong>
			Email: <?php echo $_SESSION['email'] ;?>&nbsp;&nbsp;&nbsp; Name: <?php echo $_SESSION['name'] ;?>
			&nbsp;&nbsp;&nbsp;&nbsp;
     <a href="logout.php">Logout</a>
		</center>
	</div>
	<span id="top"><marquee>Note:- This portal is open now...... plz edit your information if it's wrong.</marquee></span>
	<div id="left">
		<form action="" method="post">
			<table>
				<tr>
					<td>
						<input type="submit" name="show_detail" value="Show Detail">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="edit_detail" value="Edit Detail">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right"><br><br>
		<div id="demo">
		  <!-- #Code for Show Teachers ---Start-->
			<?php
           if(isset($_POST['show_detail'])) {
           $query = "select * from student_login where email = '$_SESSION[email]'" ;
           $result = mysqli_query($con,$query);
           while($row = mysqli_fetch_assoc($result)){
			?>
             <center>
             	<h3><b>Student Details</b></h3>
             	<br>
     	<table class="table table-hover table-striped table-primary table-bordered">
      <tr>

      <th><b>Roll No</b></th>
      <th><b>Name</b></th>
      <th><b>Father's Name</b></th>
      <th><b>Class</b></th>
      <th><b>Mobile</b></th>
      <th><b>Email</b></th>
      <th><b>Password</b></th>
      <th><b>Remark</b></th>
    </tr>
        		<tbody>
        			<tr>
        				<td><?php echo $row['roll_no'];?></td>
        				<td><?php echo $row['name'];?></td>
        				<td><?php echo $row['father_name'];?></td>
        				<td><?php echo $row['class'];?></td>
        				<td><?php echo $row['mobile'];?></td>
        				<td><?php echo $row['email'];?></td>
        				<td><?php echo $row['password'];?></td>
        				<td><?php echo $row['remark'];?></td>
        				
        			</tr>
        		</tbody>
        	</center>
     <?php   	
        } 
     }
     ?> 
 </table>
    <!-- #Code for edit student details---Start-->
			<?php
           if(isset($_POST['edit_student'])) {
              
			?>
             <center>
             	<form action="" method="post">
             	  <label>Enter Roll No:</label>
             	  <input type="text" name="roll_no" placeholder="Enter Roll No">
             	  <input type="submit" name="roll_no_edit" value="Edit">
             	</form>
             </center>
				<?php
			}
			if(isset($_POST['roll_no_edit']))
			{
				$query = "select * from student_login where roll_no = $_POST[roll_no]";
				$result = mysqli_query($con,$query);
				while ($row = mysqli_fetch_assoc($result)) 
				{
					?>
					<center>
					<form action="admin_edit_student.php" method="post">
						<table>
						<tr>
							<!-- <td>
								<b>Roll No:</b>
							</td>  -->
							<td>
								<input type="hidden" name="roll_no" value="<?php echo $row['roll_no']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:&nbsp;&nbsp;</b>
							</td> 
							<td>
								<input type="text" name="father_name" value="<?php echo $row['father_name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Class:</b>
							</td> 
							<td>
								<input type="text" name="class" value="<?php echo $row['class']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" name="mobile" value="<?php echo $row['mobile']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" value="<?php echo $row['password']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" name="remark"><?php echo $row['remark']?></textarea>
							</td>
						</tr><br>
						<tr>
							<td>
								<input type="submit" name="edit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					</center>
					<?php
				}
			}
		?>
		</div>
		
	</div>
</body>
</html>