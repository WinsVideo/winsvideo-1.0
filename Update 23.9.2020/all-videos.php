<?php 
	include_once("includes/header.php"); 
	include_once("all-videos/VideoGrid.php"); 
	include_once("all-videos/VideoGridItem.php"); 
?>

<div class="videos">
	<?php 
		$videoGrid = new VideoGrid2($con, $userLoggedInObj->getUsername()); 

		echo $videoGrid->create(null, "All Videos", false);
	?>
</div>