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
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.14.1/adapters/jquery.js"></script>

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
  blockquote{
    font-family: 'Source Serif Pro', serif; 
    text-align: left;
    border-left: 5px solid #ccc;
    margin: 1.5em 10px;
    padding: 0.5em 10px;
    quotes: "\201C""\201D""\2018""\2019";
  }
  blockquote:before {
  color: #ccc;
  content: open-quote;
  font-size: 4em;
  line-height: 0.1em;
  margin-right: 0.25em;
  vertical-align: -0.4em;
}
.editednote{
  color: rgba(0, 0, 0,0.8); 
  font-size: .6rem; 
  text-align: right; 
  display: block;
  margin-top: 20px;
  margin-bottom: -10px;
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
      <!-- <div class="row"> -->
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
                location.replace("galery.php")
              }, 3000);
            </script>
          <?php
          }
        ?>
      <!-- </div>
      <div class="row"> -->
      <?php
        $i=1;
        include 'query/conn.php';
        $sql = "SELECT * FROM galeri";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
      ?>  
      <div class="col-md-6 col-sm-6">
        <div class="card">
          <div class="card-body">
            <?php
              if ($row['category']=='1') {
                $arr= explode(" | ",$row['content']);
                echo "<img src='https://drive.google.com/uc?export=view&id=".$arr[0]."' alt='Galeri".$i++."' style='width:200px'>";
                echo "<br>".$arr[1]."<br>";
              }else{
                echo $row['content'];
              }
            ?>
            <br><small class="editednote">Edited <?= date('M d, Y - H:i',strtotime($row['ts']));  ?></small>
          </div>
          <div class="card-footer">
            <button class="btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#AddGalery" id="<?=$row['id'];?>" data-id="<?=$row['id'];?>">Edit</button>
            <button class="btn btn-link btn-sm" data-toggle="modal" data-target="#DeleteGalery" id="<?=$row['id'];?>" data-id="<?=$row['id'];?>">Hapus</button>
          </div>
        </div>
      </div>
      <?php
        $i++;
        }
      }else{
        echo "<div class='card bg-info text-white'><div class='card-body'>Galeri masih kosong ya....untuk menambah klik tombol yang ada dibagian bawah</div></div>";
      }
      ?>
      <!-- </div>   -->
        

    </div>
</div>
<a href="#" class="float" data-toggle="modal" data-target="#AddGalery"> <i class="fa fa-plus my-float"></i></a>
<!-- The Modal -->
<div class="modal" id="AddGalery">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h6 class="modal-title" id="ModalLabel">Tambah data galeri</h6>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="query/galeri.php" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Kategori</span>
          </div>
          <select class="form-control" id="sel1" name="category">
            <option>Pilih salah satu</option>
            <option value="1">Gambar</option>
            <option value="2">Teks</option>
          </select>
        </div>
        <hr>
        <div id='bagde'></div>
        <input type="hidden" name="x" id="x"><br>
        
        <div class='input-group mb-3'>
          <div class='input-group-prepend'>
            <span class='input-group-text' id='basic-addon1'><i class='material-icons md-18'>add_to_drive</i></span>
          </div>
            <input type='text' class='form-control' placeholder='url share google drive' aria-label='foto' aria-describedby='basic-addon1' id='url' name='url' >
          </div>
        <small><span id="ket"></span> tempel tautan share google drive dengan foto yang baru</small>
        <hr>
        <div class="form-group">
          <p id="caption"></p>
          <textarea name="deskripsi" id="deskripsi">Tulis disini....</textarea>
          <script>CKEDITOR.replace( 'deskripsi' );</script>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" onclick="cancel()">Batal</button>
        <button type="submit" class="btn btn-primary btn-sm" id="butsave">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- modal confirmation delete -->
  <div class="modal fade" id="DeleteGalery">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal" onclick="cancel()">&times;</button>
        </div>
        <div class="modal-body">
          <p align="center">Apakah akan menghapus data <br><span id="confirmDelete"></span> ?</p> 
          <form action="query/galeri.php?trx=delete" method="post">
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
  document.getElementById("sel1").onchange = function () {
    if (this.value == '1'){
     // CKEDITOR.instances['deskripsi'].setReadOnly(true);
     document.getElementById('caption').innerHTML = "Caption gambar";
     document.getElementById("url").disabled = false;
  }else if(this.value == '2'){
    document.getElementById('caption').innerHTML = " ";
    // CKEDITOR.instances['deskripsi'].setReadOnly(false);
    document.getElementById("url").disabled = true;
  }else{
    CKEDITOR.instances['deskripsi'].setReadOnly(false);
    document.getElementById("url").disabled = false;
  }
  };
</script>
<script type="text/javascript">
  $(document).ready(function(){
      $(document).delegate("[data-target='#AddGalery']", "click", function(e) {
           var id = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_galeri.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                  $('#id').val(data.id);
                  document.getElementById("sel1").value = data.category;
                  if (data.category=='1') {
                    let text = data.content;
                    const myArray = text.split(" | ");
                    $('#x').val(myArray[0]);
                    document.getElementById('bagde').innerHTML = "<img src='https://drive.google.com/uc?export=view&id="+myArray[0]+"' alt='"+data.id+"' style='width:100px'>";
                    // CKEDITOR.instances['deskripsi'].setReadOnly(true);
                    CKEDITOR.instances['deskripsi'].setData(myArray[1]);
                    document.getElementById('caption').innerHTML = "Caption gambar";
                    document.getElementById('ket').innerHTML = "Jika ingin mengubah foto,";
                  }else{
                    CKEDITOR.instances['deskripsi'].setData(data.content);
                    document.getElementById("url").disabled = true;
                  }
                  document.getElementById('ModalLabel').innerHTML = "Ubah data galeri";
                } 
           });  
      });

      $(document).delegate("[data-target='#DeleteGalery']", "click", function(e) {
           var id = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_galeri.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){ 
                  $('#deleteId').val(data.id);
                  if (data.judul=='1'){
                    $('#confirmDelete').html('gambar tersebut ?');
                  }else{
                    $('#confirmDelete').html('teks tersebut ?');
                  }
                  
                } 
           });
      });


  });
</script>
</body>
</html>
