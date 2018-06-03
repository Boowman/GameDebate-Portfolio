<?php
	include_once("database/connect.php");
	
	if(isset($_POST['cancel_registration']))
	{
		header("Location: index.php");
	}
		$user = $_POST['userform'];	
		$pass = $_POST['passwordform'];		
		$conpass = $_POST['confirm_passwordform'];
		$email = $_POST['emailform'];
		$conemail = $_POST['confirm_emailform'];
		$avatar = $_POST['image_linkform'];
		$description = $_POST['description_form'];
		$steam = $_POST['steamform'];
		$youtube = $_POST['youtubeform'];
		$date = $_POST['dateform'];
		$date_output = $_POST['output_date'];
		$IP = $_POST['IPform'];
		
		//Default Value		
		if(empty($avatar))
		{	$avatar = "images/navigation/loggedin/avatar.gif";	}
		
		// Select from MySQL
		$checkdetails = mysqli_query($dbconnection,"SELECT * FROM Members");
		
		while($row = mysqli_fetch_array($checkdetails))
		{
			$db_username = $row['username'];
			$db_email = $row['email'];
		}
		
		if(isset($_POST['submit_registration']))
		{	
			if(empty($user) or empty($pass) or empty($conpass) or empty($email) or empty($conemail))
			{
				echo '<div class="error">Please check all the fields again and make sure they are correct.</div>';
			}
			else
			{	
				if($user == $db_username)
				{
					echo '<div class="error">Username already exists.</div>';
					$user_continue = false;
					
				}else{ $user_continue = true; }
				
				if(strlen($user) < 3)
				{
					echo '<div class="error">Username is to short min 3 characters.</div>';
					$user_continue = false;
					
				}else{ $user_continue = true; }
				
				if($email != $conemail)
				{
					echo '<div class="error">Email does not match.</div>';
					$email_continue = false;
					
				}else{ $email_continue = true; }
				
				if($email == $db_email)
				{
					echo '<div class="error">Email already exists.</div>';
					$email_ex_continue = false;
					
				}else{ $email_ex_continue = true; }
				
				if($pass != $conpass)
				{
					echo '<div class="error">Passwords does not match.</div>';
					$pass_continue = false;			
				}
				else{ $pass_continue = true; }
				
				if(strlen($pass) < 4)
				{
					echo '<div class="error">Password is to short min 4 characters.</div>';
					$pass_continue = false;
					
				}else{ $pass_continue = true; }		
						
			}// Check Empty Fields
			
			if($user_continue == true and $email_continue == true and $email_ex_continue == true and $pass_continue == true ){
				if($pass == $conpass and $email == $conemail and $user )
				{
					// Escapse SQL Injection
					$r_user = mysqli_real_escape_string($dbconnection,$user);
					$r_pass = mysqli_real_escape_string($dbconnection,$pass);
					$r_pass_con = mysqli_real_escape_string($dbconnection,$conpass);
					$r_email = mysqli_real_escape_string($dbconnection,$email);
					$r_email_con = mysqli_real_escape_string($dbconnection,$conemail);
					$r_avatar = mysqli_real_escape_string($dbconnection,$avatar);
					$r_desc = mysqli_real_escape_string($dbconnection,$description);
					$r_steam = mysqli_real_escape_string($dbconnection,$steam);
					$r_youtube = mysqli_real_escape_string($dbconnection,$youtube);
					
					// Password Protection
					
					$user_sql = "INSERT INTO Members (";
					$user_sql .= "username, ";
					$user_sql .= "password, ";
					$user_sql .= "conpassword, ";
					$user_sql .= "email, ";
					$user_sql .= "conemail, ";
					$user_sql .= "avatar, ";
					$user_sql .= "description, ";
					$user_sql .= "steam, ";
					$user_sql .= "youtube, ";
					$user_sql .= "date, ";
					$user_sql .= "output_date, ";
					$user_sql .= "ip, ";
					$user_sql .= "rank_name, ";
					$user_sql .= "rank, ";
					$user_sql .= "salt ";
					$user_sql .= ") ";
					
					$user_sql .= "VALUES ";
					{
						$user_sql .= "(";
						$user_sql .= "'$r_user', ";
						$user_sql .= "MD5('$r_pass'), ";
						$user_sql .= "MD5('$r_pass_con'), ";
						$user_sql .= "'$r_email', ";
						$user_sql .= "'$r_email_con', ";
						$user_sql .= "'$r_avatar', ";	
						$user_sql .= "'$r_desc', ";
						$user_sql .= "'http://www.steamcommunity.com/id/$r_steam', ";
						$user_sql .= "'http://www.youtube.com/user/$r_youtube', ";
						$user_sql .= "'$date', ";
						$user_sql .= "'$date_output', ";
						$user_sql .= "'$IP', ";
						$user_sql .= "'User', ";
						$user_sql .= "'10', ";
						$user_sql .= "'$salt' ";
						$user_sql .= ") ";
					}
					
					if(mysqli_query($dbconnection,$user_sql))
					{
						die();					
					}else
					{
						echo '<div class="error" >There was a problem.<br/>'.mysqli_error().'</div>';
					}
				} // Check if empty
			}// Check if true
	}//If Submit button pressed.

		echo '
		<br/>&nbsp;&nbsp;&nbsp;&nbsp;Please enter a valid e-mail address, if the email is not valid you will not receive any news or messages.
		<hr/>
		<form name="registration" action="'.$redirect.'" method="post">
			<div id="register">
				<div id="register_title">Registration Form</div>
				<div id="registration_form">
                    <label>Username:</label>
                    <input type="text" name="userform" id="username" maxlength="12" />
                    <div class="optional"><label>Min 3 char and Maximum 12 char.<br/></label></div>
                    <label>Password:</label>
                    <input type="password" name="passwordform" maxlength="20" />
                    <div class="optional"><label>Min 4 char and Maximum 20 char<br/></label></div>
                    <label>Confirm Password:</label>
                    <input type="password" name="confirm_passwordform" maxlength="20" />
                    <label>E-mail address:</label>
                    <input type="text" name="emailform" />
                    <label>Confirm e-mail address:</label>
                    <input type="text" name="confirm_emailform" />
                    <label>SteamProfile Profile ID:</label>
                    <input type="text" name="steamform" />
                    <div class="optional"><label>Optional<br/></label></div>
                    <label>Youtube Name:</label>
                    <input type="text" name="youtubeform" />
                    <div class="optional"><label>Optional<br/></label></div>
					<input name="dateform" type="hidden" value="'.date('M d o h:i:s').'"/>
					<input name="output_date" type="hidden" value="'.date('M d o').'"/>
					<input name="IPform" type="hidden" value="'.$_SERVER['REMOTE_ADDR'].'"/>
                </div>
			</div><!-- End Register Box -->
			
		  <div id="register_avatar">
				<div id="register_avatar_title">Select Your Avatar</div>
				<div id="rules">
					<ul>
						<li>Maximum image size allowed is 128x128.</li>
						<li>Use only jpg,jpeg or png images.</li>
						<li>Maximum file size is 60.00 Kb.</li>
						<li>Do not use macro or porn images.</li>
					</ul>
				</div> 
				<div id="avatar_solution">
					<label>Link Image:</label>
					<input type="text" name="image_linkform" size="39" /><br/>
					<label>Upload:</label>
					<input name="image_uploadform" type="file" /><br/>
				</div>
		  </div><!-- End Select Box -->
			
			<div id="register_description">
				<div id="register_description_title">Write a short description.</div>
				<textarea name="description_form" cols="45" rows="6" id="description_box" ></textarea>
			</div><!-- End Description Box -->
            
          <div id="submit_reg" ><input name="submit_registration" type="submit" /></div>          
		  </form>
		  <div id="cancel_reg" >
			<form name="cancel_registration" method="post">
				<input name="cancel_registration" type="submit" value="Cancel" />
		  	</form>
		  </div>';
		  
		mysqli_free_result($checkdetails);
		mysqli_close($dbconnection);

?>