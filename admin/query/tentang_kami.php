<?php
	include 'conn.php';

		$nama=$_POST['nama'];
		$familyname=$_POST['familyname'];
		$deskripsi=$_POST['editor1'];
		$foto=$_POST['foto'];
		
		if (isset($_POST['url'])) {
			
			$myarry = explode('/',$foto,7);
			$url=$myarry[5];
		}else{
			$url = $foto;
		}
		// echo $url[5];
		// echo "<img src='https://drive.google.com/thumbnail?id=".$url[5]."'>";

		$sql = "UPDATE `tentang_kami` SET `nama`='$nama',`familyname`='$familyname',`deskripsi`='$deskripsi',`foto`='$url' WHERE `id`='".$_POST['id']."'";
			if (mysqli_query($conn, $sql)) {
				header('location:../tentang-kami.php?status=success');
			} 
			else {
				header('location:../tentang-kami.php?status=gagal');
			}
			mysqli_close($conn);



?>