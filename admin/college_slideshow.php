
<!---created by: Alger Makiputin -->
<?php 
	include('DBConnect.php');
	$eid = 0;
?>

<?php

// Create database connection
  $db = mysqli_connect("localhost", "root", "", "college");



?>

<!DOCTYPE HTML>
<html>
    <head>
    	
        <title>college_slideshow Dash</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
        <script src="jquery.js"></script>
        <link rel="stylesheet" href="style.css">
        <style>
			.jumbotron {
				background: white;
			}
			.container-fluid{
				margin-left: 3%;
			}
			.row{
				border: 1px solid black;

			}
			#mid{
				
				vertical-align:middle;
				width: 200px;
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
			include('head.php');
			
		?>
        <div class="jumbotron">
            <div class="container-fluid">
            <h4>college_slideshow</h4>	<br>
                <div class="row">
                   <?php 
						if(isset($_GET['edit'])) { 
							$select_sql = "SELECT * FROM college_slideshow WHERE id=$_GET[edit]";
							$select = mysqli_query($db, $select_sql);
							while($row = mysqli_fetch_assoc($select)) {
							 
								$image= $row['image'];
								$eid = $row['id'];
							}
							
							echo "
								<form class='col-md-3' method='GET'>
								
								</div>";
								?>
							
								<?php
									echo "
										

									<div class='form-group'>
										<label>Image  Name</label>
										<input class='form-control' type='text' name='image' value=$image>
										  <input type='file' name='image'>
									</div>


									</div>
								</form>
									
									";
								
								?>					
							
							<?php
						}else{ ?>
							<form class="col-md-3" method="POST" enctype="multipart/form-data"><br>
								<h3>Form</h3>
								<hr>
								
								<div class="form-group">
									<br>
									<br>
									<br>
									<label>Photo <span style="color: red;">(Below 1.5 mb)</span></label>
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
                    <div class="col-md-8" id="left"  style="border-left:  1px solid black;"><br>
                        <h3 >Information Table</h3>
                        <hr>
                        <table class="table table-responsive table-condensed" >
                            <thead 	>
                                <tr>
                                    <th  style="text-align: center;">Image Name</th>
                                    <th  style="text-align: center;">image</th>
                             
                                    <th  style="text-align: center;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM college_slideshow";
									$result = mysqli_query($db, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												<td id='mid'>$row[image]</td>
												<td ><img src='../../advance/general/jssor/banner-rotator/".$row['image']."' style='height:100px;width:130px;'/></td>


												
												<td id='mid'><a href='college_slideshow.php?id=$row[id]'><button class='btn btn-danger'>Delete</button></a></td>
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
		
		// Get image name
  	$image = $_FILES['image']['name'];
  	
  	// image file directory
  	$target = "../../advance/general/jssor/banner-rotator/".basename($image);

  	// Initialize message variable
  	$msg = "";
  	//upload the file to destination folder
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  



		$insert_query = "INSERT INTO college_slideshow (image) VALUES ('$image')";
		
		if(mysqli_query($db, $insert_query)) { ?>
			<script>window.location = 'college_slideshow.php'</script>
			
			<?php	
		}	
	}
   

	if( isset($_GET['id'])) {
		$del_sql = "DELETE FROM college_slideshow WHERE id = $_GET[id]";
		if(mysqli_query($db, $del_sql)){ ?>
			<script>window.location='college_slideshow.php'</script>
			
			<?php
		}
	}
	

		

?>