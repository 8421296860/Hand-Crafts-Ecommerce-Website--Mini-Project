
<?php
require 'core.php';
require 'DBConnect.php';

if(isset($_POST['submit']))
	{
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];

		$hash_Password = md5($Password);

	   if (!empty($Username)&&!empty($Password)) 
			{
		

			   if ($result = mysqli_query($conn, "SELECT id,Username FROM admin WHERE Username = '$Username' AND Password = '$Password' ")) 
				{

				    /* determine number of rows result set */
				    $row_cnt = mysqli_num_rows($result);

					
					 if ($row_cnt==0) 
							 {
							 	echo "Invalid Username or Password";
							 }
					elseif ($row_cnt==1) 
							{
						
								// echo "Success";
								$row=mysqli_fetch_row($result);
								
								 $_SESSION['user_id'] = $row[0];
								  $_SESSION['user_name'] = $row[1];
								 header('Location:index.php');
							}
							

				}
				
			}

	}


?>





<!DOCTYPE html>
<html>
 <head>
        <title>Login </title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <script src="jquery.js"></script>
        <link rel="stylesheet" href="style.css">
        <style>
			.jumbotron {
				background: white;
			}

			.row {
				padding: 10px;
				border: solid 1px #04DD16;
			}
			form{
				margin: 15%;
			}
		</style>
    </head>
<body align="center">
	<div class="col-md-3"	>
	</div>
	<div>
		  <form class="col-md-3" action="<?php echo($current_file); ?>" method="POST" style="border: 1px solid black;">
								<h3 align="center" >Login Page</h3><hr>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" name="Username" required="">
									
								</div>

								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="Password" name="Password" required="">
								</div>
								
								<hr>
								<a href="signup.php">Sign up</a>
								
								
								
								<div class="form-group" align="center">
									<input class=" btn btn-primary " type="submit" name="submit" value="Login">
								</div>
							</form>
	</div>
		
</body>
</html>


