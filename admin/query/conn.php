<?php
date_default_timezone_set("Asia/Bangkok");

  $servername = "sql6.freemysqlhosting.net";
  $username = "sql6635828";
  $password = "LaYdy9RPXl";
  $db="sql6635828";
  $conn = mysqli_connect($servername, $username, $password,$db);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
