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
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

<style type="text/css">
  img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 150px;
  }
  .card {
    margin-block: 15px;
  }
</style>
</head>
<body>
<!-- Simulate a smartphone / tablet -->
<div class="mobile-container">

<?php
  require 'navigation.html';
?>

<div class="page-content page-container w3-animate-left" id="page-content">
    <div class="row container d-flex justify-content-center">
      <div class="row">
        <?php
          if (isset($_GET['status'])) {
            $msg=$_GET['status'];
            if ($msg=="success") {
              echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Transaksi data telah dilakukan<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

            }else {
              echo "<div class='alert alert-warning' id='alert' role='alert'> Transaksi gagal dilakukan, alert—check it out!</div>";
              echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Transaksi gagal dilakukan, alert—check it out!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
            }
            ?>
            <script>
              setTimeout(function () {
                location.replace("cerita-kami.php")
              }, 3000);
            </script>
          <?php
          }
        ?>
      </div>
      <div class="row">
        
          <?php
            include 'query/conn.php';
            include 'query/tgl_format.php';
            $sql = "SELECT * FROM timeline order by tanggal ASC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
          ?>  
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <table>
                      <tr>
                        <td><img src="https://drive.google.com/uc?export=view&id=<?= $row['bagde'];?>" alt="<?= $row['judul'];?>" style="width:100px"></td>
                        <td style="padding-left: 17px;"><h4 class="card-title"><?= $row['judul'];?></h4><small><?= tanggal_indo($row['tanggal']);?></small></td>
                      </tr>
                    </table>
                  </div>
                  <div class="card-body"> <p class="card-text"><?= $row['deskripsi'];?></p></div>
                  <div class="card-footer">
                    <button class="btn btn-link btn-sm" data-toggle="modal" data-target="#DeleteTimeline" id="<?=$row['id'];?>" data-id="<?=$row['id'];?>">Hapus</button>
                    <button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#AddTimeline" id="<?=$row['id'];?>" data-id="<?=$row['id'];?>">Ubah</button>
                  </div>
                </div>
              </div>  
          <?php 
            }
            }
            else {
            ?>
              <div class="alert alert-info">
                <strong>Konten cerita Kami Masih kosong</strong><br>bisa menambah konten pada tombol bagian bawah ini ya...
              </div>
            <?php
            }
            mysqli_close($conn);
          ?>
        
      </div>

          
    </div>
</div>
<a href="#" class="float" data-toggle="modal" data-target="#AddTimeline"> <i class="fa fa-plus my-float"></i></a>

<!-- The Modal Add stroy -->
  <div class="modal fade" id="AddTimeline">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="ModalLabel">Tambah Cerita Kami</h4>
          <button type="button" class="close" data-dismiss="modal" onclick="cancel()">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form name="form1" method="post" action="query/cerita-kami.php" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <label for="usr">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="form-group">
              <label for="usr">Tanggal</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal">
            </div>
            <div class="form-group">
              <label for="usr">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi">Tulis disini....</textarea>
                <script>
                        CKEDITOR.replace( 'deskripsi' );
                </script>
            </div>
            <div id='bagde'></div>
            <input type="hidden" name="x" id="x"><br>
            <div class="form-group">
              <label for="usr" class="labelbagde">Badge foto</label>
              <input type="text" class="form-control" name="url" id="url">
              <small>Tempel tautan <em>google share</em></small>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-link btn-sm" data-dismiss="modal" onclick="cancel()">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- end of add story -->
<!-- modal confirmation delete -->
  <div class="modal fade" id="DeleteTimeline">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" onclick="cancel()">&times;</button>
        </div>
        <div class="modal-body">
          <p align="center">Apakah akan menghapus data <br><span id="confirmDelete"></span> ?</p> 
          <form action="query/cerita-kami.php?trx=delete" method="post">
          <input type="hidden" name="id" id="deleteId">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" onclick="cancel()">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm" id="butsave">Hapus</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- end of modal confirmation delete -->
<!-- End smartphone / tablet look -->
</div>
<script type="text/javascript" src="navigation.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $(document).delegate("[data-target='#AddTimeline']", "click", function(e) {
           var id = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_cerita-kami.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                  $('#id').val(data.id);
                  $('#judul').val(data.judul);
                  $('#tanggal').val(data.tanggal);
                  CKEDITOR.instances['deskripsi'].setData(data.deskripsi);
                  $('#x').val(data.bagde);
                  $('.labelbagde').html("Ubah Bagde");
                  document.getElementById('bagde').innerHTML = "<img src='https://drive.google.com/uc?export=view&id="+data.bagde+"' alt='"+data.judul+"' style='width:100px'>";
                  document.getElementById('ModalLabel').innerHTML = "Ubah Cerita Kami";
                } 
           });  
      });

      $(document).delegate("[data-target='#DeleteTimeline']", "click", function(e) {
           var id = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_cerita-kami.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                  $('#deleteId').val(data.id);
                  $('#confirmDelete').html(data.judul);
                } 
           });

      });


  });
</script>
</body>
</html>
