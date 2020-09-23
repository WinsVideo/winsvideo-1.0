<p>Featured Posts</p>

<?php 
	$conn = mysqli_connect("localhost", "root", "", "videotube");
		$sql = "SELECT firstName, lastName, username, profilePic, status FROM users order by RAND() LIMIT 1";
		$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
			while($row = $result->fetch_assoc()) {
					echo "<img width='70' height='70' src='" . $row["profilePic"] . "'><b>" . $row["firstName"] . "&nbsp;"
			. $row["lastName"] . "</b> - 
			 <a href=profile.php?username=".$row["username"].">" .$row["username"]."</a>&nbsp; <br><br>" .$row["username"]. "'s Status Now: <br>  <hr> <br>";
		}
			echo "";
				} else { echo "Error"; }
	$conn->close();
	

?>