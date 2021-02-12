<?php

require 'includes/conn.php';
require 'includes/user_data.php';

$channel_subbed = $_GET['channel_subbed'];
$subscriber = $_GET['subs'];
$video_id = $_GET['video_id'];


$sql_check = "SELECT * FROM person_subs WHERE account_id = '$channel_subbed' AND subs_id = '$subscriber'";

$res = $conn -> query($sql_check);
$row = $res -> fetch_assoc();

if($row['notify'] == 'No'){

    $get_sql = "UPDATE person_subs SET notify = 'Yes' WHERE account_id = '$channel_subbed' AND subs_id = '$subscriber' ";

    if($conn -> query($get_sql) === TRUE ){
        header("Location:video_page.php?video_id=".$video_id);

    }else{
        header("Location:video_page.php?video_id=".$video_id);
    }

}else{

    $get_sql = "UPDATE person_subs SET notify = 'No' WHERE account_id = '$channel_subbed' AND subs_id = '$subscriber' ";

    if($conn -> query($get_sql) === TRUE ){
        header("Location:video_page.php?video_id=".$video_id);

    }else{
        header("Location:video_page.php?video_id=".$video_id);
    }
    
}





?>