<?php
	include('conn.php');
		echo $_POST['Title'];
		echo '<br>';
		echo $_POST['News'];
		echo '<br>';
		echo $_POST['id_number'];
		
		$sql="UPDATE `update_news` SET `Title`='$_POST[Title]',`News`='$_POST[News]' WHERE `Id`='$_POST[id_number]'";
		if (!mysql_query($sql))
			  {
			  die('Error: ' . mysql_error());
			  
			  }
		header('location: manage_homepage.php');
?>