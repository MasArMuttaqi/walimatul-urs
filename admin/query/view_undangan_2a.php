<?php
include 'conn.php';
include 'pasaran.php';
include 'hijriah.php';
if (isset($_POST['uid'])) {
	$uid=$_POST['uid'];
}
$pembuka="
			<p class='animate fadeInDown one'>
				<i>Assalamu'alaikum Warahmatullahi Wabarkatuh</i><br><br>
				Dengan rahmat dan ridho Allah SWT menjadikan segala sesuatu indah pada waktunya, telah menyatukan dua insan dalam ikatan suci pernikahan
			</p><p>
				<b class='penganten animate fadeInDown two'>Ahmad Rizaqu Muttaqi</b><br><i class='animate fadeInDown two'>bin H. Hardiyono</i>
				<br> <b style='text-transform: uppercase; line-height: 3;' class='animate fadeIn one'>dengan</b> <br>
				<b class='penganten animate fadeInUp two'>Aftina</b><br><i class='animate fadeInDown two'>binti (alm) Hardiono</i>
			</p>";
$penutup1 = "<p class='animate fadeInDown four'>Sehubungan dengan keterbatasan yang kami miliki, kami belum dapat mengundang untuk turut hadir dalam acara tersebut. <br> Mohon doa restu bagi Kami yang mengikat janji suci pernikahan tuk mengarungi bahtera rumah tangga. Mohon maaf atas segala keterbatasan dan kekurangan kami.<br><br>
				<i>Wassalamu'alaikum wr wb</i>
			</p>";
$penutup2 = "<p class='animate fadeInDown four'>
				Merupakan suatu kehormatan dan kebahagiaan kami berkenan hadir memberikan doa restu untuk kami yang mengikat janji suci pernikahan mengarungi bahtera rumah tangga.<br><br>
				<i>Wassalamu'alaikum Warahmatullahi Wabarkatuh</i>
			</p>";
$signature = "
			<p class='animate fadeInDown five'>
				Salam, <br>
				Kami yang berbagia<br>
				<i>Riza dan Aftina</i><br>
			</p><p class='family animate fadeInDown six'>
				<i>Keluarga <br> Bapak H. Hardiyono, S.Pd - Ibu Hj. Suciati, S.Pd<br>
				Bapak Hardiono (alm) - Ibu Dra. Brantini Susilowati</i>
			</p>";

  $query = "SELECT * FROM tamu_undangan WHERE uid='$uid'";  
  $result = mysqli_query($conn, $query);   
  $row = mysqli_fetch_assoc($result);
  $undangan=explode(";",$row['undangan']);
	if (in_array("kirim kabar", $undangan)) {
			echo $pembuka;
			$result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat FROM agenda WHERE agenda like '%Akad Nikah%'");   
      $row_undangan = mysqli_fetch_assoc($result_undangan);
			echo "<p class='animate fadeInDown three'>Insya Allah agenda <b>Akad Nikah</b> akan dilaksanakan pada :</p>";
			echo	"<p class='animate fadeInDown three'>".tglJawa($row_undangan['tanggal'])." <br> ".toHijriah($row_undangan['tanggal'])."<br>".$row_undangan['tempat']."</p>";
			echo $penutup1;
			echo $signature;
	}else{
			echo $pembuka;
			echo "
			<p class='animate fadeInDown three'>
				Kami menyampaikan undangan untuk dapat menghadiri agenda pernikahan kami, insyaallah akan dilaksanakan pada<br>
			</p>";
			foreach ($undangan as $value) {
         $result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat, koordinat FROM agenda WHERE rec_num='$value'");   
         $row_undangan = mysqli_fetch_assoc($result_undangan);
         if(strpos($row_undangan['agenda'], 'Ngunduh Mantu') !== false){
              $agenda_undangan='Ngunduh Mantu';
          }else{
              $agenda_undangan="Walimutul Urs";
          }
			echo	"	<p class='animate fadeInDown three'>	
				<b style='text-transform: uppercase;'>".$agenda_undangan."</b><br>
				".tglJawa($row_undangan['tanggal'])." <br> ".toHijriah($row_undangan['tanggal'])." <br>
				".$row_undangan['jam']." wib <br>
				".$row_undangan['tempat']."<br><a href='".$row_undangan['koordinat']."' target='_blank'>Menuju lokasi <i class='fa fa-location-arrow'></i></a>
			</p>";
			}
			echo $penutup2;
			echo $signature;
	}
?>