<?php


include "header.php";
include "db.php";
?>
<head>

<style type="text/css">
	
	#new_size {
 display: block;
 /*margin: 20px;*/
 width: auto;
 font-family: serif;
}


				#mystyle{
				text-align: center;
				width: 150px;
</style>


	<script type="text/javascript">
							function resizeInput() {
					    $(this).attr('size', $(this).val().length);
					}

					$('input[type="text"]')
					    // event handler
					    .keyup(resizeInput)
					    // resize on page load
					    .each(resizeInput);


	</script>
</head>



   <div class="main main-raised">
        
     


		<!-- SECTION -->
		<div class="section mainn mainn-raised">
		
		
		  
		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">My Orders</h3>
							<div class="section-nav">
								<!-- <ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
								</ul> -->
							</div>
						</div>
					</div>
					<!-- /section title -->
  <br>
					<!-- Products tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
						
							 <!--to check if user is logged in or not  -->
				<?php
				 if(isset($_SESSION["uid"])){

				 }
				 else
				 {
					echo "
					<script type='text/javascript'>
					 	alert('Please login to review your orders');
					 	window.location ='index.php';
					</script>";
					die();				 	
				 }

				?>
         
								<div  class="col-md-9"  >





<div class="col-md-9" id="left"  >
                        <hr>
                        <table class="table table-responsive table-condensed">
                            <thead>
                                <tr>
                                	 
                                    <th id="mystyle">Product Name</th>
                                    <th id="mystyle">Price</th>
                                    
                                    <th id="mystyle">Description</th>
                                    <th id="mystyle">Product Image  </th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            	<?php 
if(isset($_SESSION["uid"])){
		$user_id = $_SESSION["uid"];

									$sql = "SELECT * FROM `products` WHERE product_id in ( SELECT a.product_id FROM order_products a, orders_info b WHERE a.order_id=b.order_id and b.user_id=$user_id)";


$result = mysqli_query($con, $sql);
 while($row = mysqli_fetch_assoc($result)){
										echo "
											<tr>
											 
												<td id='mystyle'>
												   <h4>
												     <a href='product.php?p=$row[product_id]'>$row[product_title]</a> 
												   <h4>
												</td>
												<td id='mystyle'>$row[product_price_after_discount]</td>
												<td id='mystyle'>$row[product_description]</td>
											 
												 
												<td id='pro_image'><img src='product_images/".$row['product_image_name']."' height='100' width='100'/>
												</td>

												
												
												 
											</tr>

										";
									}
								}



								?>
                            </tbody>

                        </table>
                        <hr>
                    </div>

									
									 
								</div>
								<div class="col-md-2">

								 

								</div>
       			
                        
											<!-- product -->
										
	
										<!-- /product -->
										
										
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>




					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		

		<!-- /SECTION -->

		<!-- /SECTION -->
</div>
 
<?php
include "footer.php";
?>
		
		