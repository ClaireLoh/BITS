<?php
session_start();
$_SESSION['C_ID']=$_GET['C_ID'];
$userId=$_GET['U_ID'];
?>


<html>
<head>Booking Car Information</head>
<link rel="stylesheet" type="text/css" href="wallpaper.css">
<body id="body">
<div id="main">
<h1><center>Booking Details</center></h1>
<div id="login">
<h2><center>Enter Here.....</h2></center>
<hr>
<form action="book.php?C_ID=<?php echo $_SESSION['C_ID']?>&U_ID=<?php echo $userId;?>" method="POST">
<center><label>Date :</label></center>
<center><input type="date" name="BC_date" id="date" required="required" placeholder="dd/mm/yyyy"/><br /><br /></center>
<center><label>Hours To Book :</label></center>
<center><input type="number" name="hour" id="hour" required="required" placeholder="minimum 1 hour"/><br/><br /></center>
<center><input id="but2" type="submit" value=" submit " name="submit"/><br /></center>
</form>
</hr>
</div>
</div>
<?php

if (isset($_POST["submit"])){
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);}


$date=$_POST['BC_date'];
$hour=$_POST['hour'];
 


$sql = "SELECT * FROM carinfo WHERE C_ID ='".$_SESSION['C_ID']."'";
$result=mysqli_query($conn,$sql);
$fetch=mysqli_fetch_array($result);
$ID = $_SESSION['C_ID'];
$price=$fetch['C_price'];
$total= $price * $hour; 
mysqli_query($conn,"INSERT INTO book_car (BC_date,hour,totalprice,C_ID,U_ID)
		        VALUES ('$date','$hour','$total','$ID','$userId')");
				
	if(mysqli_affected_rows($conn) > 0){
	echo "<p>Your Booking is Success ! your total price is </p>".$total."<br/>please take your car according to the booking time<br/>";
	echo "Address to take car is Taman Bunga Raya, 75450 Bukit Beruang, Melaka<br/>";
	echo "Note:<strong>Please pay the booking fees at the counter before take the car</strong><br/>";
	echo "<strong>THANK YOU FOR TRUSTING US</strong><br/>";
	echo "<a href=booking.php?U_ID=$userId>Go Back</a>";
} else {
	echo "Booking process fail please try again!<br />";
	echo mysqli_error ($conn);
}
}

?>
</body>
</html>

</body>