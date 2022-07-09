
<head>
	<style type="text/css">

		.bouncingbutton {
  position: absolute;
  /*top: 50px;
  left: 50px;*/
  width: 150%;
  line-height: 25px;
  padding:5px;
  text-align:center;
  opacity: 1;
  background: red;
  color:white;
  padding-left: 5px;
  margin-right: 5px;
  border-radius:5%;
  -webkit-animation:bounce 1s infinite;
  /*-webkit-animation: bounce .3s infinite alternate;*/
  -moz-animation: bounce 1s infinite alternate;
  animation: bounce 1s infinite alternate;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
}
@-webkit-keyframes bounce {
  to { -webkit-transform: scale(1.2); }
}
@-moz-keyframes bounce {
  to { -moz-transform: scale(1.2); }
}
@keyframes bounce {
  to { transform: scale(1.2); }
}
 
	</style>
</head>

<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["categoryhome"])){
	$category_query = "SELECT * FROM categories WHERE cat_id!=0";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		
            
            
				<!-- responsive-nav -->
				<div id='responsive-nav'>
					<!-- NAV -->
					<ul class='main-nav nav navbar-nav'>
                    <li class='active'><a href='index.php'>Home</a></li>
                    <li>  </li>
                    <li ><a href='store.php' class='bouncingbutton'>Store</a>
                    </li>


	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
            
            $sql = "SELECT COUNT(*) AS count_items FROM products,categories WHERE product_cat=cat_id";
            $query = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($query);
            $count=$row["count_items"];
            
            
            
			echo "
					
                    
                               <li class='categoryhome' cid='$cid'><a href='store.php'>$cat_name</a></li>
                    
			";
		}
        
		echo "
               
			";
	}

	echo "
		
                    <li ><a href='contactus.php'>Contact Us</a></li>

                    </ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
	";
}


if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/2);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page'>$i</a></li>
            
            
		";
	}
}
if(isset($_POST["getProducthome"])){
	$limit = 3;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			// $pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			 			
			$pro_image_name = $row['product_image_name'];
            
            $original_price=$row['product_price'];
			$percentage_discount=$row['product_discount'];

            $cat_name = $row["cat_title"];



            //code for discount 
			
			//code for discount 
									$original_price=$row['product_price'];
									$percentage_discount=$row['product_discount'];
									$final_price = ($original_price-(($original_price*$percentage_discount)/100));

									
			echo "
				
                       <div class='product-widget'>
                                <a href='product.php?p=$pro_id'> 
									<div class='product-img'>
										<img src='product_images/$pro_image_name' alt=''>
									</div>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price'>&#8377;$final_price
										<del class='product-old-price'>&#8377;$original_price</del></h4>
									</div></a>
								</div>
                        
			";
		}
	}
}


if(isset($_POST["gethomeProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
    
	$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN 71 AND 74";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
        
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			// $pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			// $pro_price = $row['product_price'];
			$pro_image_name = $row['product_image_name'];
            
    		 
            $cat_name = $row["cat_title"];

            //code for discount 
									$original_price=$row['product_price'];
									$percentage_discount=$row['product_discount'];
									$final_price = ($original_price-(($original_price*$percentage_discount)/100));

			echo "
				
                        
                                <div class='col-md-3 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-&#8377;$percentage_discount%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>&#8377;$final_price
										<del class='product-old-price'>&#8377;$original_price</del></h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
                                </div>
							
                        
			";
		}
        ;
      
}
    
	}
    
if(isset($_POST["get_seleted_Category"]) ||  isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products,categories WHERE product_cat = '$id' AND product_cat=cat_id";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			// $pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			// $pro_price = $row['product_price'];
			$pro_image_name = $row['product_image_name'];
            $cat_name = $row["cat_title"];

            //code for discount 
									$original_price=$row['product_price'];
									$percentage_discount=$row['product_discount'];
									$final_price = ($original_price-(($original_price*$percentage_discount)/100));

			echo "
					
                        
                        <div class='col-md-4 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='product_images/$pro_image_name' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-&#8377;$percentage_discount%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>&#8377;$final_price<del class='product-old-price'>&#8377;$original_price</del></h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist' tabindex='0'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view' ><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' href='#' tabindex='0' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
							</div>
			";
		}
	}