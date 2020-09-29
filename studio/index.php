<?php 
require_once("../includes/config.php"); 
require_once("../includes/classes/ButtonProvider.php"); 
require_once("../includes/classes/User.php"); 
require_once("../includes/classes/Video.php"); 
require_once("../includes/classes/VideoGrid.php"); 
require_once("../includes/classes/VideoGridItem.php");
include_once("../includes/header.php"); 

$usernameLoggedIn = User::isLoggedIn() ? $_SESSION["userLoggedIn"] : "";
$userLoggedInObj = new User($con, $usernameLoggedIn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>WinsVideo Creator Studio</title>
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>	
<body>
        <div class="header">
        	<img class="logo" src="http://winsvideo.ddns.net:81/assets/images/icons/VideoTubeLogo.png">
        	<b>Studio</b>
        	<div class="searchBarContainer">
                
                <form action="../search.php" method="GET">
                    <input type="text" class="searchBar" name="term" placeholder="Search">
                    <button class="searchButton">
                        <img src="../assets/images/icons/search.png">
                    </button>
                    
                </form>
            </div>

            <div class="rightIcons">

      <div class="dropdown">
        <img class="upload" src="../assets/images/icons/upload2.png">
        <div class="dropdown-content">
          <a href="upload.php">Upload</a>
          <a href="posts.php">Post / Status</a>
           </div>
      </div>


                <a href="../select/post-upload.html">
                    
                </a>
        
        <?php echo ButtonProvider::createEditChannelButton($con, $userLoggedInObj->getUsername()); ?>
        <?php echo ButtonProvider::createDashboardButton($con, $userLoggedInObj->getUsername()); ?>


                <?php echo ButtonProvider::createUserProfileNavigationButton($con, $userLoggedInObj->getUsername()); ?>

        
            </div>
    </div>

	<div id = "content"> 
			
			<div class = "sidebar"> 
				<h2>Learn:</h2> 
				It is a good platform to learn programming. 
				It is an educational website. Prepare for 
				the Recruitment drive of product based 
				companies like Microsoft, Amazon, Adobe 
				etc with a free online placement preparation 
				course. 
			</div> 
			
			<div class = "main"> 
				<h2>GeeksforGeeks:</h2> 
				The course focuses on various MCQ's & Coding 
				question likely to be asked in the interviews 
				& make your upcoming placement season efficient 
				and successful. 
			</div> 
			
			<div class = "rightSideBar"> 
				<h2>Contribute:</h2> 
				Any geeks can help other geeks by writing 
				articles on the GeeksforGeeks, publishing 
				articles follow few steps that are Articles 
				that need little modification/improvement 
				from reviewers are published first. 
			</div> 
		</div>
</body>
</html>