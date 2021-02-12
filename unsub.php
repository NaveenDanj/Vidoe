<?php

require 'includes/conn.php';
require 'includes/user_data.php';

$channel = $_GET['channel_email'];
$subscriber = $_GET['subscriber'];

$sql_check = "SELECT * from person_subs WHERE account_id = '$channel' AND subs_id = '$subscriber' ";
$res = $conn -> query($sql_check);

if($res -> num_rows > 0){
    $del_sql = "DELETE FROM person_subs WHERE account_id = '$channel' AND subs_id = '$subscriber' ";
    $__res = $conn -> query($del_sql);
    $del_sub_account = "UPDATE account SET total_subscriptions = total_subscriptions - 1 WHERE email = '$channel' ";
    $conn -> query($del_sub_account);
    header("Location:channels.php");
}else{
    header("Location:channels.php");
}



?>
