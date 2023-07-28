<?php
	include 'conn.php';
  	$query = "SELECT * FROM tentang_kami";  
  	$result = mysqli_query($conn, $query);   
  	while($row = mysqli_fetch_assoc($result)){
  		if($row['id']=='1'){
  			$label = 'groom';
  		}else{
  			$label = 'bride';
  		}
  		echo "<div class='col-md-6'>
					<div class='couple ".$label." text-center animate-box'>
						<img src='https://drive.google.com/uc?export=view&id=".$row['foto']."' class='img-responsive'>
						<div class='desc'>
							<h2>".$row['nama']."</h2><h3 class='salam'>".$row['familyname']."</h3>
							<p>".$row['deskripsi']."</p>
							<ul class='social social-circle'>
								<li><a href='#'><i class='fa fa-twitter' aria-hidden='true'></i></a></li>
								<li><a href='#'><i class='fa fa-facebook' aria-hidden='true'></i></a></li>
								<li><a href='#'><i class='fa fa-instagram' aria-hidden='true'></i></a></li>
							</ul>
						</div>
					</div>
				</div>";

	}
  	mysqli_close($conn);

?>
				