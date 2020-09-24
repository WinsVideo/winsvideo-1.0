<?php 
	include_once("includes/header.php"); 
?>

<?php
	if(isset($_POST['submit'])){
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"UPDATE users SET country = '".$_POST['text']."' WHERE username = '".$_SESSION['userLoggedIn']."'");
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
		input.text {
			width: 100px;
			
		}
	</style>
	<div class="column">
	<h1>Add Country</h1>
	<p>Add Country by typing the text inthe box, and click submit. 
	<br>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="text" name="text" placeholder="Enter Your Country Here!">
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