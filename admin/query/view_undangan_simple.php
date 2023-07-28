<?php
	include 'conn.php';
	include 'tgl_format.php';
	$uid=$_POST['uid'];
  $query = "SELECT * FROM tamu_undangan WHERE uid='$uid'";  
  $result = mysqli_query($conn, $query);   
  $row = mysqli_fetch_assoc($result);

  $query_couple = "SELECT nama, familyname FROM tentang_kami";  
  $result_couple = mysqli_query($conn, $query_couple);

  while($row_couple = mysqli_fetch_assoc($result_couple)){
      $couple[]=$row_couple;
  }

if (is_null($row)){
        echo "<div id='notfound'>";
        echo "
                <div class='notfound'>
                  <div class='notfound-404'><h1>404</h1></div>
                  <h2>Oops! Nothing was found</h2>
                  <p>The page you're looking temporarily unavailable. <a href='https://www.google.com/'>Return to homepage</a></p>
                  <div class='notfound-social'>
                    <a href='#'><i class='fa fa-facebook'></i></a>
                    <a href='#'><i class='fa fa-twitter'></i></a>
                    <a href='#'><i class='fa fa-pinterest'></i></a>
                    <a href='#'><i class='fa fa-google-plus'></i></a>
                  </div>
                </div>";

        echo "</div>";
}else{
        
  $nama = $row['callname']." ".$row['nama'];
  $undangan=explode(";",$row['undangan']);
  echo "<div class='row'><div class='col-md-12 subtext'><span class='salam'>Assalamu'alaikum wr wb</span>";
  if (in_array("kirim kabar", $undangan)) {
        echo "<p>Dengan rahmat dan ridho Allah SWT menjadikan segala sesuatu indah pada waktunya telah menyatukan dua insan dalam ikatan suci pernikahan. Kami menyampaikan berita bahagia atas pernikahan kami :</p></div></div>";
        echo "<div class='row'><div class='col-md-12 subtext' style='display: flex; align-items: center; justify-content: center; '>
                  <table width='100%'>
                    <tr><td><span class='penganten'>".$couple[0]['nama']."</span><br><span class='familyname'>".$couple[0]['familyname']."</span></td></tr>
                    <tr><td style='height: 75px; font-style: oblique;'><span class='familyname'>dengan</span></td></tr>
                    <tr><td><span class='penganten'>".$couple[1]['nama']."</span><br><span class='familyname'>".$couple[1]['familyname']."</span></td></tr>
                  </table>
              </div></div>";
        $result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat FROM agenda WHERE agenda='Akad Nikah'");   
        $row_undangan = mysqli_fetch_assoc($result_undangan);
        echo "<div class='row'><div class='col-md-12 subtext' style='display: flex; align-items: center; justify-content: center; padding-top: 17px; '>
                <p>Insya Allah agenda ".$row_undangan['agenda']." pernikahan kami akan dilaksanakan pada :</p>
              </div></div>";
        echo "<div class='row'>";
        // echo "<div class='col-md-12 text-center nikah' style='display: flex; align-items: center; justify-content: center;'>
        //           <table>
        //             <tr>
        //               <td><button class='btn btn-light btn-circle btn-circle-sm m-1'><i class='fa fa-calendar-check-o' aria-hidden='true'></i></button></td>
        //               <td>".tanggal_indo($row_undangan['tanggal'])."</td>
        //             </tr>
        //             <tr>
        //               <td><button class='btn btn-light btn-circle btn-circle-sm m-1'><i class='fa fa-map-marker' aria-hidden='true'></i></button></td>
        //               <td>".$row_undangan['tempat']."</td>
        //             </tr>
        //           </table>
        //       </div>";
         echo "<div class='col-md-12 col-sm-6 text-center nikah' style='display: flex; align-items: center; justify-content: center;'>
                <ul class='list-group list-group-flush'>
                  <li class='list-group-item' style='letter-spacing: 3px;'>".tanggal_indo($row_undangan['tanggal'])."</li>
                  <li class='list-group-item'>".$row_undangan['tempat']."</li>
                </ul>
              </div>"; 
        echo "</div>";
        echo "<div class='row'><div class='col-md-12 subtext' style='padding-top: 5px;'><p>Sehubungan dengan keterbatasan tempat dan masih situasi transisi menuju endemi Covid-19. Kami belum dapat mengundang <span class='inv'>".$nama."</span> untuk turut hadir dalam acara tersebut.<br>Mohon doa restu bagi Kami yang mengikat janji suci pernikahan tuk mengarungi bahtera rumah tangga bersama. Mohon maaf atas segala keterbatasan dan kekurangan</p><br>";
  }else{

        echo "<p>Dengan rahmat dan ridho Allah SWT menjadikan segala sesuatu indah pada waktunya, telah menyatukan dua insan dalam ikatan suci pernikahan</p></div></div>";
        // echo "<div class='row'><div class='col-md-12 subtext' style='display: flex; align-items: center; justify-content: center; '>
        //           <table width='100%'>
        //             <tr>
        //               <td width='45%' align='right'><span class='penganten'>Ahmad Rizaqu Muttaqi, M.Kom</span></td>
        //               <td width='10%' rowspan='2'><span class='penganten'>&</span></td>
        //               <td width='45%' align='left'><span class='penganten'>Aftina, M.Pd</span></td>
        //             </tr>
        //             <tr>
        //               <td width='45%' align='right' style='font-size: 12pt;'>bin H. Hardiyono</td>
        //               <td width='45%' align='left' style='font-size: 12pt;'>binti (alm) Hardiyono</td>
        //             </tr>
        //           </table>
        //       </div></div>";

        echo "<div class='row'><div class='col-md-12 subtext' style='display: flex; align-items: center; justify-content: center; '>
                  <table width='100%'>
                    <tr><td><span class='penganten'>".$couple[0]['nama']."</span><br><span class='familyname'>".$couple[0]['familyname']."</span></td></tr>
                    <tr><td style='height: 75px; font-style: oblique;'><span class='familyname'>dengan</span></td></tr>
                    <tr><td><span class='penganten'>".$couple[1]['nama']."</span><br><span class='familyname'>".$couple[1]['familyname']."</span></td></tr>
                  </table>
              </div></div>";
              
        echo "<div class='row'><div class='col-md-12 subtext' style='display: flex; align-items: center; justify-content: center; padding-top: 17px; '>
                <p>Kami menyampaikan undangan kepada <span class='inv'>".$nama."</span> untuk dapat hadiri agenda pernikahan kami. Insya Allah agenda pernikahan kami akan dilaksanakan pada :</p>
              </div></div>";
        echo "<div class='row' style='display: flex; align-items: center; justify-content: center;'>";
        foreach ($undangan as $value) {
         $result_undangan = mysqli_query($conn, "SELECT agenda, tanggal, jam, tempat, koordinat FROM agenda WHERE agenda='$value'");   
         $row_undangan = mysqli_fetch_assoc($result_undangan);

         // echo "<div class='col-md-6 col-sm-6 text-center nikah'>
         //          <table>
         //            <tr>
         //              <th colspan='2'><span class='event'>".$row_undangan['agenda']."</span></th>
         //            </tr>
         //            <tr>
         //              <td><button class='btn btn-light btn-circle btn-circle-sm m-1'><i class='fa fa-calendar-check-o' aria-hidden='true'></i></button></td>
         //              <td>".tanggal_indo($row_undangan['tanggal'])."</td>
         //            </tr>
         //            <tr>
         //              <td><button class='btn btn-light btn-circle btn-circle-sm m-1'><i class='fa fa-clock-o' aria-hidden='true'></i></button></td>
         //              <td>".$row_undangan['jam']." WIB</td>
         //            </tr>
         //            <tr>
         //              <td><button class='btn btn-light btn-circle btn-circle-sm m-1'><i class='fa fa-map-marker' aria-hidden='true'></i></button></td>
         //              <td>".$row_undangan['tempat']."</td>
         //            </tr>
         //            <tr>
         //              <td colspan='2'><a href='".$row_undangan['koordinat']."' class='btn btn-outline-link btn-sm' target='_blank'><i class='fa fa-map-marker' aria-hidden='true'></i> Google maps</a></td>
         //            </tr>
         //          </table>
         //      </div>";
         echo "<div class='col-md-6 col-sm-6 text-center nikah'>
                <ul class='list-group list-group-flush'>
                  <li class='list-group-item'><span class='event'>".$row_undangan['agenda']."</span></li>
                  <li class='list-group-item' style='letter-spacing: 3px;'>".tanggal_indo($row_undangan['tanggal'])."</li>
                  <li class='list-group-item' style='letter-spacing: 3px;'>".$row_undangan['jam']." WIB</li>
                  <li class='list-group-item'>".$row_undangan['tempat']."</li>
                  <li class='list-group-item'><a href='".$row_undangan['koordinat']."' class='btn btn-outline-link btn-sm' target='_blank' style='font-size: 6pt;padding: 6px; color: white; text-transform: capitalize;' ><i class='fa fa-map-marker' aria-hidden='true'></i> Google maps</a></li>
                </ul>
              </div>";
        }
        echo "</div>";
        echo "<div class='row'><div class='col-md-12 subtext' style='padding-top: 5px;'><p>Merupakan suatu kehormatan dan kebahagiaan kami berkenan hadir untuk memberikan doa restu bagi kami yang akan membangun rumah tangga.</p><br>";
  }
  	echo "<span class='salam'>Wassalamu'alaikum wr wb</span><br><p>Salam,<br>Kami yang sedang berbahagia dan penuh syukur<br><span class='penganten'>Riza dan Aftina</span></p></div></div>";
}
mysqli_close($conn);
?>