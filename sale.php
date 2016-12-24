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
		<li class='active'><a href='sale.php'>Sale</a></li>
		<li><a href='summary.php'>Booking Summary</a></li>
		<li><a href='month.php'>Monthly Sale Report</a></li>
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

$sql = "SELECT book_car.C_ID, carinfo.C_model,sum(totalprice)as sales FROM book_car inner join carinfo on book_car.C_ID=carinfo.C_ID group by book_car.C_ID,carinfo.C_model
order by sales" ;
$sql2="SELECT sum(totalprice) as Total_Sales FROM book_car";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) { ?>
	<div id="sales1">
	<p>The sale made by each car: </p>
    <table id="sales">
		<tr>
			<th>Car ID</th>
			<th> Car model</th>
			<th>Highest Sales made</th>
		</tr>
     
   <?php 
		$totalprice=0;
		while($row1 = $result->fetch_assoc()) 
		{ ?>
        <tr>
			<td><?php echo $row1['C_ID'];?></td>
			<td><?php echo $row1['C_model'];?>
			<td><?php echo $row1['sales'];?><td>
			<?php $totalprice+=$row1['sales']; ?>
		</tr>
		
	<?php	
		}
	
}
	?>
	</table>
	<strong><?php echo "The Total Sales is : $totalprice";?></strong>
	</div>
	

</body>
</html>