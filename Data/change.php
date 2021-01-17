<?php
	session_start();
	if(!isset($_SESSION["admin"]))
		header("Location: admin.html");

	include_once('db.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Higher Education Access Prediction using Data Mining</title>
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" />
<style>
h3,p{
color:#fff!important;
}
</style>
</head>
<body>
<div id="wrapper" class="home-page">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"/>Predict Higher Education</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Change the information</h2>
				<?php
				    $id=$cname=$caddress=$ccity=$stream=$cutoff="";
				    $admin=$_SESSION['admin'];
				    $id=$_GET["id"];
					$rs=$db->prepare("select * from tbl_college");
  					$rs->execute();
  					$rw=$rs->fetch();
	
  					if($rw!=0 ){
  						$id=$rw['id'];
  						$cname=$rw['cname'];
  						$caddress=$rw['caddress'];
  						$ccity=$rw['ccity'];
  						$stream=$rw['stream'];
  						$cutoff=$rw['cutoff'];
  					}
				?>
			</div>
			</div>
		</div>
	</div>
	</section>

	<section id="content">
	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
								  	
			<!-- Form itself -->
				<form>					
					
                  <div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="c_name" 
								name="cname" id="cname" required value="<?php echo $cname;?>" 
								 />
								<p></p>
						</div>
					</div> 
					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="c_Address" 
								name="caddress" id="caddress" required value="<?php echo $caddress;?>" 
								 />
								<p></p>
						</div>
					</div> 

					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="c_city" 
								name="ccity" id="ccity" required value="<?php echo $ccity;?>" 
								 />
								<p></p>
						</div>
					</div> 
					
					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="stream" 
								name="stream" id="stream" required value="<?php echo $stream;?>" 
								 />
								<p></p>
						</div>
					</div> 

                 <div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="cutoff" 
								name="cutoff" id="cutoff" required value="<?php echo $cutoff;?>" 
								 />
								<p></p>
						</div>
					</div> 
					




					
					<button type="button" id="btn_update" class="btn btn-primary pull-right">Update</button><br />
					
			  </form>
			</div>
								
		</div>
	</div>

	
 <p>&nbsp;</p>
	</section>
	<section class="section-padding gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Developed By</h2>
						<p>
						 Samarth Upare <br>
						 Samiksha Umbarje <br>
						 Lad Vijayalaxmi <br>
						 Vinayak Changale <br>	
						 Bhagyashri Umade<br >
						 Bhojraj Bhave <br>						
						</p>
					</div>
				</div>
			</div>
			
		</div>
	</section>	
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>  
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script> 
<!-- Vendor Scripts -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>

 <script src="contact/jqBootstrapValidation.js"></script>
 <script src="contact/contact_me.js"></script>
  <script src="js/jquery.min.js"></script>
</body>
</html>
