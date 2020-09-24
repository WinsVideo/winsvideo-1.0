<?php
require_once("includes/classes/TrendingProvider.php");

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


$trendingProvider = new TrendingProvider($con, $userLoggedInObj);
$videos = $trendingProvider->getVideos();

$videoGrid = new VideoGrid($con, $userLoggedInObj);
?>

<style>
.content {
    flex-grow: 1;
    background-color: #fff;
    min-height: 300px;
    padding: 20px;
    box-shadow: rgba(0, 0, 0, 0.1) 0 1px 2px;
    float: none; 
    display: inline; 
}
</style>

<div class="largeVideoGridContainer">
	<div class="trending">

    <?php
    if(sizeof($videos) > 0) {
        echo $videoGrid->createLarge($videos, "Famous / Trending videos uploaded in the last 30 days", false);
		
    }
    else {
        echo "No famous / trending videos to show";
    }
    ?>

	</div>
</div>