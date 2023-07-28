<?php
	include 'conn.php';

		if ($_POST['trx']=='update') {
			$nama=$_POST['nama'];
			$pin=$_POST['pin'];
			$status=$_POST['status'];
			$ts=date("Y-m-d H:i:s");
			$sql = "UPDATE `admin` SET `nama`='$nama',`pin`='$pin',`status`='$status',`ts`='$ts' WHERE `id`='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
				$icon = 'success';
				$status = 'Transaksi perubahan data sukses dilakukan';
			} 
			else {
				$icon = 'warning';
				$status = 'Transaksi perubahan data gagal dilakukan';
			}
			// mysqli_close($conn);
		}elseif ($_POST['trx'] == 'delete' ) {
			$sql = "DELETE FROM admin WHERE id='".$_POST['deleteId']."'";
			if (mysqli_query($conn, $sql)) {
				$icon = 'success';
				$status = 'Transaksi penghapusan akun sukses dilakukan';
			} 
			else {
				$icon = 'warning';
				$status = 'Transaksi penghapusan akun gagal dilakukan';
			}
			// mysqli_close($conn);
		}else{
			$nama=$_POST['nama'];
			$pin=$_POST['pin'];
			$status=$_POST['status'];
			$ts=date("Y-m-d H:i:s");
			$sql = "INSERT INTO `admin`(`id`, `nama`, `pin`, `status`, `ts`) VALUES (null,'$nama','$pin','$status','$ts')";
			if (mysqli_query($conn, $sql)) {
				$icon = 'success';
				$status = 'Transaksi penambahan akun sukses dilakukan';
			} 
			else {
				$icon = 'warning';
				$status = 'Transaksi penambahan akun gagal dilakukan';
			}
			// mysqli_close($conn);
		}

		$status_arr = array($icon, $status);
		echo json_encode($status_arr);
		mysqli_close($conn);
?>