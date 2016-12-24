<html>
<head>
<title>Delete Car Information</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword ="";
	$dbName = "car";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	

	$ID = $_GET["C_ID"];
	$sql = "DELETE FROM carinfo WHERE C_ID = '".$ID."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
		 echo "Record delete successfully";		 
	}
	header("Location: list.php");
	mysqli_close($conn);
?>
</body>
</html>