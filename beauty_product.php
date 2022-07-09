<?php 
	require 'db.php';
	// require 'core.php';

// if ( loggedin())
// 	 {
		


// 	 } 
// 	 else
// 	 {
// 	 	include 'login.php';
// 	 	die();
// 	 }
	
//   function loggedin()
// 	 {
// 	 	 if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id']))
// 	 	 {
// 	 	 	return true;
// 	 	 }

// 	 }
// 	$eid = 0;
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> Add product </title>
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
        	<h2 style="text-align: center;margin-top: 3%;">-: Firstyear Staff Dashboard :-</h2><br>
            <div class="container-fluid">
          
                <div class="row">
                   <?php 
						if(isset($_GET['edit'])) { 
							$select_sql = "SELECT * FROM products WHERE  product_id=$_GET[edit]";
							$select = mysqli_query($con, $select_sql);
							while($row = mysqli_fetch_assoc($select)) {
								$product_cat = $row['product_cat'];
							 	$product_brand = $row['product_brand'];
							 	$product_title = $row['product_title'];
								$product_price = $row['product_price'];
								$product_desc = $row['product_desc'];
								$product_image = $row['product_image'];
								$product_keywords= $row['product_keywords'];
								
								$eid = $row['product_id'];
							}


							
							echo "
								<form class='col-md-3' method='GET' style='border-right:  1px solid black;'>
								<h3>Edit Data</h3>

								<div class='form-group'>
									<label> Product Category</label>
									<input class='form-control' type='text' name='product_cat' value =$product_cat>
								</div>
								<div class='form-group'>
									<label> Product Brand</label>
									<input class='form-control' type='text' name='product_brand' value =$product_brand>
								</div>
								<div class='form-group'>
									<label> Product Title</label>
									<input class='form-control' type='text' name='product_title' value =$product_title>
								</div>
								<div class='form-group'>
									<label>Product Price</label>
									<input class='form-control' type='text' name='product_price' value =$product_price>
								</div>
								<div class='form-group'>
									<label>Product Description</label>
									<input class='form-control' type='text' name='product_desc' value =$product_desc>
								</div>


								<div class='form-group'>
									<label>Product Image</label>
									<input class='form-control' type='text' name='product_image' value=$product_image>
								</div>";
								
									echo "
										<div class='form-group'>
										<label>Product Keywords</label>
										<input class='form-control' type='text' name='product_keywords' value=$product_keywords>
									</div>
									
									


									<div class=form-group>
										<input type ='hidden' name='updateid' value ='$eid'>
										<input class='btn btn-primary' type ='submit' value='Update' name = 'update' >
										<a href='firstyear_staff_dash.php'><button class='btn btn-primary'>Cancel</button></a>
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
									<label>Product Category<br>  </label>
									<input class="form-control" type="text" name="product_cat" required="">
								</div>
								<div class="form-group">
									<label>Product Brand</label>
									<input class="form-control" type="text" name="product_brand"  required="">
								</div>
								<div class="form-group">
									<label>Product Title</label>
									<input class="form-control" type="text" name="product_title"  required="">
								</div>


								<div class="form-group">
									<label>Product Price</label>
									<input class="form-control" type="text" name="product_price"  required="">
								</div>
								<!-- <label class="control-label">Qualification</label>
								<div class="radio">
									<div><label class="radio"><input type="radio" name="qualification" value="Ph.D" required="">Ph.D</label></div>
									<div><label class="radio"><input type="radio" name="qualification" value="ME/Mtech">ME/Mtech</label></div>
									<label class="radio"><input type="radio" name="qualification" value="BE/Btech">BE/Btech</label>
								</div> -->
								

								<div class="form-group">
									<label>Product Description</label>
									<input class="form-control" type="text" name="product_desc"  required="">
								</div>

								<div class="form-group">
									<label>Product Image</label>
									<input class="form-control" type="text" name="product_image"  required="">
								</div>

								<div class="form-group">
								<label>Product Keywords</label>
									<input class="form-control" type="text" name="product_keywords"  required="">
								</div>
								<!-- <label class="control-label">Gender</label>
								<div class="radio">
									<label class="radio"><input type="radio" name="gender" value="male" required="">Male</label>
								</div>
								<div class="radio">
									<label class="radio"><input type="radio" name="gender" value="female">Female</label>
								</div> -->
								<!-- <div class="form-group">
									<label>Email</label>
									<input class="form-control" type="email" name="email"  required="">
								</div>
								<div class="form-group">
									<label>Contact Number</label>
									<input class="form-control" type="text" name="contact_number"  required="">
								</div> -->
								
								<div class="form-group">
									<input class=" btn btn-primary " type="submit" name="submit" value="Save">
								</div>
							</form>
							<?php
						}
					?>
                    <div class="col-md-9" id="left" style="border-left:  1px solid black">
                        <h3 >Information Table</h3>
                        <hr>
                        <table class="table table-responsive table-condensed">
                            <thead>
                                <tr>
                                     <th id="mystyle">Category</th>
                                    <th id="mystyle">Brand</th>
                                    <th id="mystyle">Title</th>
                                    <th id="mystyle">Price</th>
                                    <th id="mystyle">Description</th>
                                    <th id="mystyle">Image Name</th>
                                    <th id="mystyle">Image  </th>
                                    <th id="mystyle">Keyword</th>
                                    <!-- <th id="mystyle">Contact</th> -->
                                   
                                   
                             
                                    <th id="mystyle">Edit</th>
                                    <th id="mystyle">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM `products` WHERE product_cat='Beauty Product'";
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												
												<td id='mystyle'>$row[product_cat]</td>
												<td id='mystyle'>$row[product_brand]</td>
												<td id='mystyle'>$row[product_title]</td>
												<td id='mystyle'>$row[product_price]</td>
												<td id='mystyle'>$row[product_desc]</td>
												<td id='mystyle'>$row[product_image]</td>
											 
												 
												<td id='pro_image'><img src='product_images/".$row['product_image']."' height='100' width='100'/>
												</td>

												<td id='mystyle'>$row[product_keywords]</td>
												
												
												<td id='mystyle'>
													<a href='demoinsert.php?edit=$row[product_id]'>
														<button class='btn btn-primary'>Edit</button>
													</a>
												</td>
												<td id='mystyle'>
													<a href='demoinsert.php?product_id=$row[product_id]'>
														<button class='btn btn-danger'>Delete</button>
													</a>
												</td>
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
		$product_cat = mysqli_real_escape_string($con,$_POST['product_cat']);
		$product_brand = mysqli_real_escape_string($con,$_POST['product_brand']);
		$product_title = mysqli_real_escape_string($con,$_POST['product_title']);
		$product_price = mysqli_real_escape_string($con,$_POST['product_price']);
		$product_desc = mysqli_real_escape_string($con,$_POST['product_desc']);
		$product_image = mysqli_real_escape_string($con,$_POST['product_image']);
		$product_keywords = mysqli_real_escape_string($con,$_POST['product_keywords']);
		





		$insert_query = "INSERT INTO `products`(`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES ('$product_cat','$product_brand', '$product_title', '$product_price','$product_desc', '$product_image', '$product_keywords')";
		
		if(mysqli_query($con, $insert_query)) { ?>
			<script>window.location ='demoinsert.php'</script>
			
			<?php	
		}	
	}
    $insert_sql = "INSERT INTO products (product_cat,product_brand,product_price,product_desc,product_image,product_keywords) VALUES()";

	if( isset($_GET['product_id'])) {
		$del_sql = "DELETE FROM `products` WHERE product_id = $_GET[product_id]";
		if(mysqli_query($con, $del_sql)){ ?>
			<script>window.location='demoinsert.php'</script>
			
			<?php
		}
	}
	////update section started here

	if( isset($_GET['updateid'])) {
		$product_cat = mysqli_real_escape_string($con,$_GET['product_cat']);
		$product_brand = mysqli_real_escape_string($con,$_GET['product_brand']);
		$product_title = mysqli_real_escape_string($con,$_GET['product_title']);
		$product_price = mysqli_real_escape_string($con,$_GET['product_price']);
		$product_desc = mysqli_real_escape_string($con,$_GET['product_desc']);
		$product_image = mysqli_real_escape_string($con,$_GET['product_image']);
		$product_keywords = mysqli_real_escape_string($con,$_GET['product_keywords']);
		





		$update_sql = "UPDATE products SET product_cat ='$product_cat',product_brand ='$product_brand',product_title ='$product_title', product_price='$product_price',product_desc='$product_desc',product_image='$product_image', product_keywords='$product_keywords' WHERE product_id='$_GET[updateid]'";
		if(mysqli_query($con,$update_sql)) { ?>
				<script> window.location ='demoinsert.php' </script>
			<?php
		}
		
	}
?>