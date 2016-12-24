<html>
<head>
<title>Car Information</title>
<link rel="stylesheet" type="text/css" href="wallpaper.css"/>
</head>
<body id="body1">
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "car";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "SELECT * FROM book_car join carinfo on book_car.C_ID=carinfo.C_ID";

	$query = mysqli_query($conn,$sql);

?>
<table width="1000" border="1" align="center" id="table">
  <tr>
    <th width="91"> <div align="center">Book ID </div></th>
    <th width="91"> <div align="center">Car ID </div></th>
    <th width="98"> <div align="center">Hour</div></th>
    <th width="198"> <div align="center">Total Price</div></th>
    <th width="97"> <div align="center">Date</div></th>
	<th width="97"> <div align="center">status</div></th>
	<th width="150"> <div align="center">Model</div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["B_ID"];?></div></td>
    <td><?php echo $result["C_ID"];?></td>
	<td><?php echo $result["hour"];?></td>
    <td><?php echo $result["totalprice"];?></td>
    <td><div align="center"><?php echo $result["BC_date"];?></div></td>
	<td><?php echo $result["Status"];?></td>
	<td><?php echo $result["C_model"];?></td>
	<td align="center"><a href="JavaScript:if(confirm('Confirm?')==true){window.location='CarR.php?C_ID=<?php echo $result["C_ID"];?>&Date=<?php echo $result["BC_date"]?>&TotalPrice=<?php echo $result["totalprice"]?>';}">Update</a></td>
  </tr>
<?php
}
?>
</table>
<?php

mysqli_close($conn);
?>
<center><a href="home.php"><button id=button2 type=button >Back </button></a></center>
</body>
</html>