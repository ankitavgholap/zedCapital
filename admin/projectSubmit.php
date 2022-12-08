<?php
	include_once('config.php');
    
    if (isset($_REQUEST['insert']))
    {
        if(!empty($_REQUEST['location']))
        {  
            $location = $_REQUEST['location'];
        }  
        else{
            $location = "";
        }

        if(!empty($_REQUEST['title']))
        {  
            $title = $_REQUEST['title'];
        }  
        else{
            $title = "";
        }

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        
        if(!empty($_REQUEST['description']))
        {  
            $description = $_REQUEST['description'];
        }  
        else{
            $description = "";
        }

        if(!empty($_REQUEST['bldg_no']))
        {  
            $bldg_no = $_REQUEST['bldg_no'];
        }  
        else{
            $bldg_no = "";
        }
        
        if(!empty($_REQUEST['possession_date']))
        {  
            $possession_date = $_REQUEST['possession_date'];
        }  
        else{
            $possession_date = "";
        }
        
        if(!empty($_REQUEST['rera_no']))
        {  
            $rera_no = $_REQUEST['rera_no'];
        }  
        else{
            $rera_no = "";
        }
        
        if(!empty($_REQUEST['start_price']))
        {  
            $start_price = $_REQUEST['start_price'];
        }  
        else{
            $start_price = "";
        }

        if(!empty($_REQUEST['configuration']))
        {  
            $configuration = $_REQUEST['configuration'];
        }  
        else{
            $configuration = "";
        }

        if(!empty($_REQUEST['map_url']))
        {  
            $map_url = $_REQUEST['map_url'];
        }  
        else{
            $map_url = "";
        }

        if(!empty($_REQUEST['show_home']))
        {  
            $show_home = $_REQUEST['show_home'];
        }  
        else{
            $show_home = "";
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

        if(isset($_FILES['thumb_img']['name']))
        {
            $jpg = $_FILES['thumb_img']['name'];
            $valid_extensions = array('jpg','png'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/thumbnail_image/";
                $file_parts = pathinfo($_FILES["thumb_img"]["name"]);
                $file_path = $_FILES["thumb_img"]["name"];

                move_uploaded_file($_FILES["thumb_img"]["tmp_name"], $cpath . $file_path);
                
                $thumb_img = $cpath . $file_path;
            }
        }
        else 
        {
            echo 'thumbnail image not set';
        }

        if(isset($_FILES['brouchure']['name']))
        {
            $jpg = $_FILES['brouchure']['name'];
            $valid_extensions = array('jpg','png','pdf'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/brouchure/";
                $file_parts = pathinfo($_FILES["brouchure"]["name"]);
                $file_path = $_FILES["brouchure"]["name"];

                move_uploaded_file($_FILES["brouchure"]["tmp_name"], $cpath . $file_path);
                
                $brouchure = $cpath . $file_path;
            }
        }
        else 
        {
            echo 'brouchure not set';
        }

        if(isset($_FILES['floor_plans']['name']))
        {
            $jpg = $_FILES['floor_plans']['name'];
            $valid_extensions = array('jpg','png'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/floor_plans/";
                $file_parts = pathinfo($_FILES["floor_plans"]["name"]);
                $file_path = $_FILES["floor_plans"]["name"];

                move_uploaded_file($_FILES["floor_plans"]["tmp_name"], $cpath . $file_path);
                
                $floor_plans = $cpath . $file_path;
            }
        }
        else 
        {
            echo 'floor_plans not set';
        }

        if(isset($_FILES['home_img']['name']))
        {
            $jpg = $_FILES['home_img']['name'];
            $valid_extensions = array('jpg','png'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/home_show_img/";
                $file_parts = pathinfo($_FILES["home_img"]["name"]);
                $file_path = $_FILES["home_img"]["name"];

                move_uploaded_file($_FILES["home_img"]["tmp_name"], $cpath . $file_path);
                
                $home_img = $cpath . $file_path;
            }
        }
        else 
        {
            echo 'home_img not set';
        }

    $sql = "INSERT INTO `projects`(`location_id`,`title`,`slug`,`description`, `bldg_no`, 
    `thumb_img`,`mob_banner`,`desk_banner`, `possession_date`, `rera_no`, `start_price`, 
    `configuration`, `brouchure`, `floor_plans`, `map_url`, `show_home`, `home_img`, `status`)
            VALUES ('".$location."','".$title."','".$slug."','".$description."','".$bldg_no."',
            '".$thumb_img."','".$mobile_banner."','".$desktop_banner."', '".$possession_date."','".$rera_no."',
            '".$start_price."', '".$configuration."','".$brouchure."','".$floor_plans."',
            '".$map_url."','".$show_home."','".$home_img."','".$status."')";
        if(mysqli_query($db,$sql))
        {
            header('Location: projects.php');
        }
        else
        {
            echo 0;
        }
    }

if (isset($_REQUEST['edit'])) 
{		
    $eid=$_REQUEST['eid'];
    $location = $_REQUEST['location'];
    $title = $_REQUEST['title'];
    $bldg_no = $_REQUEST['bldg_no'];
    $possession_date = $_REQUEST['possession_date'];
    $rera_no = $_REQUEST['rera_no'];
    $configuration = $_REQUEST['configuration'];
    $description = $_REQUEST['description'];
    $start_price = $_REQUEST['start_price'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $map_url = $_REQUEST['map_url'];
    $status = $_REQUEST['status'];
    $show_home=$_REQUEST['show_home'];
    $updated_at=date("Y-m-d H:i:s");
      

    $sql="update projects set location_id='$location',title='$title',slug='$slug',description='$description',possession_date='$possession_date',
    rera_no='$rera_no',start_price='$start_price',configuration='$configuration', map_url='$map_url',show_home='$show_home',updated_at='$updated_at',status='$status' ";
    
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
            if(isset($mobile_banner))
            {
                $sql .= ",`mob_banner`='$mobile_banner' ";
            }

        if ($_FILES['desk_banner']['size'] != 0)
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

        if(isset($_FILES['thumb_img']['name']))
        {
            $jpg = $_FILES['thumb_img']['name'];
            $valid_extensions = array('jpg','png'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/thumbnail_image/";
                $file_parts = pathinfo($_FILES["thumb_img"]["name"]);
                $file_path = $_FILES["thumb_img"]["name"];

                move_uploaded_file($_FILES["thumb_img"]["tmp_name"], $cpath . $file_path);
                
                $thumb_img = $cpath . $file_path;
            }
        }
            if(isset($thumb_img))
            {
                $sql .= ",`thumb_img`='$thumb_img' ";
            }
        
        if(isset($_FILES['brouchure']['name']))
        {
            $jpg = $_FILES['brouchure']['name'];
            $valid_extensions = array('jpg','png','pdf'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/brouchure/";
                $file_parts = pathinfo($_FILES["brouchure"]["name"]);
                $file_path = $_FILES["brouchure"]["name"];

                move_uploaded_file($_FILES["brouchure"]["tmp_name"], $cpath . $file_path);
                
                $brouchure = $cpath . $file_path;
            }
        }
            if(isset($brouchure))
            {
                $sql .= ",`brouchure`='$brouchure' ";
            }
        
        if(isset($_FILES['floor_plans']['name']))
        {
            $jpg = $_FILES['floor_plans']['name'];
            $valid_extensions = array('jpg','png'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/floor_plans/";
                $file_parts = pathinfo($_FILES["floor_plans"]["name"]);
                $file_path = $_FILES["floor_plans"]["name"];

                move_uploaded_file($_FILES["floor_plans"]["tmp_name"], $cpath . $file_path);
                
                $floor_plans = $cpath . $file_path;
            }
        }
            if(isset($floor_plans))
            {
                $sql .= ",`floor_plans`='$floor_plans' ";
            }        
       
        if(isset($_FILES['home_img']['name']))
        {
            $jpg = $_FILES['home_img']['name'];
            $valid_extensions = array('jpg','png'); // valid extensions
                    
            $ext = strtolower(pathinfo($jpg, PATHINFO_EXTENSION));
            
            if(in_array($ext, $valid_extensions)) 
            {
                $cpath="uploads/home_show_img/";
                $file_parts = pathinfo($_FILES["home_img"]["name"]);
                $file_path = $_FILES["home_img"]["name"];

                move_uploaded_file($_FILES["home_img"]["tmp_name"], $cpath . $file_path);
                
                $home_img = $cpath . $file_path;
            }
        }
            if(isset($home_img))
            {
                $sql .= ",`home_img`='$home_img' ";
            }


        $sql .= "where id=$eid";

    if (mysqli_query($db,$sql) )
    {                
        header('Location: projects.php');
    }
    else
    {
        echo 0;
    }
}

if(isset($_REQUEST['did']))
{
	$did=$_REQUEST['did'];
	if(mysqli_query($db,"delete from projects where id=$did"))
    {	
        header('Location: projects.php');
	}
    else
    {
        echo 0;
	}	
}
?>