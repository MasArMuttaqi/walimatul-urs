<?php
include 'conn.php';
$sql="SELECT * FROM galeri";
$query=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($query);

if ($rowcount>1) {
	$i=1;
	echo "<div class='owl-carousel-2 owl-theme'>";
	while($row=mysqli_fetch_assoc($query)){
		echo "<div class='item' style='padding-top: 30px;'>";
		if ($row['category']=='1') {
				$arr= explode(" | ",$row['content']);
                echo "<div class='polaroid'><img src='https://drive.google.com/uc?export=view&id=".$arr[0]."' alt='Galeri".$i++."' width='100%'><div class='container-polaroid'>".$arr[1]."</div></div>";

                	
	    }else{
	        echo "<div class='puisi'>".$row['content']."</div>";
	    }
	        echo "</div>";
    $i++;
	}
	echo "</div>";
}else{
	echo "<div class='item'><div class='col-md-4 animate-box'><div class='box-testimony'><blockquote><span class='quote'><span><i class='fa fa-quote-left' aria-hidden='true'></i></span></span><p>&ldquo;Belum ada pesan dan kesan belum terrekam dalam sistem<br>Yuk, dapat mengisi pada kolom pesan kesan dibawah ini &rdquo;</p></blockquote><p class='author'>Admin yang selalu setia menunggu</p></div></div></div>";
}
mysqli_close($conn);
?>
