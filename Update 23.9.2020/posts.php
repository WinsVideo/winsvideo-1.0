<head>
	<script data-ad-client="ca-pub-1404625093629058" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head> 

<?php require_once("includes/header.php"); ?>
<?php require_once("includes/classes/ProfileData.php"); ?>
<?php include_once("includes/header.php"); 
	include_once("all-videos/VideoGrid.php"); 
	include_once("all-videos/VideoGridItem.php");    ?>  
	
	<?php error_reporting(0); ?> 
	
	<div class="column article animated slideInUp">
	<h1>Posts / Status</h1>
	<p>Add Or Update Your Status?</p>
	<?php
	//adding status
	if(isset($_POST['submit'])){
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"UPDATE users SET status = '".$_POST['text']."' WHERE username = '".$_SESSION['userLoggedIn']."'");
		?> 
		<script>
			alert("Status Updated Successfully!"); 
		</script>
		<?php 
	}	
?>
	
	<style>
		textarea {
			width: 1000px;
			height: 200px;
		}
	</style>
	<hr>
	<div class="alert alert-warning">
    <strong>WARNING! </strong> If you want to add photos, please upload the image first. copy the code, and paste it in the status textbox. 
  </div>
	<p>Update Your Status by typing the text inthe box, and click submit. 
	<br>To make a new line, type '&lt;br&gt;' before the text. <br>
	You can use the html tags and css to customize your status<br>
	Adjust the box by dragging the two lines at the bottom right corner.</p>
		<form action="" method="post" enctype="multipart/form-data">
			<textarea type="text" name="text" placeholder="Update your status!"></textarea>
			<br><input type="submit" name="submit">
		</form>
				<br>
	
												
		<h2>Add photos</h2>
	
		<p>To add photos, upload your photo by using the upload tool below. 
		<br>Then, copy the code in the textbox followed by the image name.</p>
		

		<?php
	if(isset($_POST['submit'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"public/uploads/images/".$_FILES['file']['name']);
		$con = mysqli_connect("localhost","root","","videotube");
		$q = mysqli_query($con,"UPDATE users SET public-images = '"."public/uploads/images".$_FILES['file']['name']."' WHERE username = '".$_SESSION['userLoggedIn']."'");

		$filename="Copy this code: <p>&lt;img src=&quot;public/uploads/images/".$_FILES['file']['name']."&quot; /&gt;</p>" ;
				echo 
				$filename 
				 


		?> 
		<script>
			alert("Image And Status Updated Succesfully"); 
		</script>
		<?php 
	}	
?>


		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" name="submit">
		</form>


<hr>

	 <p>Posts</p>
<hr>
<?php 
	$conn = mysqli_connect("localhost", "root", "", "videotube");
		$sql = "SELECT firstName, lastName, username, profilePic, status FROM users order by RAND() LIMIT 20";
		$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
			while($row = $result->fetch_assoc()) {
					echo "<img width='70' height='70' src='" . $row["profilePic"] . "'><b>" . $row["firstName"] . "&nbsp;"
			. $row["lastName"] . "</b> - 
			 <a href=profile.php?username=".$row["username"].">" .$row["username"]."</a>&nbsp; <br><br> Status Now: <br> " .$row["status"]. " <hr> <br>";
		}
			echo "";
				} else { echo "Error"; }
$conn->close();
	

?>
  

<?php require_once("includes/footer.php"); ?>

<html>
    <head>
    <meta name="keywords" content="WinsVideo,WinsVideo.net,Video,Sharing,Platform,Creator,Friendly">
    </head>
</html>

</div>

    
            