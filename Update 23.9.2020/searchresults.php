<!DOCTYPE html>
<html>
<head>
<title>WinsVideo - Video View Stats</title>


<meta http-equiv="refresh" content="2">

<STYLE TYPE="text/css">

TR{font-family: Helvetica; font-size: 20pt;}

</STYLE>



</head>
<body>


    
<center>

<table border="1">
<tr>


<th>Title</th>
<th>Views</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "videotube");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT username, views FROM videos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>". $row["title"] . "</td><td>"
. $row["views"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>

</center>
</table>
</body>
</html>