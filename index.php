<?php
	$loginfile = "includes/header_login.php";
	$loggedinfile = "includes/header_loggedin.php";
	$nav_links = "includes/navigation_links.php";
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
</head>
<body onload="MM_preloadImages('images/navigation/login/login_hv.png','images/navigation/login/register_hv.png')">
<div id="body-container">
  <div id="header">
    <div id="navigation">
    	<a href="index.php"><img src="images/navigation/logo.png" id="hd_logo" alt="Logo" ></a>
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
		if(file_exists($nav_links)){	include($nav_links);	}	
	?>
    <div id="content"></div><!-- End Content -->
    <div id="copyright">
        &copy; Copyright 2013 All right Reserved. This website was created by <a href="http://steamcommunity.com/id/Boowman">Boowman</a><br>
        The website is still under construction so there will be bugs. If you find any bugs please report it to me.
    </div>
  </div><!-- End Index Content -->
</div><!-- End Body Container -->
</body>
</html>