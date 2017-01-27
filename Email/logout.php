
	<!-- PHP CODE FOR LOG OUT -->
	<!-- Author : G Krishnam Raju -->

<?php   
 
    session_start();
	session_destroy();
	header('Location: index.php');
	
?>
