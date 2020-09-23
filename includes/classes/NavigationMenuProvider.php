
<?php
include_once("includes/classes/ProfileData.php"); 
class NavigationMenuProvider {

    private $con, $userLoggedInObj;

    public function __construct($con, $userLoggedInObj) {
        $this->con = $con;
        $this->userLoggedInObj = $userLoggedInObj;
    }

    public function create() {

        $menuHtml = $this->createNavItem("Home", "assets/images/icons/home.png", "index.php");

        $menuHtml .= $this->createNavItem("Upload", "assets/images/icons/upload.png", "upload.php");
        
        $menuHtml .= $this->createNavItem("Liked Videos", "assets/images/icons/thumb-up.png", "likedVideos.php");

        $menuHtml .= $this->createNavItem("Famous Videos", "assets/images/icons/trending.png", "trending.php");
        $menuHtml .= $this->createNavItem("Followed Videos", "assets/images/icons/subscriptions.png", "subscriptions.php");


        $menuHtml .= $this->createNavItem("Log In", "assets/images/icons/account.png", "signIn.php");

        if(User::isLoggedIn()) {
            $menuHtml .= $this->createNavItem("Settings", "assets/images/icons/settings.png", "settings.php");
            $menuHtml .= $this->createNavItem("Statistics", "assets/images/icons/statistics.png", "statistics.php");
            $menuHtml .= $this->createNavItem("Log Out", "assets/images/icons/logout.png", "logout.php");


            $menuHtml .= $this->createSubscriptionsSection();

        }

        return "<div class='navigationItems'>
                        <div class='navigationMenu'>
                            $menuHtml
                        </div>
                </div>";
    }

    private function createNavItem($text, $icon, $link) {
        return "<div class='navigationItem'>
                    <a href='$link' >
                        <img class='navigationImage' src='$icon'>
                        <span class='navigationLink'>$text</span>
                    </a>
                </div>";
    }

    private function createNavChannelsItem($text, $icon, $link) {
        return "<div class='navigationItemChannels'>
                    <a href='$link' >
                        <img class='navigationImageChannels' src='$icon'>
                        <span class='navigationLinkChannels'>$text</span>
                    </a>
                </div>";
    }

    private function createSubscriptionsSection() {
        $subscriptions = $this->userLoggedInObj->getSubscriptions();

        $html = "<span class='heading'>Followed Channels</span>";
        foreach($subscriptions as $sub) {
            $subUsername = $sub->getUsername();
            $html .= $this->createNavChannelsItem($subUsername, $sub->getProfilePic(), "profile.php?username=$subUsername");
        }
        return $html;
    } 
}
?> 


