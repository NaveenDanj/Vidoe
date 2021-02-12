<?php

require 'includes/conn.php';
require 'includes/user_data.php';

$video_id = $_GET['video_id'];

$sql_video_data = "SELECT * FROM video , account WHERE video.email = account.email AND id='$video_id' ";

$sql_update_view = "UPDATE video SET views = views + 1 WHERE id = '$video_id' ";
$conn -> query($sql_update_view);

$row_video = get_data($sql_video_data , $conn);

$sql_check_saved = "SELECT * FROM saved_video WHERE video_id = '$video_id' AND account_id = '$user_email'  ";
$res_chek_saved = $conn -> query($sql_check_saved);

$sql_account_up = "UPDATE account SET total_views = total_views + 1 WHERE email = '$user_email'";
$res_sql_account = $conn -> query($sql_account_up);

$update_total_view = "UPDATE account SET total_views = total_views + 1 WHERE email = '".$row_video['email']."' ";
$res_total_view = $conn -> query($update_total_view);

$time_id = uniqid('' , true);
$date = date("Y-m-d");
$update_history = "INSERT INTO history(user_email , video_id , timestamp , his_date) VALUES('$user_email','$video_id' , '$time_id' , '$date') ";
if($conn -> query($update_history) === TRUE){

}else{
    echo 'the error is '.$conn -> error;
}


$sql_check_cat = "SELECT * FROM video_cat , category WHERE video_cat.cat_id = category.id AND video_cat.video_id = '$video_id' ";
$res_check_cat = $conn -> query($sql_check_cat);

if($res_check_cat -> num_rows > 0){
    while($row = $res_check_cat -> fetch_assoc()){
        $sql_update_cat = "UPDATE category SET category.total_views = category.total_views + 1 WHERE category.id = '".$row['id']."' ";
        $conn -> query($sql_update_cat);
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>VIDOE - <?php echo $row_video['title'] ?></title>

    <link rel="icon" type="image/png" href="img/favicon.png">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="css/osahan.css" rel="stylesheet">

    <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
</head>

<body id="page-top">
    
    <?php
        require 'includes/header_nav.php';
    ?>


    <div id="wrapper">

        <?php
            require 'includes/side_nav.php';
        ?>

        <div id="content-wrapper">
            <div class="container-fluid pb-0">
                <div class="video-block section-padding">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="single-video-left">
                                <div class="single-video">
                                    <iframe width="100%" height="650"
                                        src="uploads/videos/<?php echo $row_video['path']  ?>"
                                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                                
                                <div class="single-video-title box mb-3">
                                    <?php

                                    if($res_chek_saved -> num_rows == 0){
                                        echo '<div class="float-right">
                                                <form action="save_vid.php" method="GET">
                                                    <input type="hidden" name="video_id" value = '.$row_video['id'].' >
                                                    <button  class="btn btn-danger" type="submit">Save</button>
                                                </form>
                                            </div>';
                                    }

                                    ?>
                                    <h2><a href="#"><?php echo $row_video['title'] ?></a></h2>
                                
                                    <p class="mb-0"><i class="fas fa-eye"></i> <?php echo $row_video['views'] ?> views</p>
                                
                                </div>
                                <div class="single-video-author box mb-3">
                                    <div class="float-right">

                                        <form action="handle_sub.php" method="GET">

                                            <input type="hidden" value="<?php echo $row_video['email'] ?>" name="channel_subbed" />
                                            <input type="hidden" value="<?php echo $user_email ?>" name="subs" />
                                            <input type="hidden" value="<?php echo $video_id ?>" name="video_id" />

                                            <?php

                                            $sql_subs = "SELECT * FROM person_subs WHERE account_id = '".$row_video['email']."' AND subs_id = '$user_email' "; 

                                            $res_subs = $conn -> query($sql_subs); 

                                            if($res_subs -> num_rows == 0){

                                                echo '<button class="btn btn-danger" type="submit">Subscribe
                                                        <strong>1.4M</strong></button> ';

                                            }else{

                                                echo '<button class="btn btn-outline-secondary " type="submit">Subscribed
                                                        <strong>1.4M</strong></button>';
                                                
                                                $sql_ch_bell = "SELECT * FROM person_subs WHERE account_id = '".$row_video['email']."' AND subs_id = '$user_email'";
                                                $res_subs = $conn -> query($sql_ch_bell); 
                                                $row = $res_subs -> fetch_assoc();

                                                if($row['notify'] == "Yes"){
                                                    echo '<button class="btn btn btn-outline-danger btn-outline-secondary" type="button"><a href="bell.php?channel_subbed='.$row_video['email'].'&subs='.$user_email.'&video_id='.$video_id.' "><i class="fas fa-bell"></i></a></button>';
                                                }else{
                                                    echo '<a href="bell.php?channel_subbed='.$row_video['email'].'&subs='.$user_email.'&video_id='.$video_id.' "><button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button></a>';
                                                }
                                            }

                                            ?>


                                        </form>

                                        </div>
                                    <img class="img-fluid" src="img/s4.png" alt="">
                                    <p><a href="account_view.php?user_id=<?php echo $row_video['username'] ?>"><strong><?php echo $row_video['fname'] . " " . $row_video['lname'] ?></strong></a> <span title=""
                                            data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i
                                                class="fas fa-check-circle text-success"></i></span></p>
                                    <small>Published on <?php echo $row_video['date'] ?></small>
                                </div>
                                <div class="single-video-info-content box mb-3">
                                    <h6>Cast:</h6>
                                    <p><?php echo $row_video['cast'] ?></p>
                                    <h6>Tags :</h6>
                                    <p class="tags mb-0">
                                        <?php echo $row_video['tags'] ?>
                                    </p><br/>
                                    <h6>About :</h6>
                                    <p><?php echo $row_video['video_about'] ?></p>
                                    <h6>Categories :</h6>
                                    <p class="tags mb-0">

                                        

                                        <?php

                                        $sql_get_vid_tags = "SELECT * FROM video_cat , category WHERE video_cat.video_id = '$video_id' AND video_cat.cat_id = category.id ";
                                        $res2 = $conn -> query($sql_get_vid_tags);

                                        while($row = $res2 -> fetch_assoc()){
                                            echo '<span><a href="category.php?cat_id='.$row['id'].'">'.$row['name'].'</a></span>';
                                        }
                                        

                                        ?>

                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="single-video-right">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="adblock">
                                            <div class="img">
                                                Google AdSense<br>
                                                336 x 280
                                            </div>
                                        </div>

                                        <div class="main-title">
                                            <div class="btn-group float-right right-action">
                                                <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i>
                                                        &nbsp; Top Rated</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                </div>
                                            </div>
                                            <h6>Up Next</h6>
                                        </div>
                                        
                                    </div>


                                    
                                    <div class="col-md-12">

                                        <?php

                                        $sql_get_vid_cat_id = "SELECT * FROM video_cat WHERE video_id = '".$row_video['id']."' LIMIT 1 ";
                                        
                                        $res_cat_id = $conn -> query($sql_get_vid_cat_id);
                                        $cat_id = $res_cat_id -> fetch_assoc();

                                        $sql_get_cat_vid = "SELECT * FROM video , video_cat , account WHERE video_cat.video_id = video.id AND video.email = account.email AND video.id != '".$row_video['id']."' AND video_cat.cat_id = '".$cat_id['cat_id']."' LIMIT 10  ";
                                        
                                        $sql_next = $conn -> query($sql_get_cat_vid);

                                        while($row = $sql_next -> fetch_assoc()){

                                            echo ' <div class="video-card video-card-list">
                                                        <div class="video-card-image">
                                                            <a class="play-icon" href="video_page.php?video_id='.$row['id'].' "><i class="fas fa-play-circle"></i></a>
                                                            <a href="video_page.php?video_id='.$row['id'].' "><img class="img-fluid" src="uploads/thumbnail/'.$row['thumbnail'].' " alt=""></a>
                                                            <div class="time"></div>
                                                        </div>
                                                        <div class="video-card-body">
                                                            <div class="btn-group float-right right-action">
                                                                <a href="#" class="right-action-link text-gray"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                                </div>
                                                            </div>
                                                            <div class="video-title">
                                                                <a href="video_page.php?video_id='.$row['id'].' ">'.$row['title'].'</a>
                                                            </div>
                                                            <div class="video-page text-success">
                                                                <a href ="account_view.php?user_id='.$row['username'].' ">'.$row['fname']." ".$row['lname'].'</a> <a title="" data-placement="top" data-toggle="tooltip"
                                                            href="#" data-original-title="Verified"><i
                                                                        class="fas fa-check-circle text-success"></i></a>
                                                            </div>
                                                            <div class="video-view">
                                                            '.$row['views'].' views &nbsp;<i class="fas fa-calendar-alt"></i> '.$row['date'].'
                                                            </div>
                                                        </div>
                                                    </div>';

                                        }

                                        $sql_get_cat_vid = "SELECT * FROM video , account WHERE video.email = account.email AND video.id != '".$row_video['id']."'  ORDER BY views DESC LIMIT 20 ";
                                        
                                        $sql_next = $conn -> query($sql_get_cat_vid);

                                        while($row = $sql_next -> fetch_assoc()){

                                            echo ' <div class="video-card video-card-list">
                                                        <div class="video-card-image">
                                                            <a class="play-icon" href="video_page.php?video_id='.$row['id'].' "><i class="fas fa-play-circle"></i></a>
                                                            <a href="video_page.php?video_id='.$row['id'].' "><img class="img-fluid" src="uploads/thumbnail/'.$row['thumbnail'].' " alt=""></a>
                                                            <div class="time"></div>
                                                        </div>
                                                        <div class="video-card-body">
                                                            <div class="btn-group float-right right-action">
                                                                <a href="#" class="right-action-link text-gray"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                                                    <a class="dropdown-item" href="#"><i
                                                                            class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                                                                </div>
                                                            </div>
                                                            <div class="video-title">
                                                               <a href="video_page.php?video_id='.$row['id'].' ">'.$row['title'].'</a>
                                                            </div>
                                                            <div class="video-page text-success">
                                                                <a href ="account_view.php?user_id='.$row['username'].' ">'.$row['fname']." ".$row['lname'].'</a> <a title="" data-placement="top" data-toggle="tooltip"
                                                                    href="#" data-original-title="Verified"><i
                                                                        class="fas fa-check-circle text-success"></i></a>
                                                            </div>
                                                            <div class="video-view">
                                                                '.$row['views'].' views &nbsp;<i class="fas fa-calendar-alt"></i> '.$row['date'].'
                                                            </div>
                                                        </div>
                                                    </div>';    
                                        }

                                        ?>

                                        <div class="adblock mt-0">
                                            <div class="img">
                                                Google AdSense<br>
                                                336 x 280
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
                require 'includes/footer.php';
            ?>
        </div>

    </div>


    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js" type="0e30c6f28ae222889525f879-text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="0e30c6f28ae222889525f879-text/javascript"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js" type="0e30c6f28ae222889525f879-text/javascript"></script>

    <script src="vendor/owl-carousel/owl.carousel.js" type="0e30c6f28ae222889525f879-text/javascript"></script>

    <script src="js/custom.js" type="0e30c6f28ae222889525f879-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="0e30c6f28ae222889525f879-|49" defer=""></script>
</body>

</html>