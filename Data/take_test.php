<?php
	session_start();
	if(!isset($_SESSION["student"]))
		header("Location: user.html");

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
                        <li class="active"><a href="profile.php">Profile</a></li> 						 						
						<li><a href="marks.php">Marks Details</a></li>
                        <li><a href="take_test.php">Take Test</a></li>                        
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle"><?php echo $_SESSION['student'];?> , Select Test Type</h2>
				
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
					<th>S.N.</th><th>Topic</th><th>Total question</th><th>Marks</th><th>Start</th>
				</tr>	

				<?php
				    $stud=$_SESSION["student"];
				    $rs2=$db->prepare("select count(score) as cnt from tbl_score where username='". $stud ."'");

				    $rs2->execute();
  					$rw=$rs2->fetch();
					
  					if($rw["cnt"]==3){
  						header("Location: predict.php");
  					}
  
					$rs=$db->prepare("select ttype,count(que) as cnt from tbl_test group by ttype");
  					$rs->execute();  		
  					$i=0;			
  					while($row=$rs->fetch())
				  	{
				  	  $i++;	
				  	  $ttype=$row['ttype'];
				  	  echo "<tr>";		
					  echo "<td>".$i."</td>";	
					  echo "<td>".$ttype."</td>";	
					  echo "<td>".$row['cnt']."</td>";	
					  echo "<td>".($row['cnt']*2)."</td>";	
					  
					  $rs3=$db->prepare("select * from tbl_score where username='". $stud ."' and ttype='".$ttype."'");

					  $rs3->execute();
  					  $rw3=$rs3->fetch();
				      if($rw3!=0)	
				      	 echo '<td>Given</td>';
				      else
					     echo '<td><a href=start.php?ttype='.$ttype.'>Start</a></td>';
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
