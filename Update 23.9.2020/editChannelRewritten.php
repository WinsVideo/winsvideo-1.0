<?php 
	include_once("header2.php"); 
	include_once("includes/classes/ProfileData.php"); 
?>

<!DOCTYPE html>
<html>
	<head>
	
	</head>
	<body>
	<div class="column article animated slideInUp">


	<?php
		class editChannel { 
			private $con, $userLoggedInObj, $profileData;

    public function __construct($con, $userLoggedInObj, $profileUsername) {
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;
        $this->profileData = new ProfileData($con, $profileUsername);
    }

    public function create() {
        $profileUsername = $_SESSION["userLoggedIn"]; 

        if(!$this->profileData->userExists()) {
            return "<script>	alert('Login to your account to access the feature'); </script>";
        }

        $coverPhotoSection = $this->createCoverPhotoSection();
        $profilePictureSection = $this->createHeaderSection();
        return "<div class='profileContainer'>
                    $coverPhotoSection
                    $profilePictureSection
                    
                </div>";
    }
		public function createCoverPhotoSection() { 
			$banner = $this->profileData->getCoverPhoto(); 
				$html = "<p>Present Cover Photo</p>
				<img class='coverPhoto' width='1000px' height='500px' src='$banner'>"; 

				return $html; 
		} 

		public function createHeaderSection() { 
			$profilePic = $this->profileData->getProfilePic(); 
			$background = $this->profileData->getBackground(); 

			$html = "<p>Present Profile Picture</p>
			<img class='profilePicture' src='$profilePic'>

			<br><br>
			
			<p>Your Channel background</p>
			<img class='backgroundImage' width='1000px' height='500px' src='$background'>"; 

			return $html; 
		} 

		public function createAboutSection() { 
			$aboutDescription = $this->profileData->getAboutText(); 

			$html = "<p>Your About Section</p>
			<h5>$aboutDescription</h5>"; 

			return $html; 
		} 

		public function createCountrySection() { 
			$country = $this->profileData->getCountry(); 

			$html = "<p>Your Channel Country</p>
			<h5>$country</h5>"; 

			return $html; 
		} 

		public function createLinksSection() { 
			$links = $this->profileData->getLinks(); 

			$html = "<p>Your Links</p>
			<h5>$links</h5>"; 

			return $html; 
		} 

		public function createBackgroundSection() {
			 
		}


		} 
	?> 

	<h1>Edit Channel Details</h1>
	<p>You can edit your channel details by clicking the button on the section you want!</p>
	<hr>

	<h3>Upload Profile Picture</h3>
	<p>Upload Profile, by clicking the Edit Profile Picture Button</p>
	<hr>
		<button onclick="window.location.href = 'profilePicture.php';">Edit Profile Picture</button>
		
				<br>
			<?php 
		// Display Page 
		if(isset($_GET["username"])) {
    		$profileUsername = $_SESSION["userLoggedIn"]; 
		}



	else {
		echo "Channel not found";
    exit();
	}
	$profileGenerator = new editChannel($con, $userLoggedInObj, $profileUsername);
	echo $profileGenerator->createHeaderSection();


	?> 
	<br>
	<button onclick="window.location.href = 'channelBackground.php';">Edit Channel Background</button>
			
		
		<h3>Upload Banner Image</h3>
	<p>Upload Banner, by clicking the Banner Picture button</p>
	<hr>
		<button onclick="window.location.href = 'bannerPicture.php';">Edit Banner Picture</button>
				<br>
			

					<?php 
		// Display Page 
		if(isset($_GET["username"])) {
    		$profileUsername = $_SESSION["userLoggedIn"]; 
		}



	else {
		echo "Channel not found";
    exit();
	}
	$profileGenerator = new editChannel($con, $userLoggedInObj, $profileUsername);
	echo $profileGenerator->createCoverPhotoSection();
	?> 
	<br><br><br>
	<h3>Change Channel Description</h3>
	<p>Change Channel Description by clicking the Edit Channel Descrption Button</p>
	<hr>
		<button onclick="window.location.href = 'channelDescription.php';">Edit Channel Description</button>
				<br>
			

					<?php 
		// Display Page 
		if(isset($_GET["username"])) {
    		$profileUsername = $_SESSION["userLoggedIn"]; 
		}



	else {
		echo "Channel not found";
    exit();
	}
	$profileGenerator = new editChannel($con, $userLoggedInObj, $profileUsername);
	echo $profileGenerator->createAboutSection();
	?> 
	<br>
	<h3>Update User's Region / Country</h3>
	<p>Update Region, by clicking the Edit Country button</p>
	<hr>
		<button onclick="window.location.href = 'country.php';">Edit Country</button>
				<br>
			

					<?php 
		// Display Page 
		if(isset($_GET["username"])) {
    		$profileUsername = $_SESSION["userLoggedIn"]; 
		}


	else {
		echo "Channel not found";
    exit();
	}
	$profileGenerator = new editChannel($con, $userLoggedInObj, $profileUsername);
	echo $profileGenerator->createCountrySection();
	?> 
	

	<br>
	<h3>Update Links</h3>
	<p>Update Links, by clicking the Edit Links button</p>
	<hr>
		<button onclick="window.location.href = 'addLinks.php';">Edit Links</button>
				<br>
			

					<?php 
		// Display Page 
		if(isset($_GET["username"])) {
    		$profileUsername = $_SESSION["userLoggedIn"]; 
		}



	else {
		echo "Channel not found";
    exit();
	}
	$profileGenerator = new editChannel($con, $userLoggedInObj, $profileUsername);
	echo $profileGenerator->createLinksSection();
	?> 

	</body>
</html>


