<?php

require 'includes/conn.php';
require 'includes/user_data.php';

$file_name = $_FILES['video_file']['name'];
$getExt = explode('.' , $file_name);
$file_ext = strtolower(end($getExt));
$filename_new = uniqid('' , true).".".$file_ext;
$target_path = "uploads/videos/" . $filename_new;
move_uploaded_file($_FILES['video_file']['tmp_name'] , $target_path);


$thumb_file_name = $_FILES['thumbnail']['name'];
$get_thumb_ext = explode('.' , $thumb_file_name);
$thumb_ext = strtolower(end($get_thumb_ext));
$thumb_new = uniqid('' , true).".".$thumb_ext;
$thumb_target = "uploads/thumbnail/" . $thumb_new;
move_uploaded_file($_FILES['thumbnail']['tmp_name'] , $thumb_target);


$title = $_POST['title'];
$about = $_POST['about'];
$tags = $_POST['tags'];
$cast = $_POST['cast'];
$upload_date = date("Y/m/d");

$sql = "INSERT INTO video(email , date , cast , title , tags , video_about , thumbnail , path ) VALUES('$user_email' , '$upload_date' , '$cast' , '$title' , '$tags' , '$about' , '$thumb_new' , '$filename_new' ) ";

if($conn ->query($sql) === TRUE){

    $last_id = $conn->insert_id;


    if(!empty($_POST['category'])){

        $cat_counter = 0;

        foreach($_POST['category'] as $selected){

            if($cat_counter == 6){
                break;
            }
    
            $sql_get_cat = "SELECT * from category WHERE name = '$selected'";
            $res = $conn -> query($sql_get_cat);
            $row = $res -> fetch_assoc();
    
            $get_cat_id = "SELECT id from category  WHERE name = '$selected' ";
    
            $res_cat = $conn -> query($get_cat_id);
            $row_cat = $res_cat -> fetch_assoc();
            $cat_id = $row_cat['id'];
    
    
            $sql_set_cat = "INSERT INTO video_cat(video_id , cat_id) VALUES( '$last_id' , '$cat_id' ) ";
           
            $conn -> query($sql_set_cat);

            $cat_counter += 1;


            $sql_get_not = "SELECT * FROM person_subs WHERE account_id = '$user_email' AND notify = 'Yes' ";

            $res_not = $conn -> query($sql_get_not);

            while($row = $res_not -> fetch_assoc()){
                $subs = $row['subs_id'];
                $sql_notify = "INSERT INTO notification (account_id , subscriber , video_id , content) VALUES('$user_email','$subs' ,'$last_id', '$title ')";
                $conn -> query($sql_notify);
            }

    
        }
    }
    
}else{
    echo 'Error Updating the database! '.$conn -> error;
}



?>