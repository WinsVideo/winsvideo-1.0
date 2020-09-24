<?php 
include_once("includes/header.php"); 
	include_once("all-videos/VideoGrid.php"); 
	include_once("all-videos/VideoGridItem.php"); 
?> 


	
<div class="videos">
	<?php 
		$videoGrid = new VideoGrid2($con, $userLoggedInObj->getUsername()); 

		echo $videoGrid->create(null, "
		<h1>Latest Uploads</h1>
        
		All Videos (Latest Uploads)", false);
	?>
</div>   
    

<?php 
include_once("includes/footer.php"); 
?> 

