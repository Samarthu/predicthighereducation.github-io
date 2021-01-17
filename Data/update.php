<?php
  session_start();
  $username=$_SESSION['student'];
  include_once('db.php');  
  $name = $_POST["name1"];
  $gender = $_POST["gender1"];    
  $address = $_POST["address1"];  
  $city = $_POST["city1"];
  $mobile = $_POST["mobile1"];
  $email = $_POST["email1"];
  
  if($db->exec("update tbl_student set name='$name',gender='$gender',address='$address',city='$city',mobile='$mobile',email='$email' where username='$username'"))
  {
	echo "Student profile updated Successfully.";
  }
  else
  {
    echo "Student updation failed";
  }
?>