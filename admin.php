<?php  
  session_start();
  include_once('db.php');  
  $username = $_POST["username1"];
  $password = $_POST["password1"];	
	
  $rs=$db->prepare("select * from tbl_admin where username='$username' and password='$password'");
  $rs->execute();
  $rw=$rs->fetch();
	
  if($rw!=0){
	$_SESSION['admin']=$username;
	echo "success";		
  }
  else{
	echo "fail";	
  }
?>