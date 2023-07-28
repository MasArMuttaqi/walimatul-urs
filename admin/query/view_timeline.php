<?php
	include 'conn.php';
	require 'tgl_format.php';
  	$query = "SELECT * FROM timeline order by tanggal ASC";  
  	$result = mysqli_query($conn, $query); 
  	$i=1;
  	echo "<div class='owl-carousel owl-theme'>";  
  	while($row = mysqli_fetch_assoc($result)){
  		if($i % 2){
  			$label = 'animate-box';
  			$label2 = 'overlay';
  		}else{
  			$label = 'timeline-inverted animate-box';
  			$label2 = 'overlay overlay-2';
  		}
  		if ($row['bagde']=="") {
  			$badge = '1pVxAGKZfq0uxpIpF2jTMgyq52yjBG41n';
  		}else{
  			$badge = $row['bagde'];
  		}
  		echo "<div class='item'>
				<ul class='timeline animate-box fadeInUp animated'>
					<li class='".$label."fadeInUp animated'>
						<div class='timeline-badge' style='background-image:url(https://drive.google.com/uc?export=view&id=".$badge.");'></div>
						<div class='timeline-panel'>
							<div class='".$label2."'></div>
							<div class='timeline-heading'><h3 class='timeline-title'>".$row['judul']."</h3><span class='date'>".tanggal_indo($row['tanggal'])."</span></div>
							<div class='timeline-body'>
								<p>".$row['deskripsi']."</p>
							</div>
						</div>
					</li>
				</ul>
			  </div>";
	$i++;
  	}
  	echo "</div>";
?>
				