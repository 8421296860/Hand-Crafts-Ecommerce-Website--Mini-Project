<?php


include "header.php";
include "db.php";
?>
<head>
	<style type="text/css">

		.bouncingbutton_one {
  position: absolute;
  top: 20px;
  /*left: 50px;*/
  width: 10%;
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
.bouncingbutton_one:hover{
	color: white;
}
 
	</style>

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
							<h3 class="title"></h3>
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
									
								       
         
								<div  class="col-md-10"  >
									<form enctype="multipart/form-data">
								 <br><br>
								<!-- <div class="form-group">
									<label>Product Category<br>  </label>
									<input class="form-control" type="text" name="product_cat" required="">
								</div> -->
								<div class="form-group">
									<h4 style="color: green">Thanks for Your Feedback / Suggestion...We will get back to you soon !</h4>
									<br>
									 
								</div>
								 
							</form>
								</div>
								 
									<div class="form-group" class="col-md-2">
										<br><br>
									<a href="index.php" class="bouncingbutton_one">Back to HomePage</a>
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
		
		