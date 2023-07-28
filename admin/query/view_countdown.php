<?php
	include 'conn.php';
	include 'tgl_format.php';

  	function countdown($date){
  		$new_date = date('M d, Y H:i:s', strtotime($date));
  		return $new_date;
  	}
  	
	$uid=$_POST['uid'];
	$query = "SELECT uid, undangan FROM tamu_undangan WHERE uid='$uid'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

	if ($row['undangan']=='kirim kabar') {
		$category='Akad Nikah';
	}else{
		$category=$row['undangan'];
	}

	$result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam FROM agenda WHERE agenda='$category'");   
    $row_undangan = mysqli_fetch_assoc($result_undangan);
    $jam = explode(" - ",$row_undangan['jam']);

    $datewed = tanggal_indo($row_undangan['tanggal']);
  	$tgl = date_format(date_create($row_undangan['tanggal']),"d.m.Y");
    $format = countdown($row_undangan['tanggal']." ".$jam[0]);

    $MyArray= array($format, $datewed, $tgl);

    echo json_encode($MyArray);

     mysqli_close($conn); 
?>