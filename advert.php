<?php 
	include_once("includes/header.php"); 
?>

<?php
	if(isset($_POST['submit'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"assets/images/advert/".$_FILES['file']['name']);
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"INSERT INTO commercial SET image = '"."assets/images/advert/".$_FILES['file']['name']."'");
		?> 
		<script>
			alert("Banner Uploaded Successfully!"); 
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
	<h1>Advert Uploading</h1>
	<p>Upload Advertisement, by clicking the Choose File Button. Then, click submit.</p>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="submit">
		</form>
				<br>
	</div>
	</body>
</html>

<?php 
	include_once("includes/footer.php"); 
?> 