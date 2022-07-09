<?php 
	require 'DBConnect.php';
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
        <title> Add/Delete Users </title>
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
			#mid{
				text-align: center;
				vertical-align: middle;
				margin-top: 5px;
			}
			#mystyle{
				text-align: center;
				width: 150px;
				
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
        	<h2 style="text-align: center;margin-top: 3%;">-: Add/Delete Users :-</h2><br>
            <div class="container-fluid">
          
                <div class="row">
                    <?php 
						if(isset($_GET['edit'])) { 
							$select_sql = "SELECT * FROM users WHERE id=$_GET[edit]";
							$select = mysqli_query($conn, $select_sql);
							while($row = mysqli_fetch_assoc($select)) {
							 	$Username = $row['Username'];
								$Password = $row['Password'];
								
								$eid = $row['id'];
							}
							
							echo "
								<form class='col-md-3' method='GET'  style='border-right: 1px solid black;'>
								<h3>Edit Data</h3>
								<div class='form-group'>
									<label>Username</label>
									<input class='form-control' type='text' name='Username' value =$Username>
								</div>

								<div class='form-group'>
									<label>Password</label>
									<input class='form-control' type='text' name='Password' value =$Password>
								</div>
								
								
								
								";
								?>
	
								<?php
									echo "
										
									<div class=form-group>
										<input type ='hidden' name='updateid' value ='$eid'>
										<input class='btn btn-primary' type ='submit' value='Update' name = 'update' >
										<a href='manipulateuser.php'><button class='btn btn-primary'>Cancel</button></a>
									</div>
								</form>
									
									";
								
								?>					
							
							<?php
						}else{ ?>
							<form class="col-md-3" method="POST" style="border-right: 1px solid black;">
								<h3>Information Form</h3>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" name="Username" required="">
								</div>

								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="Password" name="Password" required="">
								</div>
								

								
								
								<div class="form-group">
									<input class=" btn btn-primary " type="submit" name="submit" value="Save">
								</div>
							</form>
							<?php
						}
					?>
                    <div class="col-md-9" id="left">
                        <h3 >Information Table</h3>
                        <table class="table table-responsive table-condensed">
                            <thead>
                                <tr>
                                    <th id="mystyle">Username </th>
                                    <th id="mystyle">Password</th>
                                 
                                    <th id="mystyle">Edit</th>
                                    <th id="mystyle">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM users";
									$result = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												<td id='mystyle'>$row[Username]</td>
												<td id='mystyle'>$row[Password]</td>
												
												
												<td id='mystyle'><a href='manipulateuser.php?edit=$row[id]'><button class='btn btn-primary'>Edit</button></a></td>
												<td id='mystyle'><a href='manipulateuser.php?id=$row[id]'><button class='btn btn-danger'>Delete</button></a></td>
											</tr>
										";
									}
								?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 
	if(isset($_POST['submit'])){
		$Username = mysqli_real_escape_string($conn,$_POST['Username']);
		$Password = mysqli_real_escape_string($conn,$_POST['Password']);
		
			$insert_query = "INSERT INTO users (Username,Password) VALUES ('$Username', '$Password')";
		
		if(mysqli_query($conn, $insert_query)) { ?>
			<script>window.location = 'manipulateuser.php'</script>
			
			<?php	
		}	
	}
    $insert_sql = "INSERT INTO users (Username,Password) VALUES()";

	if( isset($_GET['id'])) {
		$del_sql = "DELETE FROM users WHERE id = $_GET[id]";
		if(mysqli_query($conn, $del_sql)){ ?>
			<script>window.location='manipulateuser.php'</script>
			
			<?php
		}
	}

	if( isset($_GET['updateid'])) {

		$Username = mysqli_real_escape_string($conn,$_GET['Username']);
		$Password = mysqli_real_escape_string($conn,$_GET['Password']);
		
		$update_sql = "UPDATE users SET Username ='$Username', Password='$Password' WHERE id='$_GET[updateid]'";
		if(mysqli_query($conn,$update_sql)) { ?>
				<script> window.location = 'manipulateuser.php' </script>
			<?php
		}
		
	}
?>