<!DOCTYPE html>
<html>
<head>
<title>WinsVideo - Realtime Stats</title>
<meta http-equiv="refresh" content="2">

</head>
<body>
<center>
<table border="8">
<tr>

<th>Channel Name</th>
<th>Username</th>
<th>Sign Up Date</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "videotube");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT firstName, lastName, username, signUpDate FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["firstName"]. "&nbsp;"
. $row["lastName"]. "</td><td>" . $row["username"]. "</td><td>" . $row["signUpDate"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</center>
</table>
</body>
</html>