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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <style type="text/css">
      h3{
        font-size: 18px;
      }
      p{
        font-size: 14px;
      }
      .shadow {
          box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06) !important;
        }
      .banner {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 125px;
          /*background-image: url("https://i.pinimg.com/originals/16/f3/b0/16f3b0bc85829c9151e1cc6e9fba90b3.jpg");
          background-position: center;
          background-size: cover;*/
        }

        .img-circle {
          height: 150px;
          width: 150px;
          border-radius: 150px;
          border: 3px solid #fff;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
          z-index: 15;
        }

        .btn-circle.btn-sm {
            width: 40px;
            height: 40px;
            padding: 6px 0px;
            border-radius: 39px;
            text-align: center;
            z-index: auto;
            position: absolute;
            left: 205px;
            top: 129px;
        }

        .social-links a {
          transition: all 0.2s;
        }
        .social-links a img {
          height: 30px;
        }
        .social-links a:hover {
          transform: translateY(-3px);
        }
        .material-icons.md-18 { font-size: 18px; }
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
                location.replace("tentang-kami.php")
              }, 3000);
            </script>
          <?php
          }
        ?>
        <?php
          include 'query/conn.php';
          $sql = "SELECT * FROM tentang_kami";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>  


            <div class="col-sm-4 col-md-4">
              <div class="profile-card card rounded-lg shadow p-4 p-xl-5 mb-4 text-center position-relative overflow-hidden">
                <div class="banner"></div>
                <img src=https://drive.google.com/uc?export=view&id=<?= $row['foto']; ?> alt="" class="img-circle mx-auto mb-3">
                <h3 class="mb-4"><?= $row['nama']; ?><br><small><?= $row['familyname']; ?></small></h3>
                <div class="text-left mb-4">
                  <p class="mb-2"><?= $row['deskripsi']; ?></p>
                </div>
                <div class="social-links d-flex justify-content-center">
                  <!-- <a href="#!" class="mx-2"><img src="img/social/dribbble.svg" alt="Dribbble"></a>
                  <a href="#!" class="mx-2"><img src="img/social/facebook.svg" alt="Facebook"></a>
                  <a href="#!" class="mx-2"><img src="img/social/linkedin.svg" alt="Linkedin"></a>
                  <a href="#!" class="mx-2"><img src="img/social/youtube.svg" alt="Youtube"></a> -->
                  <button class="btn btn-info btn-block" data-toggle="modal" data-target="#editTentang" id="<?=$row['id'];?>" data-id="<?=$row['id'];?>">Ubah data</button>
                </div>
              </div>
            </div>



        <?php 
          }
          }
          else {
            echo "<div class='alert alert-info'><strong>Untuk sementara</strong> profil belum ada nih.</div>";
          }
          mysqli_close($conn);
        ?>
          

    </div>
</div>

<!-- modal edit deskripsi -->
  <div class="modal fade" id="editTentang">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Ubah Data</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div id="formulir"></div>
        </div>
    </div>
  </div>
<!-- end of modal deskripsi -->


<!-- End smartphone / tablet look -->
</div>
<script type="text/javascript" src="navigation.js"></script>
<script type="text/javascript">
  function cancel(){
    location.reload();
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(document).delegate("[data-target='#editTentang']", "click", function(e) {
           var id = $(this).attr("data-id");
           $.ajax({  
                url:"query/fetch_tentang_kami.php",  
                method:"POST",  
                data:{id:id},  
                success:function(data){ 
                  $("#formulir").html(data);
                } 
           });

      });

  });
</script>
</body>
</html>
