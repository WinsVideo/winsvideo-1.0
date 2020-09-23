<html>
<head>
		<title>WinsVideo - Realtime Stats</title>
		<meta http-equiv="refresh" content="1">
	</head>
	
	<style>
			@import url('https://fonts.googleapis.com/css?family=Roboto:300&display=swap');
			div { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 80px; 
			} 
			

		</style>

<?php 
$servername="localhost"; 
$username="root";
$password="";
$dbname="videotube";
$con=mysqli_connect($servername,$username,$password,$dbname);

$sql="SELECT SUM(`views`) AS total FROM videos"; 
		$result=mysqli_query($con,$sql); 
		$values=mysqli_fetch_assoc($result); 
		$num_rows=$values['total'];
		
		
        echo '<div id="totalViews" class="counter" data-count="$num_rows">';
        echo number_format($num_rows); 
        echo '</div>'; 
	
?>
</html>