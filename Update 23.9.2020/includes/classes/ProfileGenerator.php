<style>


			@import url('https://fonts.googleapis.com/css?family=Roboto:300&display=swap');
			 div.subs { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 30px; 
			}

			div.subCount { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 30px; 
			}

			div.viewCount2 { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 30px; 
			}

			div.totalVids { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 30px; 
			}

            img.profileImage { 
                border-radius: 50%;
                border:3px solid #fbfbfb;
            }

			
			
            .column { 
                margin: 20px;
                padding: 20px;
                background-color: lightgray;
                border-radius: 10px;

            }

            .badges {
                width: 15px;
                height: 15px;
            }

            #channelDescription {
                white-space: -moz-pre-wrap; 
                white-space: -pre-wrap; 
                white-space: -o-pre-wrap;
                white-space: pre-wrap; 
                word-wrap: break-word;
            }
			

		</style>

<?php

//<div id='subs' class='subs'> $subCount2 </div> 
require_once("ProfileData.php");
class ProfileGenerator {

    private $con, $userLoggedInObj, $profileData;

    public function __construct($con, $userLoggedInObj, $profileUsername) {
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;
        $this->profileData = new ProfileData($con, $profileUsername);
    }

    public function create() {
        $profileUsername = $this->profileData->getProfileUsername();
        
        if(!$this->profileData->userExists()) {
            return "User does not exist";
        }

        $coverPhotoSection = $this->createCoverPhotoSection();
        $headerSection = $this->createHeaderSection();
        $tabsSection = $this->createTabsSection();
        $contentSection = $this->createContentSection();
        $background = $this->profileData->getBackground();
        $color = $this->profileData->getColor(); 
        return "

        <div class='profileContainer column' style='background: url($background); no-repeat center center fixed
        -webkit-background-size: auto;
          -moz-background-size: auto;
          -o-background-size: auto;
          background-size: auto;
          '>
                    <div class='article animated slideInUp'>
                    $coverPhotoSection
                    $headerSection
                    $tabsSection
                    $contentSection
                    </div>
                </div>";
    }

    public function createCoverPhotoSection() {
        $coverPhotoSrc = $this->profileData->getCoverPhoto();
        $name = $this->profileData->getProfileUserFullName();
        return "<div class='coverPhotoContainer'>
                    <img src='$coverPhotoSrc' class='coverPhoto'>
                    
                </div>";
    }

    public function createHeaderSection() {
        $profileImage = $this->profileData->getProfilePic();
        htmlspecialchars(strip_tags($name = $this->profileData->getProfileUserFullName()));
        $subCount = $this->profileData->getSubscriberCount();
        $subCount2 = $this->profileData->getSubscriberCount();
        $button = $this->createHeaderButton();
		$aboutText = $this->profileData->getAboutText(); 
		$color = $this->profileData->getColor();
        $getBadges = $this->profileData->getBadges();  
	    $badges = ""; 
        $badgesStyle = "";

        if($getBadges == "") {
            $badgesStyle = "display: none;";
        }

        if($getBadges == "verified") {
            $badges = "http://winsvideo.net/assets/images/badges/verified.png"; 
        }

        if($getBadges == "devs") {
            $badges = "https://images-ext-1.discordapp.net/external/aTcv5TJ74qunAZIcJgdW3nVD1ccGgcQDqPQDUgZq7tk/%3Fs%3D400%26v%3D4/https/avatars1.githubusercontent.com/u/40795980";
        }
        return "

        <div class='profileHeader'>
                    <div class='userInfoContainer'>
                        <img class='profileImage' src='$profileImage'>
                        <div class='userInfo'>
                            <span class='title textProfile' style='$color;'>&nbsp;$name <img class='badges' src='$badges' style='$badgesStyle'></span>
                            <span class='subscriberCount subsProfile' style='$color;'>&nbsp;$subCount Subscribers</span>
						</div>
                    </div>
                    <div class='buttonContainer'>
                        <div class='buttonItem'>    
                            $button
                        </div>
                    </div>  
                </div>";
    }

    public function createTabsSection() {

        return "<ul class='nav nav-tabs' role='tablist'>
					<li class='nav-item'>
                    <a class='nav-link active' id='home-tab' data-toggle='tab' 
                        href='#home' role='tab' aria-controls='home' aria-selected='true'>HOME</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' id='videos-tab' data-toggle='tab' 
                        href='#videos' role='tab' aria-controls='videos' aria-selected='false'>VIDEOS</a>
                    </li>
					<li class='nav-item'>
                    <a class='nav-link' id='statistics-tab' data-toggle='tab' href='#statistics' role='tab' 
                        aria-controls='statistics' aria-selected='false'>STATISTICS</a>
                    </li>
                    <li class='nav-item'>
                    <a class='nav-link' id='about-tab' data-toggle='tab' href='#about' role='tab' 
                        aria-controls='about' aria-selected='false'>ABOUT</a>
                    </li>
                </ul>";
    }

    public function createContentSection() {
        
        $videos = $this->profileData->getUsersVideos();

        if(sizeof($videos) > 0) {
            $videoGrid = new VideoGrid($this->con, $this->userLoggedInObj);
            $videoGridHtml = $videoGrid->create($videos, null, false);
        }
        else {
            $videoGridHtml = "<span>This user has no videos</span>";
        
            $subCount2 = $this->profileData->getSubscriberCount();
        
        }

        

        $aboutSection = $this->createAboutSection();
		$homeSection = $this ->createHomeSection(); 
		$statisticsSection = $this->createStatisticsSection(); 
		$background = $this->profileData->getBackground();
        return "<div style='background-color: rgba(255, 255, 255, .8);' class='tab-content channelContent transperency'>
					<div class='tab-pane fade show active' id='home' role='tabpanel' aria-labelledby='home-tab'>
                        $homeSection
                    </div>
                    <div class='tab-pane fade' id='videos' role='tabpanel' aria-labelledby='videos-tab'>
                        $videoGridHtml
                    </div>
					 <div class='tab-pane fade' id='statistics' role='tabpanel' aria-labelledby='statistics-tab'>
                        $statisticsSection
                    </div>
                    <div class='tab-pane fade' id='about' role='tabpanel' aria-labelledby='about-tab'>
                        $aboutSection
                    </div>
                </div>";
    }


	private function createStatisticsSection() { 
		$subCount3 = $this->profileData->getSubscriberCount(); 
		$totalViews = $this->profileData->getTotalViews2();
		$name = $this->profileData->getProfileUserFullName(); 
		$totalVids = $this->profileData->getTotalVids();
        $color = $this->profileData->getColor();  
        $totalVideoCount = $this->profileData->getTotalVideoCount();
		$style = "";

        if($totalViews == null) {
            $style = "display: none;"; 
        }

        if($totalVideoCount == null) {
            $style = "display: none;"; 
        }

		$html = "<h3>$name's Public Statistics</h3>
				<hr>
                <span>$statistics</span>
				<span>$name's Subscriber Count</span>
				<div class='subCount'>
					". number_format($subCount3) ."
				</div>
				<span style='$style'>$name's Total View Count</span>
				<div class='viewCount2' style='$style'>
					". number_format($totalViews) ."
				</div>
				<span style='$style'>$name's Total Videos Uploaded</span>
				<div class='totalVids' style='$style'>
					". number_format($totalVideoCount)."
				</div>"; 

		return $html; 

	} 

	private function createHomeSection() { 
		$profileDate = $this->profileData->getSignUpDate();
        $name = $this->profileData->getProfileUserFullName();
        $subCount2 = $this->profileData->getSubscriberCount();
		$aboutText = $this->profileData->getAboutText(); 
		$videos = $this->profileData->getUsersVideos();
		$totalViews = $this->profileData->getTotalViews2(); 
		$country = $this->profileData->getCountry(); 
		$status = $this->profileData->getStatus(); 
        $color = $this->profileData->getColor(); 

        if(sizeof($videos) > 0) {
            $videoGrid = new VideoGrid($this->con, $this->userLoggedInObj);
            $videoGridHtml = $videoGrid->create($videos, null, false);
        }
        else {
            $videoGridHtml = "<span>This user has no videos</span>";
        }

        $style = ""; 

        if($status == null) {
            $style = "display: none;"; 
        }

        if($country == null) {
            $style = "display: none;";
        }
		$html = "<div class='channelDescription' style='$style'>
		          <h4 class='status-text'>Status Now:</h4>
						<p class='status'>$status</p>
					</div>
					
				<div class='country' style='$style'>
				<h4 class='country-text'>Country </h4>
						<p class='user-country'>$country</p>
				</div>
					
				<div class='videos'>
				<h4 class='all-videos-text'>All Videos</h4>
				<p class='video-uploaded-by-text'>Video Uploaded by $name</p>
				<hr>
					$videoGridHtml
				</div>"; 


			return $html; 
	} 
	

    private function createHeaderButton() {
        if($this->userLoggedInObj->getUsername() == $this->profileData->getProfileUsername()) {
            return "";
        }
        else {
            return ButtonProvider::createSubscriberButton(
                        $this->con, 
                        $this->profileData->getProfileUserObj(),
                        $this->userLoggedInObj);
        }
    }

    private function createAboutSection() {

        $profileDate = $this->profileData->getSignUpDate();
        $name = $this->profileData->getProfileUserFullName();
        $subCount2 = $this->profileData->getSubscriberCount();
		$aboutText = $this->profileData->getAboutText(); 
		$links = $this->profileData->getLinks(); 
		$country = $this->profileData->getCountry(); 
        $color = $this->profileData->getColor(); 
        $style = "";

        if($aboutText == null) {
            $style = "display: none;";
        }

        if($links == null) {
            $style = "display: none;";
        }

        if($country == null) {
            $style = "display: none;";
        }

        $html = "<div class='section aboutTab'>
                    <div class='title name1 aboutDescription' style='$style'>
                        <b>About $name</b>
                           <p id='channelDescription'>$aboutText</p>         
                    </div>
                    <span><b>Details</b></span>
                    <div class='values'>";

        $details = $this->profileData->getAllUserDetails();
        foreach($details as $key => $value) {
            $html .= "<span>$key: $value</span>";
        }

        $html .= "</div></div>
				
				<div class='links' style='$style'>
                <br>
				<b class='links-name'>$name's Links: </b><br>
					<a class='links-list' href='$links'>$links</a>
				</div>
				
				<div class='country' style='$style'>
				<br>
					<b class='country-title'>Country:</b> 
					<p class='country-list'>$country</p>
				</div>";

        return $html;
    }

    public function createTitle() {
        
        $name = $this->profileData->getProfileUserFullName();
        $profileImage = $this->profileData->getProfilePic();
        $aboutText = $this->profileData->getAboutText();
        $username = $this->profileData->getProfileUsername(); 
        return "<title>$name - WinsVideo</title>

            <meta property='site_name' content='WinsVideo'>

            <meta property='og:title' content='$name - WinsVideo' />
            <meta property='og:type' content='website' />
            <meta name='theme-color' content='#22b14c'>
            <meta property='og:url' content='http://winsvideo.net/profile.php?username=$username' />
            <meta property='og:image' content='http://winsvideo.net/$profileImage' />
            <meta property='og:image:width' content='64' />
            <meta property='og:image:height' content='64' />
            <meta property='og:description' content='$aboutText' />


            <!-- Open Graph / Facebook -->
            <meta property='og:type' content='website'>
            <meta property='og:url' content='http://winsvideo.net/profile.php?username=$username'>
            <meta property='og:title' content='$name - WinsVideo'>
            <meta property='og:description' content='$aboutText'>
            <meta property='og:image' content='http://winsvideo.net/$profileImage'>
            <meta property='og:image:width' content='64' />
            <meta property='og:image:height' content='64' />

            <!-- Twitter -->
            <meta property='twitter:card' content='summary_large_image'>
            <meta property='twitter:url' content='http://winsvideo.net/profile.php?username=$username'>
            <meta property='twitter:title' content='$name - WinsVideo'>
            <meta property='twitter:description' content='$aboutText'>
            <meta property='twitter:image' content='http://winsvideo.net/$profileImage'>
            <meta property='twitter:image:width' content='64' />
            <meta property='twitter:image:height' content='64' />";
    }
}
?>





