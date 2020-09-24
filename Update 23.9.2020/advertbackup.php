<div class="advert">

			

			<center>
  			<?php 
	$conn = mysqli_connect("localhost", "root", "", "videotube");
		$sql = "SELECT image FROM commercial order by RAND() LIMIT 1";
		$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
			while($row = $result->fetch_assoc()) {
					echo "<img width='100%' height='100%' src='" . $row["image"] . "'>";
		}
			echo "";
				} else { echo "Error"; }
	$conn->close();
	

?>
  		<button type='button' class='btn btn-link' onclick='$(this).parent().remove();'>Close Advertisement</button>

  			</center>
  				</div>