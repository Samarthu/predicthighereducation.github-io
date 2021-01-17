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
                        <li><a href="stud_rpt.php">Student Details</a></li>                   
                        <li><a href="test_rpt.php">Test Details</a></li>
                        <li  class="active"><a href="test.php">Add Test</a></li>
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
				<h2 class="pageTitle">Aptitude Test Details</h2>				
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
							<select name="ttype" id="ttype" style="width:100%!important">
								<option value="">-Select Test Type-</option>
								<option value="aptitude">Aptitude</option>
								<option value="maths">Maths</option>
								<option value="english">English</option>
							</select>
							<p></p>
						</div>
					</div>									
					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="Question" 
								name="que" id="que" required />
								<p></p>
						</div>
					</div> 
					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="Option1" 
								name="option1" id="option1" required />
								<p></p>
						</div>
					</div> 
					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="Option2" 
								name="option1" id="option2" required />
								<p></p>
						</div>
					</div> 
					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="Option3" 
								name="option3" id="option3" required />
								<p></p>
						</div>
					</div> 
					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="Option4" 
								name="option4" id="option4" required />
								<p></p>
						</div>
					</div> 					
					<div class="control-group">
					  <div class="controls">
							<select name="ans" id="ans" style="width:100%!important">
								<option value="">-Select Correct Option-</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
							<p></p>
						</div>
					</div>										   						
					<button type="button" id="btntest" name="btntest"  class="btn btn-primary pull-right">Submit</button><br />
					
			  </form>
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
<script type="text/javascript">
$(document).ready(function(){
	$("#btntest").click(function(){	
		var ttype = $("#ttype").val();		
		var que = $("#que").val();		
		var option1 = $("#option1").val();
		var option2 = $("#option2").val();
		var option3 = $("#option3").val();
		var option4 = $("#option4").val();
		var ans = $("#ans").val();
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'ttype1='+ ttype +'&que1='+ que +
		                 '&option11='+ option1+ '&option21='+ option2+ '&option31='+ option3 +
						 '&option41='+ option4+ '&ans1='+ ans;
		if(ttype==""||que==''||option1=='' || option2=='' || option3=='' || option4=='' || ans=='')
		{
			alert("Please Fill All Fields");
		}
		else
		{
			// AJAX Code To Submit Form.
			$.ajax({
				type: "POST",
				url: "test2.php",
				data: dataString,
				cache: false,
				success: function(result){
					alert(result);
				}
			});
		}
		return false;
	});
});
</script>