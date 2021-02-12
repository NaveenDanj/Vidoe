<?php

require 'includes/conn.php';
require 'includes/user_data.php';

$vid_id = $_GET['video_id'];

$sql_check = "SELECT * FROM saved_video WHERE video_id = '$vid_id' AND account_id = '$user_email'";

$res = $conn -> query($sql_check);


if($res -> num_rows == 0){

    $sql_add_saved = "INSERT INTO saved_video(video_id , account_id) VALUES('$vid_id' , '$user_email' ) ";

    if($conn -> query($sql_add_saved) === TRUE){

        header("Location:video_page.php?video_id=".$vid_id."");

    }else{

        echo 'Insert error '.$conn -> error;

    }

}else{
    header("Location:video_page.php?video_id=".$vid_id."");
}



?>