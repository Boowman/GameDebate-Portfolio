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
<link href="css/admin_content.css" rel="stylesheet" type="text/css">
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
    <div id="admin_content">
        <div id="main_left">
         
        	<!--Firt tab from moderation tab-->      
        	<div class="options">
                <div class="option_title">Main</div>
                <div class="pick_link">
                <ul class="options_link">
                	<li><a href="admin.php?area=news">News and Newsletters</a></li>
                    <li><a href="admin.php?area=project">Projects</a></li>
                    <li><a href="admin.php?area=nav-tabs">Navigation Tabs</a></li>
                </ul>
                </div>
            </div>
            
            <!--Second tab from moderation tab-->   
            <div class="options">
                <div class="option_title">Configuration</div>
                <div class="pick_link">
                <ul class="options_link">
                	<li><a href="admin.php?area=server">Server Settings</a></li>
                    <li><a href="admin.php?area=edit-news">Edit News</a></li>
                    <li><a href="admin.php?area=edit-project">Edit Projects</a></li>
                </ul>
                </div>
            </div>
            
            <!--Third tab from moderation tab-->   
            <div class="options">
                <div class="option_title">Members</div>
                <div class="pick_link">
                <ul class="options_link">
                	<li><a href="admin.php?area=members">Manage Member List</a></li>
                    <li><a href="admin.php?area=ranks">Member Ranks</a></li>
                    <li><a href="admin.php?area=register">Add new member</a></li>
                    <li><a href="admin.php?area=banned">Ban List</a></li>
                </ul>
                </div>
            </div>
    	</div><!-- End Main Left -->
        <?php 
			$linkname = $_GET['area'];
			if($linkname == "news")				{$linkname = "News and Newsletters";	}
			elseif($linkname == "project")		{$linkname = "Projects";				}
			elseif($linkname == "nav-tabs")		{$linkname = "Add Navigation Tabs";		}
			elseif($linkname == "server")		{$linkname = "Server Settings";			}
			elseif($linkname == "edit-news")	{$linkname = "Edit News";				}
			elseif($linkname == "edit-project")	{$linkname = "Edit Projects";			}
			elseif($linkname == "members")		{$linkname = "Manage Member List";		}
			elseif($linkname == "ranks")		{$linkname = "Member Ranks";			}
			elseif($linkname == "register")		{$linkname = "Add new member";			}
			elseif($linkname == "banned")		{$linkname = "Ban List";				}
			else{$linkname = "To-Do List";}
        ?>
        <div id="main_right">
        	<div class="option_title"><?php echo '&nbsp;&nbsp;&nbsp;'.$linkname; ?></div>
            </div><!-- End Main Right -->
        </div><!-- End Content -->
    
    <div id="copyright">
    	<p>
		&copy; Copyright 2013 All right Reserved. This website was created by <a href="http://steamcommunity.com/id/Boowman">Boowman</a><br>
        The website is still under construction so there will be bugs. If you find any bugs please report it to me.
        </p>
    </div>
  </div><!-- End Index Content -->
</div><!-- End Body Container -->
</body>
</html>