<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP RESEND</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['new_user_id']) && isset($_SESSION['new_user_mail']))
{
    $id=$_SESSION['new_user_id'];
    $email=$_SESSION['new_user_mail'];
    require('Admin/Functions/connection.php');
    require('Mail/phpmailer/PHPMailerAutoload.php');
    
    $otp = rand(100000, 999999);
    $update_query = "UPDATE `user` SET `otp` = '$otp' WHERE `user`.`id` = '$id'";
                $run_update_quey = mysqli_query($conn, $update_query);
                if ($run_update_quey){
                    $mail = new PHPMailer;

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'tls';

                    $mail->Username = 'com.sparkride@gmail.com';
                    $mail->Password = 'mijraqwoluuzosrr';

                    $mail->setFrom('com.sparkride@gmail.com', 'Spark Ride');
                    $mail->addAddress($email);

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
                            alert("<?php echo "OTP Resend Successfully, OTP sent to " . $email ?>");
                            window.location.replace('verification.php');
                        </script>
                        <?php
                }
            }
}
?>
</body>
</html>