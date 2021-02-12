<?php

require 'includes/conn.php';
require 'includes/user_data.php';

if(isset($_GET['video_id']) && isset($_GET['timestamp'])){

    $vid_id = $_GET['video_id'];
    $time = $_GET['timestamp'];

    $sql_check = "SELECT * FROM history WHERE user_email = '$user_email' AND video_id = '$vid_id' AND timestamp = '$time' ";

    $sql_res = $conn -> query($sql_check);

    if($sql_res -> num_rows > 0){
        $sql_del = "DELETE FROM history WHERE user_email = '$user_email' AND video_id = '$vid_id' AND timestamp = '$time' ";
        $conn -> query($sql_del);
        header("Location:history.php");
    }else{
        header("Location:index.php");
    }


}else{
    header("Location:404.php");
}





?>