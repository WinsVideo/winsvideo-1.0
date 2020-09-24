

<?php 

mysql_connect("localhost","root","");
mysql_select_db("videotube");

$query = mysql_query("SELECT * FROM `videos`"); 

  while ($row = mysql_fetch_row($query)) {

  	$id = $row[0]; 
  	echo $id;

    $str = uniqid();

    $update = "UPDATE videos SET url='" . $str . "' WHERE id='" . $row[0] . "'";
    mysql_query($update);

    
  }

/* 
$servername = "localhost";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=videotube", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT id, title FROM videos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll();

foreach($posts as $post) {

	$uniqid = uniqid(); 
	echo "<br>";
	echo $uniqid;

	$sql = "UPDATE videos SET url = :unique_id WHERE id = :id";
	$stmt = $pdo->prepare($sql);
  	$stmt->execute(['id' => $post->id, 'unique_id' => uniqid()]);


}

// Looping through all the results and updating them one by one with a delay of 1 second between the updates
/*
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        mt_srand(crc32(serialize([microtime(true), 'USER_IP', 'ETC'])))
    );
}

*/



?> 