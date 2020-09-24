<?php 
	include_once("includes/header.php"); 
?>

<?php
	if(isset($_POST['submit'])){
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"UPDATE users SET color = '".$_POST['text']."' WHERE username = '".$_SESSION['userLoggedIn']."'");
		?> 
		<script>
			alert("Country Updated Successfully!"); 
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

		
		input.text {
			width: 100px;
			
		}
	</style>
	<div class="column">
	<h1>Add CSS</h1>
	<p>This feature allows you to add css to the text on your channel page. 
	<br>
		<form action="" method="post" enctype="multipart/form-data">
			<textarea type="text" name="text" placeholder="Enter Your CSS"></textarea>
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