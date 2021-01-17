 <?php
       session_start();      
		// Destroy user session
		unset($_SESSION['student']);
		// Redirect to main page
		header("Location: index.html");
?>