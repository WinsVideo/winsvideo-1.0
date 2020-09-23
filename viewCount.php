

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>WinsVideo - Subscriber Count</title>
</head>

<STYLE TYPE="text/css">

div.views{font-family: Helvetica; font-size: 100pt;}

</STYLE>
<body>


<br>

<div class="column">
<center>
<h1>Subscriber Count</h1>
<p>WinsVideo Subscriber Counter</p>
<form action="search.php" method="POST">
	<input type="text" name="searchterm" placeholder="Channel Username...">
    <input type="submit" value="Search">
</form>
<br>

<?php

$servername="localhost"; 
$username="root";
$password="";
$dbname="videotube";
$con=mysql_connect($servername,$username,$password,$dbname);

$search = mysql_real_escape_string(trim($_POST['searchterm']));

$find_videos = mysql_query("SELECT * FROM `videos` WHERE `username` LIKE'%$search%'");
while($row = mysql_fetch_assoc($find_videos))
{
    $title = $row['title'];
    $category = $row['category'];
    $uploadedBy = $row['uploadedBy'];
    $uploadDate = $row['uploadDate'];
    $views = $row['views'];
    
    echo "<h3>"; 
    echo $title; 
    echo "</h3>"; 
    echo "<br>";
    echo "<b>";  
    echo $uploadedBy; 
    echo "</b>";
    echo '<div class="views">'; 
        echo number_format($views); 
        echo '</div>';
    
}


echo "<p>Other Statistics</p>";
    echo "<h4>Sign Up Date: "; 
    echo "</h4>";
    echo $signUpDate; 
    echo "<br>"; 
    echo "<h4>Total Channel Views: "; 
    echo "</h4>";
    echo $totalChannelViews; 








?> 