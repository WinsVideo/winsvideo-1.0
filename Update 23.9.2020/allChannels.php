<?php
	include_once("includes/header.php"); 
?> 

	<div class="column">
		<h3>All Channels</h3>
		<p>All Channels on WinsVideo, ordered by subscribers/followers</p>
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

	