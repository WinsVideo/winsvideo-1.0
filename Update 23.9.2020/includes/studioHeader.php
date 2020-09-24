<?php 
require_once("includes/config.php"); 
require_once("includes/classes/ButtonProvider.php"); 
require_once("includes/classes/User.php"); 
require_once("includes/classes/Video.php"); 
require_once("includes/classes/VideoGrid.php"); 
require_once("includes/classes/VideoGridItem.php");
require_once("includes/classes/SubscriptionsProvider.php"); 
require_once("includes/classes/NavigationMenuProvider.php"); 

$usernameLoggedIn = User::isLoggedIn() ? $_SESSION["userLoggedIn"] : "";
$userLoggedInObj = new User($con, $usernameLoggedIn);

?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html" charset="utf-8" />
  
<script data-ad-client="ca-pub-1404625093629058" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<title>WinsVideo Creator</title>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-173174796-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-173174796-1');
</script>

<meta name="description" content="WinsVideo is a video sharing platform for people to upload their style. ">

<meta property="og:title" content="WinsVideo - Upload your style " />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://winsvideo.net" />
<meta property="og:image" content="http://winsvideo.ddns.net:81/assets/images/icons/VideoTubeLogo.png" />
<meta property="og:description" content="WinsVideo is a video sharing platform for people to upload their style to the platform." />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="http://winsvideo.net/">
<meta property="og:title" content="WinsVideo - Video Sharing Platform in Thailand">
<meta property="og:description" content="WinsVideo is a video sharing platform for people to upload their style to the platform. ">
<meta property="og:image" content="http://winsvideo.ddns.net:81/assets/images/icons/VideoTubeLogo.png">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="http://winsvideo.net/">
<meta property="twitter:title" content="WinsVideo - Video Sharing Platform in Thailand">
<meta property="twitter:description" content="WinsVideo is a video sharing platform for people to upload their style to the platform. ">
<meta property="twitter:image" content="assets/images/icons/VideoTubeLogo.png">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/jquery-1.10.2.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <script src="assets/js/commonActions.js"></script>
    <script src="assets/js/userActions.js"></script>

  <link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />
  <link href="style/animate.css" rel="stylesheet" />

  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
  <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
  <script src="https://vjs.zencdn.net/7.6.6/video.js"></script>

  <link rel="stylesheet" type="text/css" href="assets/css/desktop.css">


  <style>

.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

@media only screen and (max-device-width : 640px) {

  #sideNavContainer {
    display: none; 
  } 

}

#sideNavContainner {
  display: inline; 
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #f5f5f5; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

.column {
    flex-grow: 1;
    max-width: 1920px; 
    background-color: #fff;
    min-height: 100px;
    padding: 20px;
    box-shadow: rgba(0, 0, 0, 0.1) 0 1px 2px;
    margin-left: 90px;
    margin: auto; 
    display: inline-block;
}

#sideNavContainer {
    width: 230px;
    background-color: #fff;
    padding-top: 56px;
    position: fixed;
    top: 0;
    bottom: 0;

    flex-direction: column;
}

.navigationMenu {
    padding-top: 13px;
    padding-right: 22px;
    padding-bottom: 13px;
    padding-left: 22px;
}

#sideNavContainer .navigationItem img {
    height: 15px;
    color: white;
    margin-right: 15px;
}

#sideNavContainer .navigationItem a {
    align-items: center;
    padding-left: 10px;
}

#sideNavContainer .navigationItem {
    height: 35px;
    display: flex;
}


#sideNavContainner {
  display: inline; 
}

#sideNavContainer .navigationItem a:hover {
    background-color: #222;
    color: white;

}

#sideNavContainer .navigationItem .navigationLink:hover {
    color: white;
}

.profilePicture {
  border-radius: 50%;
  border: 3px solid #fbfbfb;
}

#sideNavContainer .navigationItemChannels {
    height: 35px;
    display: flex;
}

#sideNavContainer .navigationItemChannels img {
    height: 15px;
    color: white;
    margin-right: 15px;
}

#sideNavContainer .navigationItemChannels span {
    flex: 1;
    color: #111;
    font-size: 14px;
    overflow: hidden;
  text-overflow: ellipsis;
}

#sideNavContainer .navigationItemChannels a {
    flex: 1;
    display: flex;
    align-items: center;
    padding: 0 24px;
    align-items: center;
    padding-left: 10px;
    overflow: hidden;
    text-overflow: ellipsis;
}

#sideNavContainer .navigationItemChannels a:hover {
    background-color: #222;
    color: white;


}

#sideNavContainer .navigationItemChannels .navigationLinkChannels:hover {
    color: white;
}

</style>

<script>

  $( document ).ready(function() {      
    var is_mobile = false;

    if( $('#sideNavContainer').css('display')=='none') {
        is_mobile = true;       
    }

    // now I can use is_mobile to run javascript conditionally

    if (is_mobile == true) {
        $(document).ready(function() {
        
        var main = $("#mainSectionContainer");
        var nav = $("#sideNavContainer");

        if(main.hasClass("leftPadding")) {
            nav.hide();
        }
        else {
            nav.show();
        }

        main.toggleClass("leftPadding");

    });
    }
 });


</script>
</head>
<body>

    <div id="pageContainer">

        <div id="mastHeadContainer">
            <button class="navShowHide">
                <img src="assets/images/icons/menu.png">
            </button>

            <a class="logoContainer" href="index.php">
                <img src="assets/images/icons/VideoTubeLogo.png" title="logo" alt="WinsVideo Logo">
            </a>

            <div class="searchBarContainer">
                
                <form action="search.php" method="GET">
                    <input type="text" class="searchBar" name="term" placeholder="Search">
                    <button class="searchButton">
                        <img src="assets/images/icons/search.png">
                    </button>
                    
                </form>
            </div>

            <div class="rightIcons">

      <div class="dropdown">
        <img class="upload" src="assets/images/icons/upload2.png">
        <div class="dropdown-content">
          <a href="upload-captcha.php">Upload</a>
          <a href="posts.php">Post / Status</a>
           </div>
      </div>


                <a href="select/post-upload.html">
                    
                </a>
        
        <?php echo ButtonProvider::createEditChannelButton($con, $userLoggedInObj->getUsername()); ?>
        <?php echo ButtonProvider::createDashboardButton($con, $userLoggedInObj->getUsername()); ?>


                <?php echo ButtonProvider::createUserProfileNavigationButton($con, $userLoggedInObj->getUsername()); ?>

        
            </div>

        </div>

        <script>
            $(document).ready(function() {
        
        var main = $("#mainSectionContainer");
        var nav = $("#sideNavContainer");

        if(main.hasClass("leftPadding")) {
            nav.show();
        }
        else {
            nav.show();
        }

        main.toggleClass("leftPadding");

    });
        </script>

        <div id="sideNavContainer" style="">
            <?php
            $navigationProvider = new NavigationMenuProvider($con, $userLoggedInObj);
            echo $navigationProvider->create();
            ?>
        </div>

        <div id="mainSectionContainer">
            <div id="mainContentContainer">

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Ad-for-winsvideo -->
        <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-1404625093629058"
        data-ad-slot="7600407168"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=0.95, shrink-to-fit=yes">