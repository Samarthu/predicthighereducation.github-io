<?php
  session_start();
  $username=$_SESSION['student'];
  
  include_once('db.php');
  $message = $_POST["message1"];
 
  if($db->exec("insert into tbl_feedback values('$username','$message')"))
  {
	   echo "Feedback inserted Successfully.";
  }
  else
  {
      echo "Feedback failed";
  }
?>