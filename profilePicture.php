<?php 

echo "Sorry, This the custom uploader is not available at the moment. ";
/*

<?php 
	include_once("includes/header.php"); 
?>

<?php
	if(isset($_POST['submit'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"assets/images/profilePictures/".$_FILES['file']['name']);
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"UPDATE users SET profilePic = '"."assets/images/profilePictures/".$_FILES['file']['name']."' WHERE username = '".$_SESSION['userLoggedIn']."'");
		?> 
		<script>
			alert("Profile Updated Successfully!"); 
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
	<h1>Upload Profile Picture</h1>
	<p>Upload Profile, by clicking the Choose File Button. Then, click submit.</p>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file" accept=".png,.jpg,.gif,.jpeg">
			<input type="submit" name="submit">
		</form>
				<br>
			<h3>Other Options</h3>
		<a href="bannerPicture.php">Change Banner</a><br>
		<a href="settings.php">Go back to Settings</a>
	</div>
		
		
		<?php
			$con = mysqli_connect("localhost","root","","videotube");
			$q = mysqli_query($con,"SELECT * FROM users");
			while($row = mysqli_fetch_assoc($q)){
				
				if($row['profilePic'] == ""){
					echo "<img width='100' height='100' src='assets/images/profilePictures/default.png
' alt='Default Profile Pic'>";
				}
				echo "<br>";
			}
		?>
	</body>
</html>

<?php 
	include_once("includes/footer.php"); 
?> 

*/
?>