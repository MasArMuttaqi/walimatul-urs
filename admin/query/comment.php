<?php
include 'conn.php';
$sql 	= 'SELECT * FROM `pesan`';
$query 	= mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($query)) {
	$comment[]=array('nama' => $row['nama'], 'pesan' => $row['pesan']);
}

$myJSON = json_encode($comment);

echo $myJSON;
//generate json file
// file_put_contents("load_pesan.json", $myJSON);
?>