<?php
  session_start();
  include_once('db.php');  
  $username = $_POST["username1"];
  $password = $_POST["password1"];	
	
  $rs=$db->prepare("select * from tbl_student where username='$username' and password='$password'");
  $rs->execute();
  $rw=$rs->fetch();
	
  if($rw!=0){
  	$_SESSION['student']=$username;
    $_SESSION['email']=$rw["email"];
  	echo "success";		
  }
  else{
	   echo "fail";	
  }
?>