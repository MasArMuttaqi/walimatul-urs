<?php
include 'conn.php';
// include 'tgl_format.php';
include 'pasaran.php';
include 'hijriah.php';
if (isset($_POST['uid'])) {
	$uid=$_POST['uid'];
}

  $query = "SELECT * FROM tamu_undangan WHERE uid='$uid'";  
  $result = mysqli_query($conn, $query);   
  $row = mysqli_fetch_assoc($result);
  $undangan=explode(";",$row['undangan']);
  echo "
			<p>
				<i>Assalamu'alaikum Warahmatullahi Wabarkatuh</i><br><br>
				Dengan rahmat dan ridho Allah SWT menjadikan segala sesuatu indah pada waktunya, telah menyatukan dua insan dalam ikatan suci pernikahan
			</p><p>
				<b class='penganten'>Ahmad Rizaqu Muttaqi</b><br><i>bin H. Hardiyono</i>
				<br> <b style='text-transform: uppercase; line-height: 3;'>dengan</b> <br>
				<b class='penganten'>Aftina</b><br><i>binti (alm) Hardiono</i>
			</p>";
			 if (in_array("kirim kabar", $undangan)) {
			 	$result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat FROM agenda WHERE agenda like '%Akad Nikah%'");   
        $row_undangan = mysqli_fetch_assoc($result_undangan);
	echo "<p>Insya Allah agenda <b>Akad Nikah</b> akan dilaksanakan pada :</p>";
	echo	"<p>
				".tglJawa($row_undangan['tanggal'])." <br> ".toHijriah($row_undangan['tanggal'])." <br>
				".$row_undangan['tempat']."</p>";
	echo	"<p>Sehubungan dengan keterbatasan yang kami miliki, kami belum dapat mengundang untuk turut hadir dalam acara tersebut. <br> Mohon doa restu bagi Kami yang mengikat janji suci pernikahan tuk mengarungi bahtera rumah tangga. Mohon maaf atas segala keterbatasan dan kekurangan kami.<br><br>
				<i>Wassalamu'alaikum wr wb</i>
			</p>";
			 }else{
	echo "
			<p>
				Kami menyampaikan undangan untuk dapat menghadiri agenda pernikahan kami, insyaallah akan dilaksanakan pada<br>
			</p>";
			foreach ($undangan as $value) {
         $result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat, koordinat FROM agenda WHERE agenda='$value'");   
         $row_undangan = mysqli_fetch_assoc($result_undangan);
	echo	"	<p>	
				<b style='text-transform: uppercase;'>".$row_undangan['agenda']."</b><br>
				".tglJawa($row_undangan['tanggal'])." <br> ".toHijriah($row_undangan['tanggal'])." <br>
				".$row_undangan['jam']." wib <br>
				".$row_undangan['tempat']."<br><a href='".$row_undangan['koordinat']."' target='_blank'>Menuju lokasi <i class='fa fa-location-arrow'></i></a>
			</p>";
				}
	echo	"<p>
				Merupakan suatu kehormatan dan kebahagiaan kami berkenan hadir memberikan doa restu untuk kami yang mengikat janji suci pernikahan mengarungi bahtera rumah tangga.<br><br>
				<i>Wassalamu'alaikum Warahmatullahi Wabarkatuh</i>
			</p>";
		}
	echo "
			<p>
				Salam, <br>
				Kami yang berbagia<br>
				<i>Riza dan Aftina</i><br>
			</p><p class='family'>
				<i>Keluarga <br> Bapak H. Hardiyono, S.Pd - Ibu Hj. Suciati, S.Pd<br>
				Bapak Hardiono (alm) - Ibu Dra. Brantini Susilowati</i>
			</p>";
		mysqli_close($conn);
?>