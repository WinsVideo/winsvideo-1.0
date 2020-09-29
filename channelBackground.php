<?php 

echo "Sorry, This the custom uploader is not available at the moment. ";
/*

<?php 
	include_once("includes/header.php"); 
?>

<?php
	if(isset($_POST['submit'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"assets/images/channel-background/".$_FILES['file']['name']);
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"UPDATE users SET background = '"."assets/images/channel-background/".$_FILES['file']['name']."' WHERE username = '".$_SESSION['userLoggedIn']."'");
		?> 
		<script>
			alert("Background Updated Successfully!"); 
		</script>
		<?php 
	}	
?>

<?php
	if(isset($_POST['default'])){
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"UPDATE users SET background = '"."assets/images/channel-background/".$_FILES['file']['name']."' WHERE username = '".$_SESSION['userLoggedIn']."'");
		?> 
		<script>
			alert("Background Updated Successfully!"); 
		</script>
		<?php 
	}	
?>

<!DOCTYPE html>
<html>
	<head>
	
	</head>
	<body>
	<div class="column">
	<h1>Upload Background Picture</h1>
	<p>Upload Background, by clicking the Choose File Button. Then, click submit. 
		<br>1. Do not use file with spaces.
		<br>2. Do not upload your private information as the background</p>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="submit">
			<br><br>
			Use default background
			<hr>
			<input type="submit" name="default" value="Use Default background">
		</form>
				<br>
			<h3>Other Options</h3>
		<a href="bannerPicture.php">Change Banner</a><br>
		<a href="settings.php">Go back to Settings</a>
	</div>
	</body>
</html>

<?php 
	include_once("includes/footer.php"); 
?>

*/
?>