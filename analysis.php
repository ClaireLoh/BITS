<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="wallpaper.css"/>
<style>
table, th, td {
     border: 1px solid black;
	 background-color:#FFE4E1;
}

</style>
</head>
<body id="body">

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
$sql1="SELECT book_car.U_ID,user.U_name,user.IC,user.address,user.contact,book_car.C_ID,carinfo.C_model,book_car.totalprice FROM carinfo join book_car on book_car.C_ID=carinfo.C_ID join user on book_car.U_ID=user.U_ID ORDER BY book_car.totalprice";
$sql2="SELECT sum(totalprice) as Total_Sales FROM book_car";
$sql3="SELECT carinfo.C_ID,YEAR(BC_date) as years,MONTHNAME(BC_date) as months,count(B_ID) as number_Booking ,sum(totalprice)as Total_Sale  FROM `book_car` join carinfo on book_car.C_ID=carinfo.C_ID group by months,carinfo.C_ID Order by BC_date";
$result = $conn->query($sql);
$result1=$conn->query($sql1);
$result2=$conn->query($sql2);
$result3=$conn->query($sql3);
if ($result->num_rows > 0) {
	echo "The sale made by each car:";
    echo "<table><tr><th>Car ID</th><th> Car model</th><th>Highest Sales made</th></tr>";
    // output data of each row
    while($row1 = $result->fetch_assoc()) {
        echo "<tr><td>".$row1['C_ID']."</td><td>".$row1['C_model']."<td>".$row1['sales']."<td>";
		echo "<br/>";
		echo"<br/>";
		
    }
    echo "</table>";
} else {
    echo "0 results";
}


if ($result1->num_rows > 0) {
	echo "The summary of booking made :";
    echo "<table><tr><th>Car ID</th><th>User ID</th><th>User name</th><th>User IC</th><th>User Address</th><th>User contactno</th><th>Car Model</th><th>Total Price</th></tr>";
    // output data of each row
    while($row2 = $result1->fetch_assoc()) {
        echo "<tr><td>".$row2['C_ID']."</td><td>".$row2['U_ID']."<td>".$row2['U_name']."<td>".$row2['IC']."<td>".$row2['address']."<td>".$row2['contact']."<td>".$row2['C_model']."<td>".$row2['totalprice']."<td>";
		echo "<br/>";
		echo"<br/>";
		
    }
    echo "</table>";
} else {
    echo "0 results";
}

if ($result3->num_rows > 0) {
	echo "The sale made by each car<strong>(monthly)</strong>:";
    echo "<table><tr><th>Car ID</th><th> Year</th><th>Month</th><th>Number Of Booking</th><th>Total Price</th></tr>";
    // output data of each row
    while($row3 = $result3->fetch_assoc()) {
        echo "<tr><td>".$row3['C_ID']."</td><td>".$row3['years']."<td>".$row3['months']."<td>".$row3['number_Booking']."<td>".$row3['Total_Sale'];
		echo "<br/>";
		echo"<br/>";
		
    }
    echo "</table>";
} else {
    echo "0 results";
}	

if ($result2->num_rows > 0) {
	echo "Total Sales made :RM";
    while($row4 = $result2->fetch_assoc()) {
        echo $row4['Total_Sales'];
		echo "<br/>";
		echo "<br/>";
		
    }
    
} else {
    echo "0 results";
}
	
	


$conn->close();
?>
<a href="home.php"><button id=button2 type=button >Back </button></a>
</body>
</html>