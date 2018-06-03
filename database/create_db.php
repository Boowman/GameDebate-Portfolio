<?php
	echo "<h2>Create Your Databases.</h2>";
	include_once("connect.php");
	
	if(isset($_POST['register_btn'])){
			$sql ="CREATE TABLE ".$_POST['members']." (";
			$sql .= "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
			$sql .= "username VARCHAR(12) NOT NULL, ";
			$sql .= "password VARCHAR(128) NOT NULL, ";
			$sql .= "conpassword VARCHAR(128) NOT NULL, ";
			$sql .= "email VARCHAR(50) NOT NULL, ";
			$sql .= "conemail VARCHAR(50) NOT NULL, ";
			$sql .= "avatar VARCHAR(200) NOT NULL, ";
			$sql .= "description VARCHAR(1000) NOT NULL, ";
			$sql .= "steam VARCHAR(50) NOT NULL, ";
			$sql .= "youtube VARCHAR(50) NOT NULL, ";
			$sql .= "date VARCHAR(25) NOT NULL, ";
			$sql .= "output_date VARCHAR(25) NOT NULL, ";
			$sql .= "ip VARCHAR(15) NOT NULL, ";
			$sql .= "rank_name VARCHAR(20) NOT NULL, ";
			$sql .= "rank INT NOT NULL, ";
			$sql .= "salt VARCHAR(128) NOT NULL, ";
			$sql .= "UNIQUE (username) ";
			$sql .= ")";
	
		if(empty($_POST['members'])){
			echo 'Register table field is empty, please enter a name before submiting it.';
		}else
		{
			if (mysqli_query($dbconnection,$sql))
			{
			  echo "Database ".$_POST['members']." created successfully.<br/>";
			  echo $sql."<br/>";
			}else
			{
			  echo "Error creating database: ".$_POST['members']."". mysqli_error($dbconnection);
			}
		}
	}
	
	if(isset($_POST['news_btn'])){
				$sql ="CREATE TABLE ".$_POST['news']." (";
				$sql .= "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
				$sql .= "Title VARCHAR(50) NOT NULL, ";
				$sql .= "Image VARCHAR(100) NOT NULL, ";
				$sql .= "Date VARCHAR(20) NOT NULL, ";
				$sql .= "Description VARCHAR(1000) NOT NULL ";
				$sql .= ")";
		
		if(empty($_POST['news'])){
			echo 'News table field is empty, please enter a name before submiting it.';
		}
		else
		{
			if (mysqli_query($dbconnection,$sql))
			{
			  echo "Database ".$_POST['news']." created successfully.<br/>";
			  echo $sql."<br/>";
			}else
			{
			  echo "Error creating database: ".$_POST['news']."". mysqli_error($dbconnection);
			}		
		}
	}
	
	if(isset($_POST['project_btn'])){
				$sql ="CREATE TABLE ".$_POST['projects']." (";
				$sql .= "ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
				$sql .= "Title VARCHAR(50) NOT NULL, ";
				$sql .= "Image VARCHAR(50) NOT NULL, ";
				$sql .= "Date VARCHAR(20) NOT NULL ";
				$sql .= ")";
		
		if(empty($_POST['projects'])){
			echo 'News table field is empty, please enter a name before submiting it.';
		}
		else
		{
			if (mysqli_query($dbconnection,$sql))
			{
			  echo "Database ".$_POST['projects']." created successfully.<br/>";
			  echo $sql."<br/>";
			}else
			{
			  echo "Error creating database: ".$_POST['projects']."". mysqli_error($dbconnection);
			}
		}
	}
	
	echo '<form action="" method="post" >
			<p>Members Table Name:
			<input name="members" type="text" maxlength="30">Do not use spaces.<br/></p>
			<input name="register_btn" type="submit" value="Submit">
		  </form>';
	echo '<form action="" method="post" >
			<p>News Table Name:
			<input name="news" type="text" maxlength="30">Do not use spaces.<br/></p>
			<input name="news_btn" type="submit" value="Submit">
		  </form>';
		  
	echo '<form action="" method="post" >
			<p>Projects Table Name:
			<input name="projects" type="text" maxlength="30">Do not use spaces.<br/></p>
			<input name="project_btn" type="submit" value="Submit">
		  </form>';
	echo '<a href="../database/">Go Back</a>';
	
	mysqli_close($dbconnection);

?>