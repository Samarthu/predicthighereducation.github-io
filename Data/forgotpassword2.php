<?php
  session_start();
  include_once('db.php');  
  $email = $_POST["email1"];
  
  $rs=$db->prepare("select * from tbl_admin where email='$email'");
  $rs->execute();
  $rw=$rs->fetch();
  
  if($rw!=0){
  $_SESSION['admin']=$email;
  echo "success";   
  }
  else{
  echo "fail";  
  }



?>