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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script> -->
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>
<body>
<!-- Simulate a smartphone / tablet -->
<div class="mobile-container">

<?php
  require 'navigation.html';
  require 'query/tgl_format.php';
?>

<div class="page-content page-container w3-animate-left" id="page-content">
    <div class="row container d-flex justify-content-center">
        
        <div class="col-md-12 col-sm-6">
        <div class="card">
          <div class="card-header bg-info text-white ">Manajemen <b>Akun</b> 
            <button class="btn btn-light btn-sm pull-right" data-toggle="modal" data-target="#add-admin">Tambah Akun</button>
          </div>
          <div class="card-body" style="padding: 0px;">
            <div class="table-responsive">
            <table class="table table-striped table-condensed" style="text-transform: capitalize;">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th>Nama</th>
                    <th>status</th>
                    <th>Create</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $idx=1;
                    require 'query/conn.php';
                    $sql = "SELECT * FROM admin";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td><?= $idx; ?></td>
                    <td><?= $row['nama'];?></td>
                    <td>
                      <?php 
                        if($row['status']=='1'){ echo "<span class='badge badge-success'>Aktif</span>";
                          }else{ echo "<span class='badge badge-secondary'>non-aktif</span>";
                        } 
                        ?>
                    </td>
                    <td><small><?= $row['ts'];?></small></td>
                    <td>
                      <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#add-admin" id="<?=$row['id'];?>" data-id="<?=$row['id'];?>"><i class="fa fa-cog" aria-hidden="true"></i></button>
                      <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#delete-admin" id="<?=$row['id'];?>" data-id="<?=$row['id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </td>
                  </tr>
                  <?php
                      $idx++;
                    }
                  }else{
                    echo "<tr><td colspan='5'>Belum ada data</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>
    </div>
</div>


<!-- modal add and edit agenda -->
<div class="modal fade" id="add-admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="form1" method="post" id="form-akun">
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="trx" id="trx" value="save">
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama" id="nama">
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="PIN min. 6 digit" aria-label="pin" aria-describedby="basic-addon1" name="pin" id="pin" onclick="seePIN()">
            <span class="input-group-btn">
              <span class="badge badge-info" onclick="generatepin()">Buat PIN acak</span>
            </span>
          </div>
          <div class="input-group input-group-sm mb-3" style="font-size: 10pt;">
            <input type="checkbox" onclick="seePIN()">Lihat PIN
          </div>
          <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01"><i class="fa fa-universal-access" aria-hidden="true"></i></label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="status">
              <option selected>Pilih...</option>
              <option value="1">Aktif</option>
              <option value="2">Non-Aktif</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" onclick="cancel()">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm" id="SaveButton">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end of add and edit agenda -->

<!-- modal confirmation delete -->
  <div class="modal fade" id="delete-admin">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p align="center">Apakah akan menghapus admin <br> a.n <span id="confirmDelete"></span> ?</p> 
          <form method="post" id="form-delete-akun">
          <input type="hidden" name="deleteId" id="deleteId">
          <input type="hidden" name="trx" id="trx" value="delete">
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
<script type="text/javascript">
 function generatepin(){
  var pin = Math.floor(100000 + Math.random() * 900000);
  document.getElementById('pin').value=pin;
 }
</script>
<script>
function seePIN() {
  var x = document.getElementById("pin");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script type="text/javascript">
  function cancel(){
    location.reload();
  }
</script>
<script>
$(document).ready(function(){
      $(document).delegate("[data-target='#add-admin']", "click", function(e) {
           var id = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_akun.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                  $('#id').val(data.id);
                  $('#nama').val(data.nama);
                  $('#pin').val(data.pin);
                  $('#trx').val('update');
                  document.getElementById("inputGroupSelect01").selectedIndex = data.status;
                  $('#ModalLabel').html('Ubah data admin');
                } 
           });  
      });

      $(document).delegate("[data-target='#delete-admin']", "click", function(e) {
           var id = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_akun.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                  $('#deleteId').val(data.id);
                  $('#confirmDelete').html(data.nama);
                } 
           });

      }); 

      $("#SaveButton").click(function(){
          event.preventDefault();//this will hold the url
          $.ajax({
            url:"query/crud_akun.php", 
            method: 'POST',
            data:$('#form-akun').serialize(),
            dataType:"json",
            async:false,
            success: function(data) {
              sweetAlert(data[1], "</>", data[0]);
              setTimeout(function(){
                 window.location.reload();
              }, 3000);
              // alert(data);
              // console.log(data);
            }
          });
      });

      $("#DeleteButton").click(function(){
          event.preventDefault();//this will hold the url
          $.ajax({
            url:"query/crud_akun.php", 
            method: 'POST',
            data:$('#form-delete-akun').serialize(),
            dataType:"json",
            async:false,
            success: function(data) {
              
              sweetAlert(data[1], "</>", data[0]);
              setTimeout(function(){
                 window.location.reload();
              }, 3000);

            }
          });
      });

});
</script>
</body>
</html>
