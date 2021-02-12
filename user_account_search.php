<?php
require 'includes/user_data.php';
require 'includes/conn.php';

$search_string = "";

if(isset($_POST['search_query'])){
    $search_string = $_POST['query'];

}else{

    if(isset($_POST['query'])){
        $search_string = $_POST['query'];
        $prev_page = $_POST['prev_page'];
    }else{
        header("Location:user_account.php");
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

        <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image">
            <img class="img-fluid" alt="" style="height : 450px; object-fit: cover;" src="uploads/banner/<?php echo $user_banner ?>">
                <div class="channel-profile">
                    <img class="channel-profile-img" alt="" src="uploads/propic/<?php echo $user_propic ?>">

                    <!-- <div class="social hidden-xs">
                        Social &nbsp;
                        <a class="fb" href="#">Facebook</a>
                        <a class="tw" href="#">Twitter</a>
                        <a class="gp" href="#">Google</a>
                    </div> -->

                </div>
            </div>

            <div class="single-channel-nav">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="channel-brand" href="#"><?php echo $user_fname .' '. $user_lname. " " ?><span title="" data-placement="top"
                            data-toggle="tooltip" data-original-title="Verified"><i
                                class="fas fa-check-circle text-success"></i></span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Videos <span class="sr-only">(current)</span></a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Donate
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li> -->
                        </ul>
                        
                        <form method="POST" action="" class="form-inline my-2 my-lg-0">
                            <input class="form-control form-control-sm mr-sm-1" type="search" name = "query" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success btn-sm my-2 my-sm-0" name = "search_query" type="submit"><i class="fas fa-search"></i></button>
                            <!-- </button> &nbsp;&nbsp;&nbsp; <button
                                class="btn btn-outline-danger btn-sm" type="button">Subscribe
                                <strong>1.4M</strong></button> -->
                        </form>

                    </div>
                </nav>
            </div>
            
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
                                <h6>Videos</h6>
                            </div>
                        </div>

                        <?php
                        
                        $sql_get_vid = "SELECT * FROM video , account WHERE video.email = '".$user_email."' AND account.email = video.email AND ( video.title LIKE '%".$search_string."%' OR video.tags LIKE '%".$search_string."%' OR video.cast LIKE '%".$search_string."%' OR video.video_about LIKE '%".$search_string."%' ) ";
                        $res = $conn -> query($sql_get_vid);


                        while($row = $res -> fetch_assoc()) {

                            echo '<div class="col-xl-3 col-sm-6 mb-3">
                                    <div class="video-card">
                                        <div class="video-card-image">
                                            <a class="play-icon" href="video_page.php?video_id='.$row['id'].'"><i class="fas fa-play-circle"></i></a>
                                            <a href="video_page.php?video_id='.$row['id'].'"><img class="img-fluid" style="height : 350px; object-fit: cover;" src="./uploads/thumbnail/'.$row['thumbnail'].'" alt=""></a>
                                            <div class="time"></div>
                                        </div>
                                        <div class="video-card-body">
                                            <div class="video-title">
                                                <a href="video_page.php?video_id='.$row['id'].'">'.$row['title'].'</a>
                                            </div>
                                            <div class="video-page text-success">
                                                '.$row['fname'].' '.$row['lname'].' '.' <a title="" data-placement="top" data-toggle="tooltip" href="video_page.php?video_id='.$row['id'].'"
                                                    data-original-title="Verified"><i
                                                        class="fas fa-check-circle text-success"></i></a>
                                            </div>
                                            <div class="video-view">
                                                '.$row['views'].'   views &nbsp;<i class="fas fa-calendar-alt"></i>'.' '.$row['date'].'
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                        }
                        
                        ?>
                    </div>


                    <nav aria-label="Page navigation example">
                        <!-- <ul class="pagination justify-content-center pagination-sm mb-0">
                            <li class="page-item disabled">
                                <a tabindex="-1" href="#" class="page-link">Previous</a>
                            </li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link">Next</a>
                            </li>
                        </ul> -->
                    </nav>
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

    <script src="vendor/jquery/jquery.min.js" type="1d734754f32baf207b7b27e5-text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="1d734754f32baf207b7b27e5-text/javascript"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js" type="1d734754f32baf207b7b27e5-text/javascript"></script>

    <script src="vendor/owl-carousel/owl.carousel.js" type="1d734754f32baf207b7b27e5-text/javascript"></script>

    <script src="js/custom.js" type="1d734754f32baf207b7b27e5-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="1d734754f32baf207b7b27e5-|49" defer=""></script>
</body>

</html>