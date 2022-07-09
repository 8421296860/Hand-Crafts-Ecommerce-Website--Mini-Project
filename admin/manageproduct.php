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
        	<h2 style="text-align: center;margin-top: 3%;">-: Manage Product :-</h2><br>
            <div class="container-fluid">
          
                <div class="row">
                   <?php 
						if(isset($_GET['edit'])) { 
							$select_sql = "SELECT * FROM products WHERE product_id=$_GET[edit]";
							$select = mysqli_query($con, $select_sql);
							while($row = mysqli_fetch_assoc($select)) {
								// $product_cat = $row['product_cat'];
							 	$product_cat = $row['product_cat'];
							 	$product_title = $row['product_title'];
								$product_price = $row['product_price'];
								$product_discount = $row['product_discount'];
								$product_description = $row['product_description'];
								$product_image_name = $row['product_image_name'];
								$product_keywords= $row['product_keywords'];
								
								$eid = $row['product_id'];
								if ($product_cat==1) {
								$product_cat_name="Paper Carft";
							}else if ($product_cat==0) {
								$product_cat_name="Select category";
							}else if ($product_cat==2) {
								$product_cat_name="Metal Carft";
							}else if ($product_cat==3) {
								$product_cat_name="Beauty Product";
							}else if ($product_cat==4) {
								$product_cat_name="Decorative Product";
							}
							}


							


							echo "
								<form class='col-md-3' method='GET' style='border-right:  1px solid black;'>
								<h3>Edit Data</h3>

								
								<div class='form-group'>
									<label> Product Category</label>
									

									<select class='form-control' style='height:100%;' name='product_cat' value=$product_cat>

										<option hidden>$product_cat_name</option>  
										<option value=1    >Paper Carft</option>
										<option value=2    >Metal Carft</option>
										<option value=3 >Beauty Product</option>
										<option value=4>Decorative Product</option>
									</select> 

								</div>
								<div class='form-group'>
									<label> Product Title</label>
									<input class='form-control' type='text' name='product_title' value =$product_title>
								</div>
								<div class='form-group'>
									<label>Product Price</label>
									<input class='form-control' type='Number' min='50' name='product_price' value =$product_price>
								</div>
								<div class='form-group'>
									<label>Product Discount</label>
									<input class='form-control' type='Number' min='0' name='product_discount' value =$product_discount>
								</div>
								<div class='form-group'>
									<label>Product Description</label>
									<input class='form-control' type='text' name='product_description' value =$product_description>
								</div>


								<div class='form-group'>
									<label>Product Image Name</label>
									<input class='form-control' type='text' name='product_image_name' value=$product_image_name disabled>
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
								<!-- <div class="form-group">
									<label>Product Category<br>  </label>
									<input class="form-control" type="text" name="product_cat" required="">
								</div> -->
								<div class="form-group">
									<label>Product Category</label>
									<select class="form-control" style="height:100%;" name="product_cat">

										<option hidden>Select Category</option>  
										<option value=1   >Paper Carft</option>
										<option value=2  >Metal Carft</option>
										<option value=3>Beauty Product</option>
										<option value=4>Decorative Product</option>
									</select>
								</div>
								<div class="form-group">
									<label>Product Title</label>
									<input class="form-control" type="text" name="product_title"  required="">
								</div>


								<div class="form-group">
									<label>Product Price</label>
									<input class="form-control" type="Number" name="product_price" min="50"  required="Number">
								</div>

								<div class="form-group">
									<label>Product Discount</label>
									<input class="form-control" type="Number" name="product_discount" min="0" max="50" required="Number">
								</div>
								<!-- <label class="control-label">Qualification</label>
								<div class="radio">
									<div><label class="radio"><input type="radio" name="qualification" value="Ph.D" required="">Ph.D</label></div>
									<div><label class="radio"><input type="radio" name="qualification" value="ME/Mtech">ME/Mtech</label></div>
									<label class="radio"><input type="radio" name="qualification" value="BE/Btech">BE/Btech</label>
								</div> -->
								(In desciption,<span style="color: red;"> Next line = &lt;br&gt;</span>)<br><br>

								<div class="form-group">
									<label>Product Description</label>
									<input class="form-control" type="text" name="product_description"  required="">
								</div>

								<div class="form-group">
									<label >Product Image Name</label>
									<input class="form-control" type="text" name="product_image_name"  required="" disabled>
								</div>

								<br>
								<span style="color: red;">(Image size limit is 1.5 MB)</span><br><br>

								<div class="form-group">
									
									<label>Choose Main Image <!-- <span style="color: red;">(Below 1.5 MB)</span> --></label>
									<!-- <input type="hidden" name="size" value="1000000"> -->
									  	<div>
									  	  <input type="file" name="product_image" required="">
 									 	</div>
 									 
								</div>
								<br>
								
								<div class="form-group">
									
									<label>Sub Image One&nbsp;&nbsp;</label>
									<!-- <input type="hidden" name="size" value="1000000"> -->
									  	<div>
									  	  <input type="file" name="sub_img_one" required="">
 									 	</div>
 									 
								</div>

								<div class="form-group">
									
									<label>Sub Image Tow&nbsp;&nbsp;</label>
									<!-- <input type="hidden" name="size" value="1000000"> -->
									  	<div>
									  	  <input type="file" name="sub_img_two" required="">
 									 	</div>
 									 
								</div>

								<div class="form-group">
									
									<label>Sub Image Three&nbsp;&nbsp;</label>
									<!-- <input type="hidden" name="size" value="1000000"> -->
									  	<div>
									  	  <input type="file" name="sub_img_three" required="">
 									 	</div>
 									 
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
                                	<th id="mystyle">Product Id</th>
                                    <th id="mystyle">Category Id</th>
                                    <th id="mystyle">Title</th>
                                    <th id="mystyle">Price</th>
                                    <th id="mystyle">Discount</th>
                                    <th id="mystyle">Price with Discount</th>
                                    <th id="mystyle">Description</th>
                                    <th id="mystyle">Main Image Name</th>
                                    <th id="mystyle">Image  </th>
                                    <th id="mystyle">Keyword</th>
                                    <!-- <th id="mystyle">Contact</th> -->
                                   
                                   
                             
                                    <th id="mystyle">Edit</th>
                                    <th id="mystyle">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM `products`";
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												<td id='mystyle'>$row[product_id]</td>
												<td id='mystyle'>$row[product_cat]</td>
												<td id='mystyle'>$row[product_title]</td>
												<td id='mystyle'>$row[product_price]</td>
												<td id='mystyle'>$row[product_discount]</td>
												<td id='mystyle'>$row[product_price_after_discount]</td>
												<td id='mystyle'>$row[product_description]</td>
												<td id='mystyle'>$row[product_image_name]</td>
											 
												 
												<td id='pro_image'><img src='../product_images/".$row['product_image_name']."' height='100' width='100'/>
												</td>

												<td id='mystyle'>$row[product_keywords]</td>
												
												
												<td id='mystyle'>
													<a href='manageproduct.php?edit=$row[product_id]'>
														<button class='btn btn-primary'>Edit</button>
													</a>
												</td>
												<td id='mystyle'>
													<a href='manageproduct.php?product_id=$row[product_id]'>
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
		// $product_cat = mysqli_real_escape_string($con,$_POST['product_cat']);
		$product_cat = mysqli_real_escape_string($con,$_POST['product_cat']);
		$product_title = mysqli_real_escape_string($con,$_POST['product_title']);
		$product_price = mysqli_real_escape_string($con,$_POST['product_price']);
		$product_discount = mysqli_real_escape_string($con,$_POST['product_discount']);
		$product_description = mysqli_real_escape_string($con,$_POST['product_description']);
		// $product_image_name = mysqli_real_escape_string($con,$_POST['product_image_name']);
		$product_keywords = mysqli_real_escape_string($con,$_POST['product_keywords']);
		

		// for getting price after discount
		$product_price_after_discount = ($product_price-(($product_price*$product_discount)/100));



///for category name
		if ($product_cat==1) {
								$product_cat_name="Paper Carft";
							}else if ($product_cat==2) {
								$product_cat_name="Metal Carft";
							}else if ($product_cat==3) {
								$product_cat_name="Beauty Product";
							}else  if ($product_cat==4) {
								$product_cat_name="Decorative Product";
							}
							 

	

	// picture coding
		// Get Main image name
  	$picture_name=$_FILES['product_image']['name'];
	$picture_type=$_FILES['product_image']['type'];
	$picture_tmp_name=$_FILES['product_image']['tmp_name'];
	$picture_size=$_FILES['product_image']['size'];

	if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
	{
	if($picture_size<=50000000)
	
		$product_image_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../product_images/".$product_image_name);
  	}



  	// picture coding
		// Get Sub img one
  	$sub_img_one_picture_name=$_FILES['sub_img_one']['name'];
	$sub_img_one_picture_type=$_FILES['sub_img_one']['type'];
	$sub_img_one_picture_tmp_name=$_FILES['sub_img_one']['tmp_name'];
	$sub_img_one_picture_size=$_FILES['sub_img_one']['size'];

	if($sub_img_one_picture_type=="image/jpeg" || $sub_img_one_picture_type=="image/jpg" || $sub_img_one_picture_type=="image/png" || $sub_img_one_picture_type=="image/gif")
	{
	if($sub_img_one_picture_size<=50000000)
	
		$sub_img_one_image_name=time()."_".$sub_img_one_picture_name;
		move_uploaded_file($sub_img_one_picture_tmp_name,"../product_images/".$sub_img_one_image_name);
  	}

  	  	// picture coding
		// Get Sub img two
  	$sub_img_two_picture_name=$_FILES['sub_img_two']['name'];
	$sub_img_two_picture_type=$_FILES['sub_img_two']['type'];
	$sub_img_two_picture_tmp_name=$_FILES['sub_img_two']['tmp_name'];
	$sub_img_two_picture_size=$_FILES['sub_img_two']['size'];

	if($sub_img_two_picture_type=="image/jpeg" || $sub_img_two_picture_type=="image/jpg" || $sub_img_two_picture_type=="image/png" || $sub_img_two_picture_type=="image/gif")
	{
	if($sub_img_two_picture_size<=50000000)
	
		$sub_img_two_image_name=time()."_".$sub_img_two_picture_name;
		move_uploaded_file($sub_img_two_picture_tmp_name,"../product_images/".$sub_img_two_image_name);
  	}


  	  	// picture coding
		// Get Sub img thre
  	$sub_img_three_picture_name=$_FILES['sub_img_three']['name'];
	$sub_img_three_picture_type=$_FILES['sub_img_three']['type'];
	$sub_img_three_picture_tmp_name=$_FILES['sub_img_three']['tmp_name'];
	$sub_img_three_picture_size=$_FILES['sub_img_three']['size'];

	if($sub_img_three_picture_type=="image/jpeg" || $sub_img_three_picture_type=="image/jpg" || $sub_img_three_picture_type=="image/png" || $sub_img_three_picture_type=="image/gif")
	{
	if($sub_img_three_picture_size<=50000000)
	
		$sub_img_three_image_name=time()."_".$sub_img_three_picture_name;
		move_uploaded_file($sub_img_three_picture_tmp_name,"../product_images/".$sub_img_three_image_name);
  	}



		$insert_query = "INSERT INTO `products`(`product_cat`, `product_category`, `product_title`, `product_price`,`product_discount`,`product_price_after_discount`, `product_description`, `product_image_name`, `sub_img_one`, `sub_img_two`, `sub_img_three`, `product_keywords`) VALUES ('$product_cat','$product_cat_name', '$product_title', '$product_price','$product_discount','$product_price_after_discount','$product_description', '$product_image_name','$sub_img_one_image_name','$sub_img_two_image_name','$sub_img_three_image_name', '$product_keywords')";
		
		if(mysqli_query($con, $insert_query)) { ?>
			<script>window.location ='manageproduct.php'</script>
			
			<?php	
		}	
	}
    // $insert_sql = "INSERT INTO products (product_cat,product_price,product_description,product_image_name,product_keywords) VALUES()";

	if( isset($_GET['product_id'])) {
		$del_sql = "DELETE FROM `products` WHERE product_id = $_GET[product_id]";
		if(mysqli_query($con, $del_sql)){ ?>
			<script>window.location='manageproduct.php'</script>
			
			<?php
		}
	}
	////update section started here

	if( isset($_GET['updateid'])) {
		// $product_cat = mysqli_real_escape_string($con,$_GET['product_cat']);
		$product_cat = mysqli_real_escape_string($con,$_GET['product_cat']);
		$product_title = mysqli_real_escape_string($con,$_GET['product_title']);
		$product_price = mysqli_real_escape_string($con,$_GET['product_price']);
		$product_discount = mysqli_real_escape_string($con,$_GET['product_discount']);
		$product_description = mysqli_real_escape_string($con,$_GET['product_description']);
		// $product_image_name = mysqli_real_escape_string($con,$_GET['product_image_name']);
		$product_keywords = mysqli_real_escape_string($con,$_GET['product_keywords']);
		

		// for getting price after discount
		$product_price_after_discount = ($product_price-(($product_price*$product_discount)/100));


  		///for category name
		if ($product_cat==1) {
								$product_cat_name="Paper Carft";
							}else if ($product_cat==2) {
								$product_cat_name="Metal Carft";
							}else if ($product_cat==3) {
								$product_cat_name="Beauty Product";
							}else if ($product_cat==4) {
								$product_cat_name="Decorative Product";
							}



		$update_sql = "UPDATE products SET product_cat ='$product_cat',product_category='$product_cat_name',product_title ='$product_title', product_price='$product_price',product_discount='$product_discount',product_price_after_discount = $product_price_after_discount,product_description='$product_description', product_keywords='$product_keywords' WHERE product_id='$_GET[updateid]'";
		if(mysqli_query($con,$update_sql)) { ?>
				<script> window.location ='manageproduct.php' </script>
			<?php
		}
		
	}
?>