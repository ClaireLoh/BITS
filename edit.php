<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<style>
#update{width:200px;margin:10px;}
.form-update{margin-left:500px;width:500px;}
</style>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Update Data Using PHP</h2>
</div>
<div class="divB">
<div class="divD">
<p>Click On The Model To update</p>
<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection,"car");
if (isset($_GET['submit'])) {
$id = $_GET['did'];
$model = $_GET['dmodel'];
$price = $_GET['dprice'];
$color = $_GET['dcolor'];
$passenger=$_GET['dpass'];
$image = $_GET['dimage'];
$query = mysqli_query($connection,"update carinfo set
C_model='$model', C_price='$price', C_color='$color',
C_passenger='$passenger',image='$image' where C_ID='$id'");
}
$query = mysqli_query($connection,"select * from carinfo");
while ($row = mysqli_fetch_array($query)) {
echo "<b><a href='edit.php?update={$row['C_ID']}'>{$row['C_model']}</a></b>";
echo "<br />";
}
?>
</div><?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = mysqli_query($connection,"select * from carinfo where C_ID=$update");
while ($row1 = mysqli_fetch_array($query1)) {
echo "<form class='form' method='get'>";
echo "<h2>Update Form</h2>";
echo "<hr/>";
echo "<div class='form-update'>";
echo"<input class='input' type='hidden' name='did' value='{$row1['C_ID']}' />";
echo "<br />";
echo "<label>" . "Model:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dmodel' value='{$row1['C_model']}' />";
echo "<br />";
echo "<label>" . "Price:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dprice' value='{$row1['C_price']}' />";
echo "<br />";
echo "<label>" . "Color:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dcolor' value='{$row1['C_color']}' />";
echo "<br />";
echo "<label>" . "passenger:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='dpass' value='{$row1['C_passenger']}' />";
echo "<br />";
echo "<label>" . "Image:" . "</label>" . "<br />";
echo"<input class='input' type='file' name='dimage' value='{$row1['image']}' />";
echo "<br />";
echo "<input class='submit' type='submit' name='submit' id='update'value='update' />";
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "</form>";
echo "</div>";
}
}
if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div><?php
mysqli_close($connection);
?>
<center><a href="updatemenu.php"><button id=button2 type=button >Back </button></a></center>
</body>
</html>