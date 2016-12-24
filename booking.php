<?php
session_start();
$user = $_GET['U_ID'];

?>

<html>
<head>
<title>Car Information</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="wallpaper.css">
</head>
<body id="body">
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "car";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "SELECT * FROM carinfo";

	$query = mysqli_query($conn,$sql);

?>
<table width="650" border="1"align="center" id="table">
  <tr>
    <th width="50"> <div align="center">Image </div></th>
    <th width="120"> <div align="center">Car model </div></th>
    <th width="80"> <div align="center">Price per hour </div></th>
    <th width="97"> <div align="center">No of Passengers </div></th>
    <th width="80"> <div align="center">Color</div></th>
    <th width="50"> <div align="center">Click To Book</div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query))
{
?><form action="booking.php?U_ID=<? echo $user;?>" method="get">
  <tr>
    <td><image src="<?php echo $result["image"]; ?>" width="510" height="250"></td>
    <td><?php echo $result["C_model"];?></td>
    <td><?php echo $result["C_price"];?></td>
    <td><div align="center"><?php echo $result["C_passenger"];?></div></td>
    <td align="right"><?php echo $result["C_color"];?></td>
	
	<td><a href="JavaScript:if(confirm('Confirm To Book This Car?')==true){window.location='book.php?C_ID=<?php echo $result["C_ID"];?>&U_ID=<?php echo $user?>';}"><button id="button1" type="button">Book Now!</button></a></td></td>
  </tr>
  </form>

<?php
}
?>
</table>
<button id="but2"><a id="but2" align="center" href="index1.php"> Back </a></button>
<?php
 
mysqli_close($conn);
?>

</body>
</html>