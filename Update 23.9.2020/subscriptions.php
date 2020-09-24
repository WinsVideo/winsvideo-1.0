<?php
require_once("includes/header.php");

// Create the function, so you can use it
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// Use the function
if(isMobile()){
    require_once("includes/mobileHeader.php"); 
  }
else {
    require_once("includes/header.php"); 
}


if(!User::isLoggedIn()) {
    header("Location: signIn.php");
}

$subscriptionsProvider = new SubscriptionsProvider($con, $userLoggedInObj);
$videos = $subscriptionsProvider->getVideos();

$videoGrid = new VideoGrid($con, $userLoggedInObj);
?>

<style>
.content {
    flex-grow: 1;
    background-color: #fff;
    border-radius: 0px;
    min-height: 100px;
    padding: 20px;
    box-shadow: rgba(0, 0, 0, 0.1) 0 1px 2px;
    margin-left: 90px;
    margin-right: 90px;
}
</style>


<div class="largeVideoGridContainer">

	<div class="content">

    <?php
    if(sizeof($videos) > 0) {
        echo $videoGrid->createLarge($videos, "New from your subscriptions", false);
    }
    else {
        echo "No videos to show";
    }
    ?>

	</div>
</div>