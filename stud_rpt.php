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
                        <li><a href="dashboard.php">College Details</a></li>	   
                        <li class="active"><a href="stud_rpt.php">Student Details</a></li>                   
                        <li><a href="test_rpt.php">Test Details</a></li>
                        <li><a href="test.php">Add Test</a></li>
                        <li><a href="feed_rpt.php">Feedbacks</a></li>
                        <li><a href="logout2.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Student Details</h2>				
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
								  	
			<table class="table table-striped table-condensed table-bordered">
				<tr>
					<th>Name</th><th>Address</th><th>City</th><th>Gender</th><th>Mobile</th><th>Email</th><th>SSC</th><th>HSC</th>
				</tr>
				<?php
					$rs=$db->prepare("select s.name,s.address,s.gender,s.city,s.mobile,s.email,m.ssc,m.hsc from tbl_student s join tbl_marks m where s.username=m.username");
  					$rs->execute();  					
  					while($row=$rs->fetch())
				  	{
				  	  echo "<tr>";		
					  echo "<td>".$row['name']."</td>";	
					  echo "<td>".$row['address']."</td>";	
					  echo "<td>".$row['city']."</td>";	
					  echo "<td>".$row['gender']."</td>";	
					  echo "<td>".$row['mobile']."</td>";	
					  echo "<td>".$row['email']."</td>";	
					  echo "<td>".$row['ssc']."</td>";	
					  echo "<td>".$row['hsc']."</td>";	
					  echo "</tr>";		
					}  
				?>
			</table>
			</div>
								
		</div>
	</div>
 
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
