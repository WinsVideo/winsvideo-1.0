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

	if(!isset($_GET["id"])) {
	    echo "No url passed into page";
	    exit();
	}

	$video = new Video($con, $_GET["id"], $userLoggedInObj);

    $videoPlayer = new VideoPlayer($video);
    echo $videoPlayer->create(true);	
?>