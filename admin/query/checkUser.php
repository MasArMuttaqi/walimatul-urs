<?php
require "conn.php";
$password = mysqli_real_escape_string($conn,$_POST['password']);

if ($password != ""){

    // $sql_query = "select count(*) as cntUser from admin where pin='".$password."'";
    // $result = mysqli_query($con,$sql_query);
    // $row = mysqli_fetch_array($result);
    
    $sql="SELECT * FROM admin WHERE pin='$password'"; 
        //query untuk melihat apakah nilai/data yang dimasukkan tersedia pada database atau tifak
    $query=mysqli_query($conn,$sql);
    $jum=mysqli_num_rows($query); //fungsi query untuk melihat jumlah data yang sama berdasarkan nilai yang diberikan
    $row=mysqli_fetch_assoc($query);


    // $count = $row['cntUser'];

    if($jum > 0){
        $_SESSION['nama'] = $row['nama'];
        echo 1;
    }else{
        echo 0;
    }

}