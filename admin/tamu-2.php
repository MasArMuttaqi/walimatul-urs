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
<!-- data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

<!-- databanle -->
<link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="whatsapp-editor/css/whatsapp-editor.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
  <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <style type="text/css">

    .container .tab-pane{
      background: white;
      padding-bottom: 29px;
    }
    .tab-content{
      width: 100%;
      /*height: 100%;*/
      padding-bottom: 50px;
    }
    .tab-content>.active{
      color: black;
    }
    .sts{
      margin-top: 5px;
      margin-bottom: 5px;
      margin-right: 5px;
      margin-left: 5px;
    }
    .whatsapp-send{
      width: 400px;
    }
    a .dropdown-item{
      width: 15px;
    }
  </style>
  <script>
    $(document).ready(function(){
      $("#cari-tamu").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tbl_tamu tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
</head>
<body>
<!-- Simulate a smartphone / tablet -->
<div class="mobile-container">

<?php
  require 'navigation.html';
  include 'query/conn.php';
?>
<div class="page-content page-container w3-animate-left" id="page-content">
  <div class="row container d-flex justify-content-center">
    
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div style="text-align: center; color: #495057; border-radius: 4px;" class="list-group-item">Agenda</div>
      <ul class="list-group" id="list-tamu">
        <?php
          $sql = "SELECT rec_num, agenda FROM agenda";
          $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      $kodeagenda=$row['rec_num'];
                      $agenda=$row['agenda'];
                      $sql_undangan=mysqli_query($conn,"SELECT COUNT(undangan) as jml FROM tamu_undangan WHERE undangan like '%$kodeagenda%' ");
                      $query_tamu = mysqli_fetch_assoc($sql_undangan);
                      echo "<li value='".$kodeagenda."' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center'>".$agenda."<span class='badge badge-primary badge-pill'>".$query_tamu['jml']."</span></li>";
                    }
                    $sql_undangan=mysqli_query($conn,"SELECT COUNT(undangan) as jml, undangan FROM tamu_undangan WHERE undangan like '%kabar' ");
                      $query_tamu = mysqli_fetch_assoc($sql_undangan);
                      if ($query_tamu['jml']==0) {
                        echo "<li class='list-group-item list-group-item-action d-flex justify-content-between align-items-center'></li>";
                      }else{
                         echo "<li value='".$query_tamu['undangan']."' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center'>".$query_tamu['undangan']."<span class='badge badge-primary badge-pill'>".$query_tamu['jml']."</span></li>";
                      }
                     

            }else{
                      echo "<li class='list-group-item list-group-item-action d-flex justify-content-between align-items-center'>Data masih kosong<span class='badge badge-primary badge-pill'>0</span></li>";
            }
          ?>
      </ul>
      <br>
      <!-- <a href="chat.php" class="btn btn-success btn-sm btn-block"><i class="fa fa-whatsapp" aria-hidden="true"></i> Draf kirim pesan whatsapp</a> -->
    </div>
    <div class="col-md-8 col-sm-6 col-xs-12">
      <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#Tambah" style=" margin: 16px 6px;"><i class="fa fa-user-plus" aria-hidden="true"></i> Tambah Data</button>
      <!-- <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#importCsv" style="margin: 16px 6px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Import CSV</button> -->
      <br><br>
      <input id="cari-tamu" type="text" placeholder="Cari data..">
      <br><br>
      <table class="table table-striped" style="margin-bottom: 80px;">
        <thead style="background-color: #17a2b8!important; color: white;">
          <tr>
            <th scope="col">Nama</th>
            <!-- <th scope="col">Undangan</th> -->
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody id="tbl_tamu">
          <tr><td colspan="2" align="center">Data masih kosong, silakan pilih agenda</td></tr>
        </tbody>
      </table>

    </div>
  </div>


  


  </div>
</div>


<!-- add tamu -->
<!-- The Modal -->
  <div class="modal" id="Tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="addTamu">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form name="form1" method="post" id="form-tamu" enctype="multipart/form-data">
        <!-- Modal body -->
        <div class="modal-body">
          <input type="hidden" name="uuid" id="uuid">
          <div class="form-group">
            <label for="email">Sapaan</label>
            <select class="form-select form-select-sm" name="callname" id="callname" aria-label="Default select example">
                <option selected>-</option>
                <option value="Bapak">Bapak</option>
                <option value="Ibu">Ibu</option>
                <option value="Mas">Mas</option>
                <option value="Mbak">Mbak</option>
                <option value="Bapak/Ibu">Bapak/Ibu</option>
            </select>
          </div>
          <div class="form-group">
            <label for="email">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Masukkan nama lengkap dan gelar" name="nama" onkeyup="countChars(this);">
            <small id="charNum" class="form-text text-muted">Penulisan maksimal 50 karakter</small>
          </div>
          <div class="form-group">
            <label for="email">Nomor WA</label>
            <input type="text" class="form-control" id="telepon" placeholder="Masukkan nomor whatsapp" name="telepon">
            <small id="emailHelp" class="form-text text-muted">Penulisan <em>6285116116xxxxx</em> , jika tidak ada tuliskan <em>0</em></small>
          </div>
          <div class="form-group">
            <label for="email">Kategori undangan</label>
            <select id="choices-multiple-remove-button" name="undangan[]" placeholder="Select upto 2 tags" multiple>
              <option value='kirim kabar'>- Kirim Kabar -</option>
            </select>
          </div>
          <input type="hidden" name="trx" id="trx" value="save">
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancel()">Batal</button>
        <button type="submit" class="btn btn-primary" id="SaveButton">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- add tamu -->
<!-- view tamu -->
<!-- The Modal -->
<div class="modal" id="view-tamu">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Detail Tamu</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item" ><span id="nama_view"></span> <span class="badge badge-light badge-pill pull-right"><i class="fa fa-user-o" aria-hidden="true"></i></span></li>
          <li class="list-group-item" ><span id="telepon_view"></span> <span class="badge badge-light badge-pill pull-right"><i class="fa fa-whatsapp" aria-hidden="true"></i></span></li>
          <li class="list-group-item" ><span id="undangan_view"></span> <span class="badge badge-light badge-pill pull-right"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></span></li>
        </ul>
        <form action="" method="post">
          <textarea id="whatsapp-editor-container" rows="25" cols="100%" style="width: -webkit-fill-available;"></textarea>
            <!-- <div class="card">
              <div class="card-body" style="background-color: #edf8f5; outline-color: #edf8f5;">
                <div id="whatsapp-editor-container"></div>
              </div>
            </div> -->
              <!-- <div id="whatsapp-editor-container"></div> -->
          <!-- <a href="#" id="send_btn" class="btn btn-sm btn-block btn-success" style="margin-top:10px">Kirim pesan <i class="fa fa-whatsapp" aria-hidden="true"></i></a> -->
          <a href="#" id="send_btn" class="btn btn-sm btn-block btn-success" style="margin-top:10px">Bagikan pesan <i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        </form>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end of tamu -->
<!-- modal confirmation delete -->
  <div class="modal fade" id="delete-tamu">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p align="center">Apakah akan menghapus data tamu<br> a.n <span id="confirmDelete"></span> ?</p> 
          <form method="post" id="form-delete-tamu">
          <input type="text" name="deleteId" id="deleteId">
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
<!-- import csv -->
<div class="modal fade" id="importCsv">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Unggah berkas CSV</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="query/importData.php" method="post" enctype="multipart/form-data">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <input type="file" class="form-control-file" id="file" name="file">
        </div>
        <p style="font-size: .875rem;">Silakan unduh <i>template</i> pada tautan berikut <a href="https://drive.google.com/file/d/1VKmIRD7dImcoGqkmaMbchD0pKzqeda8M/view?usp=sharing" target="_blank">klik disini</a></p>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-link btn-sm" data-dismiss="modal" onclick="cancel()">Batal</button>
        <button type="submit" class="btn btn-success btn-sm" name="submit" value="submit">Unggah</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end of import csv -->

<!-- End smartphone / tablet look -->
</div>
<script type="text/javascript" src="navigation.js"></script>

<!-- <script type="text/javascript" src="whatsapp-editor/js/whatsapp-editor.js"></script> -->

<script type="text/javascript">
  $(document).ready(function() {
  $("#list-tamu").on("click", "li", function() {
    // get the li that was clicked
    var li = $(event.target).attr('value');
    $.ajax({
          url: "query/view_tamu.php",
          type: "POST",
          data:{agenda:li},
          success: function(dataResult){
            $('#tbl_tamu').html(dataResult); 
          }
      });

  });
});

  $(".list-group-item").click(function(){

   var listItems = $(".list-group-item"); //Select all list items

   //Remove 'active' tag for all list items
   for (let i = 0; i < listItems.length; i++) {                    
      listItems[i].classList.remove("active");
   }
   //Add 'active' tag for currently selected item
   this.classList.add("active");
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
    removeItemButton: true,
    maxItemCount:2,
    searchResultLimit:4,
    renderChoiceLimit:4
    });

  });
</script>
<?php
      $sql = "SELECT rec_num, agenda FROM agenda";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
?>
          <script>
           $('#choices-multiple-remove-button').append('<option value="<?php echo $row['rec_num']; ?>"><?php echo $row['agenda'];?></option>');
          </script>
<?php
        }
      }else{
?>

        <script>$('#choices-multiple-remove-button').append('<option value='-'>-</option>');</script>
<?php
      }
?>
<script type="text/javascript">
  function cancel(){
    location.reload();
  }
</script>
<script>
$(document).ready(function(){
  var textData = "";
  var numbercall = "";
  $(document).delegate("[data-target='#Tambah']", "click", function(e) {
           var uid = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_tamu.php",  
                method:"POST",  
                data:{uid:uid},  
                dataType:"json",  
                success:function(data){ 
                  // var text = data.undangan;
                  $('#uuid').val(data.uid);
                  $('#callname').val(data.callname);
                  $('#nama').val(data.nama);
                  $('#telepon').val(data.telepon);
                  $('#trx').val('update');
                  $('#choices-multiple-remove-button').val(data.undangan);
                  $('#addTamu').html('Ubah data tamu');
                } 
           });  
      });
    $(document).delegate("[data-target='#view-tamu']", "click", function(e) {
           var uid = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_tamu.php",  
                method:"POST",  
                data:{uid:uid},  
                dataType:"json",  
                success:function(data){ 
                  var nama = data.callname+" "+data.nama;
                  $('#nama_view').html(nama);
                  $('#telepon_view').html(data.telepon);
                  $('#undangan_view').html(data.undangan);
                  numbercall = data.telepon;
                } 
           });
           $.ajax({  
                url:"query/fetch_undangan.php",  
                method:"POST",  
                data:{uid:uid},  
                success:function(data){ 
                  $('#whatsapp-editor-container').html(data);
                } 
           });

      });

    $( "#send_btn" ).click(function() {
      var msgs = document.getElementById("whatsapp-editor-container").value;
      // console.log(msgs);
      if (numbercall=='0') {
        // alert('aksi tidak tersedia');
        window.open( "whatsapp://send?text=" + encodeURI(msgs), '_blank');  
      }else{
        window.open('https://api.whatsapp.com/send?phone='+numbercall+'&text='+encodeURI(msgs)+'.', '_blank');
      }
      
    });
      $(document).delegate("[data-target='#delete-tamu']", "click", function(e) {
           var uid = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_tamu.php",  
                method:"POST",  
                data:{uid:uid},  
                dataType:"json",  
                success:function(data){ 
                  $('#deleteId').val(data.uid);
                  var namaLengkap = data.callname+" "+data.nama;
                  $('#confirmDelete').html(namaLengkap);
                } 
           });

      });


    $("#SaveButton").click(function(){
        event.preventDefault();//this will hold the url
        $.ajax({
          url:"query/crud_tamu.php", 
          method: 'POST',
          dataType:"json",
          async:false,
          data:$('#form-tamu').serialize(),
          success: function(data) {
            sweetAlert(data[1], "</>", data[0]);
              setTimeout(function(){
                 window.location.reload();
              }, 3000);
            // alert(data);
          }
        });
    });

    $("#DeleteButton").click(function(){
      event.preventDefault();//this will hold the url
        $.ajax({
          url:"query/crud_tamu.php", 
          method: 'POST',
          dataType:"json",
          async:false,
          data:$('#form-delete-tamu').serialize(),
          success: function(data) {
            sweetAlert(data[1], "</>", data[0]);
              setTimeout(function(){
                 window.location.reload();
              }, 3000);
            // alert(data);
            // $("#notif").html(data);
          }
        });
    });



});
</script>
<script type="text/javascript">
  function countChars(obj){
    var maxLength = 50;
    var strLength = obj.value.length;
    
    if(strLength > maxLength){
        document.getElementById("charNum").innerHTML = '<span style="color: red;">Penulisan '+strLength+' dari '+maxLength+' karakter</span>';
    }else{
        document.getElementById("charNum").innerHTML = 'Penulisan nama '+strLength+' dari '+maxLength+' karakter';
    }
}
</script>
</body>
</html>
