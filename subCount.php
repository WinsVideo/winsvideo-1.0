<?php require_once("includes/header.php"); ?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<meta charset="utf-8">
<title>WinsVideo - Subscriber Count</title>

<STYLE TYPE="text/css">
			@import url('https://fonts.googleapis.com/css?family=Roboto:300&display=swap');
			 div.subs { 
				font-family: 'Roboto', sans-serif; 
			font-weight: 500;
			color: #455a64;
				font-size: 85px; 
			}

</STYLE>

</head>

<body>
<div class="column">
<center><br>
<h1>Subscriber Count</h1>
<p>WinsVideo Subscriber Counter</p>
<form action="subCountResult.php" method="POST">
	<input type="text" name="searchterm" placeholder="Channel Username...">
    <input type="submit" value="Search">
</form>
<br>
<h3>-</h3>
<br>
<b>-</b>
<div class="subs">
    0
</div>

<p>Other Statistics</p>
<h4>Sign Up Date: </h4>
 0
<h4>Total Channel Views: </h4>
 0 
</center>
</body>
<hr>
<center>
<h2>Copyright (C) WinsVideo 2019</h2>
</center>
<div>
</html>

<?php require_once("includes/footer.php"); ?>

