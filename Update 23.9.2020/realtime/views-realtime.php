<!DOCTYPE html>
<html>
<head>
<title>WinsVideo - Realtime Stats</title>
<meta http-equiv="refresh" content="0.00000000000000000000000000000000000000001">
<link type="text/css" rel="stylesheet" href="table.css" />
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
$sql = "SELECT id, title, views FROM videos";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["title"] . "</td><td>"
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