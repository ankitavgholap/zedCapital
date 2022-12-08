<?php
	include_once('config.php');

    //var_dump($_REQUEST);die();
    
    if (isset($_REQUEST['insert']))
    {
        if($_REQUEST['project'] && $_FILES['image'] && $_REQUEST['name']!=null)
        {
           
            $project=$_REQUEST['project'];
            
            $extension=array("jpeg","jpg","png","gif");

            //$sql = "INSERT INTO `project_images`(`project_id`,`image`,`name`)
              //      VALUES ('".$project."', "; 

            foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) 
            {
                
                $file_name=$_FILES["image"]["name"][$key];
                $file_tmp=$_FILES["image"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                $galleryName= 'project_galleries';

                if(in_array($ext,$extension)) 
                {
                    if(!file_exists("uploads/".$galleryName."/".$file_name)) 
                    {
                        move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"][$key],"uploads/".$galleryName."/".$file_name);
                    }
                    else 
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["image"]["tmp_name"][$key],"uploads/".$galleryName."/".$newFileName);
                    }
                                    
                }
                else 
                {
                    array_push($error,"$file_name, ");
                }

                $sql = "INSERT INTO `project_images`(`project_id`,`image`,`name`)
                VALUES ('".$project."','".$newFileName."','".$_REQUEST['name'][$key]."')";
                        
                mysqli_query($db,$sql);
                
                if(mysqli_query($db,$sql))
                {
                    header('Location: projectimages.php');
                }
                else
                {
                    echo 0;
                }
            }  
        }
        else{
            echo 'Somthing went wrong';
        }
    }

if(isset($_REQUEST['did']))
{
	$did=$_REQUEST['did'];
	if(mysqli_query($db,"delete from project_images where id=$did"))
    {	
        header('Location: projectimages.php');
	}
    else
    {
        echo 0;
	}	
}
?>