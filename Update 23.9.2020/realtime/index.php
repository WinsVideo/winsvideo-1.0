<?php 
require_once("header.php"); 
require_once("../includes/classes/VideoDetailsFormProvider.php");
?>


<div class="column">
    <center> 
    <h1>WinsVideo - Realtime Stats</h1>
    <p>These realtime stats will show you the information about the things in WinsVideo
        <br><br>
    <h2>Videos</h2>
    <p>Total Number of Videos</p>
    <iframe src="video-realtime.php" width="80" height="80" frameBorder="0"></iframe> 
    <br><br>
    <h2>Views</h2>
    <p>Total Number of Videos</p>
    <iframe src="views-realtime.php" width="500" height="1290" frameBorder="0"></iframe> 
    <h2>Users</h2>
    <p>Users registered to WinsVideo</p>
    <iframe src="user-realtime.php" width="80" height="80" frameBorder="0"></iframe>
    <h2>Comments</h2>
    <p>Comments on WinsVideo</p>
    <iframe src="comments-realtime.php" width="80" height="80" frameBorder="0"></iframe>
    <br><br>
    <h4 style="colour: gray;">Copyrighted &copy; 2019 WinsVideo </h4>
    </center>

    <a href="../index.php">Go back to WinsVideo</a>
</div>


<?php require_once("../includes/footer.php"); ?>

