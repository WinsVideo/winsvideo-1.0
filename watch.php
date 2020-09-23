<?php 

// Create the function, so you can use it
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// Use the function
if(isMobile()){
    require_once("includes/mobileHeader.php"); 
  }
else {
    
require_once("includes/watchHeader.php"); 
}



require_once("includes/classes/VideoPlayer.php"); 
require_once("includes/classes/VideoInfoSection.php"); 
require_once("includes/classes/Comment.php"); 
require_once("includes/classes/CommentSection.php"); 

if(!isset($_GET["v"])) {
    echo "No url passed into page";
    exit();
}

$usernameLoggedIn = User::isLoggedIn() ? $_SESSION["userLoggedIn"] : "";
$userLoggedInObj = new User($con, $usernameLoggedIn);

$video = new Video($con, $_GET["v"], $userLoggedInObj);
$video->incrementViews(); 

if(($video->getUploadedBy() != $userLoggedInObj->getUsername()) && ($video->getPrivacy() == 0)) {
    echo "<div class='column'>
                <div class='alert alert-danger' role='alert'>
                    <strong>ERROR!</strong> This is a private video, you cannot view the video.
                </div>

                <span>Go back to <a href='index.php'>homepage</a></span>
          </div>";
    exit();
} else if (($video->getUploadedBy() == $userLoggedInObj->getUsername()) && ($video->getPrivacy() == 0)) {
    // do nothing
}
?>
<script src="assets/js/videoPlayerActions.js"></script>
<script src="assets/js/commentActions.js"></script>

<style>

    @media only screen and (max-width: 600px) {
    .rightIcons {
      visibility: hidden; 
    }

    #sideNavContainer {
    display: none; 
    } 

        .videoPlayerContainer {
         
    }

    .infoContainer {
        flex-grow: 1;
  border-radius:9px;
    min-height: 300px;
    padding: 20px;
  float: none; 
  display: inline; 
    }

    .commentContainer {
        flex-grow: 1;
  border-radius:9px;
    min-height: 300px;
    padding: 20px;
  float: none; 
  display: inline; 
    }

    .suggestions {
        flex-grow: 1;
      border-radius:9px;
        min-height: 300px;
        padding: 20px;
      float: none; 
      display: none;
    }

  }

    @media (min-width:1025px) {
        .videoPlayerContainer {
        background-color: white; 
    }

    .infoContainer {
        margin-top: 10px; 
        background-color: white;
        padding-top: 2px;
        padding-left: 15px; 
        padding-right: 15px; 
        padding-bottom: 5px; 
        box-shadow: 0 1px 2px rgba(0,0,0,.1);
    }

    .commentContainer {
        margin-top: 10px; 
        background-color: white;
        padding-top: 1px;
        padding-left: 15px; 
        padding-right: 15px; 
        padding-bottom: 5px; 
        box-shadow: 0 1px 2px rgba(0,0,0,.1);
    }

    .suggestions {
        margin-left: 10px; 
        background-color: white;
        padding-top: 10px;
        padding-left: 15px; 
        padding-right: 15px; 
        padding-bottom: 5px; 
        box-shadow: 0 1px 2px rgba(0,0,0,.1);
    }
    }

@media (min-width:1281px) { 

    .videoPlayerContainer {
        background-color: white; 
    }

    .infoContainer {
        margin-top: 10px; 
        background-color: white;
        padding-top: 2px;
        padding-left: 15px; 
        padding-right: 15px; 
        padding-bottom: 5px; 
        box-shadow: 0 1px 2px rgba(0,0,0,.1);
    }

    .commentContainer {
        margin-top: 10px; 
        background-color: white;
        padding-top: 1px;
        padding-left: 15px; 
        padding-right: 15px; 
        padding-bottom: 5px; 
        box-shadow: 0 1px 2px rgba(0,0,0,.1);
    }

    .suggestions {
        margin-left: 10px; 
        background-color: white;
        padding-top: 10px;
        padding-left: 15px; 
        padding-right: 15px; 
        padding-bottom: 5px; 
        box-shadow: 0 1px 2px rgba(0,0,0,.1);
    }
}

    

</style>


<div class="watchLeftColumn">

<div class="videoPlayerContainer">
<?php

    $videoPlayer = new VideoPlayer($video);
    echo $videoPlayer->create(true);
?> 

</div>

<div class="infoContainer">
<?php 
    $videoPlayer = new VideoInfoSection($con, $video, $userLoggedInObj);
    echo $videoPlayer->create();

?> 

</div>

<div class="commentContainer">
<?php
    $commentSection = new CommentSection($con, $video, $userLoggedInObj);
    echo $commentSection->create();
?>
<br>
</div>


</div>

<div class="suggestions">
	<p>Suggestions</p>
	<hr>
    <?php
    $videoGrid = new VideoGrid($con, $userLoggedInObj);
    echo $videoGrid->create(null, null, false);
    ?>
</div>

<?php require_once("includes/footer.php"); ?>
                