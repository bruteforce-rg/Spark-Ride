<?php
session_start();
if (isset($_SESSION['ADMIN_NAME']) && isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != '') {
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css">
    <style>
        @media (max-width: 575.98px) { .customclass{
            flex-wrap: wrap;
        } }
    </style>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->
    <?php
        require 'asidemenu.html';
    ?>
    

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
                                    <li class="active">Bikes</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center customclass">
                                <strong class="card-title">All Bikes</strong>
                                <strong class="card-title"><a href="add_bike.php" class="btn btn-primary">Add New Bike</a></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>Body Type</th>
                                            <th>Model Year</th>
                                            <th>Reg No</th>
                                            <th>Price</th>
                                            <th>Engine (cc)</th>
                                            <th>Mileage</th>
                                            <th>Tank Capacity</th>
                                            <th>Fuel Type</th>
                                            <th>Navigation</th>
                                            <th>Gear Box</th>
                                            <th>ABS</th>
                                            <th>Overview</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require('../Admin/Functions/connection.php');
                                        $display_query="SELECT * FROM `bike`";
                                        $run_display_query=mysqli_query($conn,$display_query);
                                        if(mysqli_num_rows($run_display_query)>0){
                                            while($row=mysqli_fetch_assoc($run_display_query)){
                                                ?>
                                                <tr>                                                    
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['title']; ?></td>
                                                    <td><?php echo $row['brand']; ?></td>
                                                    <td><?php echo $row['body-type']; ?></td>
                                                    <td><?php echo $row['model_year']; ?></td>
                                                    <td><?php echo $row['reg_no']; ?></td>
                                                    <td><?php echo "&#8377;".$row['price']."/Day"; ?></td>
                                                    <td><?php echo $row['engine-cc']." cc"; ?></td>
                                                    <td><?php echo $row['mileage']." kmpl"; ?></td>
                                                    <td><?php echo $row['fuel-capacity']." litres"; ?></td>
                                                    <td><?php echo $row['fuel-type']; ?></td>
                                                    <td><?php if($row['nav-assist']==1){echo "Yes";} else{echo "No";} ?></td>
                                                    <td><?php echo $row['gear']." speed"; ?></td>
                                                    <td><?php if($row['abs']==1){echo "Single Channel";} elseif($row['abs']==2){echo "Dual Channel";} else{echo "No";}?></td>
                                                    <td><?php echo $row['overview']; ?></td>
                                                    
                                                    
                                                    <td class="d-flex justify-content-end"> <a href="" class= "btn btn-info mr-2" >Edit</a> <a href="" class= "btn btn-danger mr-2" >Delete</a> </td>
                                                </tr>
                                                <?php
                                            }
                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


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


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
<?php
} else {
    header('location: page-login.php');
}
?>