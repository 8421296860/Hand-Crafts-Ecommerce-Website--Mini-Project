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
        <title> Review Feedbacks/ Suggestion </title>
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
        	<h2 style="text-align: center;margin-top: 3%;">-: Review Feedbacks/ Suggestions :-</h2><br>
            <div class="container-fluid">
          
                <div class="row">
                   
							 
                    <div class="col-md-9" id="left"  >
                        <h3 >Feedbacks Table</h3>
                        <hr>
                        <table class="table table-responsive table-condensed">
                            <thead>
                                <tr>
                                	<th id="mystyle">Feedback  Id</th>
                                    <th id="mystyle">Name pf User</th>
                                    <th id="mystyle">Email</th>
                                    <th id="mystyle">Message</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
									$sql = "SELECT * FROM `feedbackorsuggestion`";
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
												<td id='mystyle'>$row[feedbackorsuggestion_id]</td>
												<td id='mystyle'>$row[name]</td>
												<td id='mystyle'>$row[email]</td>
												<td id='mystyle'>$row[message]</td>
												
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
							else
							{
								$product_cat_name="no cat";
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
		move_uploaded_file($picture_tmp_name,"product_images/".$product_image_name);
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
		move_uploaded_file($sub_img_one_picture_tmp_name,"product_images/".$sub_img_one_image_name);
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
		move_uploaded_file($sub_img_two_picture_tmp_name,"product_images/".$sub_img_two_image_name);
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
		move_uploaded_file($sub_img_three_picture_tmp_name,"product_images/".$sub_img_three_image_name);
  	}



		$insert_query = "INSERT INTO `products`(`product_cat`, `product_category`, `product_title`, `product_price`,`product_discount`, `product_description`, `product_image_name`, `sub_img_one`, `sub_img_two`, `sub_img_three`, `product_keywords`) VALUES ('$product_cat','$product_cat_name', '$product_title', '$product_price','$product_discount','$product_description', '$product_image_name','$sub_img_one_image_name','$sub_img_two_image_name','$sub_img_three_image_name', '$product_keywords')";
		
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
		

  		///for category name
		if ($product_cat=='1') {
								$product_cat_name="Paper Carft";
							}else if ($product_cat=='2') {
								$product_cat_name="Metal Carft";
							}else if ($product_cat=='3') {
								$product_cat_name="Beauty Product";
							}else if ($product_cat=='4') {
								$product_cat_name="Decorative Product";
							}



		$update_sql = "UPDATE products SET product_cat ='$product_cat',product_category='$product_cat_name',product_title ='$product_title', product_price='$product_price',product_discount='$product_discount',product_description='$product_description', product_keywords='$product_keywords' WHERE product_id='$_GET[updateid]'";
		if(mysqli_query($con,$update_sql)) { ?>
				<script> window.location ='manageproduct.php' </script>
			<?php
		}
		
	}
?>