<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="wallpaper.css">
<style>
table, th, td {
	font-weight:bold;
	color:white;
     border: 5px solid red;
	 background-color:black;
}
</style>
</head>
<body id="body1">

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT B_ID, BC_date, totalprice,hour,U_ID ,C_ID FROM book_car";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<center><table><tr><th>Booking_ID</th><th>Date </th><th>Hour</th><th>Total Charge</th><th>U_ID</th><th>C_ID</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["B_ID"]."</td><td>".$row["BC_date"]."<td>".$row["hour"]."<td>".$row["totalprice"]."<td>".$row["U_ID"]."<td>".$row["C_ID"]."</td></tr>";
    }
    echo "</table></center>";
} else {
    echo "0 results";
}
$conn->close();

?>

<center><a href="home.php"><button id=button2 type=button >Back </button></a></center>