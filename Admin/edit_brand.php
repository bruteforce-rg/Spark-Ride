<?php
session_start();
if (isset($_SESSION['ADMIN_NAME']) && isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
    if(isset($_GET['id']) && $_GET['id']!=''){
        $id=$_GET['id'];
        $name=$_GET['name'];
    }
?>
    <!doctype html>
    <html class="no-js" lang=""> 

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ela Admin - HTML5 Admin Template</title>
        <meta name="description" content="Ela Admin - HTML5 Admin Template">
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

        <aside id="left-panel" class="left-panel">
            <nav class="navbar navbar-expand-sm navbar-default">
                <div id="main-menu" class="main-menu collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php"><i class="menu-icon fa fa-home"></i>Dashboard </a>
                        </li>
                        <li class="menu-title">
                            <a href="user.php"><i style="margin-top: 6px;" class="menu-icon fa fa-users"></i>Users</a>
                        </li>
                        <li class="menu-title active">
                            <a href="brand.php"><i style="margin-top: 6px;" class="menu-icon fa fa-list-ul"></i>Brands</a>
                        </li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </aside><!-- /#left-panel -->

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
                                    <h1>Dashboard</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="index.php">Dashboard</a></li>
                                        <li><a href="categories.php">Category</a></li>
                                        <li class="active">Edit Category</li>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 48 48"><g fill="none" stroke="#000" stroke-linejoin="round" stroke-width="4"><path stroke-linecap="round" d="M42 26V40C42 41.1046 41.1046 42 40 42H8C6.89543 42 6 41.1046 6 40V8C6 6.89543 6.89543 6 8 6L22 6"/><path fill="#2f88ff" d="M14 26.7199V34H21.3172L42 13.3081L34.6951 6L14 26.7199Z"/></g></svg>
                                    <strong class="card-title">Edit Category</strong>
                                </div>
                                <div class="card-body">
                                    <div id="pay-invoice">
                                        <div class="card-body">
                                            <form method="post" enctype="multipart/form-data">
                                                
                                                <div class="form-group">
                                                    <label for="c-name" class="control-label mb-1">Category Name</label>
                                                    <input id="c-name" name="cat_name" type="text" class="form-control" aria-required="true" aria-invalid="false" value=" <?php echo $name; ?>"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="logo" class=" form-control-label mb-1">Brand Logo</label>
                                                    <input type="file" id="logo" name="logo" class="form-control-file">
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                                        <span>Edit<span>                                                   
                                                    </button>
                                                </div>
                                            </form>
                                                <?php
                                                require('../Admin/Functions/connection.php');
                                                // if(isset($_POST['cat_name'])){
                                                //    
                                                // }
                                                if($_SERVER['REQUEST_METHOD']=='POST'){

                                                    $fileName= $_FILES['logo']['name'];
                                                    $tempName= $_FILES['logo']['tmp_name'];
                                                    $ext=pathinfo($fileName, PATHINFO_EXTENSION);
                                                    
                                                    if($ext!='jpg' && $ext!='jpeg' && $ext!='png'){
                                                        echo"<script>alert('Invalid Extension (Supported Extension .jpg .png .jpeg)')</script>";
                                                    }
                                                    $cname=trim($_POST['cat_name']);
                                                    $check_query="SELECT * FROM `brand` WHERE name !='$cname'";
                                                    $run_check_query=mysqli_query($conn,$check_query);
                                                    if(mysqli_num_rows($run_check_query)>0){
                                                        echo "<div class='text-danger mt-2'>Category Already Exist</div>";
                                                    }
                                                    else{
                                                        $update_query="UPDATE `category` SET `name` = '$cname' WHERE `category`.`id` = $id";
                                                        $run_update_query=mysqli_query($conn,$update_query);
                                                        if($run_update_query){

                                                        }
                                                        ?>
                                                        <!-- <script>
                                                            window.location.href='categories.php'
                                                        </script> -->
                                                        <?php
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