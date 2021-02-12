<?php

require 'includes/conn.php';
require 'includes/user_data.php';

if ( isset($_SESSION['email']) ){
    
}else{
    header('Location:login.php');
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
    <title>VIDOE - Videos</title>

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
                <div class="top-mobile-search">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="mobile-search">
                                <div class="input-group">
                                    <input type="text" placeholder="Search for..." class="form-control">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-dark"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="top-category section-padding mb-4">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title">
                                <!-- <div class="btn-group float-right right-action">
                                    <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                            Rated</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                            Viewed</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                            &nbsp; Close</a>
                                    </div>
                                </div> -->
                                <h6>Categories</h6>
                            </div>
                        </div>

                        <div class="col-md-12">

                            <div class="owl-carousel owl-carousel-category">
                                
                            <?php

                                $sql_cat = "SELECT * FROM category LIMIT 10";

                                $res_cat = $conn -> query($sql_cat);

                                while($row_cat = $res_cat -> fetch_assoc()){

                                    echo '<div class="item">
                                                <div class="category-item">
                                                    <a href="category.php?cat_id='.$row_cat['id'].'">
                                                        <img class="img-fluid" src="img/s4.png" alt="">
                                                        <h6>'.$row_cat['name'].'</h6>
                                                        <p>'.$row_cat['total_views'].' views</p>
                                                    </a>
                                                </div>
                                        </div>';
                                }

                            ?>

                            </div>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="video-block section-padding">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title">
                                <!-- <div class="btn-group float-right right-action">
                                    <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                            Rated</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                            Viewed</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                            &nbsp; Close</a>
                                    </div>
                                </div> -->
                                <h6>Featured Videos</h6>
                            </div>
                        </div>

                        <?php

                        $sql_video = "SELECT * FROM video , account  WHERE video.email = account.email ORDER BY video.views DESC LIMIT 50";

                        $res = $conn -> query($sql_video);

                        while($row = $res -> fetch_assoc()){

                            $sql_get_usename = "SELECT username FROM user WHERE email = '".$row['email']."' ";

                            $res_username = $conn -> query($sql_get_usename);

                            $row_username = $res_username -> fetch_assoc();

                            echo '<div class="col-xl-3 col-sm-6 mb-3">
                                    <div class="video-card">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="video_page.php?video_id='.$row['id'].'"><i class="fas fa-play-circle"></i></a>
                                            <a href="video_page.php"><img class="img-fluid" src="uploads/thumbnail/'.$row['thumbnail'].'" style="height : 250px; object-fit: cover;" alt=""></a>
                                            <div class="time"></div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="video-title">
                                                <a href="video_page.php?video_id='.$row['id'].'">'.$row['title'].'</a>
                                            </div>
                                            <div class="video-page text-success">
                                                <a href="account_view.php?user_id='.$row_username['username'].'" > '.$row['fname'].' '.$row['lname'].' '.' 
                                                </a>';

                                                if($row['status'] == 'verified' ){
                                                    echo '
                                                        <a title="" data-placement="top" data-toggle="tooltip" href="#"
                                                            data-original-title="Verified"><i class="fas fa-check-circle text-success"></i>
                                                        </a>';
                                                }

                                                

                                                echo '
                                            </div>
                                            <div class="video-view">
                                                '.$row['views'].' views &nbsp;<i class="fas fa-calendar-alt"></i> '.$row['date'].'
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>  
                </div>

                <hr class="mt-0">
                <div class="video-block section-padding">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title">
                                <!-- <div class="btn-group float-right right-action">
                                    <a href="#" class="right-action-link text-gray" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top
                                            Rated</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp;
                                            Viewed</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i>
                                            &nbsp; Close</a>
                                    </div>
                                </div> -->
                                <h6>Popular Channels</h6>
                            </div>
                        </div>

                        <?php

                        $sql_channel = "SELECT * FROM account , user WHERE account.email = user.email ORDER BY total_subscriptions DESC LIMIT 3 ";

                        $res = $conn -> query($sql_channel);

                        while($row = $res -> fetch_assoc()){

                            if($row['email'] != $user_email){
                                echo '<div class="col-xl-3 col-sm-6 mb-3">

                                    <div class="channels-card">
                                        <div class="channels-card-image">
                                            <a href="#"><img class="img-fluid" src="uploads/propic/'.$row['propic'].'" alt=""></a>
                                            <div class="channels-card-image-btn">';
                                                

                                                
                                                $sql_check_subs = "SELECT * FROM person_subs WHERE account_id = '".$row['email']."' AND subs_id = '$user_email' ";
                                                $res_subs = $conn -> query($sql_check_subs);

                                                if($res_subs -> num_rows > 0){

                                                    echo '
                                                    <form action="unsub_acc.php" method="GET">
                                                        <input type="hidden" name="channel_subbed" value="'.$row['email'].'" />
                                                        <input type="hidden" name="subs" value="'.$user_email.'" />
                                                        <input type="hidden" name="header_page" value= "index.php" />
                                                        <input type="hidden" name="header_query" value="" />
                                                        <input type="hidden" name="header_val" value="" />
                                                        <button class="btn btn-outline-secondary btn-sm"  type="submit">Subscribed<strong></strong></button>
                                                    </form>
                                                    ';

                                                }else{

                                                    echo '
                                                    <form action="handle_sub_acc.php" method="GET">
                                                        <input type="hidden" name="channel_subbed" value="'.$row['email'].'" />
                                                        <input type="hidden" name="subs" value="'.$user_email.'" />
                                                        <input type="hidden" name="header_page" value= "index.php" />
                                                        <input type="hidden" name="header_query" value="" />
                                                        <input type="hidden" name="header_val"  value="" />
                                                        <button class="btn btn-outline-danger btn-sm" type="submit">Subscribe<strong></strong></button>
                                                    </form>';

                                                }
                                            
                                            
                                            echo '</form>
                                            </div>
                                        </div>      
                                        <div class="channels-card-body">
                                            <div class="channels-title">
                                                <a href="account_view.php?user_id='.$row['username'].'">'.$row['fname'].' '.$row['lname'].'</a>
                                            </div>
                                            <div class="channels-view">
                                                '.$row['total_subscriptions'].' subscribers
                                            </div>
                                        </div>
                                    </div>

                                </div>';
                            }

                            
                        }

                        ?>
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



    <script src="vendor/jquery/jquery.min.js" type="5a6180fab56553bec6eada0e-text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="5a6180fab56553bec6eada0e-text/javascript"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js" type="5a6180fab56553bec6eada0e-text/javascript"></script>

    <script src="vendor/owl-carousel/owl.carousel.js" type="5a6180fab56553bec6eada0e-text/javascript"></script>

    <script src="js/custom.js" type="5a6180fab56553bec6eada0e-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="5a6180fab56553bec6eada0e-|49" defer=""></script>
</body>

</html>