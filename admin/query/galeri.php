<?php
	include 'conn.php';
	

		if ($_POST['category']=="1") {
			$category=$_POST['category'];
			$x=$_POST['x'];
			$caption = $_POST['deskripsi'];
			if ($_POST['url']=="") {
				$content=$x." | ".$caption;
			}else{
				$myarry = explode('/',$_POST['url'],7);
				$content=$myarry[5]." | ".$caption;
			}
		}elseif ($_POST['category']=="2") {
			$category=$_POST['category'];
			$content=$_POST['deskripsi'];
		}else{
			header('location:../galery.php?status=gagal');
			// echo "null";
		}
		// echo $content;
		$ts=date("Y-m-d H:i:s");

		if ($_POST['id'] != '') {
			$sql = "UPDATE `galeri` SET `category`='$category',`content`='$content',`ts`='$ts' WHERE `id`='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../galery.php?status=success');
			} 
			else {
				header('location:../galery.php?status=gagal');
			}
			mysqli_close($conn);
		}elseif ($_POST['id'] != '' && $_GET['trx'] == 'delete' ) {
			$sql = "DELETE FROM `galeri` WHERE `id`='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../galery.php?status=success');
			} 
			else {
				header('location:../galery.php?status=gagal');
			}
			mysqli_close($conn);
		}else{
			$sql = "INSERT INTO `galeri`(`id`, `category`, `content`, `ts`) VALUES (null,'$category','$content','$ts')";
			if (mysqli_query($conn, $sql)) {
				header('location:../galery.php?status=success');
			} 
			else {
				header('location:../galery.php?status=gagal');
			}
			mysqli_close($conn);
		}

?>