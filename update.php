<html>
<head>
<title>Insert Car Information</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="main">
<h1><center>ADDING CAR INFORMATION</center></h1>
<div id="login">
<h2>Enter Here.....</h2>
<hr>
<form action="update.php" method="post">
<label>Car Model :</label>
<input type="text" name="C_model" id="model" required="required" placeholder="Please Enter Model"/><br /><br />
<label>Price per hour :</label>
<input type="number" name="C_price" id="price" required="required" placeholder="RMXXXX"/><br/><br />
<label>No of Passenger :</label>
<input type="number" name="C_passenger" id="passenger" required="required" placeholder="example:5 person"/><br/><br />
<label>Color of the Car :</label>
<input type="text" name="C_color" id="color" required="required" placeholder="sliver,red,blue....."/><br/><br />
<label>Image Of Car :</label>
<input type="file" name="image" id="pic" required="required" placeholder="car image"/><br/><br />
<input type="submit" value=" submit " name="submit"/><br /><br/><br/>
<a href="updatemenu.php"><button id=button2 type=button >Back </button></a>
</form>
</hr>
</div>
</div>

<?php
if(isset($_POST["submit"])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO carinfo (C_model,C_price,C_passenger,C_color,image)
VALUES ('{$conn->real_escape_string($_POST['C_model'])}', '{$conn->real_escape_string($_POST['C_price'])}','{$conn->real_escape_string($_POST['C_passenger'])}', '{$conn->real_escape_string($_POST['C_color'])}','{$conn->real_escape_string($_POST["image"])}')";

if ($conn->query($sql)=== TRUE) {
echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
} else {
echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
  
}
$conn->close();
}
?>
</body>
</html>