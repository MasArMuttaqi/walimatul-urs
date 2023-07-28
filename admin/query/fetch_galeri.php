<?php
	// create database connectivity
	include 'conn.php';
	$id=$_POST['id'];
  	$query = "SELECT * FROM galeri WHERE id = '$id'";  
  	$result = mysqli_query($conn, $query);   
  	$row = mysqli_fetch_assoc($result);
  	echo json_encode($row);  
  	mysqli_close($conn);
?>