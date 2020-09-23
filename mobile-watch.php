    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

<?php 
require_once("watchHeader.php"); 
require_once("includes/classes/mobileVideoPlayer.php"); 
require_once("includes/classes/VideoInfoSection.php"); 
require_once("includes/classes/Comment.php"); 
require_once("includes/classes/CommentSection.php"); 

if(!isset($_GET["id"])) {
    echo "No url passed into page";
    exit();
}
  // Create the function, so you can use it
function isMobile() {
    return preg_match("/(ios|android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// If the user is on a mobile device, redirect them
if(isMobile()){
    header("Location: mobile-watch.php?id=".$_GET["id"]."");
}
?>

$video = new Video($con, $_GET["id"], $userLoggedInObj);
$video->incrementViews();
?>
<script src="assets/js/videoPlayerActions.js"></script>
<script src="assets/js/commentActions.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">





<div class="column" style="max-width: 360px;">
<div class="watchLeftColumn">

<div class="wrapper">
<?php
    $videoPlayer = new VideoPlayer($video);
    echo $videoPlayer->create(true);

    $videoPlayer = new VideoInfoSection($con, $video, $userLoggedInObj);
    echo $videoPlayer->create();

    $commentSection = new CommentSection($con, $video, $userLoggedInObj);
    echo $commentSection->createMobile();
?>

</div>


</div>



</div>
<?php require_once("includes/footer.php"); ?>
                