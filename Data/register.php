<?php
  include_once('db.php');
  $username = $_POST["username1"];
  $password = $_POST["password1"];
  $name = $_POST["name1"];
  $gender = $_POST["gender1"];    
  $address = $_POST["address1"];  
  $city = $_POST["city1"];
  $mobile = $_POST["mobile1"];
  $email = $_POST["email1"];
  $date_created = date('Y-m-d');
	
  $rs=$db->prepare("select * from tbl_student where username='$username'");
  $rs->execute();
  $rw=$rs->fetch();
	
  if($rw!=0){
	echo "Username already Exists.";
  }
  else if($db->exec("insert into tbl_student(username,password,name,
                     gender,address,city,mobile,email,date_created) values('$username','$password','$name',
                     '$gender','$address','$city','$mobile','$email','$date_created')"))
  {
	echo "Student registered Successfully. Plz  Login";
  }
  else
  {
    echo "Student registeration failed";
  }
?>