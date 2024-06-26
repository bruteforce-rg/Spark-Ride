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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link rel="stylesheet" href="index.css">
    <style>
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

<body>
    <div id="preloader"></div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent" style="position: absolute;">
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
                            <a class="nav-link active mymenu" aria-current="page" href="#">Home</a>
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

    


    <!-- Banner Text -->
    <div class=" d-flex flex-column justify-content-center banner-text text-dark ">
        <div class="mywidth">
            <div class="mx-md-5 fw-bolder">
                <div class="mx-5" style="font-family: poppins,sans-serif;" data-aos="fade-right">
                    Unlock Your Next Ride
                </div>
            </div>
            <div class="mx-md-5" data-aos="fade-right">
                <div class="mx-5" data-aos="zoom-in" data-aos-duration="100000">
                    <span class="fw-bolder" style="font-family: poppins,sans-serif;">
                        With Spark Ride
                    </span>
                    <span class="text-primary text-decoration-underline fw-bolder"
                        style="font-family: poppins,sans-serif;">Easily</span>
                    <p class="mt-3 mb-0 text-white mp">
                        Start your journey today. Don't postpone your plans!
                    </p>
                    <p class="text-white mb-0 mp">
                        Simplify your rides.
                    </p>
                    <p class="mp">
                        <a href="" class="mp mt-3 btn btn-lg btn-primary btnhover"
                            style="font-family: Poppins, sans-serif;">Rent Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- Search box -->
    <div class="pos">
        <div class="container rounded-3 input-form">
            <form>
                <div
                    class="search-box d-flex flex-column flex-sm-row gap-md-5 gap-4 justify-content-between align-items-center p-sm-4 p-3">
                    <div class="ipfield">
                        <label for="city">Select Pickup Location</label>
                        <div class="bg-white rounded-3 p-2 d-flex align-items-center gap-4">
                            <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 340 340" xml:space="preserve"
                                width="25px" height="25px">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g id="XMLID_481_">
                                        <g>
                                            <g>
                                                <path
                                                    d="M170,1.378c-65.781,0-119.297,53.517-119.297,119.297c0,27.144,8.896,52.708,25.726,73.928 c21.464,27.063,83.759,91.194,86.401,93.911l7.169,7.375l7.17-7.374c2.643-2.718,64.958-66.864,86.424-93.935 c16.815-21.204,25.703-46.76,25.703-73.905C289.297,54.895,235.781,1.378,170,1.378z M247.923,182.154 c-16.648,20.995-60.591,67.003-77.923,85c-17.327-17.993-61.254-63.989-77.901-84.978c-13.998-17.649-21.396-38.915-21.396-61.5 c0-54.753,44.544-99.297,99.297-99.297s99.297,44.544,99.297,99.297C269.297,143.262,261.906,164.521,247.923,182.154z">
                                                </path>
                                                <path
                                                    d="M170,47.88c-39.422,0-71.495,32.072-71.495,71.494c0,39.422,32.072,71.495,71.495,71.495 c39.423,0,71.495-32.072,71.495-71.495C241.495,79.953,209.422,47.88,170,47.88z M170,170.869 c-28.394,0-51.495-23.101-51.495-51.495c0-28.394,23.101-51.494,51.495-51.494s51.495,23.1,51.495,51.494 C221.495,147.768,198.394,170.869,170,170.869z">
                                                </path>
                                                <path
                                                    d="M313.094,45.535L297.61,58.193C312.048,75.856,320,98.137,320,120.93c0,22.587-7.391,43.846-21.374,61.479l15.671,12.427 C331.112,173.631,340,148.075,340,120.93C340,93.536,330.445,66.76,313.094,45.535z">
                                                </path>
                                                <path
                                                    d="M26.906,45.535C9.555,66.76,0,93.536,0,120.93c0,27.145,8.888,52.701,25.703,73.905l15.671-12.427 C27.391,164.775,20,143.517,20,120.93c0-22.793,7.952-45.074,22.39-62.737L26.906,45.535z">
                                                </path>
                                                <rect x="110" y="318.622" width="120" height="20"></rect>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <select name="city" class="myselect rounded-3  border-0">
                                <option value="kolkata">Kolkata</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Pune">Pune</option>
                                <option value="Mumbai">Mumbai</option>
                            </select>
                        </div>
                    </div>
                    <div class="ipfield">
                        <label for="date">Pickup Date & Time</label>
                        <div class="bg-white rounded-3 p-2">
                            <input type="datetime-local" name="date" class="rounded-3 border-0 dtinput">
                        </div>
                    </div>
                    <div class="btndiv">
                        <button class=" btn btn-lg btn-primary myfield" value="submit">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="wchooseus">
        <div class="container text-center mb-5" data-aos="fade-down">
            <h2 class="mt-5">Why Choose Us ?</h2>
            <h6>We simplified bike rentals, so you can focus on what's important to you. We Sanitize Bike After Every
                Ride..!!</h6>
        </div>


        <div class="container text-center">
            <div class="fbox d-flex p-2">
                <div class="col-lg-8">
                    <!-- Banner image -->
                    <div class="banner" data-aos="fade-right">
                        <img src="Assets/middle.png" alt="image" style="width: 100%;">
                    </div>
                </div>
                <!-- Features -->
                <div class="col-lg-4">
                    <div class="row gap-3">

                        <!-- helmet -->
                        <div class="helmet d-flex align-items-center px-2 py-3" data-aos="fade-left">
                            <div class="">
                                <img src="Assets/helmet.png" width="60" height="60" class="m-3"
                                    style="color: transparent;">
                            </div>
                            <div class="">
                                <div class="">
                                    <h3 class="h-fit"><span>C</span>omplementary <span>H</span>elmet <span></span></h3>
                                    <p>Your Safety is our priority. We Provide complementary helmets with every ride</p>
                                </div>
                            </div>
                        </div>

                        <!-- Zero Deposit -->
                        <div class="deposit d-flex align-items-center px-2 py-3" data-aos="fade-left">
                            <div class="">
                                <img src="Assets/zero.png" alt="" width="60" height="60" class="m-3"
                                    style="color: transparent;">
                            </div>
                            <div class="">
                                <div class="">
                                    <h3 class="h-fit"><span>Z</span>ero <span>D</span>eposit <span></span></h3>
                                    <p>At Spark Ride you pay only for what you use. We don't take any deposit.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Low price -->
                        <div class="price d-flex align-items-center px-2 py-3" data-aos="fade-left">
                            <div class=""><img src="Assets/offer.png" width="60" height="60" class="m-3"
                                    style="color: transparent;"></div>
                            <div class="">
                                <div class="mx-2">
                                    <h3 class="h-fit"><span>L</span>owest <span>P</span>rice <span>G</span>uarantee</h3>
                                    <p>You can count on us for the best bike rental prices in the city!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Bikes -->
    <div class="popular-section mx-md-5 p-3">
        <h2 class="text-center fw-bold m-5 mt-0" data-aos="fade-down">Our Popular Bikes</h2>
        <div class="bikeshocase d-flex align-items-center gap-2">

            <!-- Bike List -->
            <div class="bikes mb-5" data-aos="fade-up">
                <div class="bike_cat text-center">
                    Sports Bike
                </div>
                <div class="innerbike p-4">
                    <div class="photo mb-4 p-2">
                        <img src="Assets/bike2.png" alt="" style="width: 100%; height: 130px;">
                    </div>
                    <div class="name text-center mb-4 bike_name">
                        Triumph Daytona 660
                    </div>
                    <div class="rate d-flex justify-content-between px-5">
                        <p class="">Price</p>
                        <p class=""> &#8377; 650<span>/Day</span></p>
                    </div>
                    <div class="rent text-center">
                        <button class="d-flex justify-content-center align-items-center p-1">
                            <span style="padding-left: 0.5em;">Rent Now</span>
                            <svg width="40px" height="35px" viewbox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" transform="rotate(0)">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288">
                                </g>
                                <g>
                                    <path d="M10 7L15 12L10 17" stroke="#ffffff" stroke-width="1.344"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


            <div class="bikes mb-5" data-aos="fade-up">
                <div class="bike_cat text-center">
                    Sports Bike
                </div>
                <div class="innerbike p-4">
                    <div class="photo mb-4 p-2">
                        <img src="Assets/bike-5.png" alt="" style="width: 100%; height: 130px;">
                    </div>
                    <div class="name text-center mb-4 bike_name">
                        Triumph Daytona 660
                    </div>
                    <div class="rate d-flex justify-content-between px-5">
                        <p class="">Price</p>
                        <p class=""> &#8377; 650<span>/Day</span></p>
                    </div>
                    <div class="rent text-center">
                        <button class="d-flex justify-content-center align-items-center p-1">
                            <span style="padding-left: 0.5em;">Rent Now</span>
                            <svg width="40px" height="35px" viewbox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" transform="rotate(0)">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288">
                                </g>
                                <g>
                                    <path d="M10 7L15 12L10 17" stroke="#ffffff" stroke-width="1.344"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


            <div class="bikes mb-5" data-aos="fade-up">
                <div class="bike_cat text-center">
                    Sports Bike
                </div>
                <div class="innerbike p-4">
                    <div class="photo mb-4 p-2">
                        <img src="Assets/bike-7.png" alt="" style="width: 100%; height: 130px;">
                    </div>
                    <div class="name text-center mb-4 bike_name">
                        Triumph Daytona 660
                    </div>
                    <div class="rate d-flex justify-content-between px-5">
                        <p class="">Price</p>
                        <p class=""> &#8377; 650<span>/Day</span></p>
                    </div>
                    <div class="rent text-center">
                        <button class="d-flex justify-content-center align-items-center p-1">
                            <span style="padding-left: 0.5em;">Rent Now</span>
                            <svg width="40px" height="35px" viewbox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" transform="rotate(0)">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288">
                                </g>
                                <g>
                                    <path d="M10 7L15 12L10 17" stroke="#ffffff" stroke-width="1.344"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


            <div class="bikes mb-5" data-aos="fade-up">
                <div class="bike_cat text-center">
                    Sports Bike
                </div>
                <div class="innerbike p-4">
                    <div class="photo mb-4 p-2">
                        <img src="Assets/bike-3.png" alt="" style="width: 100%; height: 130px;">
                    </div>
                    <div class="name text-center mb-4 bike_name">
                        Triumph Daytona 660
                    </div>
                    <div class="rate d-flex justify-content-between px-5">
                        <p class="">Price</p>
                        <p class=""> &#8377; 650<span>/Day</span></p>
                    </div>
                    <div class="rent text-center">
                        <button class="d-flex justify-content-center align-items-center p-1">
                            <span style="padding-left: 0.5em;">Rent Now</span>
                            <svg width="40px" height="35px" viewbox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" transform="rotate(0)">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288">
                                </g>
                                <g>
                                    <path d="M10 7L15 12L10 17" stroke="#ffffff" stroke-width="1.344"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


            <div class="bikes mb-5" data-aos="fade-up">
                <div class="bike_cat text-center">
                    Sports Bike
                </div>
                <div class="innerbike p-4">
                    <div class="photo mb-4 p-2">
                        <img src="Assets/bike-5.png" alt="" style="width: 100%; height: 130px;">
                    </div>
                    <div class="name text-center mb-4 bike_name">
                        Triumph Daytona 660
                    </div>
                    <div class="rate d-flex justify-content-between px-5">
                        <p class="">Price</p>
                        <p class=""> &#8377; 650<span>/Day</span></p>
                    </div>
                    <div class="rent text-center">
                        <button class="d-flex justify-content-center align-items-center p-1">
                            <span style="padding-left: 0.5em;">Rent Now</span>
                            <svg width="40px" height="35px" viewbox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" transform="rotate(0)">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288">
                                </g>
                                <g>
                                    <path d="M10 7L15 12L10 17" stroke="#ffffff" stroke-width="1.344"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


            <div class="bikes mb-5" data-aos="fade-up">
                <div class="bike_cat text-center">
                    Sports Bike
                </div>
                <div class="innerbike p-4">
                    <div class="photo mb-4 p-2">
                        <img src="Assets/bike-4.png" style="width: 100%; height: 130px;">
                    </div>
                    <div class="name text-center mb-4 bike_name">
                        Triumph Daytona 660
                    </div>
                    <div class="rate d-flex justify-content-between px-5">
                        <p class="">Price</p>
                        <p class=""> &#8377; 650<span>/Day</span></p>
                    </div>
                    <div class="rent text-center">
                        <button class="d-flex justify-content-center align-items-center p-1">
                            <span style="padding-left: 0.5em;">Rent Now</span>
                            <svg width="40px" height="35px" viewbox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" transform="rotate(0)">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288">
                                </g>
                                <g>
                                    <path d="M10 7L15 12L10 17" stroke="#ffffff" stroke-width="1.344"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bikes mb-5" data-aos="fade-up">
                <div class="bike_cat text-center">
                    Sports Bike
                </div>
                <div class="innerbike p-4">
                    <div class="photo mb-4 p-2">
                        <img src="Assets/bike-5.png" alt="" style="width: 100%; height: 130px;">
                    </div>
                    <div class="name text-center mb-4 bike_name">
                        Triumph Daytona 660
                    </div>
                    <div class="rate d-flex justify-content-between px-5">
                        <p class="">Price</p>
                        <p class=""> &#8377; 650<span>/Day</span></p>
                    </div>
                    <div class="rent text-center">
                        <button class="d-flex justify-content-center align-items-center p-1">
                            <span style="padding-left: 0.5em;">Rent Now</span>
                            <svg width="40px" height="35px" viewbox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" transform="rotate(0)">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288">
                                </g>
                                <g>
                                    <path d="M10 7L15 12L10 17" stroke="#ffffff" stroke-width="1.344"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


            <div class="bikes mb-5" data-aos="fade-up">
                <div class="bike_cat text-center">
                    Sports Bike
                </div>
                <div class="innerbike p-4">
                    <div class="photo mb-4 p-2">
                        <img src="Assets/bike-5.png" alt="" style="width: 100%; height: 130px;">
                    </div>
                    <div class="name text-center mb-4 bike_name">
                        Triumph Daytona 660
                    </div>
                    <div class="rate d-flex justify-content-between px-5">
                        <p class="">Price</p>
                        <p class=""> &#8377; 650<span>/Day</span></p>
                    </div>
                    <div class="rent text-center">
                        <button class="d-flex justify-content-center align-items-center p-1">
                            <span style="padding-left: 0.5em;">Rent Now</span>
                            <svg width="40px" height="35px" viewbox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" transform="rotate(0)">
                                <g stroke-width="0"></g>
                                <g stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.288">
                                </g>
                                <g>
                                    <path d="M10 7L15 12L10 17" stroke="#ffffff" stroke-width="1.344"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- How to section     -->

    <div class="how-section pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center"><span class="site-title-tagline">Process</span>
                        <h2 class="site-title" data-aos="fade-down">How It's <span>Work</span>
                        </h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-3 col-md-6 text-center mb-50">
                    <div class="process-single">
                        <div class="icon" data-aos="fade-right"><span>01</span><img src="Assets/destination.svg" alt="Pick Destination"></div>
                        <h4 data-aos="fade-up">Pick Destination</h4>
                        <p data-aos="fade-up">Just select your pickup location where you want to travel.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-50">
                    <div class="process-single">
                        <div class="icon" data-aos="fade-right"><span>02</span><img src="Assets/choose-car.svg"
                                alt="Choose Perfect Car or Bike"></div>
                        <h4 data-aos="fade-up">Choose Perfect Car or Bike</h4>
                        <p data-aos="fade-up">Select your required car and bike for your journey.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center mb-50">
                    <div class="process-single">
                        <div class="icon" data-aos="fade-left"><span>03</span><img src="Assets/online-payment.svg" alt="Online Payment">
                        </div>
                        <h4 data-aos="fade-left">Online Payment</h4>
                        <p data-aos="fade-left">Conform your booking by making online payment.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center mb-50">
                    <div class="process-single">
                        <div class="icon" data-aos="fade-left"><span>04</span><img src="Assets/confirm-ride.svg"
                                alt="Enjoy Your Car/Bike Ride"></div>
                        <h4 data-aos="fade-left">Enjoy Your Car/Bike Ride</h4>
                        <p data-aos="fade-left">After successful booking you can enjoy your journey.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- About Us -->
    <div class="about-section text-center">
        <div class="about-heading" data-aos="fade-down">About Us</div>
        <div class="heading-divider"></div>
        <div class="d-flex about-content p-3 pt-0 justify-content-center">
            <div class="about-img col-lg-6">
                <img src="Assets/Slice 1.png" alt="About Us" style=" width:100%;" data-aos="fade-right">
            </div>
            <div class="about-text col-lg-6 d-flex flex-column justify-content-center p-3" data-aos="fade-left">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam vitae quia repellat nemo voluptate
                laudantium possimus sequi necessitatibus debitis repudiandae sed, eum, quaerat expedita qui, sint
                dignissimos impedit? Ullam pariatur quidem a tenetur, labore voluptatem at illo facilis beatae inventore
                odio dignissimos repellendus eum voluptatum cumque asperiores eius veritatis dolore exercitationem eaque
                fuga soluta aperiam recusandae obcaecati? Soluta exercitationem reprehenderit rerum sit deserunt, rem
                cupiditate, labore, blanditiis nisi eaque esse.
                <div class="mt-3" data-aos="fade-up"><button class="btn">Read More</button></div>
            </div>

        </div>
    </div>

    <!-- footer -->
    <div class="footer-widget p-3 mt-5">
        <div class="container">
            <div class="row footer-widget-wrapper mt-5">
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget-box about-us">
                        <a href="#" class="footer-logo">
                            <h4 class="mb-0" style="color: #003687;">SPARK RIDE</h4>
                        </a>
                        <p class="mb-4"> If you plan to holiday and looking for a bike or car on
                            rent, reserve online of your choice today and make your holiday memorable. </p>
                        <ul class="footer-contact p-0">
                            <li>
                                <span><i class="fa-solid fa-phone"></i></span><span>+91 1234567890</span>
                            </li>
                            <li>
                                <span><i class="fa-solid fa-location-dot"></i></span><span>Arambagh, Hooghly</span>
                            </li>
                            <li>
                                <span><i class="fa-solid fa-envelope"></i></span><span>sparkride@gmail.com</span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 m-none f">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Quick Links</h4>
                        <ul class="footer-list p-0">
                            <li><a href="/about"><i class="fas fa-caret-right"></i> About Us</a>
                            </li>
                            <li><a href="/contact"><i class="fas fa-caret-right"></i> Contact
                                    Us</a></li>
                            <li><a href="/terms-conditions"><i class="fas fa-caret-right"></i>
                                    Terms &amp; Conditions</a></li>
                            <li><a href="/privacy-policy"><i class="fas fa-caret-right"></i>
                                    Privacy Policy</a></li>
                            <li><a href="/cancellation-policy"><i class="fas fa-caret-right"></i>
                                    Cancellation Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 ">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">About Us</h4>
                        <div class="footer-newsletter">
                            <p>Spark Ride offer self-ride two wheelers on rent in Arambagh. If you are looking for bike on rent Spark Ride is the best
                                option to make your trip memorable.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="Assets/bootstrap_js.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        var loader= document.getElementById('preloader')
        // window.addEventListener("load", function(){
        //     loader.style.display="none"
        // })
        setTimeout(function(){
            loader.style.display="none";

        },3000)
    </script>

</body>

</html>