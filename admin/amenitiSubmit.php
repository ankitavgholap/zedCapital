<?php
	include_once('config.php');

    
    if (isset($_REQUEST['insert']))
    {
        if(!empty($_REQUEST['name']))
        {  
            $name = $_REQUEST['name'];
        }  
        else{
            $name = "";
        }

        if(!empty($_REQUEST['type']))
        {  
            $type = $_REQUEST['type'];
        }  
        else{
            $type = "";
        }
        
        if(!empty($_REQUEST['status']))
        {
            $status = $_REQUEST['status'];
        }  
        else{
            $status = "";
        }
      
        if(isset($_FILES['icon']['name']))
        {
            $jpg = $_FILES['icon']['name'];
            $valid_extensions = array('jpg','png','svg'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/amenitiesIcon/";
                $file_parts = pathinfo($_FILES["icon"]["name"]);
                $file_path = $_FILES["icon"]["name"];

                move_uploaded_file($_FILES["icon"]["tmp_name"], $cpath . $file_path);
                
                $icon = $cpath . $file_path;
            }
        }
        else 
        {
            echo 'icon is not set';
        }  

        $sql = "INSERT INTO `amenities`(`name`,`type`,`icon`,`status`)
                VALUES ('".$name."','".$type."', '".$icon."', '".$status."')";
        if(mysqli_query($db,$sql))
        {
            header('Location: amenities.php');
        }
        else
        {
            echo 0;
        }
    }

if (isset($_REQUEST['edit'])) 
{		
    $eid=$_REQUEST['eid'];
    $name = $_REQUEST['name'];
    $type = $_REQUEST['type'];
    $status = $_REQUEST['status'];
    $updated_at=date("Y-m-d H:i:s");  
    

    $sql="update amenities set name='$name',type='$type',updated_at='$updated_at',status='$status' ";

        if($_FILES['icon']['name']!="")
        {
            $jpg = $_FILES['icon']['name'];
            $valid_extensions = array('jpg','png','svg'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/amenitiesIcon/";
                $file_parts = pathinfo($_FILES["icon"]["name"]);
                $file_path = $_FILES["icon"]["name"];

                move_uploaded_file($_FILES["icon"]["tmp_name"], $cpath . $file_path);
                
                $icon = $cpath . $file_path;
            }
        }
        if(isset($icon))
        {
            $sql .= ",`icon`='$icon' ";
        } 
        
            $sql .= "where id=$eid";
        
    if (mysqli_query($db,$sql) )
    {                
        header('Location: amenities.php');
    }
    else
    {
        echo 0;
    }
}

if(isset($_REQUEST['did']))
{
	$did=$_REQUEST['did'];
	if(mysqli_query($db,"delete from amenities where id=$did"))
    {	
        header('Location: amenities.php');
	}
    else
    {
        echo 0;
	}	
}
?>