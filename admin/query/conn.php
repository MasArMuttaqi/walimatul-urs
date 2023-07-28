<?php
date_default_timezone_set("Asia/Bangkok");

  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  $db="walimatul_urs";
  $conn = mysqli_connect($servername, $username, $password,$db);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>