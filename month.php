<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="wallpaper.css"/>
<link rel="stylesheet" type="text/css" href="report.css" />
<style>
table, th, td {
     border: 1px solid black;
	 background-color:#FFE4E1;
}

</style>
</head>
<body id="body">
	<div id='cssmenu'>
	<ul>
		<li><a href='home.php'>Home</a></li>
		<li><a href='sale.php'>Sale</a></li>
		<li><a href='summary.php'>Booking Summary</a></li>
		<li class='active'><a href='month.php'>Monthly Sale Report</a></li>
	</ul>
	</div>
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

$sql3="SELECT carinfo.C_ID,YEAR(BC_date) as years,MONTHNAME(BC_date) as months,count(B_ID) as number_Booking ,sum(totalprice)as Total_Sale  FROM `book_car` join carinfo on book_car.C_ID=carinfo.C_ID group by months,carinfo.C_ID Order by BC_date";


$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) { ?>
	<div id="sales1">
	<p>The sale made by each car: </p>
    <table id="sales">
		<tr>
			<th>Car ID</th>
			<th>Year</th>
			<th>Month</th>
			<th>Number Of Booking</th>
			<th>Total Price</th>
		</tr>
     
   <?php 
		
		while($row3 = $result3->fetch_assoc()) 
		{ ?>
        <tr>
			<td><?php echo $row3['C_ID'];?></td>
			<td><?php echo $row3['years'];?></td>
			<td><?php echo $row3['months'];?></td>
			<td><?php echo $row3['number_Booking'];?></td>
			<td><?php echo $row3['Total_Sale'];?></td>
			
		</tr>
		
	<?php	
		}
	
}
	?>
	</table>
	
	</div>
	

</body>
</html>