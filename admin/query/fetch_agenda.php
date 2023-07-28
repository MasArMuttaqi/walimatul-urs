<?php
	// create database connectivity
	include 'conn.php';
	$rec=$_POST['rec_num'];
	// $rec = 1;
  	$query = "SELECT * FROM agenda WHERE rec_num = '$rec'";  
  	$result = mysqli_query($conn, $query);   
  	$row = mysqli_fetch_assoc($result);
  	echo json_encode($row);  
?>