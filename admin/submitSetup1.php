<?php

   $timezone = $_REQUEST['timezone'];
   $hostname = $_REQUEST['hostname'];
   $user = $_REQUEST['dbuser'];
   $pwd = $_REQUEST['password'];
   $dbname = $_REQUEST['db_name'];
    
   $text = '<?php
date_default_timezone_set("'.$timezone.'");
$mysql_hostname = "'.$hostname.'";
$mysql_user = "'.$user.'";
$mysql_password = "'.$pwd.'";
$mysql_database = "'.$dbname.'";
$db = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Database Connection Problem a");';

file_put_contents('config.php',$text);

    if(filesize('config.php') == 0)
	{
      header('Location: setup.php');
    }
	else
	{  
	  try 
	  { 
		include_once('config.php');

		//create new db
		$sql = "CREATE DATABASE IF NOT EXISTS ".$dbname; 
		
		if(!mysqli_query($db, $sql)){
		   header('Location: setup.php');
		}
		mysqli_select_db($db, $mysql_database) or die("Database Connection Problem b");
		
		$text2 = 'mysqli_select_db($db, $mysql_database) or die("Database Connection Problem b");';
		
		file_put_contents('config.php',$text . $text2);
		
		//create table of admin user
		$sql = "CREATE TABLE admin_user(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			username VARCHAR(255) NOT NULL,
			password VARCHAR(255) NOT NULL,
			access_level INT NOT NULL,
			name VARCHAR(255) NOT NULL,
			project VARCHAR(30) NOT NULL)";
			
		if(!mysqli_query($db, $sql)){
			header('Location: setup.php');
		} 
		
		//create table of leads
		$sql = "CREATE TABLE leads(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(255) NULL,
			email VARCHAR(255) NULL,
			mobile VARCHAR(255) NULL,
			utm_source VARCHAR(255) NULL,
			utm_medium VARCHAR(255) NULL,
			utm_campaign VARCHAR(255) NULL,
			created_at TIMESTAMP NULL)";
			
		if(!mysqli_query($db, $sql)){
			header('Location: setup.php');
		} 
		
		//create table of configuration
		$sql = "CREATE TABLE configuration(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(255) NULL,
		    favicon TEXT NULL,
			logo TEXT NULL,
			status INT NULL,
			created_at TIMESTAMP NULL)";
			
		if(!mysqli_query($db, $sql)){
			header('Location: setup.php');
		} 	
      
        header('Location: createUser.php');
	  }
	  catch(\Throwable $e)
	  {
		  throw $e; 
	  }
	}