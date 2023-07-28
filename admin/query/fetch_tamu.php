<?php
    include 'conn.php';
    $uid=$_POST['uid'];
    // $query = "SELECT * FROM tamu_undangan WHERE uid='$uid'";
    $query = "SELECT tamu_undangan.uid as uid, tamu_undangan.callname as callname, tamu_undangan.nama as nama, tamu_undangan.telepon as telepon, agenda.agenda as undangan FROM tamu_undangan LEFT JOIN agenda ON tamu_undangan.undangan=agenda.rec_num WHERE tamu_undangan.uid='$uid'";  
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (is_null($row))
    {
        echo json_encode("undefined");
    }else{
        // $nama = $row['callname']." ".$row['nama'];
        // $return_arr[] = array("uid" => $row['uid'], "nama" => $nama, "telepon" => $row['telepon'], "undangan" => $row['undangan']);
        // echo json_encode($return_arr);
        echo json_encode($row);
    }
    mysqli_close($conn);  
?>