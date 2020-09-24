<?php 
	include_once 'includes/config.php';  
	include_once 'includes/classes/Account.php';
	
?> 
<html>

<head>
	<title>WinsVideo</title>
</head>
<body>
	<h1>Customizing the Profile Picture</h1>
	<a href="login.php">Login to WinsVideo</a>
	
	<form action="profileUpload.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<button type="submit" name="submit">Upload</button>
	</form>


</body>
