<?php
  include_once('db.php');
  $name = $_POST["name1"];
  $email = $_POST["email1"];
  $message = $_POST["message1"];
   
 
  if($db->exec("insert into tbl_contact(name,email,message) values('$name','$email','$message')"))
  {
   echo "contact information will be provided.";
  }
  else
  {
    echo "College Details failed";
  }
?>