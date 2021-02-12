<?php
    require 'includes/conn.php';
?>

<?php

$error = "";

if(isset($_POST['register'])){
    
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $sql = "SELECT * FROM user WHERE username = '$username' OR email = '$email' ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        
        $error = "Username or Email is already taken!";
    
    }else{

        $password_hash = password_hash($password , PASSWORD_DEFAULT);


        $sql = "INSERT INTO user(email , username , password) VALUES('$email' , '$username' , '$password_hash') ";

        if ($conn -> query($sql) === TRUE){

            $sql2 = "INSERT INTO account(email , username) VALUES('$email' , '$username')";

            $conn -> query($sql2);

            setcookie('email' , $email , time()+60*60*24*30);
            setcookie('password' , $password_hash , time()+60*60*24*30);
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password_hash;
        
            header('Location:index.php');

        }else{
        
            $error = 'Internal Server error! Try again in 5 minitus!';
        
        }
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

<body class="login-main-body">
    <section class="login-main-wrapper">
        <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
                <div class="col-md-5 p-5 bg-white full-height">
                    <div class="login-main-left">
                        <div class="text-center mb-5 login-main-left-header pt-4">
                            <img src="img/favicon.png" class="img-fluid" alt="LOGO">
                            <h5 class="mt-3 mb-3">Welcome to Vidoe</h5>
                            <p>Join now and get access to quallity Videos <br> <label style="color:red"> <?php echo $error ?></label></p>
                        </div>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input name="email" required type="email" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" required type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" required type="password" class="form-control" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <p style="color : white " class="light-gray"><?php $error ?></p>
                            </div>

                            <div class="mt-4">
                                <button type="submit" name="register" class="btn btn-outline-primary btn-block btn-lg">Sign Up</button>
                            </div>
                        </form>
                        <div class="text-center mt-5">
                            <p class="light-gray">Already have an Account? <a href="login.php">Sign In</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="login-main-right bg-white p-5 mt-5 mb-5">
                        <div class="owl-carousel owl-carousel-login">
                            <div class="item">
                                <div class="carousel-login-card text-center">
                                    <img src="img/login.png" class="img-fluid" alt="LOGO">
                                    <h5 class="mt-5 mb-3">​Watch videos free</h5>
                                    <p class="mb-4">Our all videos absolutly free. No cost NADA!<br>Watch as much as you
                                        want<br>No hidden baits.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="carousel-login-card text-center">
                                    <img src="img/login.png" class="img-fluid" alt="LOGO">
                                    <h5 class="mt-5 mb-3">Download videos effortlessly</h5>
                                    <p class="mb-4">You can download our every singal video.<br>No need of third party
                                        apps<br>Get it , If you like it</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="carousel-login-card text-center">
                                    <img src="img/login.png" class="img-fluid" alt="LOGO">
                                    <h5 class="mt-5 mb-3">Upload Videos</h5>
                                    <p class="mb-4">If you have something to share?<br> Why waiting?<br>Upload now!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="vendor/jquery/jquery.min.js" type="7ec06f03bffcbf997e0da336-text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="7ec06f03bffcbf997e0da336-text/javascript"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js" type="7ec06f03bffcbf997e0da336-text/javascript"></script>

    <script src="vendor/owl-carousel/owl.carousel.js" type="7ec06f03bffcbf997e0da336-text/javascript"></script>

    <script src="js/custom.js" type="7ec06f03bffcbf997e0da336-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="7ec06f03bffcbf997e0da336-|49" defer=""></script>
</body>

</html>