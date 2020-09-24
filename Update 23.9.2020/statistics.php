<?php 
include_once("includes/header.php"); 
	include_once("all-videos/VideoGrid.php"); 
	include_once("all-videos/VideoGridItem.php"); 
?> 

<div class="column article animated slideInUp">
    <h2>Statistics</h2>
    <p>WinsVideo's Site Statistics</p>
    <p>WinsVideo Public Data</p>
    <hr>
    <?php
    function folderSize($dir){
		$count_size = 0;
		$count = 0;
		$dir_array = scandir($dir);
		  foreach($dir_array as $key=>$filename){
		    if($filename!=".." && $filename!="."){
		       if(is_dir($dir."/".$filename)){
		          $new_foldersize = foldersize($dir."/".$filename);
		          $count_size = $count_size+ $new_foldersize;
		        }else if(is_file($dir."/".$filename)){
		          $count_size = $count_size + filesize($dir."/".$filename);
		          $count++;
		        }
		   }
		 }
		return $count_size;
		}

	function sizeFormat($bytes){ 
		$kb = 1024;
		$mb = $kb * 1024;
		$gb = $mb * 1024;
		$tb = $gb * 1024;

		if (($bytes >= 0) && ($bytes < $kb)) {
		return $bytes . ' B';

		} elseif (($bytes >= $kb) && ($bytes < $mb)) {
		return ceil($bytes / $kb) . ' KB';

		} elseif (($bytes >= $mb) && ($bytes < $gb)) {
		return ceil($bytes / $mb) . ' MB';

		} elseif (($bytes >= $gb) && ($bytes < $tb)) {
		return ceil($bytes / $gb) . ' GB';

		} elseif ($bytes >= $tb) {
		return ceil($bytes / $tb) . ' TB';
		} else {
		return $bytes . ' B';
		}
		}

		  $folder_name = "uploads/videos";
		  echo "<h4>WinsVideo Total Video Size</h4>";
		  echo "<p style='font-size: 40px; color: green;'>";
		  echo sizeFormat(folderSize($folder_name));
		  echo " / 30 GB";
		  echo "</p>";

?>
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
      
      <td><iframe src="statistics/total-views-realtime.php" width="150" height="120" frameBorder="0"></iframe> </td>
      <td><iframe src="statistics/total-views.php" width="250" height="120" frameBorder="0"></iframe></td>
      <td><iframe src="realtime/comments-realtime.php" width="150" height="120" frameBorder="0"></iframe></td>
      <td><iframe src="realtime/user-realtime.php" width="130" height="120" frameBorder="0"></iframe></td>
    </tr>
    
  </tbody>
</table>
    
	
<div class="videos">
	<?php 
		$videoGrid = new VideoGrid2($con, $userLoggedInObj->getUsername()); 

		echo $videoGrid->create(null, "All Videos (Latest Uploads)", false);
	?>
</div>   

	<div class="channels">
		<h3>All Channels</h3>
		<p>All Channels on WinsVideo, ordered by subscribers/followers</p>
		<hr>
		<?php 
		$conn = mysqli_connect("localhost", "root", "", "videotube");
		$sql = "SELECT firstName, lastName, username, profilePic, subs FROM users ORDER BY subs DESC";
		$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
			while($row = $result->fetch_assoc()) {
					echo "<tr><td><img width='90' height='90' src='" . $row["profilePic"] . "'><b>" . $row["firstName"] . "&nbsp;"
			. $row["lastName"] . "</b> - <tr><td><a href=profile.php?username=".$row["username"].">" .$row["username"]."</a></tr></td>&nbsp; ".$row["subs"]." Subscribers | ";
		}
			echo "</table>";
				} else { echo "Error"; }
$conn->close();
	?> 
	</div>
    

<?php 
include_once("includes/footer.php"); 
?> 

