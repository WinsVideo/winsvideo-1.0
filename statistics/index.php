<!DOCTYPE html>
<html>
<head>
	<title>WinsVideo Statistics</title>
	<meta http-equiv="refresh" content="1">
</head>
<body>

	<style>
			@import url('https://fonts.googleapis.com/css?family=Roboto:300&display=swap');
			div { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 300;
			color: #455a64;
				font-size: 80px; 
			} 
			

		</style>


	<table class="table table-hover">
  <thead>
    <tr>
      
      <th scope="col"><a href="statistics/total-views-realtime.php">Videos (Total) &nbsp;<a href="realtime/new-realtime-views.php">Videos List </a></a></th>
      <th scope="col"><a href="statistics/total-views.php">Views (Total) </a></th>
      <th scope="col"><a href="realtime/comments-realtime.php">Comments (Total) </a></th>
      <th scope="col"><a href="realtime/user-realtime.php">Users (Total) </a> &nbsp;<a href="realtime/user-all.php">Users List </a></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td><?php 
		$servername="localhost"; 
		$username="root";
		$password="";
		$dbname="videotube";
		$con=mysqli_connect($servername,$username,$password,$dbname);
		
		$sql="SELECT count(id) AS total FROM videos"; 
		$result=mysqli_query($con,$sql); 
		$values=mysqli_fetch_assoc($result); 
		$num_rows=$values['total']; 
		echo "<div>$num_rows</div>"; 
		echo "</div>"
	?> </td>
      <td><?php 
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
        echo $num_rows; 
        echo '</div>'; 
	
?></td>
      <td><?php 
		$servername="localhost"; 
		$username="root";
		$password="";
		$dbname="videotube";
		$con=mysqli_connect($servername,$username,$password,$dbname);
		
		$sql="SELECT count(id) AS total FROM comments"; 
		$result=mysqli_query($con,$sql); 
		$values=mysqli_fetch_assoc($result); 
		$num_rows=$values['total']; 
		echo "<div>$num_rows</span>"; 
		echo "</font>"
	?></td>
      <td><?php 
		$servername="localhost"; 
		$username="root";
		$password="";
		$dbname="videotube";
		$con=mysqli_connect($servername,$username,$password,$dbname);
		
		$sql="SELECT count(id) AS total FROM users"; 
		$result=mysqli_query($con,$sql); 
		$values=mysqli_fetch_assoc($result); 
		$num_rows=$values['total']; 
		echo "<div>$num_rows</span>"; 
		echo "</font>"
	?></td>
    </tr>
    
  </tbody>
</table>
</body>
</html>>