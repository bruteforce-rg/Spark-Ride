<?php
session_start();
if (isset($_SESSION['ADMIN_NAME']) && isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
    require('../Admin/Functions/connection.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
        $type=$_GET['type'];
        if($type=='delete_cat'){
            $id=$_GET['id'];
            $image=$_GET['path'];
            $old=getcwd();
            $fname= pathinfo($image,PATHINFO_BASENAME);
            $path= trim(pathinfo($image,PATHINFO_DIRNAME));
            chdir($path);
            
            $del_query="DELETE FROM brand WHERE id ='$id'";
            $run_del_query=mysqli_query($conn,$del_query);
            if($run_del_query){
                unlink($fname);
                chdir($old);
            }
        }
    }
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
        @media (max-width: 575.98px) { .customclass{
            flex-wrap: wrap;
        } }
    </style>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
    
    <?php
        require 'asidemenu.html';
    ?>

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
                                <h1 class="font-weight-bold">Brands</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">Brands</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center customclass">
                            <strong class="card-title">All Brands</strong>
                            <strong class="card-title"><a href="add_brand.php" class="btn btn-primary">Add New Brand</a></strong>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>ID</th>
                                        <th>Brand Name</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $display_query="SELECT * FROM `brand`";
                                        $run_display_query=mysqli_query($conn,$display_query);
                                        if(mysqli_num_rows($run_display_query)>0){
                                            $count=1;
                                            while($row=mysqli_fetch_assoc($run_display_query)){
                                                ?>
                                                <tr>
                                                    <td class="serial"><?php echo $count; ?></td>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td> <span class="name"> <img src="<?php echo $row['image']; ?>" alt="logo"> <?php echo $row['name']; ?></span> </td>
                                                    <td class="d-flex justify-content-end"> <a href="edit_brand.php?id=<?php echo $row['id'];?>&name=<?php echo $row['name'];?>" class= "btn btn-info mr-2" >Edit</a> <a href="?type=delete_cat&id= <?php echo $row['id']; ?> &path= <?php echo $row['image'];?>" class= "btn btn-danger mr-2" >Delete</a> </td>
                                                </tr>
                                                <?php
                                                $count++;
                                            }
                                            
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
            </div>
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