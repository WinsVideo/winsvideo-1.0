

<!DOCTYPE html>
<html>
<head>
    <title>WinsVideo</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">reCaptcha</h5>
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="upload.php" method="POST">
          <!-- here you must input the site key, not the secret key -->
          <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6Lc-_LQZAAAAAAUun1lsQW2amcID_6F0a3LCfrab"></div>
          <br/>
        

    <?php

    error_reporting(0); 
    // here you must input the secret key, not the site key
    // don´t worry, it is server side protected and won´t be
    // visible under the page source, it´s php code from now on...
    $secret = "6Lc-_LQZAAAAACVhpgpULedIm0T3yR7zOPrlDYLJ";

    // set post fields
    $post = [
        'secret' => $secret,
        'response' => $_POST['g-recaptcha-response'],
        'remoteip'   => $_SERVER['REMOTE_ADDR']
    ];

    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    // execute!
    $response = curl_exec($ch);

    // close the connection, release resources used
    curl_close($ch);

    // do anything you want with your response
    // var_dump(json_decode($response)); // uncomment this to get the json full response
    $array = json_decode($response,true);
    //echo "<pre/>";print_r($array); // uncomment this to get the json to array full response/results

    if($array['success'] == 1){
    // here we have confirmed the chalenge, do whatever you want here, as redirecting to another
    // page. i suggest using $_SESSION in order for really protecting the other page to be
    // redirected from here to be safe, else anyone may access the other page directly 
    // without passing by the recapctha challenge, so there won´t be any point in this effort!
        echo "success!" ;
    }
    else{
        echo "reCaptcha";
    }
    ?>
    <br>
            <input type="button" id="recaptchaSubmitBtn" class="btn btn-primary" data-dismiss="modal" value="reCaptchaSubmit" name= "reCaptcha" disabled>

            <script>
                function recaptchaCallback() {
                  $('#recaptchaSubmitBtn').removeAttr('disabled');
                };

                $('#exampleModal').modal({backdrop: 'static', keyboard: false})  
            </script>
          </div>
        </div>
      </div>
    </div>

    </form>


<script>
       $(document).ready(function(){
            $('#exampleModal').modal('show');
        }); 
    </script>

    
<div class="signInContainer">

        <div class="column">

            <div class="header">
                <img src="../assets/images/icons/VideoTubeLogo.png" title="logo" alt="Site logo">
                <h3>WinsVideo</h3>
                <span>Forgot Password</span>
                <br>
                <span>INFO! The email that we have sent you is 10b10t.ddns.net@gmail.com, it it because the owner of the website also owns 10b10t.org (A Minecraft anarchy server)</span>
            </div>

            <div class="loginForm">

                <?php
                    // Import PHPMailer classes into the global namespace
                    // These must be at the top of your script, not inside a function
                    use PHPMailer\PHPMailer\PHPMailer;
                    use PHPMailer\PHPMailer\Exception;

                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';
                    require 'config.php';

                    if(isset($_POST["email"])) {

                        $emailTo = $_POST["email"];

                        $code = uniqid(true);
                        $query = mysqli_query($con, "INSERT INTO resetPassword(code, email) VALUES('$code', '$emailTo')");
                        if(!$query) {
                            exit("Error");
                        }
                        // Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = '10b10t.ddns.net@gmail.com';                     // SMTP username
                        $mail->Password   = 'WinsDominoes2509';                               // SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                        //Recipients
                        $mail->setFrom('password-reset@winsvideo.net', 'WinsVideo');
                        $mail->addAddress($emailTo);     // Add a recipient
                        $mail->addReplyTo('no-reply@winsvideo.net', 'No reply');

                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $url = "http://" .$_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
                        $mail->Subject = 'WinsVideo Password Reset Link';
                        $mail->Body    = "<h1>You requested a password reset</h1> 
                                            Click <a href='$url'>this link</a> to do so.";
                        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

                        $mail->send();
                        echo 'Reset password link has been sent to your email';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    exit(); 

                    }

                    ?>

                <form method="POST">
                    <input type="text" name="email" placeholder="Email" autocomplete="off">
                    <input type="submit" name="submit" value="Reset">
                </form>


            </div>

            <a class="signInMessage" href="../signUp.php">Need an account? Sign up here!</a>
            <br><a class="signInMessage" href="../signIn.php">Already have an account? Sign in here!</a>
        
        </div>
    
    </div>








