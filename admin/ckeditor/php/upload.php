<?php
   if(isset($_FILES['upload'])){
      $errors= array();
      $file_name = $_FILES['upload']['name'];
      $file_size = $_FILES['upload']['size'];
      $file_tmp = $_FILES['upload']['tmp_name'];
      $file_type = $_FILES['upload']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['upload']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      $file_name = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_"), 0, 8).$file_name;

      if(empty($errors)==true) {
         if(move_uploaded_file($file_tmp,"../../../art_images/".$file_name))
         {
            echo json_encode(array('uploaded' => '1' , 'fileName' => $file_name ,'url' => "http://swaindia.org/art_images/".$file_name));
         }
         else
         {
             echo json_encode(array('uploaded' => '1' , 'fileName' => $file_name ,'url' => "http://swaindia.org/art_images/".$file_name, 'error' => array('message' => 'Something went wrong')
               ));
         }
      }
      else
      {
         echo json_encode(array('uploaded' => '1' , 'fileName' => $file_name ,'url' => "http://swaindia.org/art_images/".$file_name, 'error' => array('message' => 'Something went wrong')
               ));
      }
   }
   else
      {
         echo json_encode(array('uploaded' => '1' , 'fileName' => $file_name ,'url' => "http://swaindia.org/art_images/".$file_name, 'error' => array('message' => 'Something went wrong')
               ));
      }
?>