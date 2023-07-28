<?php
  include 'conn.php';
  $name=$_POST['name'];
  $comment=$_POST['comment'];
  $dt=date("Y-m-d H:i:s");
  $sql = "INSERT INTO `pesan`(`nama`, `pesan`, `ts`) VALUES ('$name','$comment','$dt')";
  if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode"=>200));
  } 
  else {
    echo json_encode(array("statusCode"=>201));
  }
  mysqli_close($conn);
?>

