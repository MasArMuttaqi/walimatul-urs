<?php
	include 'conn.php';
	// function tgl($tgl){
 //    	$new_date = date('Y-m-d', strtotime($tgl));
 //    	// echo $new_date;
 //    	return $new_date;
 //  	}

		// $agenda=$_POST['agenda'];
		// $tanggal=$_POST['datepicker'];
		// $jam1=$_POST['timepicker1'];
		// $jam2=$_POST['timepicker2'];
		// $jam=$jam1." - ".$jam2;
		// $tempat=$_POST['tempat'];
		// $maps=$_POST['maps'];

		if ($_POST['rec_num'] != '' and $_POST['trx'] == 'update') {
			$agenda=$_POST['agenda'];
			$tanggal=$_POST['datepicker'];
			$jam1=$_POST['timepicker1'];
			$jam2=$_POST['timepicker2'];
			$jam=$jam1." - ".$jam2;
			$tempat=$_POST['tempat'];
			$maps=$_POST['maps'];
			$sql = "UPDATE agenda SET agenda='$agenda',tanggal='$tanggal',jam='$jam',tempat='$tempat',koordinat='$maps' WHERE rec_num='".$_POST['rec_num']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../agenda.php?status=success');
			} 
			else {
				header('location:../agenda.php?status=gagal');
			}
			mysqli_close($conn);
		}elseif ($_POST['rec_num'] != '' and $_POST['trx'] == 'delete' ) {
			$sql = "DELETE FROM agenda WHERE rec_num='".$_POST['rec_num']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../agenda.php?status=success');
			} 
			else {
				header('location:../agenda.php?status=gagal');
			}
			mysqli_close($conn);
		}else{
			$agenda=$_POST['agenda'];
			$tanggal=$_POST['datepicker'];
			$jam1=$_POST['timepicker1'];
			$jam2=$_POST['timepicker2'];
			$jam=$jam1." - ".$jam2;
			$tempat=$_POST['tempat'];
			$maps=$_POST['maps'];
			$sql = "INSERT INTO agenda(agenda, tanggal, jam, tempat, koordinat) VALUES ('$agenda','$tanggal','$jam','$tempat','$maps')";
			if (mysqli_query($conn, $sql)) {
				header('location:../agenda.php?status=success');
			} 
			else {
				header('location:../agenda.php?status=gagal');
			}
			mysqli_close($conn);
		}


?>