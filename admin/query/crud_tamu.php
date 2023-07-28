<?php
include 'conn.php';

switch ($_POST['trx'])
{

    case 'save':

        $callname=$_POST['callname'];
        $nama=$_POST['nama'];
        $telepon=$_POST['telepon'];
        $undangan = implode(";",$_POST['undangan']);
        $ts=date("Y-m-d H:i:s");
        $uuid = uniqid();
        $sql = "INSERT INTO `tamu_undangan`(`uid`, `callname`, `nama`, `telepon`, `undangan`, `ts`) VALUES ('$uuid','$callname','$nama','$telepon','$undangan','$ts')";
        if (mysqli_query($conn, $sql))
        {
            // echo "Transaksi penambahan data tamu berhasil";
            $icon = 'success';
            $status = 'Transaksi penambahan akun sukses dilakukan';

        }
        else
        {
            // echo "Transaksi penambahan data tamu gagal dilakukan";
            $icon = 'warning';
            $status = 'Transaksi penambahan akun gagal dilakukan';

        }
        $status_arr = array($icon, $status);
        echo json_encode($status_arr);
    break;

    case 'update':

        $uuid=$_POST['uuid'];
        $callname=$_POST['callname'];
        $nama=$_POST['nama'];
        $telepon=$_POST['telepon'];
        $undangan = implode(";",$_POST['undangan']);
        $ts=date("Y-m-d H:i:s");

        $sql = "UPDATE `tamu_undangan` SET `callname`='$callname',`nama`='$nama',`telepon`='$telepon',`undangan`='$undangan',`ts`='$ts' WHERE `uid`='".$_POST['uuid']."'";
        if (mysqli_query($conn, $sql))
        {
            // echo "Transaksi perubahan data tamu berhasil";
            $icon = 'success';
            $status = 'Transaksi perubahan data sukses dilakukan';

        }
        else
        {
            // echo "Transaksi perubahan data tamu gagal dilakukan";
            $icon = 'warning';
            $status = 'Transaksi perubahan data gagal dilakukan';

        }
        $status_arr = array($icon, $status);
        echo json_encode($status_arr);
    break;

    case 'delete':

        $uid=$_POST['deleteId'];
        $sql = "DELETE FROM `tamu_undangan` WHERE `tamu_undangan`.`uid` ='$uid'";
        if (mysqli_query($conn, $sql))
        {
            // echo "Transaksi penghapusan data tamu berhasil";
            $icon = 'success';
            $status = 'Transaksi penghapusan akun sukses dilakukan';

        }
        else
        {
            // echo "Transaksi penghapusan data tamu gagal dilakukan";
            $icon = 'warning';
            $status = 'Transaksi penghapusan akun gagal dilakukan';

        }
        $status_arr = array($icon, $status);
        echo json_encode($status_arr);
    break;

    
     mysqli_close($conn);

   
}
?>