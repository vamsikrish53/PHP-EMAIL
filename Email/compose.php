	
	<!-- PHP CODE FOR COMPOSING A MAIL -->
	<!-- Author : G Krishnam Raju -->

<?php 
	include 'dbconfig.php'; 
	
	session_start();
	
	$mailid=$_SESSION['mailid'];
	
?>

<html lang="en">
<head>
  <title>COMPOSE A MAIL </title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style>
		textarea{
			resize:none;}
  </style>
</head>

<body background="back.jpg">

<div class="container">
  <h2 style="color:#6305D9">COMPOSE MAIL</h2>
  <form class="form-horizontal" role="form" action="compose.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="to">TO </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="to" placeholder="Enter TO MAIL ID " required>
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="subject">SUBJECT</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" name="subject" placeholder="ENTER SUBJECT" required>
     </div>
     </div>
      
      <div class="form-group">
      <label class="control-label col-sm-2" for="body">BODY </label>
      <div class="col-sm-10">          
        <textarea class="form-control" rows="10" name="body" placeholder="ENTER THE TEXT" required> </textarea>
      </div>
    </div>
    

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="send" >SEND</button>
      </div>
    </div>
    
     <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button  onClick="window.location.href='inbox.php'" class="btn btn-default" name="send" >BACT TO INBOX</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>


<?php 	

	
	if($_SESSION['sid']==session_id()) 
	{
			
		if(isset($_POST['send']))
		{
		
			$mailid=$mailid;
			$from=$mailid;
			$to=$_POST['to'];
			$subject=$_POST['subject'];
			$body=$_POST['body'];
		
			$sql="select * from users where mailid='$to'";
			$execute=mysqli_query($conn,$sql);
		
		if($count=mysqli_fetch_assoc($execute))
		{	
		
			$sql="insert into inbox(mailid,from_addr,to_addr,subject,body) values('$mailid','$from','$to','$subject','$body')";
			$execute=mysqli_query($conn,$sql);
		
			if($execute)
			{
				echo '<div class="alert alert-success">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> Mail Sent Successfully !!! .
					  </div>';
			
			}
		}
		
		else 
			{
		
				echo '<div class="alert alert-danger">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>EMail Id doesnt exists !</strong> 
					  </div>';
			}
	 }
   }
	else
	{
		header('Location:index.php');
	}

	 
?>
	
	
	

