<?php


include "header.php";
include "db.php";
?>

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
							<h3 class="title">Contact Us</h3>
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

					<!-- Products tab & slick -->
					<div class="col-md-12 mainn mainn-raised">
						<div class="row">
							 
								<!-- <div id="tab1" class="tab-pane active"> -->
									<!-- <div class="products-slick" data-nav="#slick-nav-1" > -->
									
								       
         
								<div  class="col-md-7"  >
									<form class="col-md-12" method="POST" style="border-right:  1px solid black;"   enctype="multipart/form-data">
								 <br><br>
								<!-- <div class="form-group">
									<label>Product Category<br>  </label>
									<input class="form-control" type="text" name="product_cat" required="">
								</div> -->
								<div class="form-group">
									<label>Enter Your Name</label>
									<input class="form-control" type="text" name="name" placeholder="Enter Your Name..." required="">
								</div>
								<div class="form-group">
									<label>Enter Your E-mail</label>
									<input class="form-control" type="email" placeholder="Enter Your E-mail..."  name="email"  required="">
								</div>
								<div class="form-group">
									<label>Feedback / Suggestion </label>
<textarea class="form-control" placeholder="Write your Feedback/Suggestion here... " name="message" required=""></textarea>
								</div>


								
								
								<div class="form-group">
									<input class=" btn btn-primary " type="submit" name="submit" value="Submit">
								</div>
							</form>
								</div>
								<div class="col-md-4">

									<br>
									<br>
									<br>
								<div class="form-group">
								 
									<h4><u>Address:</u></h4>
								 
								</div>									
								  
                        <h5>PB NO.54 Gopalpur-Ranjani Road,Pandharpur, Dist:-Solapur, Maharashtra.</h5><br>
            <div class="contact-info"> 
            <h5><i class="fa fa-map-marker"></i> Gopalpur-Pandharpur,Solapur(Maharashtra)<br><br>
            <i class="fa fa-phone"></i> (02186)-216063/62/61 <br><br> 
             <i class="fa fa-envelope-o"></i>  coe@sveri.ac.in   </h5> 

								</div>

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
	if(isset($_POST['submit'])){
		// $product_cat = mysqli_real_escape_string($con,$_POST['product_cat']);
		$name = mysqli_real_escape_string($con,$_POST['name']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$message = mysqli_real_escape_string($con,$_POST['message']);



$insert_query = "INSERT INTO `feedbackorsuggestion`( `name`, `email`, `message`) VALUES ('$name','$email', '$message')";
};

if(mysqli_query($con, $insert_query)) { ?>
			<script>window.location ='index.php'</script>
			
			<?php	
		}	
	

?>
<?php
include "footer.php";
?>
		
		