 <?php
       session_start();      
		// Destroy user session
		unset($_SESSION['admin']);
		// Redirect to main page
		header("Location: index.html");
?>