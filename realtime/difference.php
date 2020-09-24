<?php
$conn = mysqli_connect("localhost", "root", "", "videotube");
// Check connection
SELECT TotalVotes-VoteSum AS diff 
FROM `articles` 
ORDER BY `diff`  DESC
?>