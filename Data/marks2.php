<?php
  session_start();
  $username=$_SESSION['student'];
  
  include_once('db.php');
  $ssc = $_POST["ssc1"];
  $hsc = $_POST["hsc1"];
  	
  $rs=$db->prepare("select * from tbl_marks where username='$username'");
  $rs->execute();
  $rw=$rs->fetch();
	
  if($rw!=0){
	   if($db->exec("update tbl_marks set ssc='$ssc',hsc='$hsc' where username='$username'")){
        echo "Marks updated Successfully.";    
     }
  }
  else if($db->exec("insert into tbl_marks values('$username','$ssc','$hsc')"))
  {
	   echo "Marks inserted Successfully.";
  }
  else
  {
      echo "Marks failed";
  }
?>