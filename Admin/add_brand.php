<?php
session_start();
if (isset($_SESSION['ADMIN_NAME']) && isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
?>
    <!doctype html>
    <html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Spark Ride Admin</title>
        <meta name="description" content="Spark Ride Admin">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
        <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <style>
            @media (max-width: 575.98px) {
                .customclass {
                    flex-wrap: wrap;
                }
            }
        </style>

        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    </head>

    <body>
        <!-- Left Panel -->

        <?php
        require 'asidemenu.html';
        ?>
        <!-- /#left-panel -->

        <!-- Left Panel -->

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">

        <?php
            require 'header.html';
        ?>

            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Brands</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="index.php">Dashboard</a></li>
                                        <li><a href="brand.php">Brands</a></li>
                                        <li class="active">Add Brand</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="animated fadeIn">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2.2em" height="2.2em" viewBox="0 0 24 24">
                                        <path fill="#17a2b8" d="M19 15v-3h-2v3h-3v2h3v3h2v-3h3v-2h-.937zM4 7h11v2H4zm0 4h11v2H4zm0 4h8v2H4z" />
                                    </svg>
                                    <strong class="card-title">Add New Brand</strong>
                                </div>
                                <div class="card-body">
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                            <form method="POST" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="c-name" class="control-label mb-1">Brand Name</label>
                                                    <input id="c-name" name="cat_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="logo" class=" form-control-label mb-1">Brand Logo</label>
                                                    <input type="file" id="logo" name="logo" class="form-control-file" required>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span>Add</span>
                                                    </button>
                                                </div>
                                            </form>
                                            <?php
                                            require('../Admin/Functions/connection.php');
                                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                
                                                $cname = trim($_POST['cat_name']);
                                                $check_query = "SELECT * FROM `brand` WHERE name='$cname'";
                                                $run_check_query = mysqli_query($conn, $check_query);
                                                if (mysqli_num_rows($run_check_query) > 0) {
                                                    echo "<div class='text-danger mt-2'>Category Already Exist</div>";
                                                } 
                                                else {
                                                    $fileName = $_FILES["logo"]["name"];
                                                    $tempName = $_FILES["logo"]["tmp_name"];
                                                    $ext=pathinfo($fileName, PATHINFO_EXTENSION);
                                                    if($ext!='jpg' && $ext!='jpeg' && $ext!='png'){
                                                        echo"<script>alert('Invalid Extension (Supported Extension .jpg .png .jpeg)')</script>";
                                                    }
                                                    else{
                                                    $fname=$cname.".".$ext;
                                                    $folder="../Brand Logo/".$fname;
                                                    $add_query = "INSERT INTO `brand` ( `name`,`image`) VALUES ('$cname','$folder')";
                                                    $run_add_query = mysqli_query($conn, $add_query);
                                                    if($run_add_query){
                                                        move_uploaded_file($tempName,$folder);
                                                    }
                                            ?>
                                                    <script>
                                                        window.location.href = 'brand.php'
                                                    </script>
                                                    
                                            <?php
                                                }
                                            }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- .card -->

                        </div><!--/.col-->









                    </div>


                </div><!-- .animated -->
            </div>


            <div class="clearfix"></div>

            <?php
            require 'footer.php';
            ?>

        </div><!-- /#right-panel -->

        <!-- Right Panel -->

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>


    </body>


    </html>
<?php
} else {
    header('location: page-login.php');
}
?>