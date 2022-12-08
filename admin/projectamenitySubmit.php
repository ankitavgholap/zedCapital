<?php
	include_once('config.php');
    
    if (isset($_REQUEST['insert']))
    {
        if(!empty($_REQUEST['project']))
        {  
            $project = $_REQUEST['project'];
        }  
        else{
            $project = "";
        }

        foreach($_REQUEST['amenity'] as $ameniti)
        {
            $create=mysqli_query($db,$sql = "INSERT INTO `project_amenities`(`project_id`,`ameniti_id`)
            VALUES ('".$project."','".$ameniti."')");   
        }
   
        if($create)
        {
            header('Location: projectamenities.php');
        }
        else
        {
            echo 0;
        }
    }

if (isset($_REQUEST['edit'])) 
{		
    $eid=$_REQUEST['eid'];
    $project = $_REQUEST['project'];
    
    if($_REQUEST["amenity"])
    {
        mysqli_query($db,"delete from project_amenities where project_id=$project");       
        
        foreach($_REQUEST['amenity'] as $ameniti)
        {
            $create=mysqli_query($db,$sql = "INSERT INTO `project_amenities`(`project_id`,`ameniti_id`)
            VALUES ('".$project."','".$ameniti."')");   
        }
    }
                        
    header('Location: projectamenities.php');
    
}

if(isset($_REQUEST['did']))
{
	$did=$_REQUEST['did'];
	if(mysqli_query($db,"delete from project_amenities where id=$did"))
    {	
        header('Location: projectamenities.php');
	}
    else
    {
        echo 0;
	}	
}
?>