<?php

require_once("ProfileData.php");
class ChannelTitle {

    private $con, $userLoggedInObj, $profileData;

    public function __construct($con, $userLoggedInObj, $profileUsername) {
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;
        $this->profileData = new ProfileData($con, $profileUsername);
    }

    public function createTitle() {
        $profileUsername = $this->profileData->getProfileUsername();
        
        if(!$this->profileData->userExists()) {
            return "User does not exist";
        }

        $name = $this->profileData->getProfileUserFullName();
        $profileImage = $this->profileData->getProfilePic();
        $aboutText = $this->profileData->getAboutText();
        $username = $this->profileData->getProfileUsername(); 
        return "<title>$name - WinsVideo</title>

<meta property='og:title' content='$name - WinsVideo' />
<meta property='og:type' content='website' />
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





