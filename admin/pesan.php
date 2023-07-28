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
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/id.min.js"></script>
  <style type="text/css">
.quote-card {
  background: #fff;
  width: 100%;
  color: #222222;
  padding: 20px;
  padding-left: 50px;
  box-sizing: border-box;
  box-shadow: 0 2px 4px rgba(34, 34, 34, 0.12);
  position: relative;
  overflow: hidden;
  min-height: 120px;
}
.quote-card p {
  font-family: 'Source Serif Pro', serif;
  font-size: 16px;
  line-height: 1.5;
  margin: 0;
  max-width: 100%;
  z-index: 2;
}
.quote-card cite {
  font-size: 12px;
  margin-top: 10px;
  display: block;
  font-weight: 200;
  opacity: 0.8;
}
.quote-card:before {
  font-family: Georgia, serif;
  content: "“";
  position: absolute;
  top: 10px;
  left: 10px;
  font-size: 5em;
  color: rgba(238, 238, 238, 0.8);
  font-weight: normal;
}
.quote-card:after {
  font-family: Georgia, serif;
  content: "”";
  position: absolute;
  bottom: -110px;
  line-height: 100px;
  right: -32px;
  font-size: 20em;
  color: rgba(238, 238, 238, 0.8);
  font-weight: normal;
}
  </style>
</head>
<body>
<!-- Simulate a smartphone / tablet -->
<div class="mobile-container">

<?php
  require 'navigation.html';
  include 'query/tgl_format.php';
  function upload($tgl){
    date_default_timezone_set("Asia/Bangkok");
    $new_date = date('l, F d y - h:i', strtotime($tgl));
    echo $new_date; 
  }
?>

<div class="page-content page-container w3-animate-left" id="page-content">
    <div class="row container d-flex justify-content-center">
        <?php
          include 'query/conn.php';
          $sql = "SELECT * FROM pesan";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>  
          <div class="col-md-6 col-xs-6">
            <blockquote class="quote-card">
              <p><?= $row['pesan']; ?></p>
              <cite>
                <?= $row['nama']; ?><br><small><?= upload($row['ts']); ?></small>
              </cite>
            </blockquote>
          </div>
        <?php 
          }
          }
          else {
            echo "<div class='alert alert-info'><strong>Untuk sementara</strong> belum ada pesan dan kesan yang masuk nih.</div>";
          }
          mysqli_close($conn);
        ?>

    </div>
</div>

<!-- End smartphone / tablet look -->
</div>
<script type="text/javascript" src="navigation.js"></script>
</body>
</html>
