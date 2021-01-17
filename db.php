<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "education_db";

try{
	$db = new PDO("mysql:host=$servername;dbname=$database", $username_db, 
	       $password_db);
	// set the PDO error mode to exception
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully"; 
}catch(PDOException $e){
		echo "Connection failed: " . $e->getMessage();
}
?>
