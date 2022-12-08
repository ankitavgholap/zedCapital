<?php
	    include_once('config.php');
	   
	    $companyName = $_REQUEST['comp_name'];
		$target_dir = "images/";
		$target_file1 = '';
		$target_file2 = '';
		
		if(isset($_FILES['favicon'])) 
		{ 
			//Process the image that is uploaded by the user			
			$target_file1 = $target_dir . basename($_FILES["favicon"]["name"]);

			if (!move_uploaded_file($_FILES["favicon"]["tmp_name"], $target_file1)) 
			{
				header('Location: createCompany.php');
			} 
		}
		
		if(isset($_FILES['logo'])) 
		{
			//Process the image that is uploaded by the user			
			$target_file2 = $target_dir . basename($_FILES["logo"]["name"]);

			if (!move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file2)) 
			{
				header('Location: createCompany.php');
			} 
		}

		$sql = "INSERT INTO configuration (name, favicon, logo, status, created_at) VALUES ('" .$companyName . "','".$target_file1."','".$target_file2."',1,now())"; 
		
		if(mysqli_query($db, $sql))
		{ 
			header('Location: index.php');   
		}
		else
		{
			header('Location: createCompany.php');
		}
		