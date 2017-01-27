
	<!-- PHP CODE FOR DISPLAY MESSAGES -->
	<!-- Author : G Krishnam Raju -->

<?php 

	include 'dbconfig.php';

	session_start();
	
	if($_SESSION['sid']==session_id()) 
	{
		$mailid=$_REQUEST['id'];
		$from=$_REQUEST['from'];
		$date=$_REQUEST['date'];
	
		$sql="select * from inbox where time='$date'";
		$execute=mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($execute);
	
		$from=$row['from_addr'];
	
		$subject=$row['subject'];
		$body=$row['body'];
	}
	
	else
	{
		header('Location:index.php');
	}
?>

<html>
	<title>MAIL DEATIL'S</title>
	<head>
		<style>
		textarea{
			resize:none;}</style>
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
<body>

<div class="container">
  <h2 style="color:#6305D9">MAIL Detail's</h2>
  <form class="form-horizontal" role="form">
	  
	  <div class="form-group">
      <label class="control-label col-sm-2" for="from">FROM </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" readonly="readonly" value="<?php echo "$from"; ?>">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="to">TO </label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  readonly="readonly" value="<?php echo "$mailid"; ?>">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="subject">SUBJECT</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control"  readonly="readonly" value="<?php echo "$subject"; ?>" >
     </div>
     </div>
      
      <div class="form-group">
      <label class="control-label col-sm-2" for="body">BODY </label>
      <div class="col-sm-10">          
        <textarea class="form-control" rows="15" name="body" readonly="readonly"><?php echo "$body"; ?> </textarea>
      </div>
    </div>
</form>
  <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button  onClick="window.location.href='inbox.php'" class="btn btn-default" name="send" >BACT TO INBOX</button>
      </div>
    </div>
</div>


</body>
</html>
