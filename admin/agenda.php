<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<style type="text/css">
.card a:hover {
  color: #fff;
  background-color: #17a2b8;
  text-decoration: none;
}

.card .action{
  position: absolute;
  right: 10px;
}
.card-cont h3 {
    color: #cc9900;
    font-size: 12pt;
    font-family: 'Poppins', sans-serif;
/*    font-family: "Clicker Script", cursive;*/
    text-transform: capitalize;
    font-weight: bold;
}
</style>

</head>
<body>
<!-- Simulate a smartphone / tablet -->
<div class="mobile-container">

<?php
  require 'navigation.html';
  // require 'query/tgl_format.php';
  include 'query/pasaran.php';
  include 'query/hijriah.php';
?>

<div class="page-content page-container w3-animate-left" id="page-content">
    <div class="container justify-content-center">
       
          <div class="row">
          <?php
            include 'query/conn.php';
            $sql = "SELECT * FROM agenda";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
          ?>  
                <div class="col-md-6">
                  <article class="card card-event fl-left">
                    <section class="date">
                      <time datetime="23th feb">
                        <span><?=date("d", strtotime($row['tanggal']));?></span><span><?=date("M", strtotime($row['tanggal']));?></span>
                      </time>
                    </section>
                    <section class="card-cont">
                      <h3><?=$row['agenda']; ?></h3>
                      <div class="even-date">
                       <i class="fa fa-calendar"></i>
                       <time>
                         <span><?=tglJawa($row['tanggal']);?></span><br>
                         <span><?=toHijriah($row['tanggal']);?></span><br>
                         <span><?=$row['jam'];?> WIB</span>
                       </time>
                      </div>
                      <div class="even-info">
                        <i class="fa fa-map-marker"></i>
                        <p>
                          <a href="<?=$row['koordinat'];?>" target="_blank"><?=$row['tempat']; ?></a>
                        </p>
                      </div>
                      <div class="action">
                         <button class="btn btn-sm" data-toggle="modal" data-target="#delete-agenda" id="<?=$row['rec_num'];?>" data-id="<?=$row['rec_num'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                          <button class="btn btn-sm pull-right" data-toggle="modal" data-target="#add-agenda" id="<?=$row['rec_num'];?>" data-id="<?=$row['rec_num'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                      </div>
                    </section>
                  </article>
                </div>  
          <?php 
            }
            }
            else {
            ?>
              <div class="alert alert-info">
                <strong>Agenda Masih kosong</strong><br>bisa menambah agenda pada tombol bagian bawah ini ya...
              </div>
            <?php
            }
            mysqli_close($conn);
          ?>
          </div>
    </div>
</div>
<a href="javascript:void(0)" class="float" data-toggle="modal" data-target="#add-agenda"> <i class="fa fa-plus my-float"></i></a>

<!-- modal add and edit agenda -->
<div class="modal fade" id="add-agenda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Agenda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form1" method="post" id="form-agenda">
          <input type="hidden" name="rec_num" id="rec_num">
          <input type="hidden" name="trx" id="trx" value="save">
          <div class="form-group">
            <label for="exampleInputEmail1">Agenda</label>
            <input type="text" class="form-control" id="agenda" name="agenda" placeholder="Judul Agenda">
            <small id="emailHelp" class="form-text text-muted">Penulisan <em>Capital Case</em></small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tanggal</label>
            <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Tanggal Agenda">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jam</label>
            <table>
              <tr>
                <td><input type="text" name="timepicker1" id="timepicker1" class="form-control" width="100px"></td>
                <td width="100px" align="center">sampai</td>
                <td><input type="text" name="timepicker2" id="timepicker2" class="form-control" width="100px" onclick="duration()"></td>
              </tr>
            </table>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tempat atau alamat</label>
            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="tempat atau alamat">
            <small id="emailHelp" class="form-text text-muted">Penulisan <em>Capital Case</em></small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tautan Google Maps</label>
            <input type="url" class="form-control" id="maps" name="maps" placeholder="Tautan Google Maps">
            <small id="emailHelp" class="form-text text-muted"><em>Tempelkan tautan dari Bagikan lokasi pada Google Maps</em></small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancel()">Batal</button>
        <button type="submit" class="btn btn-primary" id="SaveButton">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end of add and edit agenda -->

<!-- modal confirmation delete -->
  <div class="modal fade" id="delete-agenda">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p align="center">Apakah akan menghapus agenda <span id="confirmDelete"></span> ?</p> 
          <form method="post" id="form-delete-agenda">
          <input type="hidden" name="deleteId" id="deleteId">
          <input type="hidden" name="trx" value="delete">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancel()">Batal</button>
          <button type="submit" class="btn btn-primary" id="DeleteButton">Hapus</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- end of modal confirmation delete -->

<!-- End smartphone / tablet look -->
</div>
<script type="text/javascript" src="navigation.js"></script>
<script>
      $(function () {
            $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
      });

      $('#timepicker1').timepicker();
      $('#timepicker2').timepicker();
      function duration(){
        var dt = document.getElementById('timepicker1').value;
        dt.setHours(dt.getHours() + 2);
        dt.setMinutes(dt.getMinutes() + 30);
        $('#timepicker2').val(dt);
      }
      
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<script type="text/javascript">
  function cancel(){
    location.reload();
  }
</script>
<script>
$(document).ready(function(){
  $(document).delegate("[data-target='#add-agenda']", "click", function(e) {
           var rec_num = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_agenda.php",  
                method:"POST",  
                data:{rec_num:rec_num},  
                dataType:"json",  
                success:function(data){ 
                  // console.log(data);
                  let text = data.jam;
                  const myArray = text.split(" - ");
                  $('#rec_num').val(data.rec_num);
                  $('#agenda').val(data.agenda);
                  $('#datepicker').val(data.tanggal);
                  $('#timepicker1').val(myArray[0]);
                  $('#timepicker2').val(myArray[1]);
                  $('#tempat').val(data.tempat);
                  $('#maps').val(data.koordinat);
                  $('#trx').val('update');
                  $("#ModalLabel").text("Ubah Agenda");
                } 
           });  
      });
      $(document).delegate("[data-target='#delete-agenda']", "click", function(e) {
           var rec_num = $(this).attr("data-id");
           // document.getElementById("deleteId").value=rec_num;
           $.ajax({  
                url:"query/fetch_agenda.php",  
                method:"POST",  
                data:{rec_num:rec_num},  
                dataType:"json",  
                success:function(data){ 
                  $('#deleteId').val(data.rec_num);
                  $("#confirmDelete").html(data.agenda);
                } 
           });

      });


      $("#SaveButton").click(function(){
        event.preventDefault();//this will hold the url
        $.ajax({
          url:"query/crud_agenda.php", 
          method: 'POST',
          dataType:"json",
          async:false,
          data:$('#form-agenda').serialize(),
          success: function(data) {
            sweetAlert(data[1], data[2], data[0]);
              setTimeout(function(){
                 window.location.reload();
              }, 2000);
            // alert(data);
            // $("#notif").html(data);
          }
        });
      });

      $("#DeleteButton").click(function(){
        event.preventDefault();//this will hold the url
        $.ajax({
          url:"query/crud_agenda.php", 
          method: 'POST',
          dataType:"json",
          async:false,
          data:$('#form-delete-agenda').serialize(),
          success: function(data) {
            sweetAlert(data[1], data[2], data[0]);
              setTimeout(function(){
                 window.location.reload();
              }, 2000);
            // alert(data);
            // $("#notif").html(data);
          }
        });
      });


});

</script>
</body>
</html>
