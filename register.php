<?php include "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
 
<title>Registration</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="wallpaper.css" type="text/css" />
</head>  
<body id=body>  
<div id="main">
<?php
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username =($_POST['username']);
    $password =($_POST['password']);
    $email = ($_POST['email']);
	$gender = ($_POST['gender']);
	$IC = ($_POST['IC']);
	$address = ($_POST['address']);
	$contact = ($_POST['contact']);
     
  $checkusername = mysqli_query($conn,"SELECT * FROM user WHERE U_name = '".$username."'");
      
     if(mysqli_num_rows($checkusername) ==1)
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
     }
     else
     {
        $registerquery = mysqli_query($conn,"INSERT INTO user (U_name, password, email, gender, address,contact,IC) VALUES('".$username."', '".$password."', '".$email."','".$gender."','".$address."','".$contact."','".$IC."')");
        if($registerquery)
        {
            echo "<h1>Success</h1>";
            echo "<p>Your account was successfully created. Please <a href=\"index1.php\">click here to login</a>.</p>";
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
        }       
     }
}
else
{
    ?>
     
   <h1>Register</h1>
     
   <p>Please enter your details below to register.</p>
     
    <form method="post" action="register.php" name="registerform" id="registerform">
    <fieldset>
        <label for="username">Username:</label><input type="text" name="username" id="username" /><br /><br/>
        <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
        <label for="email">Email Address:</label><input type="text" name="email" id="email" /><br />
		<label for="gender">Gender:</label><input type="text" name="gender" id="gender" /><br />
		<label for="address">Address:</label><input type="text" name="address" id="address" /><br />
		<label for="contact">contactno:</label><input type="text" name="contact" id="contact" /><br />
		<label for="IC">IC:</label><input type="text" name="IC" id="IC" /><br /><br/><br/>
        <input type="submit" name="register" id="register" value="Register" />
    </fieldset>
    </form>
     
    <?php
}
?>
 
</div>
</body>
</html>