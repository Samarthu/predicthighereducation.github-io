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
                        <li><a href="profile.php">Profile</a></li> 						 						
						<li class="active"><a href="marks.php">Marks Details</a></li>
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
				<h2 class="pageTitle">Predictation Result</h2>	
				<?php				    
				    $student=$_SESSION['student'];
					$rs=$db->prepare("select * from tbl_score where username='$student' and ttype='aptitude'");
  					$rs->execute();
  					$rw=$rs->fetch();
	                $score1=$rw["score"];
	                $s1=$score1;
	                $outoff1=$rw["outoff"];
	                $score1=$outoff1*$score1/100;

	                $rs2=$db->prepare("select * from tbl_score where username='$student' and ttype='english'");
  					$rs2->execute();
  					$rw2=$rs2->fetch();
	                $score2=$rw2["score"];
	                $s2=$score2;
	                $outoff2=$rw2["outoff"];
	                $score2=$outoff2*$score2/100;

	                $rs3=$db->prepare("select * from tbl_score where username='$student' and ttype='maths'");
  					$rs3->execute();
  					$rw3=$rs3->fetch();
	                $score3=$rw3["score"];
	                $s3=$score3;
	                $outoff3=$rw3["outoff"];
	                $score3=$outoff3*$score3/100;

	                $rs4=$db->prepare("select ssc,hsc from tbl_marks where username='$student'");
  					$rs4->execute();
  					$rw4=$rs4->fetch();
	                $ssc=$rw4["ssc"];
	                $hsc=$rw4["hsc"];

					$dataPoints = array( 
									array("label"=>"Aptitude", "y"=>$score1),
									array("label"=>"English", "y"=>$score2),
									array("label"=>"Maths", "y"=>$score3),
									array("label"=>"SSC", "y"=>$ssc),
									array("label"=>"HSC", "y"=>$hsc)	
								);
					
					$branch=$msg="";	
					if($ssc>=80 && $hsc>=80 || $s1>=$outoff1 && $s2>=$outoff2 && $s3>=$outoff3){
						$branch="BE";
						$msg="<h2>Go For B.E</h2>";
					}
					else if($ssc>=60 && $hsc>=60 || $s1>=($outoff1/2) && $s2>=($outoff2/2) && $s3>=($outoff3/2)){
						$branch="BCOM";
						$msg="<h2>Go For B.Com</h2>";
					}
					else{
						$branch="BA";
						$msg="<h2>Go For B.A</h2>";
					}
				?>					
			</div>


		</div>
	</div>

	</section>
	<section id="content">
	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">								  	
				
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
				<?php
				   echo $msg;
                   $message="
				            <strong>College List : </strong>
							<table border='1'  cellspacing='0' class='table table-striped table-condensed table-bordered'>
							<tr>
					          <th>College Name</th><th>Address</th><th>City</th><th>Stream</th><th>Cut-Off</th>
				            </tr>";	
				    $rs=$db->prepare("select * from tbl_college where stream='" .$branch."'");
  					$rs->execute();  					
  					while($row=$rs->fetch())
				  	{
				  	  $message.="<tr>		
					             <td>".$row['cname']."</td>	
					             <td>".$row['caddress']."</td>	
					             <td>".$row['ccity']."</td>	
					             <td>".$row['stream']."</td>	
					             <td>".$row['cutoff']."</td>						  
					             </tr>";		
					}  
				
			        $message.="</table>";	
			        echo $message;

			        $headers = "From: samarthupare5@gmail.com";
			        $to=$_SESSION['email'];
			        $subject = 'PREDICTATION RESULT';
					// Always set content-type when sending HTML email
					$headers .= "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$message.="<p>Aptitude Score : ".$score1."</p>";
					$message.="<p>English Score : ".$score2."</p>";
					$message.="<p>Maths Score : ".$score3."</p>";
					
									
					if(mail($to, $subject, $message,$headers))
						echo "<script>alert('Mail Send');</script>";
					else
						echo "<script>alert('Mail Not Send');</script>";
			?>
			<button onclick="window.print()"> Print</button>
			</div>
								
		</div>
	</div>
 
	</section>
	<!-- <section class="section-padding gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Developed By</h2>
						<p>
						 Samarth Upare <br>
						 Samiksha Umbarje <br>
						 Lad Vijayalaxmi <br>
						 Vinayak Chungale <br>						
						</p>
					</div>
				</div>
			</div>
			
		</div>
	</section>	 -->
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
  <script src="js/canvasjs.min.js"></script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$("#btnmarks").click(function(){	
		var ssc = $("#ssc").val();
		var hsc = $("#hsc").val();
				
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'ssc1='+ ssc +
		                 '&hsc1='+ hsc;

		if(ssc==''||hsc=='')
		{
			alert("Please Fill All Fields");
		}
		else
		{
			// AJAX Code To Submit Form.
			$.ajax({
				type: "POST",
				url: "marks2.php",
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

<script>
	window.onload = function() { 
 	var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Test Score Details"
	},
	subtitles: [{
		text: "Result"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>


