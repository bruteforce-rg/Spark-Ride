<?php
session_start();
if(isset($_SESSION['new_user_id']) && isset($_SESSION['new_user_mail'])){
    $id=$_SESSION['new_user_id'];
    $invotp="";
    require('Admin/Functions/connection.php');
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTP Verification</title>
        <link rel="stylesheet" href="Assets/bootstrap.css">
        <link rel="stylesheet" href="signup.css">
        <link rel="stylesheet" href="footer.css">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>

            <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-transparent">
             <div class="container">

            <a class="navbar-brand" href="#"><img src="Assets/spride.png" alt="logo" style="width: 110px;"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="position: relative;">
                    <svg style="border: 4px solid rgb(24, 0, 162);
                        border-radius: 11px;
                        width: 56px;
                        height: 41px;
                        position: absolute;
                        top: -6px;
                        left: -13px;    
                    " xmlns="http://www.w3.org/2000/svg" viewbox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                    </svg>
                </span>
            </button>

            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <div class="offcanvas-header"><img src="Assets/spride.png" alt="logo" style="width: 110px;">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body d-flex flex-lg-row flex-column" style="font-family: Poppins,sans-serif;">
                    <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3 fw-medium gap-lg-4">
                        <li class="nav-item">
                            <a class="nav-link mymenu" aria-current="page" href="index.html">Home</a>
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
                    </ul>

                    <div class="d-flex flex-lg-row justify-content-center align-items-center gap-3" style="font-family: Poppins,sans-serif;">
                        <a href="" class="text-decoration-none px-3 py-1 bg-primary text-white rounded-4 btnhover">Login</a>
                        <a href="signup.html" class=" active text-decoration-none px-3 py-1 bg-primary text-white rounded-4 btnhover">Sign
                            Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>


        <?php
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $otp=$_POST['otp'];
                $verify_query="SELECT * FROM user WHERE id='$id' AND otp='$otp'";
                $run_verify_query=mysqli_query($conn,$verify_query);

                if(mysqli_num_rows($run_verify_query)>0){
                    $update_status="UPDATE `user` SET `active` = '1' WHERE `user`.`id` = '$id'";
                    $run_update_status=mysqli_query($conn,$update_status);
                    if($run_update_status){
                        ?>
                    <script>
                        function msg(){
                            let a=document.querySelector('.main-form')
                            a.innerHTML = '<div style="font-family:Poppins,Sans-serif" class="alert alert-success fade show" role="alert"><strong>You are verified successfully.</strong><span><a href="login.php">Login Now</a></span></div>'
                        }
                        window.onload=function(){
                            msg()
                        }
                    </script>
                        <?php
                        unset($_SESSION['new_user_id']);
                        unset($_SESSION['new_user_mail']);
                        session_destroy();
                    }
                    else{
                        echo"<script>alert('Something Went Wrong')</script>";
                    }
                }
                else{
                $invotp="Invalid OTP";
                //    echo"<script>alert('Invalid OTP')</script>";
                }
            }
        ?>        

            <!-- form -->
         <section class="form-section d-flex justify-content-center mt-5">
            <div class="container form-div d-flex" style="height: 500px;">
                <div class="photo w-50 d-flex justify-content-center align-items-center">
                    <h2 class="text-white">SIGN UP</h2>
                </div>
                <div class=" d-flex justify-content-center align-items-center main-form p-3 w-50">
                    <form method="post">
                        <div class="container d-flex flex-column justify-content-center gap-2">
                            <label for="otp">Enter Your OTP</label>
                            <input type="number" name="otp" class="form-" required>
                            <span class="d-flex justify-content-end"><a href="resend.php" class="fw-light">Resend OTP</a></span>
                            <?php
                        if ($invotp != "") {
                            echo ' <span class="text-danger fw-lighter ">Invalid OTP</span>';
                        }
                        ?>
                            <button class="signupbtn mt-2">Verify</button>
                            <p>
                                By clicking through, I agree with the
                                <a href="">Terms & Conditions</a> and <a href="resend.php">Privacy Policy</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    
                        
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
    </body>
    </html>


    <?php
   
}
else{
    ?>
    <script>
        window.location.replace('signup.php');
    </script>
    <?php
}

?>
