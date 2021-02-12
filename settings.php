<?php

require 'includes/user_data.php';
require 'includes/conn.php';


if ( isset($_SESSION['email']) ){
    
}else{
    header('Location:login.php');
}



if(isset($_POST['change_settings'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $about = $_POST['about'];

    

    $sql = "UPDATE account 
            SET fname = '$fname' , lname='$lname' , about = '$about'
            WHERE email = '$user_email';
    ";

    if($conn -> query($sql) === TRUE ){
        header("Location:settings.php");
    }else{
        echo $conn -> error;
    }

}


if(isset($_POST['change_banner'])){

    $file_name = $_FILES['banner']['name'];

    $getExt = explode('.' , $file_name);
    $file_ext = strtolower(end($getExt));
    $filename_new = uniqid('' , true).".".$file_ext;
    $target_path = "uploads/banner/" . $filename_new;
    move_uploaded_file($_FILES['banner']['tmp_name'] , $target_path);

    $sql = "UPDATE account 
            SET banner='$filename_new'
            WHERE email = '$user_email';
    ";

    if($conn -> query($sql) === TRUE ){
        header("Location:settings.php");
    }else{
        echo $conn -> error;
    }

}



if(isset($_POST['change_propic'])){

    $file_name = $_FILES['propic']['name'];

    $getExt = explode('.' , $file_name);
    $file_ext = strtolower(end($getExt));
    $filename_new = uniqid('' , true).".".$file_ext;
    $target_path = "uploads/propic/" . $filename_new;
    move_uploaded_file($_FILES['propic']['tmp_name'] , $target_path);

    $sql = "UPDATE account 
            SET propic='$filename_new'
            WHERE email = '$user_email';
    ";

    if($conn -> query($sql) === TRUE ){
        header("Location:settings.php");
    }else{
        echo $conn -> error;
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

        <div id="content-wrapper">
            <div class="container-fluid upload-details">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h6>Settings</h6>
                        </div>
                    </div>
                </div>
                    
                <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h6>Upload Profile Picture</h6>
                            </div>
                        </div>
                        
                        <div class="col-lg-2">
                            <div >
                                <img class="imgplace" id="blah" style="height : 150px; object-fit: cover;" src="uploads/propic/<?php echo $user_propic ?>" alt = ""/>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="osahan-size" id="per"></div>
                            <div class="osahan-desc">This will be your Vidoe Profile Picture.</div><br />
                            <form action="" method="POST" enctype="multipart/form-data" >
                                <input type="file" accept="image/*" name="propic" onchange="readURL(this);"   class="btn btn-outline-primary" /><br/><br/>
                                <button name="change_propic" type="submit" class="btn btn-success border-none"> Upload Profile Picture</button>
                            </form><br /><br />
                        </div>

                        <div class="col-lg-12">
                            <div class="main-title">
                                <h6>Upload Account Banner</h6>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div >
                                <img class="imgplace" id="banner" style="height : 150px; object-fit: cover;" src="uploads/banner/<?php echo $user_banner ?>" alt = ""/>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="osahan-size" id="per"></div>
                            <div class="osahan-desc">This will be your Vidoe Account Banner.</div><br />
                            <form action="" method="POST" enctype="multipart/form-data" >
                                <input type="file" accept="image/*" name="banner" onchange="readURL2(this);"   class="btn btn-outline-primary" /><br/><br/>
                                <button name="change_banner" type="submit" class="btn btn-success border-none"> Upload Account Banner</button>
                            </form>
                        </div>
                        
                    </div><br />

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <form action="" method="POST" enctype="multipart/form-data" >
                                <label class="control-label">First Name <span class="required">*</span></label>
                                <input required name="fname" class="form-control border-form-control" value="<?php echo $user_fname  ?>" placeholder="Account First Name"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Last Name <span class="required">*</span></label>
                                <input required name="lname" class="form-control border-form-control" value="<?php echo $user_lname  ?>" placeholder="Account Last Name"
                                    type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label required class="control-label">About<span class="required">*</span></label>
                                <textarea name="about" required class="form-control border-form-control" placeholder="About"><?php echo $user_about  ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">City <span class="required">*</span></label>
                                <select class="custom-select">
                                    <option value="">Select City</option>
                                    <option value="AF">Alaska</option>
                                    <option value="AX">New Hampshire</option>
                                    <option value="AL">Oregon</option>
                                    <option value="DZ">Toronto</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button type="reset" class="btn btn-danger border-none"> Cencel </button>
                            <button name="change_settings" type="submit" class="btn btn-success border-none"> Save Changes </button>
                        </div>
                    </div>
                </form>
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

    <script src="vendor/jquery/jquery.min.js" type="0d8fb5e77abf99aa177fcac9-text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="0d8fb5e77abf99aa177fcac9-text/javascript"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js" type="0d8fb5e77abf99aa177fcac9-text/javascript"></script>

    <script src="vendor/owl-carousel/owl.carousel.js" type="0d8fb5e77abf99aa177fcac9-text/javascript"></script>

    <script src="js/custom.js" type="0d8fb5e77abf99aa177fcac9-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="0d8fb5e77abf99aa177fcac9-|49" defer=""></script>
</body>

<script>

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#banner')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

</script>

</html>