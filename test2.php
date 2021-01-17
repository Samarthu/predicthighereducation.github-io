<?php
  session_start();
 
  include_once('db.php');
  $ttype = $_POST["ttype1"];
  $que = $_POST["que1"];
  $option1 = $_POST["option11"];
  $option2 = $_POST["option21"];
  $option3 = $_POST["option31"];
  $option4 = $_POST["option41"];
  $ans = $_POST["ans1"];

  if($db->exec("insert into tbl_test(ttype,que,option1,option2,option3,option4,ans) values('$ttype','$que','$option1','$option2','$option3','$option4','$ans')"))
  {
	   echo "Test inserted Successfully.";
  }
  else
  {
      echo "Test failed";
  }
?>