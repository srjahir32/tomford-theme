<?php 
 global $wpdb,$current_user, $user_ID; 
 //Checking the request 
 if($_SERVER['REQUEST_METHOD']=='POST'){

    
    $post_id = $_POST['post_id'];
   
    $uploaddir = wp_upload_dir();
    print_r($uploaddir); exit;
    $file = $_FILES["documentsFile"]["name"];
    
    $uploadfile = $uploaddir['path'] . '/' . basename( $file );

    move_uploaded_file( $_FILES["documentsFile"]["tmp_name"] , $uploadfile );
    $filename = basename( $uploadfile );
    $wp_filetype = wp_check_filetype(basename($filename), null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => preg_replace('/.[^.]+$/', '', $filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $uploadfile );
    $file1 = get_field('uploaded_documents', $post_id);
    $file2 = get_field('uploaded_documents_one', $post_id);
    $file3 = get_field('uploaded_documents_two', $post_id);
    if ($file1 == ''){
          update_post_meta($post_id , 'uploaded_documents' ,$attach_id);
    } 
    elseif ($file2 == ''){ 
         update_post_meta($post_id , 'uploaded_documents_one' ,$attach_id);
    }

    elseif ($file3 == ''){ 
         update_post_meta($post_id , 'uploaded_documents_two' ,$attach_id);
    }
    else{
        $msg = "Only 3 files allowed!";
    }
    update_post_meta($post_id , 'video_link' ,$_POST['video_link']); 
     $updated = update_user_meta( $user_ID, 'current_step', $_POST['currentStep'] );
 //displaying success message 
 echo 'success';
 }