<?php
	include 'conn.php';

		$nama=$_POST['nama'];
		$pin=$_POST['pin'];
		$status=$_POST['status'];
		$ts=date("Y-m-d H:i:s");

		if ($_POST['id'] != '') {
			$sql = "UPDATE `admin` SET `nama`='$nama',`pin`='$pin',`status`='$status',`ts`='$ts' WHERE `id`='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../akun.php?status=success');
			} 
			else {
				header('location:../akun.php?status=gagal');
			}
			mysqli_close($conn);
		}elseif ($_POST['id'] != '' && $_GET['trx'] == 'delete' ) {
			$sql = "DELETE FROM admin WHERE id='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../akun.php?status=success');
			} 
			else {
				header('location:../akun.php?status=gagal');
			}
			mysqli_close($conn);
		}else{
			$sql = "INSERT INTO `admin`(`id`, `nama`, `pin`, `status`, `ts`) VALUES (null,'$nama','$pin','$status','$ts')";
			if (mysqli_query($conn, $sql)) {
				header('location:../akun.php?status=success');
			} 
			else {
				header('location:../akun.php?status=gagal');
			}
			mysqli_close($conn);
		}


?>