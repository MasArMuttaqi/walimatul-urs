<?php
 
function tglJawa($tanggal){
   $splitTGL         = explode('-', $tanggal);
 
   $bulan            = array ('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
   $hari             = array('Mon'=>'Senin','Tue'=>'Selasa','Wed'=>'Rabu','Thu'=>'Kamis','Fri'=>'Jum\'at','Sat'=>'Sabtu',
                        'Sun'=>'Ahad');
 
   // array urutan nama hari pasaran dimulai dari 'Pon'
   $arrPasaran       = array ('Pon', 'Wage', 'Kliwon', 'Legi', 'Pahing');
 
   // Sample hari pasaran tanggal 07 Februari 1997 adalah 'Pon'
   $sampleTglJawa    = 07;
   $sampleBulanJawa  = 02;
   $sampleTahunJawa  = 1997;
 
   $jd1           = GregorianToJD($sampleBulanJawa, $sampleTglJawa, $sampleTahunJawa);
   $jd2           = GregorianToJD($splitTGL[1], $splitTGL[2], $splitTGL[0]);
   $selisih          = $jd2 - $jd1;
 
   // hitung modulo 5 dari selisih harinya
   $mod           = $selisih % 5;
 
   $shortDate        = $splitTGL[2].'-'.$splitTGL[1].'-'.$splitTGL[0];
   $nameOfDay        = date('D', strtotime($shortDate));
   $pasaran          = $arrPasaran[$mod];
   $namaHari         = $hari[$nameOfDay];
   $penentuBulan       = (int)$splitTGL[1]-1;
   $newTgl             = $splitTGL[2];
   $newBulan           = $bulan[$penentuBulan];
   $newTahun         = $splitTGL[0];
 
   return $namaHari .' '. $pasaran .', '. $newTgl .' '. $newBulan .' '. $newTahun;
}
 
// $tanggal_sekarang = date("Y-m-d");
//  echo $tanggal_sekarang;
// echo tglJawa($tanggal_sekarang);
 
?>