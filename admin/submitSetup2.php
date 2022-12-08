<?php
	    include_once('config.php');
	   
	    $user = $_REQUEST['username'];
	    $pwd = $_REQUEST['password'];

		$sql = "INSERT INTO admin_user (username, password, access_level, name, project) VALUES ('" .$user . "','".$pwd."',1,'admin','all')"; 
		
		if(mysqli_query($db, $sql))
		{
		   header('Location: createCompany.php');
		}
		else
		{
		   header('Location: createUser.php');
		}
		