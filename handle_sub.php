<?php

require 'includes/conn.php';
require 'includes/user_data.php';

$channel_subbed = $_GET['channel_subbed'];
$subscriber = $_GET['subs'];
$video_id = $_GET['video_id'];

if ($channel_subbed != $subscriber){

    $sql_check = "SELECT * FROM person_subs WHERE account_id = '$channel_subbed' AND subs_id = '$subscriber' ";

    $res = $conn -> query($sql_check);
    
    if($res -> num_rows ==  0){
    
        $sql_add = "INSERT INTO person_subs(account_id , subs_id) VALUES ('$channel_subbed' , '$subscriber')";
    
        if($conn -> query($sql_add) === TRUE ){

            $sql_add_subs = "UPDATE account SET total_subscriptions = total_subscriptions + 1 WHERE email = '$channel_subbed' ";

            $conn -> query($sql_add_subs);
    
            header("Location:video_page.php?video_id=".$video_id);
    
        }else{

            header("Location:video_page.php?video_id=".$video_id);
    
        }
    
    
    }else{
    
        $sql_add = "DELETE  FROM person_subs WHERE account_id = '$channel_subbed' AND subs_id = '$subscriber' ";
    
        $res = $conn -> query($sql_add);

        $sql_del_subs = "UPDATE account SET total_subscriptions = total_subscriptions - 1 WHERE email = '$channel_subbed' ";

        $conn -> query($sql_del_subs);
    
        header("Location:video_page.php?video_id=".$video_id);
    
    }
    
}else{
    header("Location:video_page.php?video_id=".$video_id);
}



?>