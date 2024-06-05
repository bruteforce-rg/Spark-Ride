<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/bootstrap.css">
    <link rel="stylesheet" href="signup.css">
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
    require('Admin/Functions/connection.php');
    require('Admin/Functions/encryption.php');
    require("Mail/phpmailer/PHPMailerAutoload.php");
    $email_exist = "";
    $mob_exist = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $pass = $_POST['password'];
        $cnf_pass = $_POST['cnf-password'];

        if ($pass == $cnf_pass) {

            $email = $_POST['email'];
            $mob = $_POST['mob-no'];
            $mail_exist_query = "SELECT * FROM user WHERE email='$email'";
            $mob_exist_query = "SELECT * FROM user WHERE phone_no='$mob'";
            $run_mail_exist_query = mysqli_query($conn, $mail_exist_query);
            $run_mob_exist_query = mysqli_query($conn, $mob_exist_query);
            $mail_res = mysqli_num_rows($run_mail_exist_query);
            $mob_res = mysqli_num_rows($run_mob_exist_query);

            if ($mail_res > 0  || $mob_res > 0) {
                if ($mail_res > 0) {
                    $email_exist = "Email Already Exist";
                }
                if ($mob_res > 0) {
                    $mob_exist = "Mobile No. Already Exist";
                }
            } else {

                $no = rand(000000, 999999);
                $id = "SPR" . $no;
                while (true) {
                    $dup_query = "SELECT * FROM `user` WHERE `id` = '$id'";
                    $run_dup_query = mysqli_query($conn, $dup_query);
                    $res = mysqli_num_rows($run_dup_query);
                    if ($res > 0) {
                        $no = rand(000000, 999999);
                        $id = "SPR" . $no;
                    } else {
                        break;
                    }
                }



                $first_name = $_POST['fname'];
                $last_name = $_POST['lname'];
                $dl_no = $_POST['dl-no'];
                $pass = enc($_POST['password']);
                $otp = rand(100000, 999999);
                session_start();
                $_SESSION['new_user_id']=$id;
                $_SESSION['new_user_mail']=$email;

                $add_query = "INSERT INTO `user` (`id`, `fname`, `lname`, `dl_no`, `email`, `password`, `phone_no`,`otp`,`reg_time`) VALUES ('$id', '$first_name', '$last_name', '$dl_no', '$email', '$pass', '$mob','$otp',current_timestamp())";
                $run_add_quey = mysqli_query($conn, $add_query);
                if ($run_add_quey) {

                    $mail = new PHPMailer;

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';

                    $mail->Username = 'com.sparkride@gmail.com';
                    $mail->Password = 'mijraqwoluuzosrr';

                    $mail->setFrom('com.sparkride@gmail.com', 'Spark Ride');
                    $mail->addAddress($_POST["email"]);

                    $mail->isHTML(true);
                    $mail->Subject = "Your verify code";
                    $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                        <br><br>
                        <p>With regrads,</p>
                        <b>Spark Ride</b>";

                    if (!$mail->send()) {
                         ?> 
                        <script>
                            alert("<?php echo "Register Failed, Invalid Email " ?>");
                        </script>
                        <?php
                    } else {
                        ?>
                        <script>
                            alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                            window.location.replace('verification.php');
                        </script>
                        <?php
                    }
                }
            }
        } else {
            echo "<script>alert('PASSWORD NOT MATCHED')</script>";
        }
    }
    ?>

    <section class="form-section d-flex justify-content-center mt-5">
        <div class="container form-div d-flex">
            <div class="photo w-50 d-flex justify-content-center align-items-center">
                <h2 class="text-white">SIGN UP</h2>
            </div>
            <div class="main-form p-3 w-50">
                <form method="post">
                    <div class="container d-flex flex-column justify-content-center gap-2">
                        <label for="fname">FIRST NAME</label>
                        <input type="text" name="fname" required>
                        <label for="lname">LAST NAME</label>
                        <input type="text" name="lname" required>
                        <label for="email">EMAIL ADRESS</label>
                        <input type="email" name="email" required>
                        <?php
                        if ($email_exist != "") {
                            echo ' <span class="text-danger fw-lighter ">Email already exist</span>';
                        }
                        ?>
                        <label for="mob-no">MOBILE NO</label>
                        <input type="number" id="number" name="mob-no" required>
                        <?php
                        if ($mob_exist != "") {
                            echo ' <span class="text-danger fw-lighter ">Mobile No. already exist</span>';
                        }
                        ?>
                        <label for="dl-no">DRIVING LICENSE NO</label>
                        <input type="text" name="dl-no" required>
                        <label for="password">PASSWORD</label>
                        <input type="password" name="password" required>
                        <label for="cnf-password">CONFIRM PASSWORD</label>
                        <input type="password" name="cnf-password" required>
                        <button class="signupbtn">Sign Up</button>
                        <p>
                            By clicking through, I agree with the
                            <a href="">Terms & Conditions</a> and <a href="">Privacy Policy</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>



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
    <!-- <script>
        let mobile_no=document.getElementById('number').value
        if(mobile_no.charAt(0)!=9 || mobile_no.charAt(0)!=8 || mobile_no.charAt(0)!=7 || mobile_no.charAt(0)!=6){
            console.log('Mobile Number Should be start with 6 or 7 or 8 or 9')
        }
    </script> -->
</body>

</html>