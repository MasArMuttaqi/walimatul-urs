<?php
include 'conn.php';

switch ($_POST['trx'])
{

    case 'save':

            // $rec_num=$_POST['rec_num'];
            $agenda=$_POST['agenda'];
            $tanggal=$_POST['datepicker'];
            $jam1=$_POST['timepicker1'];
            $jam2=$_POST['timepicker2'];
            $jam=$jam1." - ".$jam2;
            $tempat=$_POST['tempat'];
            $maps=$_POST['maps'];

        $sql = "INSERT INTO agenda(agenda, tanggal, jam, tempat, koordinat) VALUES ('$agenda','$tanggal','$jam','$tempat','$maps')";
        if (mysqli_query($conn, $sql))
        {
            // echo "Transaksi penyimpanan data berhasil";
            $icon = 'success';
            $title = 'Sukses';
            $status = 'Transaksi penambahan akun sukses dilakukan';

        }
        else
        {
            // echo "Transaksi penyimpanan data gagal dilakukan";
            $icon = 'warning';
            $title = 'Galat';
            $status = 'Transaksi penambahan akun gagal dilakukan';

        }
        $status_arr = array($icon, $title, $status);
        echo json_encode($status_arr);
    break;

    case 'update':

            $rec_num=$_POST['rec_num'];
            $agenda=$_POST['agenda'];
            $tanggal=$_POST['datepicker'];
            $jam1=$_POST['timepicker1'];
            $jam2=$_POST['timepicker2'];
            $jam=$jam1." - ".$jam2;
            $tempat=$_POST['tempat'];
            $maps=$_POST['maps'];

        $sql = "UPDATE agenda SET agenda='$agenda',tanggal='$tanggal',jam='$jam',tempat='$tempat',koordinat='$maps' WHERE rec_num='".$_POST['rec_num']."'";
        if (mysqli_query($conn, $sql))
        {
            // echo "Transaksi perubahan data berhasil";
            $icon = 'success';
            $title = 'Sukses';
            $status = 'Transaksi perubahan data sukses dilakukan';

        }
        else
        {
            // echo "Transaksi perubahan data gagal dilakukan";
            $icon = 'warning';
            $title = 'Galat';
            $status = 'Transaksi perubahan data gagal dilakukan';

        }
        $status_arr = array($icon, $title, $status);
        echo json_encode($status_arr);
    break;

    case 'delete':

        $rec_num=$_POST['deleteId'];
        $sql = "DELETE FROM agenda WHERE rec_num='$rec_num'";
        if (mysqli_query($conn, $sql))
        {
            // echo "Transaksi penghapusan data berhasil";
            $icon = 'success';
            $title = 'Sukses';
            $status = 'Transaksi penghapusan akun sukses dilakukan';

        }
        else
        {
            // echo "Transaksi penghapusan data gagal dilakukan";
            $icon = 'warning';
            $title = 'Galat';
            $status = 'Transaksi penghapusan akun gagal dilakukan';

        }
        $status_arr = array($icon, $title, $status);
        echo json_encode($status_arr);
    break;

   
     mysqli_close($conn);

   
}
?>