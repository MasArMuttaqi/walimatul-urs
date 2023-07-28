<?php
include 'conn.php';
$sql="SELECT * FROM pesan";
$query=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($query);

if ($rowcount>1) {
	echo "<div class='col-md-10 col-md-offset-1'>";
	echo "<div class='owl-carousel-2 owl-theme'>";
	while($row=mysqli_fetch_assoc($query)){
		echo "<div class='item'><div class='col-md-6 animate-box pesan'><div class='box-testimony'><blockquote><span class='quote'><span><i class='fa fa-quote-left' aria-hidden='true'></i></span></span><p>&ldquo;".$row['pesan']."&rdquo;</p></blockquote><p class='author'>".$row['nama']."</p></div></div></div>";
	}
	echo "</div>";
	echo "</div>";
}else{
	echo "<div class='item'><div class='col-md-6 animate-box'><div class='box-testimony'><blockquote><span class='quote'><span><i class='fa fa-quote-left' aria-hidden='true'></i></span></span><p>&ldquo;Belum ada pesan dan kesan belum terrekam dalam sistem<br>Yuk, dapat mengisi pada kolom pesan kesan dibawah ini &rdquo;</p></blockquote><p class='author'>Admin yang selalu setia menunggu</p></div></div></div>";
}
mysqli_close($conn);
?>
