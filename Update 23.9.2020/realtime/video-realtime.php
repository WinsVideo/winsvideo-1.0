<!DOCTYPE html>
<html>
	<head>
		<title>WinsVideo - Realtime Stats</title>
		<meta http-equiv="refresh" content="1">
		
	</head>
	<body>
		<center>
	<?php 
		$servername="localhost"; 
		$username="root";
		$password="";
		$dbname="videotube";
		$con=mysqli_connect($servername,$username,$password,$dbname);
		
		$sql="SELECT count(id) AS total FROM videos"; 
		$result=mysqli_query($con,$sql); 
		$values=mysqli_fetch_assoc($result); 
		$num_rows=$values['total']; 
		echo "<span
			style='color: black; font-family: 'helvetica'; font-size: 55px;'>$num_rows</span>"; 
		echo "</font>"
	?>
		</center>
	</body>
</html>