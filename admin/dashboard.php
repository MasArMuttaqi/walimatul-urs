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
  <style type="text/css">
    
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

        <div class="col-sm-4 grid-margin stretch-card">
          <div class="card bg-light dashboard">
            <div class="card-body">
              <h4 class="card-title">Tamu Akad Nikah</h4>
              <div class="table-responsive">
                <table class="table">
                  <tr><td>Konfirmasi kehadiran</td><td><label class="badge badge-info">12</label></td></tr>
                  <tr><td>Jumlah tamu</td><td><label class="badge badge-success">12</label></td></tr>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-4 grid-margin stretch-card">
          <div class="card bg-light dashboard">
            <div class="card-body">
              <h4 class="card-title">Tamu Walimatul Urs</h4>
              <div class="table-responsive">
                <table class="table">
                  <tr><td>Konfirmasi kehadiran</td><td><label class="badge badge-info">12</label></td></tr>
                  <tr><td>Jumlah tamu</td><td><label class="badge badge-success">12</label></td></tr>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-4 grid-margin stretch-card">
          <div class="card bg-light dashboard">
            <div class="card-body">
              <h4 class="card-title">Tamu Ngunduh Mantu</h4>
              <div class="table-responsive">
                <table class="table">
                  <tr><td>Konfirmasi kehadiran</td><td><label class="badge badge-info">12</label></td></tr>
                  <tr><td>Jumlah tamu</td><td><label class="badge badge-success">12</label></td></tr>
                </table>
              </div>
            </div>
          </div>
        </div>

    </div>
</div>

<!-- End smartphone / tablet look -->
</div>
<script type="text/javascript" src="navigation.js"></script>
</body>
</html>
