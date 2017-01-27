
	<!-- PHP CODE FOR INBOX PAGE -->
	<!-- Author : G Krishnam Raju -->

<?php 

	include 'dbconfig.php'; 
	
	session_start();
	
	$mailid=$_SESSION['mailid'];
	
	$sql= "select name from users where mailid='$mailid'";
	$execute=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($execute);
	
	$name=$row['name'];
	
?>

<!DOCTYPE html>
 <html lang="en">
	  <head> <meta charset="utf-8">
	   <title>INBOX</title> 
	  <link rel='stylesheet' href='css/inboxstyle.css'>
	   </head> 
	   
	   <body background="back.jpg"> 
		   <input type="checkbox" id="menuToggle"> 
		   <label for="menuToggle" class="menu-icon"><?php echo $name ?>   &#9776;</label> 
		   
		   <header> <div id="brand" > WELCOME <?php echo $name ?></div> </header> 
		   
		   <nav class="menu"> 
			   <ul> 
				   <li><a href="inbox.php">INBOX</a></li> 
				   <li><a href="compose.php">COMPOSE</a></li> 
				   <li><a href="logout.php">LOG OUT </a></li> 
				 </ul> 
			</nav> 
		 </body> 
</html> 

<?php 	

	if($_SESSION['sid']==session_id()) 
	{
		$sql="select from_addr , subject , time from inbox where to_addr='$mailid' ORDER BY time desc";
		$execute =mysqli_query($conn,$sql);
		
		$count=mysqli_num_rows($execute);
		
		if($count)
		{ ?>
			
			<table border=2 width='800px' style="margin-top:130px; margin-left:250px;">
			<caption>INBOX</caption>
			<tr><th width=500 align=center> FROM </th> <th width=500 align=center > SUBJECT </th> <th width=500 align=center> DATE </th></tr>
					
			<?php while($row = mysqli_fetch_assoc($execute)) 
			{
				$from=$row['from_addr'];
				$subject=$row['subject'];
				$time=$row['time'];
				$date=urlencode($row['time']); ?>
			
			
			<tr><td width=500 align="center"><?php echo $from ?></td>
			<td width=500 align="center"> <a href="display.php?id=<?php echo $mailid?>&from=<?php echo $from?>&date=<?php echo $date?>"> <?php echo $subject ?></a></td>
			<td width=500 align="center"> <?php echo $time ?> </td></tr>
				  
	  <?php } ?>
			 </table>
			 
<?php   } 
		  
		 else{
		  ?>
		  
			  <table border=2 width='800px' style="margin-top:130px; margin-left:250px;">
			  <caption>INBOX</caption>
			  <tr><td align="center" >NO MAIL'S</td></tr>
	<?php }
		
	}
		
	else
	{
		 header('Location:index.php');
	}
	
?>
