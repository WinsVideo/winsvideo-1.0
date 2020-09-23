<?php 
require_once("includes/config.php"); 
require_once("includes/classes/ButtonProvider.php"); 
require_once("includes/classes/User.php"); 
require_once("includes/classes/Video.php"); 
require_once("includes/classes/VideoGrid.php"); 
require_once("includes/classes/VideoGridItem.php");
require_once("includes/classes/SubscriptionsProvider.php"); 
require_once("includes/classes/NavigationMenuProvider.php"); 
require_once("includes/classes/ProfileGenerator.php");

$usernameLoggedIn = User::isLoggedIn() ? $_SESSION["userLoggedIn"] : "";
$userLoggedInObj = new User($con, $usernameLoggedIn);


?> 
<!DOCTYPE html>
<html>
<head>
    <?php 


if(isset($_GET["username"])) {
    $profileUsername = $_GET["username"];
}


       $profileGenerator = new ProfileGenerator($con, $userLoggedInObj, $profileUsername);
    echo $profileGenerator->createTitle();
    ?> 


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/mobile.css">
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

  
  <style>
@media only screen and (max-width: 600px) {
    .rightIcons {
      visibility: hidden; 
    }

    #sideNavContainer {
    display: none; 
    } 


  }


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

#mastHeadContainer .searchBarContainer form {
    flex: 1;
    display: flex;
    margin-bottom: 0px; 
}

.column {
  margin: 10px;
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
          <a href="upload.php">Upload</a>
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

    <meta name="viewport" content="width=device-width, initial-scale=0.7, shrink-to-fit=yes">