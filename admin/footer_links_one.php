
<!---created by: Alger Makiputin -->
<?php 
	include('DBConnect.php');
	$eid = 0;
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Footer Link Dashboard</title>
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
				border: solid 1px;
			}
		</style>
    </head>
    <body>
    	<?php 
			include('head.php');
			
		?>
    	

    	

        <div class="jumbotron">
        	<h3 style="text-align: center;">-: 1st Section of Footer links  :-</h3>
        	<br><br>
            <div class="container" style="border: 1px solid black;">
            	<h6 style="color: red;">Add maximum 4 Links</h6>
                <div class="row">
                   <?php 
						if(isset($_GET['edit'])) { 
							$select_sql = "SELECT * FROM footer_links_one WHERE id=$_GET[edit]";
							$select = mysqli_query($conn, $select_sql);
							while($row = mysqli_fetch_assoc($select)) {
							 	$link = $row['link'];
								$title = $row['title'];
								
								
								
								$eid = $row['id'];
							}
							
							echo "
								<form class='col-md-3' method='GET' style='border-right:  1px solid black;'>
								<h3>Edit Data</h3>
								<div class='form-group'>
									<label>Url of Link</label>
									<input class='form-control' type='text' name='link' value =$link>
								</div>
								<div class='form-group'>
									<label>Title of Link</label>
									<input class='form-control' type='text' name='title' value =$title>
								</div>
								";
								?>
	
								<?php
									echo "
										
									<div class=form-group>
										<input type ='hidden' name='updateid' value ='$eid'>
										<input class='btn btn-primary' type ='submit' value='Update' name = 'update' >
										<a href='footer_links_one'><button class='btn btn-primary'>Cancel</button></a>
									</div>
								</form>
									
									";
								
								?>					
							
							<?php
						}else{ ?>
							<form class="col-md-3" method="POST" style="border-right: 1px solid black;">
								<h3>Information Form</h3><br>
								<div class="form-group">
									<label>Url of Link</label>
									<input class="form-control" type="text" name="link" required="">
								</div>
								<div class="form-group">
									<label>Title of Link</label>
									<input class="form-control" type="text" name="title" required="">
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
                                    <th>Url Of Link</th>
                                    <th>Title of Link</th>
                                   
                                   
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM footer_links_one";
									$result = mysqli_query($conn, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												<td>$row[link]</td>
												<td>$row[title]</td>
												
												
												
												
												<td><a href='footer_links_one.php?edit=$row[id]'><button class='btn btn-primary'>Edit</button></a></td>
												<td><a href='footer_links_one.php?id=$row[id]'><button class='btn btn-danger'>Delete</button></a></td>
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
		$link = mysqli_real_escape_string($conn,$_POST['link']);
		$title = mysqli_real_escape_string($conn,$_POST['title']);
		
		
		
		
		
		$insert_query = "INSERT INTO footer_links_one (link,title) VALUES ('$link', '$title')";
		
		if(mysqli_query($conn, $insert_query)) { ?>
			<script>window.location = 'footer_links_one.php'</script>
			
			<?php	
		}	
	}
    $insert_sql = "INSERT INTO footer_links_one (link,title) VALUES()";

	if( isset($_GET['id'])) {
		$del_sql = "DELETE FROM footer_links_one WHERE id = $_GET[id]";
		if(mysqli_query($conn, $del_sql)){ ?>
			<script>window.location='footer_links_one.php'</script>
			
			<?php
		}
	}

	if( isset($_GET['updateid'])) {
		$link = mysqli_real_escape_string($conn,$_GET['link']);
		$title = mysqli_real_escape_string($conn,$_GET['title']);
		
		
		$update_sql = "UPDATE footer_links_one SET link ='$link', title='$title' WHERE id='$_GET[updateid]'";
		if(mysqli_query($conn,$update_sql)) { ?>
				<script> window.location = 'footer_links_one.php' </script>
			<?php
		}
		
	}
?>