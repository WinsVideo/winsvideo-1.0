<?php 
require_once("includes/classes/User.php"); 
include_once("includes/classes/ProfileData.php"); 
include_once("includes/studioHeader.php"); 

$usernameLoggedIn = User::isLoggedIn() ? $_SESSION["userLoggedIn"] : "";
$userLoggedInObj = new User($con, $usernameLoggedIn);

?>

<style>

	
			@import url('https://fonts.googleapis.com/css?family=Roboto:300&display=swap');
			 p.subs { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 50px; 
			}

			p.subCount { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 50px; 
			}
			
			p.viewCount { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 50px; 
			}
			p.current {
				font-size: 11px; 
			}
			</style>

<?php

	error_reporting(0); 
		class ProfileGenerator {

		 private $con, $userLoggedInObj, $profileData;


		public function __construct($con, $loggedInUsername, $profileUsername2) {
			$this->con = $con;
			$this->loggedInUsername = $loggedInUsername;
			$this->profileData = new ProfileData($con, $profileUsername2);
		 }

		 function formatNumberForDisplay($viewCount, $decimal=0, $decimalSeperator='.', $numberSeperator=',')
			{
     			return number_format($number, $decimal, $decimalSeperator, $numberSeperator);
			}

		 public function create() { 
			$profileUsername2 = $_SESSION["userLoggedIn"];
        
        if(!$_SESSION["userLoggedIn"]) {
        	return "Please login to your WinsVideo account to access the dashboard";
        }

        if(!$this->profileData->userExists()) {
            return "User does not exist
					<br>Please login to your WinsVideo account to access the dashboard";
        }
		
		//Main part
		$rightSidebar = $this->createRightSidebar(); 
		$mainSidebar = $this->createMainSidebar();
		$leftSidebar = $this->createLeftSidebar();
        return "<div class='content'>
        			$leftSidebar
        			$rightSidebar
        			
        			$mainSidebar
        			
        		</div>"; 

		} 

		public function createLeftSidebar() { 
			$subCount = $this->profileData->getSubscriberCount(); 
			$viewCount = $this->profileData->getTotalViews2(); 
			$profilePic = $this->profileData->getProfilePic(); 
			$name = $this->profileData->getProfileUserFullName(); 
			$username = $this->profileData->getProfileUsername(); 
			return "<div class='sidebar'>
					<div>
						<img class='profileImage' src='$profilePic' width='150' height='150' alt='$username' />
						<h3>$name</h3>
						<p>$username</p>
					</div>
						<hr>
					
					</div>"; 
		}

		public function createMainSidebar() { 
			$videos = $this->profileData->getUsersVideos();
		if(sizeof($videos) > 0) {
            $videoGrid = new VideoGrid($this->con, $this->userLoggedInObj);
            $videoGridHtml = $videoGrid->createLarge($videos, null, false);
        }
        else {
            $videoGridHtml = "<span>This user has no videos</span>";
        }

		return "<div class='main'>
					<div class='videos largeVideoGridContainer'>
						$videoGridHtml
					</div>
				</div>"; 
 
		}

		//right side bar
		public function createRightSidebar() { 
			$subCount = $this->profileData->getSubscriberCount(); 
			$viewCount = $this->profileData->getTotalViews2(); 
			$totalVids = $this->profileData->getTotalVideoCount();
			return "<div class='rightSideBar'>
					<h4>Channel Analytics</h4>
					<p class='current'>Current Subscriber Count</p>
						<p class='subs'>" . number_format($subCount) . "</p>
					<hr>
					<p class='current'>Current Channel Views</p>
						<p class='viewCount'>" . number_format($viewCount) . "</p>
						<hr>
					<p class='current'>Total Videos Uploaded</p>
						<p class='viewCount'>" . number_format($totalVids) . "</p>
					</div>
					"; 
		}

	} 

	?> 

	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<link rel="stylesheet" href="studio/css/style.css">
	<link rel="stylesheet" href="assets/css/style.css">

      
<div class="column">
	<div id = "content"> 

	<?php 
		// Display Page 
		if(isset($_GET["username"])) {
    $profileUsername = $_GET["username"];
	}



	else {
		echo "Channel not found
		<p>Please login to your account</p>";
    exit();
	}
	$profileGenerator = new ProfileGenerator($con, $userLoggedInObj, $profileUsername);
	echo $profileGenerator->create();
		
	?>

	</div>

	</div>
