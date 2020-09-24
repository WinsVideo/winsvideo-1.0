<?php

	error_reporting(0);
require_once("includes/classes/editVideoHeader.php");
require_once("includes/classes/VideoPlayer.php");
require_once("includes/classes/VideoDetailsFormProvider.php");
require_once("includes/classes/VideoUploadData.php");
require_once("includes/classes/SelectThumbnail.php");

if(!User::isLoggedIn()) {
    header("Location: signIn.php");
}

if(!isset($_GET["videoId"])) {
    echo "No video selected";
    exit();
}

$video = new Video($con, $_GET["videoId"], $userLoggedInObj);
if($video->getUploadedBy() != $userLoggedInObj->getUsername()) {
    echo "<div class='column'>
                <div class='alert alert-primary' role='alert'>
                    <strong>ERROR!</strong> Not your video, or the video has been deleted.
                </div>
        </div>";
    exit();
}



$detailsMessage = "";
if(isset($_POST["saveButton"])) {
    $videoData = new VideoUploadData(
        null,
        $_POST["titleInput"],
        $_POST["descriptionInput"],
		$_POST["tagsInput"],
        $_POST["privacyInput"],
        $_POST["categoryInput"],
        $userLoggedInObj->getUsername()
    );

    if($videoData->updateDetails($con, $video->getId())) {
        $detailsMessage = "<div class='alert alert-success'>
                                <strong>SUCCESS!</strong> Details updated successfully!
                            </div>";
        $video = new Video($con, $_GET["videoId"], $userLoggedInObj);
    }
    else {
        $detailsMessage = "<div class='alert alert-danger'>
                                <strong>ERROR!</strong> Something went wrong
                            </div>";
    }
}

if(isset($_POST["deleteButton"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "videotube";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // sql to delete a record
    $sql = "DELETE FROM videos WHERE id=".$_GET["videoId"]. ";" . "DELETE FROM thumbnails WHERE videoId=".$_GET["videoId"]."";

    if (mysqli_multi_query($conn, $sql)) {
      $detailsMessage2 = "<div class='alert alert-info'>
                <strong>INFO!</strong> Record deleted successfully, Please click the DELETE button again.
            </div>";
    } else {

        $detailsMessage2 = "<div class='alert alert-danger'>
                <strong>INFO!</strong> Error deleting record: " . mysqli_error($conn) ."
            </div>";
    }

    mysqli_close($conn);
}
?>
          
<script src="assets/js/editVideoActions.js"></script>
<div class="editVideoContainer column">

    <div class="message">

        <div class="alert alert-primary" role="alert">
            <strong>INFO!</strong> DELETING YOUR VIDEO CANNOT BE UNDONE.
        </div>


        <?php echo $detailsMessage; ?>
        <?php echo $detailsMessage2; ?>
    </div>

    <div class="topSection">
        <?php
        $videoPlayer = new VideoPlayer($video);
        echo $videoPlayer->create(false);

        $selectThumbnail = new SelectThumbnail($con, $video);
        echo $selectThumbnail->create();
        ?>
    </div>

	<div class="thumbnailSection">
	
	<?php
	if(isset($_POST["submit"])){
		move_uploaded_file($_FILES['file']['tmp_name'],"uploads/videos/thumbnails/".$_FILES['file']['name']);
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"INSERT INTO thumbnails (videoId, filePath) VALUES ('".$_GET["videoId"]."', '"."uploads/videos/thumbnails/".$_FILES['file']['name']."')");
		?> 
		<script>
			alert("Thumbnail Updated Successfully!"); 
		</script>
		<?php 
	}	
?>

		<b>Upload Custom Thumbnail</b>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="submit">
		</form>
	</div>
	
	<hr>

    <div class="bottomSection">
        <?php
        $formProvider = new VideoDetailsFormProvider($con);
        echo $formProvider->createEditDetailsForm($video);
        ?>
    
    </div>

</div>

<meta name="viewport" content="width=device-width, initial-scale=0.45, shrink-to-fit=yes">