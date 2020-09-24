<?php require_once("includes/header.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>WinsVideo - Subscriber Count</title>
</head>

<STYLE TYPE="text/css">
			@import url('https://fonts.googleapis.com/css?family=Roboto:300&display=swap');
			 div.subs { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 500;
			color: #455a64;
				font-size: 85px; 
			}

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
mysql_connect("localhost", "root", ""); 
mysql_select_db("videotube"); 

$search = mysql_real_escape_string(trim($_POST['searchterm']));

$find_videos = mysql_query("SELECT * FROM `users` WHERE `username` LIKE'%$search%'");
while($row = mysql_fetch_assoc($find_videos))
{
    $name = $row['firstName'];
    $lastname = $row['lastName']; 
    $username = $row['username'];
    $signUpDate = $row['signUpDate']; 
    $totalChannelViews = $row['total']; 
    $subs = $row['subs'];
    
    echo "<h3>"; 
    echo $name; 
    echo "&nbsp;"; 
    echo $lastname; 
    echo "</h3>"; 
    echo "<br>";
    echo "<b>";  
    echo $username; 
    echo "</b>";
    echo '<div class="subs">'; 
        echo number_format($subs); 
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

<hr>

<h2>Copyright (C) WinsVideo 2019</h2>
</center>
</body>
</div>



<div class="colunm">

</div>
</html>

<?php require_once("includes/footer.php"); ?>