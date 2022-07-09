
<?php 
	include('DBConnect.php');
	?>

<!DOCTYPE html>
<html>
 <head>
        <title>Sign up</title>
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
		  <form class="col-md-3" action="signup.php" method="POST" style="border: 1px solid black;">
								<h3 align="center" >Sign Up</h3><hr>
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" type="text" name="Username" required="">
									
								</div>

								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="Password" id="password" name="Password" required=""  onkeyup='check();' />
								</div>

								<div class="form-group">
									<label>Confirm Password</label>
									<input class="form-control" type="Password" id="confirm_password" name="Confirm_Password"  required=""  onkeyup='check();' /><span id='message'></span>
								</div>
								<hr>
									<a href="login.php" style="margin-left: 70%">Go to Login</a>
								<div class="form-group" align="center">
									<input class=" btn btn-primary " type="submit" name="register" value="Register">
								</div>

							</form>
	</div>
		
</body>
</html>
<script type="text/javascript">
	
	var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>


<?php 
	if(isset($_POST['register'])){
		$Username = mysqli_real_escape_string($conn,$_POST['Username']);
		$Password = mysqli_real_escape_string($conn,$_POST['Password']);

		$Confirm_Password = mysqli_real_escape_string($conn,$_POST['Confirm_Password']);
		

		if ($Password==$Confirm_Password) {
			$insert_query = "INSERT INTO admin (Username,Password) VALUES ('$Username','$Password')";
			if(mysqli_query($conn, $insert_query)) { 


				?>
				<script >window.alert("Successfully Registered ..we are redirecting you to Login Page...");</script>
			<script>window.location='login.php'</script>
			
			<?php	
		  }
		}
		else
		{
			?>

			<script >window.alert("Password Not matching");</script>
			<?php
			

		}
		
		
			
	}
   

?>