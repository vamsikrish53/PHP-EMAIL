
	<!-- PHP CODE FOR LOGIN And Register -->
	<!-- Author : G Krishnam Raju -->

<?php 

	include 'dbconfig.php'; 
	
	session_start();
	$msg=" ";
	
	if(isset($_POST['login']))
	{
		$mailid =mysql_real_escape_string($_POST['mailid']);
		$password = mysql_real_escape_string($_POST['password']);
		$sql="select name from users where mailid='$mailid' and password='$password'";
		$execute=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($execute);
		
		if($count)
		{
			$_SESSION['sid']=session_id();
			$_SESSION['mailid']=$mailid;
		    header("Location:inbox.php");
		}
		else
		{
			$msg = "INVALID EMAIL /ID OR PASSWORD";
		 
	    }
    }
	
?>


<?php 

	if(isset($_POST['register']))
	{
		$username = mysql_real_escape_string($_POST['username']);
		$mailid =mysql_real_escape_string( $_POST['mailid']);
		$password = mysql_real_escape_string($_POST['password']);
		$sql = "SELECT name  from users where mailid = '$mailid'";
		$count=mysqli_query($conn,$sql);

		if (mysqli_num_rows($count) < 1)
		{
			$sql="insert into users values ('$username' , '$mailid' , '$password')";
			$execute=mysqli_query($conn,$sql);
			$msg= "Registration successfull";
		}
		else
		{
			$msg = "Email already exist";
		} 
	
   }
    
?>


<html >
  <head>
    <meta charset="UTF-8">
    <title>KRISH MAIL</title>
    
    
    <link rel="stylesheet" href="css/reset.css">
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
	<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/style.css">
    
   </head>

<body>

    
<div class="container">
  <div class="info">
    <h1 style="color:red; font-family: Courier New; font-size: 300%;">KRISH MAIL </h1><span style="color:#2424E1; font-family: Courier New; font-size: 100%;"> &bull; Simple &bull; Easy To Access </span>
  </div>
</div>


  <div class="container">
    <strong> <?php echo $msg; ?></strong>
  </div>


<div class="form">
  <div class="thumbnail"><img  src="email.jpg" /></div>
  <form class="register-form" method="post" action="index.php">
    <input type="text" placeholder="USER NAME" name="username" required>
    <input type="text" placeholder="MAIL ID" name="mailid" required>
    <input type="password" placeholder="PASSWORD" name="password" required>
    <button name="register">REGISTER</button>
    <p class="message">Already registered? <a href="#">LOG IN </a></p>
  </form>
  <form class="login-form" method="post" action="index.php">
    <input type="text" placeholder="MAIL ID" name="mailid" required >
    <input type="password" placeholder="PASSWORD" name="password" required>
    <button name="login">LOGIN</button>
    <p class="message">Not registered? <a href="#">Create an account</a></p>
  </form>
</div>

    <script src="js/jquery.js"></script>
	<script src="js/index.js"></script>

	</body>
</html>
