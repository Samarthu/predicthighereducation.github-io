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
                        <li class="active"><a href="dashboard.php">College Details</a></li>	   
                        <li><a href="stud_rpt.php">Student Details</a></li>                   
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
				<h2 class="pageTitle"><?php echo $_SESSION['admin'];?> Provide College Details</h2>
				<?php
				    $cname=$caddress=$ccity=$stream=$cutoff="";
				  
				?>
				
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2>College Details</h2>
			<table class="table table-striped table-condensed table-bordered">
				<tr>
					<th>College Name</th><th>Address</th><th>City</th><th>Stream</th><th>Cut-Off</th>
					<th>Change</th>
				</tr>	
				<?php
					$rs=$db->prepare("select * from tbl_college" );
  					$rs->execute();  					
  					while($row=$rs->fetch())
				  	{
				  	  echo "<tr>";	
				  	  
					  echo "<td>".$row['cname']."</td>";	
					  echo "<td>".$row['caddress']."</td>";	
					  echo "<td>".$row['ccity']."</td>";	
					  echo "<td>".$row['stream']."</td>";	
					  echo "<td>".$row['cutoff']."</td>";		
					  echo '<td><a href="change.php?id=$row[id]">Update</a></td>';								  
					  echo "</tr>";		
					}  
				?>
			</table>
		</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
			<h2>New College</h2>					  	
			<!-- Form itself -->
				<form>										
					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="College Name" 
								name="cname" id="cname" required value="<?php echo $cname;?>" 
								 />
								<p></p>
						</div>
					</div> 
					<div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="College Address" 
								name="caddress" id="caddress" required
								 value="<?php echo $caddress;?>" />
								<p></p>
						</div>
					</div> 
					<div class="control-group">
					  <div class="controls">
							<select name="ccity" id="ccity" style="width:100%!important">
								<option value="">-Select City-</option>
								<option value="solapur" <?php if($ccity=='solapur') echo 'selected';?>>Solapur</option>
								<option value="pune" <?php if($ccity=='pune') echo 'selected';?>>Pune</option>
							</select>
							<p></p>
						</div>
					</div>
					<div class="control-group">
					  <div class="controls">
							<select name="stream" id="stream" style="width:100%!important"> 
								<option value="">-Select Stream-</option>
								<option value="BA" <?php if($stream=='BA') echo 'selected';?>>BA</option>
								<option value="BCOM" <?php if($stream=='BCOM') echo 'selected';?>>BCOM</option>
								<option value="BE" <?php if($stream=='BE') echo 'selected';?>>BE</option>
							</select>
							<p></p>
						</div>
					</div>	
				    <div class="control-group">
					  <div class="controls">
							<input type="text" class="form-control" placeholder="Cut Off" 
								name="cutoff" id="cutoff" required
								 value="<?php echo $cutoff;?>" />
								<p></p>
						</div>
					</div> 					   						
					<button type="button" id="btncollege" name="btncollege"  class="btn btn-primary pull-right">Submit</button><br />
					
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
	$("#btncollege").click(function(){	
		var cname = $("#cname").val();		
		var caddress = $("#caddress").val();
		var ccity = $("#ccity").val();
		var stream = $("#stream").val();
		var cutoff = $("#cutoff").val();
		
		// Returns successful data submission message when the entered information is stored in database.
		var dataString = 'cname1='+ cname +
		                 '&caddress1='+ caddress+ '&ccity1='+ ccity+ '&stream1='+ stream +
						 '&cutoff1='+ cutoff;
		if(cname==''||caddress=='' || ccity=='' || stream=='' || cutoff=='')
		{
			alert("Please Fill All Fields");
		}
		else
		{
			// AJAX Code To Submit Form.
			$.ajax({
				type: "POST",
				url: "college.php",
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