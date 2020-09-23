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
    
require_once("includes/channelHeader.php");
}


require_once("includes/classes/ProfileGenerator.php");

if(isset($_GET["username"])) {
    $profileUsername = $_GET["username"];
}

else {
    echo "Channel not found";
    exit();
}
$profileGenerator = new ProfileGenerator($con, $userLoggedInObj, $profileUsername);
echo $profileGenerator->create();

?>



<style>
	html, body { 
		overflow-x: hidden; //horizontal
		overflow-y: scroll; //vertical
	} 
</style>

    <meta name="viewport" content="width=device-width, initial-scale=0.73, shrink-to-fit=yes">





