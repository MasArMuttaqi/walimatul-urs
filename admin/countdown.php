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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap" rel="stylesheet">


<style type="text/css">
/*.card{
  width: 150px ;
  margin: 5px;
}*/
.card{
  width: 365px ;
  margin: 5px;
  background: transparent;
}
.card .card-header{
  background: transparent;
  height: 50px
}
.card .card-footer{
  background: transparent
}

.card-title{
  font-size: 24pt;
    text-align: center;
    font-weight: bold;
}
.wed{
  font-size: 13pt;
  font-family: 'Cinzel', serif;
  text-align: center;
  display:block;
   border-top: 2px solid #ccc;
   border-bottom: 2px solid #ccc;
   padding-top: 5px;
   padding-bottom: 5px;
}
.wed2{
  font-size: 13pt;
  font-family: 'Cinzel', serif;
  text-align: center;
  /*letter-spacing: 3px;*/
}
.dt{
  font-size: 28pt;
  font-family: 'Cinzel', serif;
  text-align: center;
  letter-spacing: 3px;
}
</style>
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
      <!-- <div class="row">
        <div class="col">
          <div class="card text-center">
            <div class="card-body"><h5 class="card-title" id="days">350</h5></div>
            <div class="card-footer text-muted">Hari</div>
          </div>
        </div>
        <div class="col">
          <div class="card text-center">
            <div class="card-body"><h5 class="card-title" id="hours">350</h5></div>
            <div class="card-footer text-muted">Jam</div>
          </div>
        </div>
        <div class="w-100"></div>
        <div class="col">
          <div class="card text-center">
            <div class="card-body"><h5 class="card-title" id="minutes">350</h5></div>
            <div class="card-footer text-muted">Menit</div>
          </div>
        </div>
        <div class="col">
          <div class="card text-center">
            <div class="card-body"><h5 class="card-title" id="seconds">350</h5></div>
            <div class="card-footer text-muted">Detik</div>
          </div>
        </div>
      </div> -->
      <div class="row">
        <div class="col-md-6">
          <div class="card wedding">
            <div class="card-header"><h5 class="card-title">Walimatul urs</h5></div>
            <div class="card-body">
                <table style="width: 100%;">
                  <tr>
                    <td width="35%" align="center"><span id="hari" class="wed">Ahad</span></td>
                    <td width="30%" align="center"><span id="bln" class="wed2">April</span><br><span id="tgl" class="dt">09</span><br><span id="tahun" class="wed2">2023</span></td>
                    <td width="35%" align="center"><span id="jam" class="wed">10.00 - 10.30</span></td></tr>
                </table>
                
            </div>
            <div class="card-footer">
              <p class="wed2">Paciran Lamongan Jawa Timur</p>
            </div>
          </div>
        </div>
      </div>


  </div>
<!-- End smartphone / tablet look -->
</div>
<script type="text/javascript" src="navigation.js"></script>

<script>
  var savethedate="";
$(document).ready(function(){
    
    $.ajax({  
                url:"query/fetch_agenda.php",  
                method:"POST",  
                data:{rec_num:'1'},  
                dataType:"json",  
                success:function(data){ 
                  savethedate = data.tanggal;
                  console.log(savethedate);
                } 
           });

    var timer;

    var compareDate = new Date();
    compareDate.setDate(Date.parse(savethedate));
    // const d = new Date(savethedate);
    // let day = d.getDate();
    // let month = d.getMonth();
    // let year = d.getFullYear();
    // var tanggal = split("-",savethedate);
    // var compareDate = new Date(tanggal[0], tanggal[1], tanggal[2]);


    timer = setInterval(function() {
      timeBetweenDates(compareDate);
    }, 1000);

    function timeBetweenDates(toDate) {
      var dateEntered = toDate;
      var now = new Date();
      var difference = dateEntered.getTime() - now.getTime();

      if (difference <= 0) {

        // Timer done
        clearInterval(timer);
      
      } else {
        
        var seconds = Math.floor(difference / 1000);
        var minutes = Math.floor(seconds / 60);
        var hours = Math.floor(minutes / 60);
        var days = Math.floor(hours / 24);

        hours %= 24;
        minutes %= 60;
        seconds %= 60;

        $("#days").text(days);
        $("#hours").text(hours);
        $("#minutes").text(minutes);
        $("#seconds").text(seconds);
      }
    }
});
</script>
</body>
</html>
