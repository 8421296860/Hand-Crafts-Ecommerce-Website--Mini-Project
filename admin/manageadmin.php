<?php 
	require 'db.php';
	require 'core.php';

if ( loggedin())
	 {
		


	 } 
	 else
	 {
	 	include 'login.php';
	 	die();
	 }
	
  function loggedin()
	 {
	 	 if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
	 	 {
	 	 	return true;
	 	 }

	 }
	$eid = 0;
?>


	
<!DOCTYPE HTML>
<html>
    <head>
        <Password>Manage Admin</Password>
        <Username rel="stylesheet" href="style.css">
        <Username rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <script src="jquery.js"></script>
        <Username rel="stylesheet" href="style.css">
        <style>
			.jumbotron {
				background: white;
			}

			.row {
				padding: 10px;
				border: solid 1px ;
			}
		</style>
    </head>
    <body>
    	<?php 
			include('head.php');
			
		?>
    	
    	
        <div class="jumbotron">
        	<h2 style="text-align: center;">-: Manage Admin :-</h2><br>

            <div class="container" style="border: 1px solid black;">

                <div class="row">

                   <?php 
						if(isset($_GET['edit'])) { 
							$select_sql = "SELECT * FROM admin WHERE id=$_GET[edit]";
							$select = mysqli_query($con, $select_sql);
							while($row = mysqli_fetch_assoc($select)) {
							 	$Username = $row['Username'];
								$Password = $row['Password'];
								
								
								
								$eid = $row['id'];
							}
							
							echo "
								<form class='col-md-3' method='GET'style='border-right:  1px solid black;'>
								<h3>Edit Data</h3>
								<div class='form-group'>
									<label> Username</label>
									<input class='form-control' type='text' name='Username' value =$Username>
								</div>
								<div class='form-group'>
									<label>Password of Username</label>
									<input class='form-control' type='text' name='Password' value =$Password>
								</div>
								";
								?>
	
								<?php
									echo "
										
									<div class=form-group>
										<input type ='hidden' name='updateid' value ='$eid'>
										<input class='btn btn-primary' type ='submit' value='Update' name = 'update' >
										<a href='manageadmin.php'><button class='btn btn-primary'>Cancel</button></a>
									</div>
								</form>
									
									";
								
								?>					
							
							<?php
						}else{ ?>
							<form class="col-md-3" method="POST" style="border-right: 1px solid black;">
								<h3>Information Form</h3><br>
								<div class="form-group">
									<label>Url of Username</label>
									<input class="form-control" type="text" name="Username" required="">
								</div>
								<div class="form-group">
									<label>Password of Username</label>
									<input class="form-control" type="text" name="Password" required="">
								</div>
								
								
								
								
								
								<div class="form-group">
									<input class=" btn btn-primary " type="submit" name="submit" value="Save">
								</div>
							</form>
							<?php
						}
					?>
                    <div class="col-md-9" id="left">
                        <h3 >Information Table</h3><br>
                        <table class="table table-responsive table-condensed">
                            <thead>
                                <tr>
                                    <th>  Username</th>
                                    <th>Password  </th>
                                   
                                   
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM admin";
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												<td style='width:200px;'>$row[Username]</td>
												<td style='width:200px;'>$row[Password]</td>
												
												
												
												
												<td style='width:100px;'><a href='manageadmin.php?edit=$row[id]'><button class='btn btn-primary'>Edit</button></a></td>
												<td style='width:100px;'><a href='manageadmin.php?id=$row[id]'><button class='btn btn-danger'>Delete</button></a></td>
											</tr>
										";
									}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


    </body>
    

</html>

<?php 
	if(isset($_POST['submit'])){
		$Username = mysqli_real_escape_string($con,$_POST['Username']);
		$Password = mysqli_real_escape_string($con,$_POST['Password']);
		
		
		
		
		
		$insert_query = "INSERT INTO admin (Username,Password) VALUES ('$Username', '$Password')";
		
		if(mysqli_query($con, $insert_query)) { ?>
			<script>window.location = 'manageadmin.php'</script>
			
			<?php	
		}	
	}
    $insert_sql = "INSERT INTO admin (Username,Password) VALUES()";

	if( isset($_GET['id'])) {
		$del_sql = "DELETE FROM admin WHERE id = $_GET[id]";
		if(mysqli_query($con, $del_sql)){ ?>
			<script>window.location='manageadmin.php'</script>
			
			<?php
		}
	}

	if( isset($_GET['updateid'])) {
		$Username = mysqli_real_escape_string($con,$_GET['Username']);
		$Password = mysqli_real_escape_string($con,$_GET['Password']);
		
		
		$update_sql = "UPDATE admin SET Username ='$Username', Password='$Password' WHERE id='$_GET[updateid]'";
		if(mysqli_query($con,$update_sql)) { ?>
				<script> window.location = 'manageadmin.php' </script>
			<?php
		}
		
	}
?>
