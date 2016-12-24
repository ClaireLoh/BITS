<html>
<head>
<title>Car Information</title>
</head>
<body>
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
<table width="650" border="1" align="center">
  <tr>
    <th width="91"> <div align="center">C_ID </div></th>
    <th width="98"> <div align="center">C_model </div></th>
    <th width="198"> <div align="center">C_price </div></th>
    <th width="97"> <div align="center">C_passenger </div></th>
    <th width="59"> <div align="center">C_color </div></th>
    <th width="71"> <div align="center">image </div></th>
	<th width="50"> <div align="center">remove </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["C_ID"];?></div></td>
    <td><?php echo $result["C_model"];?></td>
    <td><?php echo $result["C_price"];?></td>
    <td><div align="center"><?php echo $result["C_passenger"];?></div></td>
    <td align="right"><?php echo $result["C_color"];?></td>
	<td><image src="<?php echo $result["image"]; ?>" width="200" height="300"></td>
	<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='delete.php?C_ID=<?php echo $result["C_ID"];?>';}">Delete</a></td>
  </tr>
<?php
}
?>
</table>
<?php

mysqli_close($conn);
?>
<center><a href="updatemenu.php"><button id=button2 type=button >Back </button></a></center>
</body>
</html>