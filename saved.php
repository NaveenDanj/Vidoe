<?php

require 'includes/conn.php';
require 'includes/user_data.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>VIDOE - Video Streaming Website HTML Template</title>

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
            <div class="container-fluid">
                <div class="video-block section-padding">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-title">
                                <div class="btn-group float-right right-action">
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
                                </div>
                                <h6>Saved Videos</h6>
                            </div>
                        </div>

                        <?php
                        
                        $sql = "SELECT * FROM saved_video , video , account WHERE saved_video.video_id = video.id AND video.email = account.email AND saved_video.account_id = '$user_email' ";
                        
                        $res = $conn -> query($sql);

                        while($row = $res -> fetch_assoc()){
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
                                                <a href="account_view.php?user_id='.$row['username'].'" > '.$row['fname'].' '.$row['lname'].' '.' 
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
                    <!-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav> -->
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

    <script src="vendor/jquery/jquery.min.js" type="0fe5bb8ac90e5de549176b6f-text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="0fe5bb8ac90e5de549176b6f-text/javascript"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js" type="0fe5bb8ac90e5de549176b6f-text/javascript"></script>

    <script src="vendor/owl-carousel/owl.carousel.js" type="0fe5bb8ac90e5de549176b6f-text/javascript"></script>

    <script src="js/custom.js" type="0fe5bb8ac90e5de549176b6f-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="0fe5bb8ac90e5de549176b6f-|49" defer=""></script>
</body>

</html>