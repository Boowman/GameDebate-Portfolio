<?php
	include_once("database/connect.php");

	$username = $_POST['user'];
	if(isset($username))
	{
		$password = $_POST['password'];
		$md5pass = md5($password);
		
		$check_user = "SELECT ID,username,password,avatar,rank FROM Members ";
		$check_user .= "WHERE username = '".$username."'";
		
		$checkuser_query = mysqli_query($dbconnection,$check_user);

		while($row = mysqli_fetch_array($checkuser_query,MYSQL_ASSOC))
		{
			$db_userid = $row['ID'];
			$db_username = $row['username'];
			$db_password = $row['password'];
			$db_avatar = $row['avatar'];
			$db_rank = $row['rank'];
		}
		
		if(!empty($db_password) and ($md5pass == $db_password))
		{
			setcookie("LoginAuthorised","LoginAuthorised",time()+7200,"/");
			setcookie("id",$db_userid,time()+7200,"/");
			setcookie("username",$db_username,time()+7200,"/");
			setcookie("avatar",$db_avatar,time()+7200,"/");
			setcookie("rank",$db_rank,time()+7200,"/");
			header("Location: user.php?value=confirm");
		}else
		{
			echo '<div class="error">Password does not match</div>';
			echo $hash_pass;
		}		
	}
	
		echo '<p></p><p></p>
			 <div id="lg_login_form">
				<form name="login_form" method="post">
					<div id="lg_login_title">Log In</div>
						<div id="lg_login_form2">
						<label>Username:</label>
						<input type="text" name="user" id="username" value="" maxlength="20" />
						<label>Password:</label>
						<input type="password" name="password" value="" maxlength="20" />
						<input name="submit_login" type="submit" value="Log In" id="lg_submit_log" />
						<div id="lg_control_text">
							You have to login to access User Panel<br/>
							Username: demo<br/>
							Password: demo<br/>
						</div>
						<hr/>
					</div>
				</form>
			<form name="register_redirect" action="user.php?value=register" method="post" id="lg_register_redirect" >
				<label>If you want to login you have to register first. Registering takes only a few moments and it gives you multiple features.<br/></label>
				<input name="submit_registration" type="submit" value="Register" id="lg_submit_reg_log" />
				<p></p>
			</form>
		</div>';
		
	mysqli_close($dbconnection);
?>