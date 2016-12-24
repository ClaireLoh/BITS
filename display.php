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

	$sql = "SELECT * FROM carreturn";

	$query = mysqli_query($conn,$sql);

?>
<table width="650" border="1">
  <tr>
    <th width="91"> <div align="center">Return ID </div></th>
    <th width="98"> <div align="center">Car ID </div></th>
	<th width="98"> <div align="center">Date </div></th>
    <th width="198"> <div align="center">Time</div></th>
    <th width="97"> <div align="center">Comment </div></th>
	<th width="50"> <div align="center">delete</div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["CR_ID"];?></div></td>
	<td><?php echo $result["C_ID"];?></td>
    <td><?php echo $result["CR_Date"];?></td>
    <td><?php echo $result["CR_time"];?></td>
    <td><div align="center"><?php echo $result["CR_comment"];?></div></td>
	<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='remove.php?CR_ID=<?php echo $result["CR_ID"];?>';}">Delete</a></td>
  </tr>
<?php
}
?>
</table>
 <a align="center" href="CarReturn.php"> Back </a>
<?php

mysqli_close($conn);
?>
</body>
</html>