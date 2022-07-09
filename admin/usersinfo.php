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
        <title>User's Information </title>
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
			#pro_image{
				 height: 100px; width: 200px; 
			}
			td{
				text-align: center;
				margin-top: 5px;
			}
				#mystyle{
				text-align: center;
				width: 150px;
				/*font-size: 25px;*/


			}
				
			h4{
				font-size: 30px;
				text-align: center;
				text-decoration: underline;
			}
			h3{
				text-align: center;
			}
			/*for blinking text*/

		.blink_me {
  animation: blinker 0.9s linear infinite;
  text-decoration: none; 
}

@keyframes blinker {  
  50% { opacity: 0; 
  }

		</style>
    </head>
    <body>
    	<?php
    	include ('head.php');
    	?>
    	
    	
        <div class="jumbotron">
        	<h2 style="text-align: center;margin-top: 3%;">-: User's Information :-</h2><br>
            <div class="container-fluid">
          
           <h4 class="blink_me" style="color: red;">Click on User's Id to see orders placed by that user.</h4>
							 <br>
                <div class="row">
                   

                    <div class="col-md-9" id="left"  >
                        <h3 > Information Table</h3>
                        <hr>
                        <table class="table table-responsive table-condensed">
                            <thead>
                                <tr>
                                	<th id="mystyle">User Id</th>
                                    <th id="mystyle">Name of User</th>
                                    <th id="mystyle">Last Name</th>
                                    <th id="mystyle">Email</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM `user_info`";
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												<td id='mystyle' style='font-size:20px;'><a href='orderofuser.php?p=$row[user_id]'>$row[user_id]</td></a>
												<td id='mystyle'>$row[first_name]</td>
												<td id='mystyle'>$row[last_name]</td>
												<td id='mystyle'>$row[email]</td>
												
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
