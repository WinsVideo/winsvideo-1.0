<?php 
	include_once("includes/header.php"); 
?>

<?php
	if(isset($_POST['submit'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"assets/images/coverPhotos/".$_FILES['file']['name']);
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"UPDATE users SET banner = '"."assets/images/coverPhotos/".$_FILES['file']['name']."' WHERE username = '".$_SESSION['userLoggedIn']."'");
		?>
		<script>
			alert("Banner Updated Successfully!"); 
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
	<h1>Upload Banner Image</h1>
	<p>Upload Banner, by clicking the Choose File Button. Then, click submit.</p>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="submit">
		</form>
			<br>
			<h3>Other Options</h3>
		<a href="profilePicture.php">Change Profile</a><br>
		<a href="settings.php">Go back to Settings</a>
		</div>
		
		
		<?php
			$con = mysqli_connect("localhost","root","","videotube");
			$q = mysqli_query($con,"SELECT * FROM users");
			while($row = mysqli_fetch_assoc($q)){
			
				if($row['banner'] == ""){
					echo "<img width='100' height='100' src='assets/images/coverPhotos/default-cover-photo.png
' alt='Default Cover Photo'>";
				}
				echo "<br>";
			}
		?>
	</body>
</html>

<?php 
	include_once("includes/footer.php"); 
?> 