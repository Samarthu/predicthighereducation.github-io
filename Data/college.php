<?php
  include_once('db.php');
  $cname = $_POST["cname1"];
  $caddress = $_POST["caddress1"];
  $ccity = $_POST["ccity1"];
  $stream = $_POST["stream1"];    
  $cutoff = $_POST["cutoff1"];  
 
  if($db->exec("insert into tbl_college(cname,caddress,ccity,
                     stream,cutoff) values('$cname','$caddress','$ccity','$stream','$cutoff')"))
  {
	 echo "College Details stored Successfully.";
  }
  else
  {
    echo "College Details failed";
  }
?>