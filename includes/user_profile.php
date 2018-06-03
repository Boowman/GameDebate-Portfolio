<?php
	include_once("database/connect.php");
	
	$id = $_COOKIE['id'];
	
	$select_user = "SELECT username,avatar,description,steam,youtube,output_date,rank_name  FROM Members ";
	$select_user .= "WHERE ID = '".$id."'";
	
	$select_user_query = mysqli_query($dbconnection,$select_user);
	
	while($row = mysqli_fetch_array($select_user_query,MYSQL_ASSOC))
	{
		$db_user = $row['username'];
		$db_avatar = $row['avatar'];
		$db_desc = $row['description'];
		$db_steam = $row['steam'];
		$db_youtube = $row['youtube'];
		$db_date = $row['output_date'];
		$db_rank = $row['rank_name'];
	}
	
	if(empty($db_avatar))
	{
		$db_avatar = "images/navigation/loggedin/avatar.gif";	
	}
	
	if($db_steam == "http://www.steamcommunity.com/id/")
	{
		$show_steam = false;
	}else
	{
		$show_steam = true;
	}
	
	if($db_youtube == "http://www.youtube.com/user/")
	{
		$show_youtube = false;
	}else
	{
		$show_youtube = true;
	}
	
	echo '
		<div id="profile_background"><img src="images/profile/profile-bg.png" alt="Profile Background"></div>
		<div id="profile_avatar_bg"><img src="'.$db_avatar.'" id="profile_avatar" alt="Avatar"></div>
		<div id="profile_username">'.$db_user.'</div>	
		<div id="profile_links">';
		
	echo '<ul>';
	
		if($show_steam)
		{
			echo '<li class="profile_steam" ><a href="'.$db_steam.'"><img src="images/profile/steam.png" width="16" height="16" class="profile_links_icon" >Steam Profile</a></li>';	
		}	
		
		if($show_youtube)
		{
			echo '<li class="profile_youtube" ><a href="'.$db_youtube.'"><img src="images/profile/youtube.png" width="16" height="16" class="profile_links_icon" >Youtube Profile</a></li>';
		}	
					
	echo '</ul>';
		
	echo '</div>	  
		<div id="profile_status">        
			<ul>
			<li class="profile_status_last"><div class="profile_status_name">'.$db_rank.'</div><img src="images/profile/rank/star.png" width="16" height="16" class="profile_status_icon"></li>
			<li><div class="profile_status_name">'.$db_date.'</div><img src="images/profile/date.png" width="16" height="16" class="profile_status_icon"></li>
			<li class="profile_status_first"><div class="profile_status_name">Online</div><img src="images/profile/online.png" width="16" height="16" class="profile_status_icon"></li>
		</ul>
		</div>
		<hr class="profile_separator"/>
		<div id="profile_description">
			<div id="profile_description_title">'.$db_user.'\'s Description</div>
			'.$db_desc.'
			<p></p>
		</div> 
	';
?>