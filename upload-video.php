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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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
                            <h6>Upload Details</h6>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div >
                            <img class="imgplace" id="blah" src="#" alt = ""/>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="osahan-title" id="video_title">Video Title</div>
                        <div class="osahan-size" id="per"></div>
                        <div class="osahan-progress">
                            <div class="progress">
                                <div id="progressbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                            <div class="osahan-close">
                                <a href="#"><i class="fas fa-times-circle"></i></a>
                            </div>
                        </div>
                        <div class="osahan-desc">After you upload your video , Please close the tab from preventing uploading same video multiple times</div><br />

                        <form id="upload_video" action="" method="POST" enctype="multipart/form-data" >
                        <input accept="video/*" onchange="getVideoFileData(this);" type="file" name="video_file" id="video_file" class="btn btn-outline-primary" />
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="osahan-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="e1">Video Title</label>
                                        <input type="text" name="title"
                                            placeholder="Contrary to popular belief, Lorem Ipsum (2020) is not." id="e1"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="e2">About</label>
                                        <textarea required name="about" rows="3" id="e2" name="e2" class="form-control">Description</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="e7">Video Thumbnail</label>
                                        <input accept="image/*" onchange="readURL(this);" name="thumbnail" required name="tags" type="file" class="btn btn-outline-primary" placeholder="Gaming, PS4" id="e7" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label for="e7">Tags (13 Tags Remaining)</label>
                                        <input name="tags" type="text" placeholder="Gaming, PS4" id="e7" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="e8">Cast (Optional)</label>
                                        <input name="cast" type="text" placeholder="Nathan Drake," id="e8" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-12">
                                    <div class="main-title">
                                        <h6>Category ( you can select upto 6 categories )</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row category-checkbox">

                                <div class="col-lg-2 col-xs-6 col-4">

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="category[]" value="Asia" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Asian</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="category[]" value="Japanese" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Japanese</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="category[]" value="America" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">American</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="category[]" value="Arabic" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">Arabic</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="category[]" value="African" class="custom-control-input" id="customCheck5">
                                        <label class="custom-control-label" for="customCheck5">African</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="category[]" value="Alien" class="custom-control-input" id="customCheck6">
                                        <label class="custom-control-label" for="customCheck5">Alien</label>
                                    </div>
                                    
                                </div>

                                <div class="col-lg-2 col-xs-6 col-4">

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="category[]" value="Public" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label" for="customCheck5">Public</label>
                                    </div>
                                    <!-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="zcustomCheck2">
                                        <label class="custom-control-label" for="zcustomCheck2">Trouble</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="zcustomCheck3">
                                        <label class="custom-control-label" for="zcustomCheck3">Pin</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="zcustomCheck4">
                                        <label class="custom-control-label" for="zcustomCheck4">Fall</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="zcustomCheck5">
                                        <label class="custom-control-label" for="zcustomCheck5">Leg</label>
                                    </div> -->

                                </div>

                                <!-- <div class="col-lg-2 col-xs-6 col-4">

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck1">
                                        <label class="custom-control-label" for="czcustomCheck1">Scissors</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck2">
                                        <label class="custom-control-label" for="czcustomCheck2">Stitch</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck3">
                                        <label class="custom-control-label" for="czcustomCheck3">Agonizing</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck4">
                                        <label class="custom-control-label" for="czcustomCheck4">Rescue</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck5">
                                        <label class="custom-control-label" for="czcustomCheck5">Quiet</label>
                                    </div>

                                </div> -->

                                <!-- <div class="col-lg-2 col-xs-6 col-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Abaft</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Brick</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Purpose</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                                        <label class="custom-control-label" for="customCheck4">Shallow</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                                        <label class="custom-control-label" for="customCheck5">Spray</label>
                                    </div>
                                </div> -->

                                <!-- <div class="col-lg-2 col-xs-6 col-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck1">
                                        <label class="custom-control-label" for="czcustomCheck1">Vessel</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck2">
                                        <label class="custom-control-label" for="czcustomCheck2">Stitch</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck3">
                                        <label class="custom-control-label" for="czcustomCheck3">Agonizing</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck4">
                                        <label class="custom-control-label" for="czcustomCheck4">Rescue</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="czcustomCheck5">
                                        <label class="custom-control-label" for="czcustomCheck5">Quiet</label>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <div class="osahan-area text-center mt-3">
                            <button type="submit"  class="btn btn-outline-primary">Save Changes</button>
                        </div>
                        </form>
                        <hr>
                        <div class="terms text-center">
                            <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the
                                majority <a href="#">Terms of Service</a> and <a href="#">Community Guidelines</a>.</p>
                            <p class="hidden-xs mb-0">Ipsum is therefore always free from repetition, injected humour,
                                or non</p>
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

    <script src="vendor/jquery/jquery.min.js" type="ed0fd9429c35df881fea52e3-text/javascript"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="ed0fd9429c35df881fea52e3-text/javascript"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js" type="ed0fd9429c35df881fea52e3-text/javascript"></script>

    <script src="vendor/owl-carousel/owl.carousel.js" type="ed0fd9429c35df881fea52e3-text/javascript"></script>

    <script src="js/custom.js" type="ed0fd9429c35df881fea52e3-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="ed0fd9429c35df881fea52e3-|49" defer=""></script>


    <script>

    function _(elem){
        return document.getElementById(elem);
    }

    let uploadForm = _('upload_video');
    let progressbar = _('progressbar');

    uploadForm.addEventListener('submit' , uploadFile);

    function uploadFile(e){
        
        e.preventDefault();

        let hr = new XMLHttpRequest();

        hr.open("POST" , 'upload.php');

        hr.upload.addEventListener('progress' , e => {
            let p = Math.round((e.loaded / e.total) * 100);

            progressbar.style.width = p.toString() + "%";
            document.getElementById('per').innerHTML = p.toString() + "%";

        });

        let newForm = new FormData(uploadForm)

        hr.send(newForm);

        newForm.reset();

        window.location.href = "http://localhost/website/user_account.php";

    }


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


    function getVideoFileData(myFile){
        var file = myFile.files[0];  
        var filename = file.name;
        document.getElementById('video_title').innerHTML = filename;
    }

    </script>
}


</script>



</body>



</html>