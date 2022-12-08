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

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));


        if(!empty($_REQUEST['title']))
        {  
            $title = $_REQUEST['title'];
        }  
        else{
            $title = "";
        }
        
        if(!empty($_REQUEST['description']))
        {  
            $description = $_REQUEST['description'];
        }  
        else{
            $description = "";
        }

        if(!empty($_REQUEST['status']))
        {
            $status = $_REQUEST['status'];
        }  
        else{
            $status = "";
        }

        
      
        if(isset($_FILES['mob_banner']['name']))
        {
            $jpg = $_FILES['mob_banner']['name'];
            $valid_extensions = array('jpg','png'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/mobile_banner/";
                $file_parts = pathinfo($_FILES["mob_banner"]["name"]);
                $file_path = $_FILES["mob_banner"]["name"];

                move_uploaded_file($_FILES["mob_banner"]["tmp_name"], $cpath . $file_path);
                
                $mobile_banner = $cpath . $file_path;
            }
        }
        else 
        {
            echo 'mobile banner not set';
        }  
        if(isset($_FILES['desk_banner']['name']))
        {
            $jpg = $_FILES['desk_banner']['name'];
            $valid_extensions = array('jpg','png'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/desktop_banner/";
                $file_parts = pathinfo($_FILES["desk_banner"]["name"]);
                $file_path = $_FILES["desk_banner"]["name"];

                move_uploaded_file($_FILES["desk_banner"]["tmp_name"], $cpath . $file_path);
                
                $desktop_banner = $cpath . $file_path;
            }
        }
        else 
        {
            echo 'Desktop banner not set';
        }       
        $sql = "INSERT INTO `locations`(`name`,`slug`,`title`,`mob_banner`,`desk_banner`, `description`,`status`)
                VALUES ('".$name."','".$slug."','".$title."','".$mobile_banner."','".$desktop_banner."', '".$description."', '".$status."')";
        if(mysqli_query($db,$sql))
        {
            // $_SESSION['locationcreate'] = 'Successfully create position';
            header('Location: locations.php');
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
        $title = $_REQUEST['title'];
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        $description = $_REQUEST['description'];
        $status = $_REQUEST['status'];
        $updated_at=date("Y-m-d H:i:s");
        $mobile_banner = null;   
        $desktop_banner = null;
        
        $sql="update locations set name='$name',title='$title',slug='$slug',description='$description', updated_at='$updated_at',status='$status' ";

            if(isset($_FILES['mob_banner']['name']))
            {
                $jpg = $_FILES['mob_banner']['name'];
                $valid_extensions = array('jpg','png');
                        
                $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
                
                if(in_array($ext, $valid_extensions)) 
                {
                    $cpath="uploads/mobile_banner/";
                    $file_parts = pathinfo($_FILES["mob_banner"]["name"]);
                    $file_path = $_FILES["mob_banner"]["name"];

                    move_uploaded_file($_FILES["mob_banner"]["tmp_name"], $cpath . $file_path);
                    
                    $mobile_banner = $cpath . $file_path;
                }
            }

            if(isset($mobile_banner))
            {
                $sql .= ",`mob_banner`='$mobile_banner' ";
            }

            if(isset($_FILES['desk_banner']['name']))
            {
                $jpg = $_FILES['desk_banner']['name'];
                $valid_extensions = array('jpg','png'); // valid extensions
                        
                $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
                
                if(in_array($ext, $valid_extensions)) 
                {
                    $cpath="uploads/desktop_banner/";
                    $file_parts = pathinfo($_FILES["desk_banner"]["name"]);
                    $file_path = $_FILES["desk_banner"]["name"];

                    move_uploaded_file($_FILES["desk_banner"]["tmp_name"], $cpath . $file_path);
                    
                    $desktop_banner = $cpath . $file_path;
                }
            }

            if(isset($desktop_banner))
            {
                $sql .= ",`desk_banner`='$desktop_banner' ";
            }
        
            $sql .= "where id=$eid";        

            if (mysqli_query($db,$sql) )
            {                
                header('Location: locations.php');
            }
            else
            {
                echo 0;
            }
    }

if(isset($_REQUEST['did']))
{
	$did=$_REQUEST['did'];
	if(mysqli_query($db,"delete from locations where id=$did"))
    {	
        header('Location: locations.php');
	}
    else
    {
        echo 0;
	}	
}
?>