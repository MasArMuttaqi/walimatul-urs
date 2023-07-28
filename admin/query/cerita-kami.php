<?php
	include 'conn.php';
	function tgl($tgl){
    	$new_date = date('Y-m-d', strtotime($tgl));
    	return $new_date;
  	}

		$judul=$_POST['judul'];
		$tanggal=tgl($_POST['tanggal']);
		$deskripsi=$_POST['deskripsi'];
		$x=$_POST['x'];
		
		if ($_POST['url']=="") {
			$url=$x;
		}else{
			$myarry = explode('/',$_POST['url'],7);
			$url=$myarry[5];
		}
		// echo $url;

		if ($_POST['id'] != '') {
			$sql = "UPDATE `timeline` SET `judul`='$judul',`tanggal`='$tanggal',`deskripsi`='$deskripsi',`bagde`='$url' WHERE `id`='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../cerita-kami.php?status=success');
			} 
			else {
				header('location:../cerita-kami.php?status=gagal');
			}
			mysqli_close($conn);
		}elseif ($_POST['id'] != '' && $_GET['trx'] == 'delete' ) {
			$sql = "DELETE FROM `timeline` WHERE `id`='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../cerita-kami.php?status=success');
			} 
			else {
				header('location:../cerita-kami.php?status=gagal');
			}
			mysqli_close($conn);
		}else{
			$sql = "INSERT INTO `timeline`(`id`, `judul`, `tanggal`, `deskripsi`, `bagde`) VALUES (null,'$judul','$tanggal','$deskripsi','$url')";
			if (mysqli_query($conn, $sql)) {
				header('location:../cerita-kami.php?status=success');
			} 
			else {
				header('location:../cerita-kami.php?status=gagal');
			}
			mysqli_close($conn);
		}

?>