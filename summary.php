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
		<li class='active'><a href='summary.php'>Booking Summary</a></li>
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

$sql1="SELECT book_car.U_ID,user.U_name,user.IC,user.address,user.contact,book_car.C_ID,carinfo.C_model,book_car.totalprice FROM carinfo join book_car on book_car.C_ID=carinfo.C_ID join user on book_car.U_ID=user.U_ID ORDER BY book_car.totalprice";;


$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) { ?>
	<div id="sales1">
	<p>The sale made by each car: </p>
    <table id="sales">
		<tr>
			<th>User ID</th>
			<th>User Name</th>
			<th>User IC</th>
			<th>User Address</th>
			<th>User Contact</th>
			<th>Car ID</th>
			<th>Car Model</th>
			<th>Total Price</th>
		</tr>
     
   <?php 
		
		while($row2 = $result1->fetch_assoc()) 
		{ ?>
        <tr>
			<td><?php echo $row2['U_ID'];?></td>
			<td><?php echo $row2['U_name'];?></td>
			<td><?php echo $row2['IC'];?></td>
			<td><?php echo $row2['address'];?></td>
			<td><?php echo $row2['contact'];?></td>
			<td><?php echo $row2['C_ID'];?></td>
			<td><?php echo $row2['C_model'];?></td>
			<td><?php echo $row2['totalprice'];?></td>
			
		</tr>
		
	<?php	
		}
	
}
	?>
	</table>
	
	</div>
	

</body>
</html>