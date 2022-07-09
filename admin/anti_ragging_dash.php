
<!---created by: Alger Makiputin -->
<?php 
	include('DBConnect.php');
	$eid = 0;
?>

<?php

// Create database connection
  $db = mysqli_connect("localhost", "root", "root", "college");



?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Anti-Ragging Dashboard</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <script src="jquery.js"></script>
        <link rel="stylesheet" href="style.css">
        <style>
			.jumbotron {
				background: white;
			}
			.container-fluid{
				margin-left: 1%;
			}
			.row{
				border: 1px solid black;

			}
			td{
				text-align: center;
				margin-top: 5px;
			}
			th{
				text-align: center;
				
			}
			h4{
				font-size: 30px;
				text-align: center;
				text-decoration: underline;
			}
			h3{
				text-align: center;
			}
			
		</style>
    </head>
    <body>
    	<?php
    	include ('head.php');
    	?>
    	
    	
        <div class="jumbotron">
        	<h2 style="text-align: center;margin-top: 3%;">-: Anti-Ragging Dashboard :-</h2><br> 
            <div class="container-fluid">
          
                <div class="row">
                   <?php 
						if(isset($_GET['edit'])) { 
							$select_sql = "SELECT * FROM anti_ragging_dash WHERE id=$_GET[edit]";
							$select = mysqli_query($conn, $select_sql);
							while($row = mysqli_fetch_assoc($select)) {
							 	$fname = $row['fname'];
							 	$department = $row['department'];
								$designation = $row['designation'];
								$qualification = $row['qualification'];
								$experience = $row['experience'];
								$gender = $row['gender'];
								$email= $row['email'];
								$contact_number = $row['contact_number'];
								
								$eid = $row['id'];
							}
							
							echo "
								<form class='col-md-3' method='GET'>
								<h3>Edit Data</h3>
								<div class='form-group'>
									<label> Name</label>
									<input class='form-control' type='text' name='fname' value =$fname>
								</div>
								<div class='form-group'>
									<label> Department</label>
									<input class='form-control' type='text' name='department' value =$department>
								</div>
								<div class='form-group'>
									<label>designation</label>
									<input class='form-control' type='text' name='designation' value =$designation>
								</div>
								<div class='form-group'>
									<label>experience</label>
									<input class='form-control' type='text' name='experience' value=$experience>
								</div>";
								?>
								<label class='control-label'>Qualification</label>
								<div class='radio'>
									<label class='radio'><input type='radio' name='qualification' value='Ph.D' <?php echo ($qualification == "Ph.D" ? 'checked="checked"': '')?> >Ph.D</label>
								</div>	
								<div class='radio'>
									<label class='radio'><input type='radio' name='qualification' value='ME/Mtech' <?php echo ($qualification == "ME/Mtech" ? 'checked="checked"': '')?>>ME/Mtech</label>
								</div>
								
								<div class='radio'>
									<label class='radio'><input type='radio' name='qualification' value='BE/Btech' <?php echo ($qualification == "BE/Btech" ? 'checked="checked"': '')?>>BE/Btech	</label>
								</div>
								

								<label class='control-label'>Gender</label>
								<div class='radio'>
									<label class='radio'><input type='radio' name='gender' value='male' <?php echo ($gender == "male" ? 'checked="checked"': '')?> >Male</label>
								</div>	
								<div class='radio'>
									<label class='radio'><input type='radio' name='gender' value='female' <?php echo ($gender == "female" ? 'checked="checked"': '')?>>Female</label>
								</div>
								<?php
									echo "
										<div class='form-group'>
										<label>Email</label>
										<input class='form-control' type='email' name='email' value=$email>
									</div>
									<div class='form-group'>
										<label>Contact Number</label>
										<input class='form-control' type='text' name='contact_number' value=$contact_number>
									</div>

									


									<div class=form-group>
										<input type ='hidden' name='updateid' value ='$eid'>
										<input class='btn btn-primary' type ='submit' value='Update' name = 'update' >
										<a href='anti_ragging_dash.php'><button class='btn btn-primary'>Cancel</button></a>
									</div>
								</form>
									
									";
								
								?>					
							
							<?php
						}else{ ?>
							<form class="col-md-3" method="POST" style="border-right:  1px solid black;"  enctype="multipart/form-data">
								<h3>Information Form</h3>
								<hr>
								<div class="form-group">
									<label> Name with initials<br> (like A.B.Surename)</label>
									<input class="form-control" type="text" name="fname" required="">
								</div>
								<div class="form-group">
									<label>Department</label>
									<input class="form-control" type="text" name="department"  required="">
								</div>
								<div class="form-group">
									<label>Designation</label>
									<input class="form-control" type="text" name="designation"  required="">
								</div>

								<label class="control-label">Qualification</label>
								<div class="radio">
									<div><label class="radio"><input type="radio" name="qualification" value="Ph.D" required="">Ph.D</label></div>
									<div><label class="radio"><input type="radio" name="qualification" value="ME/Mtech">ME/Mtech</label></div>
									<label class="radio"><input type="radio" name="qualification" value="BE/Btech">BE/Btech</label>
								</div>
								

								<div class="form-group">
									<label>Experience(in Years)</label>
									<input class="form-control" type="text" name="experience"  required="">
								</div>

								<label class="control-label">Gender</label>
								<div class="radio">
									<label class="radio"><input type="radio" name="gender" value="male" required="">Male</label>
								</div>
								<div class="radio">
									<label class="radio"><input type="radio" name="gender" value="female">Female</label>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email"  required="">
								</div>
								<div class="form-group">
									<label>Contact Number</label>
									<input class="form-control" type="text" name="contact_number"  required="">
								</div>
								<div class="form-group">
									<label>Photo (Icard size)</label>
									<!-- <input type="hidden" name="size" value="1000000"> -->
									  	<div>
									  	  <input type="file" name="image" required="">
 									 	</div>
 									 
								</div>
								<div class="form-group">
									<input class=" btn btn-primary " type="submit" name="submit" value="Save">
								</div>
							</form>
							<?php
						}
					?>
                    <div class="col-md-9" id="left" >
                        <h3 >Information Table</h3>
                        <hr>
                        <table class="table table-responsive table-condensed">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Qualification</th>
                                    <th>Experience</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Image Name</th>
                                    <th>image</th>
                             
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM anti_ragging_dash";
									$result = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												<td>$row[fname]</td>
												<td>$row[department]</td>
												<td>$row[designation]</td>
												<td>$row[qualification]</td>
												<td>$row[experience]</td>
												<td>$row[gender]</td>
												<td>$row[email]</td>
												<td>$row[contact_number]</td>
												<td>$row[image]</td>
												<td><img src='../advance/committee/antiraggingmembers/".$row['image']."' style='height:80px;width:100px;'/></td>


												<td><a href='anti_ragging_dash.php?edit=$row[id]'><button class='btn btn-primary'>Edit</button></a></td>
												<td><a href='anti_ragging_dash.php?id=$row[id]'><button class='btn btn-danger'>Delete</button></a></td>
											</tr>

										";
									}

								?>
                            </tbody>

                        </table>
                        <hr>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>

<?php 
	if(isset($_POST['submit'])){
		$fname = mysqli_real_escape_string($conn,$_POST['fname']);
		$department = mysqli_real_escape_string($conn,$_POST['department']);
		$designation = mysqli_real_escape_string($conn,$_POST['designation']);
		$qualification = mysqli_real_escape_string($conn,$_POST['qualification']);
		$experience = mysqli_real_escape_string($conn,$_POST['experience']);
		$gender = mysqli_real_escape_string($conn,$_POST['gender']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$contact_number = mysqli_real_escape_string($conn,$_POST['contact_number']);

		//for image
		// Get image name
  	$image = $_FILES['image']['name'];
  	
  	// image file directory
  	$target = "../advance/committee/antiraggingmembers/".basename($image);

  	// Initialize message variable
  	$msg = "";
  	//upload the file to destination folder
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  

  	// $sql = "INSERT INTO anti_ragging_dash (image) VALUES ('$image')";
  	// execute query
  	// mysqli_query($db, $sql);
  	//image section over here
		
		if ($qualification=='BE/Btech') {
			$grade=1;
		}
		elseif ($qualification=='ME/Mtech') {
			$grade=2;
		}
		elseif ($qualification=='Ph.D') {
			$grade=3;
		}
		else{
			$grade=0;
		}



		$insert_query = "INSERT INTO anti_ragging_dash (fname,department,designation,qualification,grade,experience,gender,email,contact_number,image) VALUES ('$fname','$department', '$designation', '$qualification','$grade', '$experience', '$gender', '$email', '$contact_number','$image')";
		
		if(mysqli_query($conn, $insert_query)) { ?>
			<script>window.location = 'anti_ragging_dash.php'</script>
			
			<?php	
		}	
	}
    $insert_sql = "INSERT INTO anti_ragging_dash (fname,department,designation,qualification,grade,experience,gender,email,contact_number) VALUES()";

	if( isset($_GET['id'])) {
		$del_sql = "DELETE FROM anti_ragging_dash WHERE id = $_GET[id]";
		if(mysqli_query($conn, $del_sql)){ ?>
			<script>window.location='anti_ragging_dash.php'</script>
			
			<?php
		}
	}
	////update section started here

	if( isset($_GET['updateid'])) {
		$fname = mysqli_real_escape_string($conn,$_GET['fname']);
		$department = mysqli_real_escape_string($conn,$_GET['department']);
		$designation = mysqli_real_escape_string($conn,$_GET['designation']);
		$qualification = mysqli_real_escape_string($conn,$_GET['qualification']);
		$experience = mysqli_real_escape_string($conn,$_GET['experience']);
		$gender = mysqli_real_escape_string($conn,$_GET['gender']);
		$email = mysqli_real_escape_string($conn,$_GET['email']);
		$contact_number = mysqli_real_escape_string($conn,$_GET['contact_number']);
		//for image
	
  	//for grade
		if ($qualification=='BE/Btech') {
			$grade=1;
		}
		elseif ($qualification=='ME/Mtech') {
			$grade=2;
		}
		elseif ($qualification=='Ph.D') {
			$grade=3;
		}
		else{
			$grade=0;
		}






		$update_sql = "UPDATE anti_ragging_dash SET fname ='$fname',department ='$department', designation='$designation',qualification='$qualification',grade='$grade', experience='$experience', gender='$gender', email='$email', contact_number ='$contact_number' WHERE id='$_GET[updateid]'";
		if(mysqli_query($conn,$update_sql)) { ?>
				<script> window.location = 'anti_ragging_dash.php' </script>
			<?php
		}
		
	}
?>