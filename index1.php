<?php 
include "base.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>Melaka Car Rental</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="wallpaper.css" type="text/css" />
</head> 
<style>
#main{text-align:center;}
#loginform{width:500px;margin-left:220px;}
fieldset{text-align:center;}
#login{padding:20px 40px 25px;margin-left:150px;}
</style> 
<body id="body">  
<div id="main">
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
     ?>
 
     <h1>Member Area</h1>
     <p>Thanks for logging in! You are <?php echo $_SESSION['Username']?></p>
     <button id="but1"><a id="but1" href="logout.php">Log out</a></button>
	 <button id="but1"><a id="but1" href="booking.php?U_ID=<?php echo $_SESSION['U_ID']?>">View Car</a></button>
     <?php
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username =($_POST['username']);
    $password =($_POST['password']);
     
    $checklogin = mysqli_query($conn,"SELECT * FROM user WHERE U_name = '".$username."' AND Password = '".$password."'");
	
    $passid=mysqli_fetch_array($checklogin);
	$_SESSION['U_ID']=$passid['U_ID'];
	
    if(mysqli_num_rows($checklogin)==1)
    {
        $row = mysqli_fetch_array($checklogin);

        $email = $row['email'];
		
         
        $_SESSION['Username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['LoggedIn'] = 1;
         
        echo "<h1>Success</h1>";
        echo "<p>We are now redirecting you to the member area.</p>";
        echo '<script>location.href="index1.php"</script>';
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"index1.php\">click here to try again</a>.</p>";
    }
}
else
{
    ?>
     
   <h1>Member Login</h1>
     
   <p>Thanks for visiting! Please either login below, or <a href="register.php">click here to register</a>.</p>
     
    <form method="post" action="index1.php" name="loginform" id="loginform">
    <fieldset>
        <label for="username">Username:</label><input type="text" name="username" id="username" /><br/><br/>
        <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
        <input type="submit" name="login" id="login" value="Login" /><br/><br/>
    </fieldset>
	<a  href="mainpage.php">main page </a>
    </form>
     
   <?php
}
?>
 
</div>
</body>
</html>