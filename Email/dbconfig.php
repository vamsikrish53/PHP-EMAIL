	
	<!-- PHP CODE FOR DATA BASE CONFRIGRATION -->
	<!-- Author : G Krishnam Raju -->
<?php 

	$host="localhost";
	$username="root";
	$password="";
	$dbname="email";
	
	$conn = mysqli_connect($host, $username, $password, $dbname);
	
	if (!$conn)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	
?>
	
	
