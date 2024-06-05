<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark Ride</title>
    <link rel="stylesheet" href="Assets/bootstrap.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css"/>
    <style>
        
        .btnhover:hover {
            background-color: #003687 !important;
            transition: 0.2s;
        }
        .mnuhover:hover {
            background-color: #b5b5b566 !important;
             color: #575757 !important;
        }
        @media screen and (max-width: 991px) {
            .usericon{
                visibility: hidden;
            }
        }
        @media screen and (min-width: 991px) {
            .iconvisible{
                position: absolute;
                visibility: hidden;
            }
        }
    </style>
</head>
<body >


    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top bg-light" style="position: relative; background-color: white;">
        <div class="container">

            <a class="navbar-brand" href="#"><img src="Assets/spride.png" alt="logo" style="width: 110px;"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="position: relative;">
                    <svg style="border: 4px solid rgb(24, 0, 162);
                    border-radius: 11px;
                    width: 56px;
                    height: 41px;
                    position: absolute;
                    top: -6px;
                    left: -13px;    
                " xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                    </svg>
                </span>
            </button>

            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header"><img src="Assets/spride.png" alt="logo" style="width: 110px;">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>


                <div class="offcanvas-body d-flex flex-lg-row flex-column" style="font-family: Poppins,sans-serif;">
                    <ul
                        class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3 fw-medium gap-lg-4">
                        <?php
                         if (isset($_SESSION['USER_MAIL']) && isset($_SESSION['EN_PSW']) && $_SESSION['EN_PSW'] != '') {
                        echo'<li class="fs-5 fw-bold d-flex align-items-center iconvisible" style="list-style: none;">
                            <span><i class="fa-solid fa-circle-user" style="font-size: 1.6em;"></i></span>
                            <a class="nav-link " href="#">
                              &nbsp;Hi, Rakesh
                            </a>
                        </li>';
                         }
                         ?>
                        
                        
                        <li class="nav-item">
                            <a class="nav-link active mymenu" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mymenu" href="#">Bike List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mymenu" href="#">Brand</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mymenu" href="#">About us</a>
                        </li>
                        <?php
                         if (isset($_SESSION['USER_MAIL']) && isset($_SESSION['EN_PSW']) && $_SESSION['EN_PSW'] != '') {
                        echo'<li class="nav-item iconvisible">
                            <a class="nav-link mymenu" href="dashboard.php">My Profile</a>
                        </li>
                        <li class="nav-item iconvisible">
                            <a class="nav-link mymenu" href="#">Bookings</a>
                        </li>';
                         }
                        ?>
                    </ul>
                     
                         <?php
                         if (!isset($_SESSION['USER_MAIL']) && !isset($_SESSION['EN_PSW'])) {
                            echo'<div class="d-flex flex-lg-row justify-content-center align-items-center gap-3"
                        style="font-family: Poppins,sans-serif;">
                        <a href="login.php"
                            class="text-decoration-none px-3 py-1 bg-primary text-white rounded-4 btnhover">Login</a>
                        <a href="signup.php" class="text-decoration-none px-3 py-1 bg-primary text-white rounded-4 btnhover">Sign
                            Up</a>
                         </div>';
                         }
                         ?>
                    
                    <?php
                         if (isset($_SESSION['USER_MAIL']) && isset($_SESSION['EN_PSW']) && $_SESSION['EN_PSW'] != '') {
                        echo'<div class="d-flex flex-lg-row justify-content-center align-items-center gap-3 iconvisible"
                        style="font-family: Poppins,sans-serif;">
                        <a href="user_lg_out.php" class="text-decoration-none px-3 py-1 bg-primary text-white rounded-4 btnhover">Logout</a>
                    </div>
                    

                    <div class="d-flex flex-lg-row justify-content-center align-items-center gap-3 usericon"
                        style="font-family: Poppins,sans-serif;">
                    <li class="nav-item dropdown fs-5 fw-bold d-flex align-items-center" style="list-style: none;">
                        <span><i class="fa-solid fa-circle-user" style="font-size: 1.6em;"></i></span>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          &nbsp;Hi, Rakesh
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                          <li><a class="dropdown-item mnuhover" href="dashboard.php" style="font-weight: 600; color: #575757de;">My Profile</a></li>
                          <li><a class="dropdown-item mnuhover" href="#" style="font-weight: 600; color: #575757de;">Bookings</a></li>
                          <li><a class="dropdown-item mnuhover" href="user_lg_out.php" style="font-weight: 600; color: #575757de;">Logout</a></li>
                        </ul>
                      </li>
                      </div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </nav>
    <script src="Assets/bootstrap_js.js"></script>
</body>
</html>