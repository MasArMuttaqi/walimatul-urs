<?php
	// create database connectivity
	include 'conn.php';
	$id=$_POST['id'];
	// $rec = 1;
  	$query = "SELECT * FROM timeline WHERE id = '$id'";  
  	$result = mysqli_query($conn, $query);   
  	$row = mysqli_fetch_assoc($result);
  	echo json_encode($row);  
?>