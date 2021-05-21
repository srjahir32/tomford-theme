<?php

$ds  = DIRECTORY_SEPARATOR;  //1

$myuploads = wp_upload_dir();
$myupload_path = $myuploads['baseurl']."/pdf";//2
   
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $myupload_path . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
}


