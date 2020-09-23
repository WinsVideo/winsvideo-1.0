<?php 
	include_once("includes/header.php"); 
?>

<?php

	if(isset($_POST['submit'])){
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"UPDATE users SET links = '".$_POST['text']."' WHERE username = '".$_SESSION['userLoggedIn']."'");
		?> 
		<script>
			alert("Links Updated Successfully!"); 
		</script>
		<?php 
	}	
?>

<!DOCTYPE html>
<html>
	<head>
	
	</head>
	<body>
	<style>
		textarea {
			width: 1000px;
			height: 200px;
		}
	</style>
	<div class="column">
	<h1>Add Channel Links</h1>
	<p>Update Channel Links by typing the text in the box, and click submit. 
	<br>To make a new line, type '&lt;br&gt;' before the text. <br>
	To add a link type '&lt;a href="the link"&gt;"the link" &lt;/a&gt;' <br>
	Adjust the box by dragging the two lines at the bottom right corner.</p>
		<form action="" method="post" enctype="multipart/form-data">
			<textarea type="text" name="text" placeholder="Add Links Here!"></textarea>
			<br><input type="submit" name="submit">
		</form>
				<br>
			<h3>Other Options</h3>
		<a href="bannerPicture.php">Change Banner</a><br>
		<a href="profilePicture.php">Profile Picture</a><br>
		<a href="settings.php">Go back to Settings</a>
	</div>
		
		
		<?php
			$con = mysqli_connect("localhost","root","","videotube");
			$q = mysqli_query($con,"SELECT * FROM users");
			
		?>
	</body>
</html>

<?php 
	include_once("includes/footer.php"); 
?> 