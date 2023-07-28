<?php
	session_start();
	require"conn.php"; // memanggil fungsi koneksi database dari file yang berbeda
	$pin=$_POST['password']; //mendapat nilai dari form menggunakan metode post (tidak melalui link)
		# code...
		$sql="SELECT * FROM admin WHERE pin='$pin'"; 
		//query untuk melihat apakah nilai/data yang dimasukkan tersedia pada database atau tifak
		$query=mysqli_query($conn,$sql);
		$jum=mysqli_num_rows($query); //fungsi query untuk melihat jumlah data yang sama berdasarkan nilai yang diberikan
		$row=mysqli_fetch_assoc($query);
		if ($jum=='1') {
			# code...
			//jika nilai query bernilai 1 maka autentifikasi benar dan dapat masuk ke dalam aplikasi
			//fungsi session untuk menyimpan data sementara pada memori server
			$_SESSION['nama']=$row['nama'];
			// logger
			
			header('location:../home.php?view=agenda'); //jika kondisi benar maka akan diarahkan ke halaman tertentu
		}else{
			header('location:../index.php?msg=error'); //jika kondisi salah maka akan diarahkan ke halaman sebelumnya dengan variabel data, menggunakan metode GET
		}

		mysqli_close($conn);

?>