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
<div class="signInContainer">

        <div class="column">

            <div class="header">
                <img src="../assets/images/icons/VideoTubeLogo.png" title="logo" alt="Site logo">
                <h3>WinsVideo</h3>
                <span>Forgot Password</span>
            </div>

            <div class="loginForm">

            <?php 
				include("config.php");

				if(!isset($_GET["code"])) {
					exit("This link has been expired
						<br>
						<a class='btn btn-primary' href='requestReset.php' role='button'>Go Back</a><hr>");
				}

				$code = $_GET["code"]; 

				$getEmailQuery = mysqli_query($con, "SELECT email FROM resetPassword WHERE code='$code'"); 

				if(mysqli_num_rows($getEmailQuery) == 0) {
					exit("This link has been expired");
				}


				if(isset($_POST["password"])) {
					$pw = $_POST["password"];
					$pw = hash("sha512", $pw);

					$row = mysqli_fetch_array($getEmailQuery);
					$email = $row["email"];

					$query = mysqli_query($con, "UPDATE users SET password='$pw' WHERE email='$email'"); 

					if($query) {
						$query = mysqli_query($con, "DELETE FROM resetPassword WHERE code='$code'");
							exit("Password Updated<br>
								<a href='../signIn.php'>Go back to Sign In</a>"); 
					} 
					else {
						exit("Something went wrong."); 
					}
				}
				?>
        
                <form method="POST">
					<input type="password" name="password" placeholder="New password">
					<br>
					<input type="submit" name="submit" class="btn btn-primary" value="Update password">
				</form>

				<hr>

            </div>

        </div>
    
    </div>

</html>