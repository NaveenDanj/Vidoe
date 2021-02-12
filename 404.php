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
        require 'includes/header_nav.php'
    ?>

    <div id="wrapper">

        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="channels.html">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Channels</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="single-channel.html">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Single Channel</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="video-page.html">
                    <i class="fas fa-fw fa-video"></i>
                    <span>Video Page</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="upload-video.html">
                    <i class="fas fa-fw fa-cloud-upload-alt"></i>
                    <span>Upload Video</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div class="dropdown-menu">
                    <h6 class="dropdown-header">Login Screens:</h6>
                    <a class="dropdown-item" href="login.html">Login</a>
                    <a class="dropdown-item" href="register.html">Register</a>
                    <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Other Pages:</h6>
                    <a class="dropdown-item" href="404.html">404 Page</a>
                    <a class="dropdown-item" href="blank.html">Blank Page</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="history-page.html">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History Page</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="categories.html" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Categories</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="categories.html">Movie</a>
                    <a class="dropdown-item" href="categories.html">Music</a>
                    <a class="dropdown-item" href="categories.html">Television</a>
                </div>
            </li>
            <li class="nav-item channel-sidebar-list">
                <h6>SUBSCRIPTIONS</h6>
                <ul>
                    <li>
                        <a href="subscriptions.html">
                            <img class="img-fluid" alt="" src="img/s1.png"> Your Life
                        </a>
                    </li>
                    <li>
                        <a href="subscriptions.html">
                            <img class="img-fluid" alt="" src="img/s2.png"> Unboxing <span
                                class="badge badge-warning">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="subscriptions.html">
                            <img class="img-fluid" alt="" src="img/s3.png"> Product / Service
                        </a>
                    </li>
                    <li>
                        <a href="subscriptions.html">
                            <img class="img-fluid" alt="" src="img/s4.png"> Gaming
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                        <h1><img alt="404" src="img/404.png" class="img-fluid"></h1>
                        <h1>Sorry! Page not found.</h1>
                        <p class="land">Unfortunately the page you are looking for has been moved or deleted.</p>
                        <div class="mt-5">
                            <a class="btn btn-outline-primary" href="index.php"><i class="mdi mdi-home"></i> GO TO HOME
                                PAGE</a>
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

    <script src="vendor/jquery/jquery.min.js" type="cc30c3fa843e49c26c8f82e8-text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="cc30c3fa843e49c26c8f82e8-text/javascript"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js" type="cc30c3fa843e49c26c8f82e8-text/javascript"></script>

    <script src="vendor/owl-carousel/owl.carousel.js" type="cc30c3fa843e49c26c8f82e8-text/javascript"></script>

    <script src="js/custom.js" type="cc30c3fa843e49c26c8f82e8-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="cc30c3fa843e49c26c8f82e8-|49" defer=""></script>
</body>

</html>