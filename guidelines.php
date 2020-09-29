<?php 
require_once("includes/header.php");
require_once("includes/classes/VideoDetailsFormProvider.php");
?>


<div class="column">
     <div class="text-center">
        <img src="VideoTubeLogo.png">
        <h2>WinsVideo Guidelines</h2>
        <br><h5>Community Guidelines</h5>
        <p>Hello! Welcome to WinsVideo, follow these guidelines and you are good to go on the platform!</p>
        
       1. Video Contains swear words, racist slurs will be deleted.
        <br>2. Videos which is duplicated title, or copied will be deleted.
        <br>3. Videos contains copyrighted music, images, And video, will be claimed. And could be removed.
        <br>4. Video contains quarells, bad politics, alcoholic videos will be deleted.
        <br>5. Video contains controversy, antisemetic content, and weapon related games, will be checked, and labeled as not safe for children.
        <br>6. Videos contains sexual related, pornographic videos will be removed and channel will also be terminated.
        <br>7. No Doxxing, or showing personal information.
        <br>8. Video containing false information will be removed
    </div>
    <br><br>
        <div class="text-center">
        <h5>Copyright Guidelines</h5>
        <p>We respect your content creation on the website, we do not support duplication of videos on our platform. Follow these guidelines, on how to create your content.</p>

        1. Videos which is duplicated title, will be checked before any action.
        <br>2. Videos contains copyrighted music, and, images, will be checked, and labeled as copyrighted material.
        <br>3. For music creators, who created their own music and published to WinsVideo, please email us at <a mailto="admin@winsvideo.net">admin@winsvideo.net</a> for us to check the music before you publish it.
    </div>
    <br><br>
   <div class="text-center">
        <h5>Privacy Policy</h5>
        <p>We provide WinsVideo for users to upload many kinds of videos, through our website (This Website), We have our official application (still in development) via andriod app. Here are information about the data that we would collect from you.</p>

        <h6>Information for our privacy</h6>
        <p>1. When users sign up for WinsVideo, we receive your email address, your username, first and last display name. We do not collect your ip address to our database.

        <br>2. We do not collect cookies (At the moment), and we do not collect any of your personal information

        <br>3. We do not collect your location.

        <h6>Where will your information be stored?</h6>
        <p>WinsVideo is located in the country of Thailand (South East Asia). Made by WinsDominoes. </p>

        </div>
        
</div>

<script>
$("form").submit(function() {
    $("#loadingModal").modal("show");
});
</script>



<?php require_once("includes/footer.php"); ?>
                