<!DOCTYPE html>
<html>
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
<link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="whatsapp-editor/css/whatsapp-editor.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
  <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>




</head>
<body>
    <?php
      session_start();
      if(!isset($_SESSION["nama"])){
          header("Location:../index.php");
      }
      // echo ucfirst($_SESSION["nama"]);
    ?>
<div class="mobile-container">
  <div class="page-content page-container w3-animate-left" id="page-content">
    <div class="row container d-flex justify-content-center">
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
                location.reload();
              }, 3000);
            </script>
          <?php
          }
        ?>
        <div class="col-md-12 col-sm-6">
        <div class="card">
          <div class="card-header bg-success text-white ">Draf kirim pesan <b>WhatsApp</b>
          <a href="tamu-2.php" class="btn btn-light btn-sm pull-right">Kembali</a> 
          </div>
          <div class="card-body">
            <form action="query/submit_undangan.php" method="post">
            <select class="form-select form-select-lg mb-3 " aria-label=".form-select-lg example" id="pilih" name="kategori">
              <option selected>Pilih salah satu</option>
              <option value="undangan">Undangan</option>
              <option value="kirim kabar">Kirim kabar</option>
            </select>
            <span class="pull-right">variabel <span class="badge badge-warning">$agenda</span> jangan dihapus</span>
            <br>
            <textarea id="tinymce" name="content" rows="20"></textarea>
          </div>
          <div class="card-footer">
            <button class="btn btn-info btn-sm pull-right" type="submit">Simpan</button>
          </div>
          </form>
        </div>
        </div>
    </div>
</div>

</div>
<script>
  tinymce.init({
  selector: 'textarea#tinymce',
  mobile: {
    menubar: false
  }
});

</script>
<script type="text/javascript">
  $(document).ready(function(){

    $('#pilih').change(function() { 
    var pilih = $(this).val();
    $.ajax({  
      url:"query/fetch_chat.php",  
      method:"POST",  
      data:{kategori:pilih},    
      success:function(data){ 
        tinymce.get('tinymce').setContent(data);
        // console.log(data);
      } 
    });
 
  });

  });
</script>
</body>
</html>