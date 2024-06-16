<?php
session_start();
if (isset($_SESSION['ADMIN_NAME']) && isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
    require('../Admin/Functions/connection.php');
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
                                    <h1>Bikes</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="index.php">Dashboard</a></li>
                                        <li><a href="bike.php">Bikes</a></li>
                                        <li class="active">Add Bike</li>
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
                                    <strong class="card-title">Add New Bike</strong>
                                </div>
                                <div class="card-body">
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                            <form method="POST" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Bike Name</label>
                                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="brand" class=" form-control-label mb-1">Brand</label>
                                                    <select class="form-control" name="brand" required>
                                                        <option>Select Brand</option>
                                                        <?php
                                                             $display_query="SELECT * FROM `brand`";
                                                             $run_display_query=mysqli_query($conn,$display_query);
                                                             if(mysqli_num_rows($run_display_query)>0){
                                                                 while($row=mysqli_fetch_assoc($run_display_query)){
                                                                    
                                                                    echo "<option value='".$row['name']."'>".$row['name']."</option>";
                                                                     
                                                                 }
                                                                 
                                                             }
                                                        ?>
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="reg-no" class="control-label mb-1">Bike Registration No.</label>
                                                    <input id="reg-no" name="reg-no" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="myear" class="control-label mb-1">Bike Model Year</label>
                                                    <input id="myear" name="myear" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price" class="control-label mb-1">Price (per day)</label>
                                                    <input id="price" name="price" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="body" class=" form-control-label mb-1">Body Type</label>
                                                    <select class="form-control" name="body_type" required>
                                                        <option>Select Body Type</option>
                                                        <option value="Sports Bike">Sports Bike</option>
                                                        <option value="Scooter">Scooter</option>
                                                        <option value="Cruiser">Cruiser</option>
                                                        <option value="Commuter">Commuter</option>
                                                        <option value="Super Bike">Super Bike</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="engine_cap" class="control-label mb-1">Engine Capacity (cc)</label>
                                                    <input id="engine_cap" name="engine_cap" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fuel-type" class="control-label mb-1">Fuel Type</label>
                                                    <input id="fuel-type" name="fuel_type" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="mileage" class="control-label mb-1">Mileage (kmpl)</label>
                                                    <input id="mileage" name="mileage" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tank-cap" class="control-label mb-1">Fuel Tank Capacity (litre)</label>
                                                    <input id="tank-cap" name="tank-cap" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gear box" class="control-label mb-1">Gear Box</label>
                                                    <input id="gear box" name="gear_box" type="number" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="abs" class=" form-control-label mb-1">ABS</label>
                                                    <select class="form-control" name="ABS" required>
                                                        <option>Select</option>
                                                        <option value="1">Single Channel</option>
                                                        <option value="2">Dual Channel</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nav_assist" class=" form-control-label mb-1">Navigation Assist</label>
                                                    <select class="form-control" name="nav_assist" required>
                                                        <option>Select</option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="overview" class="control-label mb-1">Overview</label>
                                                    <input id="overview" name="overview" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="img1" class=" form-control-label mb-1">Upload Image</label>
                                                    <input type="file" id="img1" name="img1" class="form-control-file" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="img2" class=" form-control-label mb-1">Upload Image</label>
                                                    <input type="file" id="img2" name="img2" class="form-control-file" required>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span>Add</span>
                                                    </button>
                                                </div>
                                            </form>
                                            <?php
                                            
                                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                
                                                $bikename = trim($_POST['name']);
                                                $reg_no = trim($_POST['reg-no']);
                                                $check_query = "SELECT * FROM `bike` WHERE reg_no='$reg_no'";
                                                $run_check_query = mysqli_query($conn, $check_query);
                                                if (mysqli_num_rows($run_check_query) > 0) {
                                                    echo "<div class='text-danger mt-2'>Registration No. Already Exist</div>";
                                                } 
                                                else {
                                                    $fileName1 = $_FILES["img1"]["name"];
                                                    $tempName1 = $_FILES["img1"]["tmp_name"];
                                                    $ext1=pathinfo($fileName1, PATHINFO_EXTENSION);
                                                    $fileName2 = $_FILES["img2"]["name"];
                                                    $tempName2 = $_FILES["img2"]["tmp_name"];
                                                    $ext2=pathinfo($fileName2, PATHINFO_EXTENSION);
                                                    if($ext1!='jpg' && $ext1!='jpeg' && $ext1!='png' && $ext2!='jpg' && $ext2!='jpeg' && $ext2!='png'){
                                                        echo"<script>alert('Invalid Extension (Supported Extension .jpg .png .jpeg)')</script>";
                                                    }
                                                    else{

                                                        $no = rand(0000000, 9999999);
                                                        $id = "SRB" . $no;
                                                        while (true) {
                                                            $dup_query = "SELECT * FROM `bike` WHERE `id` = '$id'";
                                                            $run_dup_query = mysqli_query($conn, $dup_query);
                                                            $res = mysqli_num_rows($run_dup_query);
                                                            if ($res > 0) {
                                                                $no = rand(000000, 999999);
                                                                $id = "SRB" . $no;
                                                            } else {
                                                                break;
                                                            }
                                                        }

                                                    $brand=$_POST['brand'];
                                                    $overview=$_POST['overview'];
                                                    $price=$_POST['price'];
                                                    $model_year=$_POST['myear'];
                                                    $engine_cap=$_POST['engine_cap'];
                                                    $mileage=$_POST['mileage'];
                                                    $tank_cap=$_POST['tank-cap'];
                                                    $nav_assist=$_POST['nav_assist'];
                                                    $fuel_type=$_POST['fuel_type'];
                                                    $gear_box=$_POST['gear_box'];
                                                    $abs=$_POST['ABS'];
                                                    $body_type=$_POST['body_type'];
                                                    

                                                    $fname1= $bikename . "(1)." . $ext1;
                                                    $fname2= $bikename . "(2)." . $ext2;
                                                    $folder1="../Bikes/".$fname1;
                                                    $folder2="../Bikes/".$fname2;
                                                    $add_query = "INSERT INTO `bike` (`id`, `title`, `brand`, `reg_no`, `overview`, `price`, `model_year`, `engine-cc`, `mileage`, `fuel-capacity`, `nav-assist`, `fuel-type`, `gear`, `abs`, `body-type`, `img1`, `img2`) VALUES ('$id', '$bikename', '$brand', '$reg_no', '$overview', '$price', '$model_year', '$engine_cap', '$mileage', '$tank_cap', '$nav_assist', '$fuel_type', '$gear_box', '$abs', '$body_type', '$folder1', '$folder2')";
                                                    $run_add_query = mysqli_query($conn, $add_query);
                                                    if($run_add_query){
                                                        move_uploaded_file($tempName1,$folder1);
                                                        move_uploaded_file($tempName2,$folder2);
                                                    }

                                            ?>
                                                    <!-- <script>
                                                        window.location.href = 'brand.php'
                                                    </script> -->
                                                    
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