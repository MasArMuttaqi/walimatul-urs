<?php
	include 'conn.php';

		$callname=$_POST['callname'];
		$nama=$_POST['nama'];
		$telepon=$_POST['telepon'];
		$undangan = implode(";",$_POST['undangan']);
		$ts=date("Y-m-d H:i:s");

		if ($_POST['uuid'] != '') {
			$sql = "UPDATE `tamu_undangan` SET `callname`='$callname',`nama`='$nama',`telepon`='$telepon',`undangan`='$undangan',`ts`='$ts' WHERE `uid`='".$_POST['uuid']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../tamu-2.php?status=success');
			} 
			else {
				header('location:../tamu-2.php?status=gagal');
			}
			mysqli_close($conn);
		}elseif ($_POST['uuid'] != '' && $_GET['trx'] == 'delete' ) {
			$sql = "DELETE FROM `tamu_undangan` WHERE `tamu_undangan`.`uid` ='".$_POST['uuid']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../tamu-2.php?status=success');
			} 
			else {
				header('location:../tamu-2.php?status=gagal');
			}
			mysqli_close($conn);
		}else{
			$uuid = uniqid();
			$sql = "INSERT INTO `tamu_undangan`(`uid`, `callname`, `nama`, `telepon`, `undangan`, `ts`) VALUES ('$uuid','$callname','$nama','$telepon','$undangan','$ts')";
			if (mysqli_query($conn, $sql)) {
				header('location:../tamu-2.php?status=success');
			} 
			else {
				header('location:../tamu-2.php?status=gagal');
			}
			mysqli_close($conn);
		}


?>