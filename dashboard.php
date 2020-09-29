<?php 
	include_once("includes/dashboardHeader.php");
	include_once("includes/classes/User.php");
	include_once("includes/classes/ProfileData.php"); 
?> 

<style>
			@import url('https://fonts.googleapis.com/css?family=Roboto:300&display=swap');
			 div.subs { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 85px; 
			}

			div.subCount { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 90px; 
			}
			
			div.viewCount { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 90px; 
			}
			</style>

			<script>
				function numberWithCommas(x) {
					return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				}
			</script>

	<div class="column article animated slideInUp">
	
	<?php
		class ProfileGenerator {

		 private $con, $loggedInUsername, $profileData;

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
			$profileUsername = $this->profileData->getProfileUsername2();
        
        if(!$this->profileData->userExists()) {
            return "User does not exist
					<br>Please login to your WinsVideo account to access the dashboard";
        }
		
		$headerSection = $this->createHeaderSection(); 
        $statsSection = $this->createStatsSection();
        $contentSection = $this->createContentSection();
		$videoViews = $this->videoViews(); 
        return "<div class='profileContainer'>
					$headerSection
					
					$statsSection
		<h5>Videos uploaded by you. </h5>
		<p>To edit the video, click on the video and click 'EDIT VIDEO'</p>
		$contentSection
                </div>
				";
		 } 

	public function createHeaderSection() { 
		$profilePic = $this->profileData->getProfilePic(); 
		$name = $this->profileData->getProfileUserFullName(); 
		$username = $this->profileData->getProfileUsername(); 
		
		$html = "
				<div>
				<img src='$profilePic' width='150' hieght='150' alt='$username' />
				<h3>$name</h3>
				<p>$username</p>
				</div>";
		return $html;
	} 

	public function createStatsSection() {
		$subCount = $this->profileData->getSubscriberCount(); 
		$profilePic = $this->profileData->getProfilePic(); 
		$name = $this->profileData->getProfileUserFullName(); 
		$username = $this->profileData->getProfileUsername(); 
		$viewCount = number_format($this->profileData->getTotalViews2()); 
		
		

		$html = "<table class='table'>
				  <thead>
				    <tr>
				      <th scope='col'>Subscriber Count</th>
				      <th scope='col'>Channel View Count</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td class='subCount'>$subCount</td>
				      <td class='viewCount'>$viewCount</td>
				    </tr>
				  </tbody>
				</table>";
		return $html; 
	}

	public function videoViews() { 
	} 
				

	public function createContentSection() { 
		//Video Section uploaded by the user.

		$videos = $this->profileData->getUsersVideos();
		if(sizeof($videos) > 0) {
            $videoGrid = new VideoGrid($this->con, $this->userLoggedInObj);
            $videoGridHtml = $videoGrid->createLarge($videos, null, false);
        }
        else {
            $videoGridHtml = "<span>This user has no videos</span>";
        }

		$html = "<div class='videos'>
					$videoGridHtml
				</div>
				
				"; 


			return $html;
	} 



	} 

	?> 

	<?php 
		// Display Page 
		if(isset($_GET["username"])) {
    $profileUsername = $_GET["username"];
	} else {
		echo "Channel not found
		<p>Please login to your account</p>";
    exit();
	}

	$username = $_GET["username"]; 

	$session = $_SESSION["userLoggedIn"];

	if($_SESSION["userLoggedIn"] != $username) {
		echo "<div class='alert alert-danger' role='alert'>
				  <h4 class='alert-heading'>Fatal error</h4>
				  <p>This is not your channel, please go back to your dashboard page. <a href='dashboard.php?username=$session'>$session's Studio Page</a></p>
				  <hr>
				  <p class='mb-0'>More Detail: This is not your account!</p>
				</div>";
		echo "<h1>WinsVideo Studio</h1>"; 
		exit();
	}
	$profileGenerator = new ProfileGenerator($con, $userLoggedInObj, $profileUsername);
	echo $profileGenerator->create();
		

	?> 
		
	
	</div>

	<meta name="viewport" content="width=device-width, initial-scale=0.88, shrink-to-fit=yes">

	<?php 
		include_once("includes/footer.php"); 
	?> 