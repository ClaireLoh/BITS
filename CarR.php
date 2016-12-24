<html>
<head>
<link rel="stylesheet" type="text/css" href="wallpaper.css"/>
</head>
<body id="body1">
<?php
$getID=$_GET['C_ID'];
$getDate=$_GET['Date'];
$getPrice=$_GET['TotalPrice'];


echo "The Car ID you have selected is ".$getID."<br/>Date :".$getDate."<br/>The total price is :".$getPrice;
if (isset($_POST['submit']))
	{	   
	include 'connect-db.php';
	
			 		$date=$_POST['Date'] ;
					$time= $_POST['time'] ;					
					$comment=$_POST['comment'] ;
												
		 $result=mysqli_query($conn,"INSERT INTO carreturn(CR_Date,CR_time,CR_comment,C_ID) 
		 VALUES ('$date','$time','$comment','$getID')"); 
		
		 if ($result=== TRUE)
				header("Location: display.php");
			else 
				echo "error!! please check again";
		$sql="UPDATE book_car set status='returned' where C_ID='".$getID."'";
		echo $sql;
		$result1=mysqli_query($conn,$sql);
		
		if ($result1==TRUE)
			header("Location:display.php?C_ID=$getID");
		else
			echo "Query Failed!!";
				
	        }
	
?>

<center><fieldset style="width:300px;" >
<form  method="post" action="CarR.php?C_ID=<?php echo $getID;?>&Date=<?php echo $getDate;?>&TotalPrice=<?php echo $getPrice;?>">
Date: <input type="date" name="Date"><br>
Time: <input type="time" name="time"><br>
Comment: <input type="text" name="comment"><br>
<br>
<input type="submit" name="submit">
</form>
</fieldset></center>
<center><a href="CarReturn.php"><button id=button2 type=button >Back </button></a></center>
</body>
</html>