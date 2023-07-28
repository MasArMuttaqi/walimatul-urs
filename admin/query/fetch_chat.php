<?php
	// create database connectivity
	include 'conn.php';
	include 'tgl_format.php';
	$kategori=$_POST['kategori'];
	$uid = '620d221d83dcd';
  $query = "SELECT * FROM m_undangan WHERE kategori='$kategori'";  
  $result = mysqli_query($conn, $query);   
  $row = mysqli_fetch_assoc($result);

  echo $row['undangan'];

  // $query = "SELECT * FROM tamu_undangan WHERE uid='$uid'";  
  // $result = mysqli_query($conn, $query);   
  // $row = mysqli_fetch_assoc($result);
  // $nama = $row['callname']." ".$row['nama'];
  // $undangan=explode(";",$row['undangan']);

  // echo "*Yth. ".$nama."*\r\n_Assalamu'alaikum wr wb_\r\nTanpa mengurangi rasa hormat, izinkan Kami menyampaikan berita bahagia atas rencana pernikahan kami :\r\n*Ahmad Rizaqu Muttaqi dengan Aftina*\r\n";
  // if (in_array("kirim kabar", $undangan)) {
  //       $result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat FROM agenda WHERE agenda like '%Nikah%'");   
  //       $row_undangan = mysqli_fetch_assoc($result_undangan);
  //       echo "Yang diagendakan ".$row_undangan['agenda']." pada hari ".tanggal_indo($row_undangan['tanggal'])." di ".$row_undangan['tempat']."\r\n";
  //       echo "Sehubungan dengan keterbatasan kapasitas yang kami miliki, kami belum dapat mengundang ".$nama." untuk turut hadir dalam acara tersebut. Mohon doa restu bagi Kami yang mengikat janji suci pernikahan tuk mengarungi bahtera rumah tangga bersama. Mohon maaf atas segala keterbatasan dan kekurangan kami.\r\n";
  //       echo "Kami sampaikan kabar baik ini pada tautan berikut : https://aftinariza.wedding?uid=".$uid."\r\n";
  // }else{

  //       echo "Kami mengundang ".$row['callname']." untuk dapat menghadiri acara pernikahan kami pada :\r\n";
  //       foreach ($undangan as $value) {
  //        $result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat FROM agenda WHERE agenda='$value'");   
  //        $row_undangan = mysqli_fetch_assoc($result_undangan);

  //           echo "*".$value."*\r\n".tanggal_indo($row_undangan['tanggal'])." | ".$row_undangan['jam']." WIB \r\n".$row_undangan['tempat']."\r\n";
  //       }
  //       echo "Kami sampaikan undangan digital pada tautan berikut : https://aftinariza.wedding?uid=".$uid;
  //       echo "\r\nMerupakan suatu kehormatan dan kebahagiaan kami berkenan hadir untuk memberikan doa restu bagi kami yang akan membangun rumah tangga.\r\n";
  // }
  // 	echo "_Wassalamu'alaikum wr wb_\r\nSalam,\r\nKami yang sedang berbahagia dan penuh syukur\r\nRiza dan Aftina\r\n beserta Keluarga bapak H. Hardiyono - Ibu Hj. Suciati dan Keluarga Bapak (alm) Hardiyono - Ibu Brantini Susilowati ";
// mysqli_close($conn);
?>