<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Admin dashboard</title>
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
						<input type="submit" name="search_student" value="Search Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="edit_student" value="Edit Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="add_new_student" value="Add New Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="delete_student" value="Delete Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="show_teachers" value="Show Teachers">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right"><br><br>
		<div id="demo">
			<!-- #Code for search student details---Start-->
			<?php
           if(isset($_POST['search_student'])) {
              
			?>
             <center>
             	<form action="" method="post">
             	  <label>Enter Roll No:</label>
             	  <input type="text" name="roll_no" placeholder="Enter Roll No">
             	  <input type="submit" name="roll_no_search" value="Search">
             	</form>
             </center>
           <?php 
             }
            if(isset($_POST['roll_no_search']))
           {
	         $query = "SELECT * From student_login WHERE roll_no ='$_POST[roll_no]' ";
           $result = mysqli_query($con,$query);
           while($row = mysqli_fetch_assoc($result)){
           ?>
          <center>
          	<table>
          		<tr>
          			<td><h4><b><u>Student's details</u></b></h4><br></td>
          		</tr>
          		<tr>
							<td>
								<b>Roll No:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['roll_no']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['name']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Father's Name:&nbsp;&nbsp;</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['father_name']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Class:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['class']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Mobile:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['mobile']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" value="<?php echo $row['email']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" value="<?php echo $row['password']?>" disabled>
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" disabled><?php echo $row['remark']?></textarea>
							</td>
						</tr>
          	</table>
          </center >
<?php
}
}
           ?>  

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
		 <!-- #Code for Add student details---Start--> 
     <?php
      if (isset($_POST['add_new_student'])){
     ?>
      <center><h4>Fill The Given Details:</h4></center>
      <form action="add_student.php" method="post">
      	<table>
       <tr>
       	<td>Roll No:</td>
       	<td>
       		<input type="text" name="roll_no" required>
       	</td>
       </tr>
        <tr>
       	<td>Name:</td>
       	<td>
       		<input type="text" name="name" required>
       	</td>
       </tr>
        <tr>
       	<td>Father's Name:</td>
       	<td>
       		<input type="text" name="father_name" required>
       	</td>
       </tr>
        <tr>
       	<td>Class:</td>
       	<td>
       		<input type="text" name="class" required>
       	</td>
       </tr>
        <tr>
       	<td>Mobile:</td>
       	<td>
       		<input type="text" name="mobile" required>
       	</td>
       </tr>
        <tr>
       	<td>Email:</td>
       	<td>
       		<input type="text" name="email" required>
       	</td>
       </tr>
        <tr>
       	<td>Password:</td>
       	<td>
       		<input type="text" name="password" required>
       	</td>
       </tr>
        <tr>
       	<td>Remark:</td>
       	<td>
       		<textarea rows="3" cols="40" name="remark"></textarea>
       	</td>
       </tr>
       <tr>
       	<td>
       		<input type="submit" name="add" value="Add Student">
       	</td>
       </tr>
      	</table>
      </form>
<?php       
     }
     ?>

     <!-- #Code for Delete Student ---Start-->
			<?php
           if(isset($_POST['delete_student'])) {
              
			?>
             <center>
             	<h3><b>Enter Roll No of Student To Delete</b></h3>
             	<br>
             	<form action="delete_student.php" method="post">
             	  <label>Enter Roll No:</label>
             	  <input type="text" name="roll_no" placeholder="Enter Roll No">
             	  <input type="submit" name="roll_no_delete" value="Delete">
             	</form>
             </center>
      <?php       
     }
     ?> 

     <!-- #Code for Show Teachers ---Start-->
			<?php
           if(isset($_POST['show_teachers'])) {
              
			?>
             <center>
             	<h3><b>Teacher's Details</b></h3>
             	<br>
     	<table class="table table-hover table-striped table-danger table-bordered">
      <tr>
      <th><b>ID</b></th>
      <th><b>Name</b></th>
      <th><b>Mobile</b></th>
      <th><b>Courses</b></th>
      <th><b>View Detail</b></th>
    </tr>
      <?php   
        $con = mysqli_connect("localhost","root","");
        $db=mysqli_select_db($con,"sms");
        $query = "select * from teachers";   
        $result = mysqli_query($con, $query); 
        while($row = mysqli_fetch_assoc($result)) {
        	?>
        	<center>
        		<tbody>
        			<tr>
        				<td><?php echo $row['t_id'];?></td>
        				<td><?php echo $row['name'];?></td>
        				<td><?php echo $row['mobile'];?></td>
        				<td><?php echo $row['courses'];?></td>
        				<td><a href="#">View Detail</a></td>
        			</tr>
        		</tbody>
        	</center>
     <?php   	
        } 
     }
     ?> 
 </table>
		</div>
		
	</div>
</body>
</html>