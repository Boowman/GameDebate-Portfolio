<?php
	$loginfile = "includes/header_login.php";
	$loggedinfile = "includes/header_loggedin.php";
	$nav_links = "includes/navigation_links.php";
	$usercp_login = "includes/usercp_login.php";
	$registerfile = "includes/registerform.php";
	$userprofile = "includes/user_profile.php";

?>
<!DOCTYPE html>
<html class>
<head>
<title>Boowman'sPortofolio</title>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(images/bg.png);
	background-repeat: repeat;
}
</style>
<link href="css/header.css" rel="stylesheet" type="text/css" />
<link href="css/index-content.css" rel="stylesheet" type="text/css" />
<link href="css/controlpanel_content.css" rel="stylesheet" type="text/css" />
<link href="css/registration_content.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="body-container">
  <div id="header">
    <div id="navigation">
    	<a href="index.php"><img src="images/navigation/logo.png" id="hd_logo" alt="Logo" /></a>
		<?php
			$cookie = $_COOKIE["LoginAuthorised"] == "LoginAuthorised";	
			if($cookie)
			{
				if(file_exists($loggedinfile)) {	include($loggedinfile);	}
			}else
			{
            	if(file_exists($loginfile)) {	include($loginfile);	}
			}
        ?>         
    </div>
	</div><!-- End Header -->
  <div id="indxcontent">
    <?php 
		if(file_exists($nav_links)){ include($nav_links); }
	?>
    <div id="reg_content">
    <?php
	$value = $_GET['value'];

	if($value == "confirm")
	{
		echo '<br/><hr/>
			<div class="logged_in">
			You have been successfully logged in.<br/>
			<a href="index.php">Go to Home Page.</a>
			</div>
			<br/><br/>
			<hr/>';			
	}
	if($cookie and $value == "")
	{	
		if(file_exists($userprofile))
		{
			include($userprofile);
		}else
			{
			echo '<br/><hr/>
				<div class="logged_in">
					Profile Is Missing.
				</div>
				<br/><br/>
				<hr/>';
		}
	}
	else
	{
		if($value == "logout")
		{
			echo '<br/><hr/>
				<div class="logged_in">
				You have been successfully logged out.<br/>
				<a href="index.php">Go to home page.</a>
				</div>
				<br/><br/>
				<hr/>';
		}elseif($value == "register")
		{
			if(file_exists($registerfile))
			{
				include($registerfile);
			}else
			{
				echo 'Registration has been disabled temporarly.';
			}
		}elseif($value == "login")
		{
			if(file_exists($usercp_login))
			{
				include($usercp_login);
			}else
			{
				echo 'Login form does not exist.';
			}
		}
		elseif($value == "done")
		{
			echo '<br/><hr/>
				  <div class="logged_in">
					You have been registered.<br/>
					<a href="user.php?value=login">You can login.</a>
				  </div>
				<br/><br/>
				<hr/>';
			header('Refresh: 3; url=index.php');
		}
	}
	?>  
    </div><!-- End Content -->
    <div id="copyright">
        &copy; Copyright 2013 All right Reserved. This website was created by <a href="http://steamcommunity.com/id/Boowman">Boowman</a><br/>
        The website is still under construction so there will be bugs. If you find any bugs please report it to me.
    </div>
  </div><!-- End Index Content -->
</div><!-- End Body Container -->
</body>
</html>