<link rel="stylesheet" type="text/css" href="assets/style/style.css">

<link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />
  <link href="style/animate.css" rel="stylesheet" />

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <script src="https://vjs.zencdn.net/7.6.6/video.js"></script>

  <script src="https://github.com/jbboehr/videojs-persistvolume/videojs.persistvolume.js"></script>
  
  <script src="../assets/video/videojs-contrib-quality-levels.min.js"></script>
<script src="../assets/video/videojs-hls-quality-selector.min.js"></script>

<style>
	html,body { height:100%; width:100%; padding:0; margin:0; }
	#videoPlayer2 { height:100%; width:100%; padding:0; margin:0; }
</style>

<?php
	require_once("includes/config.php"); 
	require_once("includes/classes/ButtonProvider.php"); 
	require_once("includes/classes/User.php"); 
	require_once("includes/classes/Video.php"); 
	require_once("includes/classes/VideoGrid.php"); 
	require_once("includes/classes/VideoGridItem.php");
	require_once("includes/classes/SubscriptionsProvider.php"); 
	require_once("includes/classes/NavigationMenuProvider.php"); 
	require_once("includes/classes/watchInfo.php"); 
	require_once("includes/classes/VideoPlayer2.php"); 

	if(!isset($_GET["id"])) {
	    echo "No url passed into page";
	    exit();
	}

	$video = new Video($con, $_GET["id"], $userLoggedInObj);

    $videoPlayer = new VideoPlayer($video);
    echo $videoPlayer->create(true);	
?>