	<div id="cssmenu">
    	<ul>
           <li><a href="index.php"><span>News</span></a></li>
           <li><a href="#"><span>Projects</span></a></li>
           <li><a href="#"><span>Contact</span></a></li>
           <li><a href="#"><span>Members</span></a></li>
        <?php  
			$check_rank = $_COOKIE['rank'];
			if($cookie and isset($check_rank) and $check_rank == 1)
			{
				echo '<li class="last"><a href="admin.php"><span>Administrator</span></a></li>';
			}
		?>
    	</ul>
  	  </div>