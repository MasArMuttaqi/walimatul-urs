<?php
require 'conn.php';
if(isset($_POST["submit"])){
	$filename=$_FILES["file"]["name"];
	if (($handle = fopen($filename, "r")) !== FALSE) {
		fgetcsv($handle);
		while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
		    // echo $data[0]." | ".$data[1]." | ".$data[2]." | ".$data[3]."<br>";
		    // Get row data
		    $uuid = uniqid();
		    $callname = $data[0];
		    $nama = $data[1];
		    $telepon = $data[2];
		    $undangan = $data[3];
		    $ts=date("Y-m-d H:i:s");
		    $sql = "INSERT INTO `tamu_undangan`(`uid`, `callname`, `nama`, `telepon`, `undangan`, `ts`) VALUES ('$uuid','$callname','$nama','$telepon','$undangan','$ts')";
		    mysqli_query($conn, $sql);          
		}
		// Close opened CSV file
        fclose($csvFile);
        header('location:../tamu.php?status=success');
	}else{
		header('location:../tamu.php?status=gagal');
	}	
}
mysqli_close($conn);
?>