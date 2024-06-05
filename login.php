<?php
require 'nav.php';
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="Assets/bootstrap.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            font-family: 'Poppins', SANS-SERIF;
        }

        .limiter {
            width: 100%;
            margin: 0 auto;
        }

        .container-login100 {
            width: 100%;
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;
            background: #ebeeef;
        }

        .wrap-login100 {
            width: 670px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            box-shadow: 0px 0px 13px 1px #040506e3;
        }

        .login100-form-title {
            height: 100%;
            font-family: 'Poppins-Regular', sans-serif;
            width: 100%;
            position: relative;
            z-index: 1;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            padding: 70px 15px 74px;
        }

        .login100-form-title::before {
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(54, 84, 99, .7);
        }

        .login100-form-title-1 {
            font-family: 'Poppins';
            font-weight: bold;
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            line-height: 1.2;
            text-align: center;
        }

        .login100-form {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 43px 88px 93px 190px;
        }

        .validate-input {
            position: relative;
        }

        .wrap-input100 {
            width: 100%;
            position: relative;
            border-bottom: 2.5px solid #017bfd;
        }

        .m-b-26 {
            margin-bottom: 26px;
        }

        .label-input100 {
            font-family: 'Poppins-Regular', sans-serif;
            font-size: 15px;
            color: gray;
            line-height: 1.2;
            text-align: right;
            position: absolute;
            top: 14px;
            left: -105px;
            width: 80px;
        }

        input.input100 {
            height: 45px;
        }

        .input100 {
            font-family: Poppins-Regular, sans-serif;
            font-size: 15px;
            color: #555;
            line-height: 1.2;
            display: block;
            width: 100%;
            background: 0 0;
            padding: 0 5px;
        }

        input {
            outline: none;
            border: none;
            margin: 0;
        }

        input[type="text" i] {
            padding-block: 1px;
            padding-inline: 2px;
        }

        .focus-input100 {
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .focus-input100::before {
            content: "";
            display: block;
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 0;
            height: 10px;
            transition: all .6s;
            background: #12d712;
        }


        .m-b-18 {
            margin-bottom: 18px;
        }

        .flex-sb-m {
            display: flex;
            justify-content: end;
            -ms-align-items: center;
            align-items: center;
        }

        .w-full {
            width: 100%;
        }

        .p-b-30 {
            padding-bottom: 30px;
        }

        .input-checkbox100 {
            display: none;
        }

        a {
            margin: 0;
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
            color: #57b846;
        }

        .container-login100-form-btn {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .login100-form-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            min-width: 160px;
            height: 50px;
            background-color: #004274;
            border-radius: 25px;
            font-family: Poppins-Regular, sans-serif;
            font-size: 16px;
            color: #fff;
            line-height: 1.2;
            transition: all .4s;
        }

        button {
            outline: none !important;
            border: none;
            background: 0 0;
        }

        .txt1 {
            font-family: Poppins-Regular, sans-serif;
            font-size: 13px;
            line-height: 1.4;
            color: #999;
        }

        @media (max-width: 576px) {
            .login100-form {
                padding: 43px 15px 57px 117px;
            }
        }

        @media (max-width: 480px) {
            .login100-form {
                padding: 43px 15px 57px;
            }
        }
        @media (max-width: 480px) {
            .label-input100 {
                text-align: left;
                position: unset;
                top: unset;
                left: unset;
                width: 100%;
                padding: 0 5px;
                color: #4a4949;    
                font-weight: 600;
            }
    
        }
        .footer-widget {
            box-sizing: border-box;
            background: #5e6974;
            font-family: poppins, sans-serif;
            font-style: normal;
            font-size: 16px;
            font-weight: 400;
            color: #ffffff;
            line-height: 1.8;
            width: 100%;
        }
        .footer-widget i, .footer-widget-title {
    
             color: #003687;
        }
        .footer-widget-wrapper {
             justify-content: space-between;
        }
        .footer-widget img{
            width: 110px;
        }
        .footer-widget-box {
            margin-bottom: 20px;
        }
        .footer-widget-box a {
            text-decoration: none;
        }
        .footer-contact li {
            display: flex;
            gap: 15px;
            justify-content: start;
            align-items: center;
            color: #f5faff;
            font-size: 16px;
            margin-bottom: 15px;
        }
        .footer-list li {
            list-style: none;
        }
        .footer-list li a {
            color: #ffffff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    
    

   <?php
$wr_pass=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    require 'Admin/Functions/connection.php';
    require 'Admin/Functions/encryption.php';
    $mail=$_POST['mail'];
    $pass=enc($_POST['pass']);
    $check_query="SELECT * FROM user WHERE email='$mail' AND password='$pass'";
    $run_check_query = mysqli_query($conn,$check_query);
    if(mysqli_num_rows($run_check_query)==1){
        // session_start();
        $_SESSION['USER_MAIL']=$mail;
        $_SESSION['EN_PSW']=$pass;
        ?>
        <script>window.location='index.php'</script>
        <?php
    }
    else{
        $wr_pass=1;
    }
}

?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(Assets/bg-2.jpg);">
                    <span class="login100-form-title-1">
                        LOGIN TO SPARK RIDE
                    </span>
                </div>
                <form class="login100-form validate-form" method="POST">
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100 ">EMAIL</span>
                        <input class="input100" type="email" name="mail" placeholder="Enter email" required>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">PASSWORD</span>
                        <input class="input100" type="password" name="pass" placeholder="Enter password" required>
                        <span class="focus-input100"></span>
                    </div>
                    <?php
                        if($wr_pass==1){
                            echo"<div class='text-danger mt-2'>Invalid Credentials</div>";
                        }
                    ?>
                    <div class="flex-sb-m w-full p-b-30">
                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
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
</body>

</html>

