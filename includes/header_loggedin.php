<?php
	$logout = $_POST['submit_logout'];
	
	if($logout)
	{
		setcookie("LoginAuthorised","",time()-7200,"/");
		header("Location: user.php?value=logout");
	}		
	$username = $_COOKIE['username'];
	$avatar = $_COOKIE['avatar'];
		
	echo '<div id="lg_logged">
			<div id="lg_control">
				<a href=""><img src="images/navigation/loggedin/pms.png" width="16" height="16" /></a>
				<a href="user.php"><img src="images/navigation/loggedin/userpanel.png" width="16" height="16" /></a>
			</div>
			<div id="lg_username">'.$username.'</div>
			<img src="'.$avatar.'" height="50" id="lg_avatar" alt="No Avatar" />
		 </div>';
	echo '<form name="logout" method="post" name="register_form">
		  	<input name="submit_logout" type="submit" value="Log Out" id="lg_logout"/>			
		  </form>';
?>