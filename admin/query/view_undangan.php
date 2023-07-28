<?php
	// create database connectivity
	include 'conn.php';
	include 'tgl_format.php';
  
	$uid=$_POST['uid'];
  $query = "SELECT * FROM tamu_undangan WHERE uid='$uid'";
  $result = mysqli_query($conn, $query);   
  $row = mysqli_fetch_assoc($result);
  $nama = $row['callname']." ".$row['nama'];
  $undangan=explode(";",$row['undangan']);
  echo "<div class='row'><div class='col-md-10 col-md-offset-1 subtext'><span class='salam' style='color: #D2A37E;'>Assalamu'alaikum wr wb</span>";
  if (in_array("kirim kabar", $undangan)) {
        echo "<p style='font-size: 14pt;'>Dengan rahmat dan ridho Allah SWT menjadikan segala sesuatu indah pada waktunya.<br>Kami menyampaikan berita bahagia atas rencana pernikahan kami. ";
        $result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat FROM agenda WHERE agenda='Akad Nikah'");   
        $row_undangan = mysqli_fetch_assoc($result_undangan);
        echo "Insya Allah agenda ".$row_undangan['agenda']." pernikahan kami akan dilaksanakan pada :</p>
              </div></div>";

        echo "<div class='row'>";
        
        // echo "<div class='col-md-10 col-md-offset-1 text-center animate-box fadeInUp animated' style='display: flex; align-items: center; justify-content: center;'>
        //   <div class='card card-agenda'>
        //     <div class='card-header'><h5 class='card-title'>".$row_undangan['agenda']."</h5></div>
        //     <div class='card-body'>
        //         <table style='width: 100%;'>
        //           <tr>
        //             <td width='35%' align='center'><span id='hari' class='wed-agenda'>".hari($row_undangan['tanggal'])."</span></td>
        //             <td width='30%' align='center'><span id='bln' class='wed2-agenda'>".bulan($row_undangan['tanggal'])."</span><br><span id='tgl' class='dt-agenda'>".date('d', strtotime($row_undangan['tanggal']))."</span><br><span id='tahun' class='wed2-agenda'>".date('Y', strtotime($row_undangan['tanggal']))."</span></td>
        //             <td width='35%' align='center'><span id='jam' class='wed-agenda'>10.00 - 10.30</span></td></tr>
        //         </table> 
        //     </div>
        //     <div class='card-footer'>
        //       <p class='wed2-agenda'>".$row_undangan['tempat']."</p>
        //     </div>
        //   </div>
        // </div>"; 

        echo "<div class='col-md-10 col-md-offset-1 text-center animate-box fadeInUp animated' style='display: flex; align-items: center; justify-content: center;'>
                <ul class='list-group list-group-flush'>
                  <li class='list-group-item wed2-agenda'><i class='fa fa-calendar-check-o' aria-hidden='true' style='color: #D2A37E;'></i><br>".tanggal_indo($row_undangan['tanggal'])."</li>
                  <li class='list-group-item wed2-agenda'><i class='fa fa-map-marker' aria-hidden='true' style='color: #D2A37E;'></i><br>".$row_undangan['tempat']."</li>
                </ul>
        </div>";

        echo "</div>";
        echo "<div class='row'><div class='col-md-10 col-md-offset-1 subtext' style='padding-top: 5px;'><p style='font-size: 14pt;'>Sehubungan dengan adanya Pemberlakuan Pembatasan Kegiatan Masyarakat (PPKM) pada masa pandemi Covid-19. Kami belum dapat mengundang ".$nama." untuk turut hadir dalam acara tersebut.<br>Mohon doa restu bagi Kami yang mengikat janji suci pernikahan tuk mengarungi bahtera rumah tangga bersama. Mohon maaf atas segala keterbatasan dan kekurangan</p><br>";
  }else{

        echo "<p style='font-size: 14pt;'>Dengan rahmat dan ridho Allah SWT menjadikan segala sesuatu indah pada waktunya.<br>Kami menyampaikan undangan ".$nama." untuk dapat hadiri agenda pernikahan kami pada:</p></div></div>";
        echo "<div class='row' style='display: flex; align-items: center; justify-content: center;'>";
        foreach ($undangan as $value) {
         $result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat, koordinat FROM agenda WHERE agenda='$value'");   
         $row_undangan = mysqli_fetch_assoc($result_undangan);
          echo "<div class='col-md-6 col-sm-6 text-center animate-box fadeInUp animated' style='display: flex; align-items: center; justify-content: center;'>
          <div class='card card-agenda'>
            <div class='card-header'><h5 class='card-title'>".$row_undangan['agenda']."</h5></div>
            <div class='card-body'>
                <table style='width: 100%;'>
                  <tr>
                    <td width='35%' align='center'><span id='hari' class='wed-agenda'>".hari($row_undangan['tanggal'])."</span></td>
                    <td width='30%' align='center'><span id='bln' class='wed2-agenda'>".bulan($row_undangan['tanggal'])."</span><br><span id='tgl' class='dt-agenda'>".date('d', strtotime($row_undangan['tanggal']))."</span><br><span id='tahun' class='wed2-agenda'>".date('Y', strtotime($row_undangan['tanggal']))."</span></td>
                    <td width='35%' align='center'><span id='jam' class='wed-agenda'>".$row_undangan['jam']."</span></td></tr>
                </table> 
            </div>
            <div class='card-footer'>
              <p class='wed2-agenda'>".$row_undangan['tempat']."<a href='".$row_undangan['koordinat']."' class='btn btn-outline-secondary btn-sm' target='_blank'><i class='fa fa-map-marker' aria-hidden='true'></i> google maps</a></p>
            </div>
          </div>
        </div>"; 
        }
        echo "</div>";
        echo "<div class='row'><div class='col-md-10 col-md-offset-1 subtext' style='padding-top: 5px;'><p style='font-size: 14pt;'>Merupakan suatu kehormatan dan kebahagiaan kami berkenan hadir untuk memberikan doa restu bagi kami yang akan membangun rumah tangga.</p><br>";
  }
  	echo "<span class='salam' style='color: #D2A37E;'>Wassalamu'alaikum wr wb</span><br><p style='font-size: 14pt;'>Salam,<br>Kami yang sedang berbahagia dan penuh syukur<br><span class='salam' style='color: #D2A37E;'>Riza dan Aftina</span></p></div></div>";
mysqli_close($conn);
?>