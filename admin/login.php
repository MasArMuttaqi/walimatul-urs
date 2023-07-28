<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    
<div class="container d-flex justify-content-center">
    <div class="d-flex flex-column justify-content-between">

        <div class="card mt-3 p-5">
            <!-- <div class="logo mb-3"><img src="../images/icon.png" width="80px"></div> -->
            <div>
                <p class="mb-1">Walimatul Urs - Admin</p>
                <?php
                  if (isset($_GET['msg'])) {
                ?>
                    <h6 class='mb-5 text-white'>Maaf - PIN Akses yang dimasukkan salah</h6>
                    <script>
                        window.onload = function() {
                            setTimeout(function () {
                                window.location.reload();
                            }, 3000);
                         };
                    </script>
                <?php
                  }else{
                    echo "<h6 class='mb-5 text-white'>Silakan login</h6>";
                  }
                ?>
                
            </div>
        </div>
        <div class="card two bg-white px-5 py-4 mb-3">
            <form action="query/auth.php" method="post">
            <div class="form-group">
                <input type="password" name="password" class="form-control" id="password" maxlength="6" required><label class="form-control-placeholder" for="password">PIN Akses</label>
            </div>
            <button type="submit" id="btn-login" class="btn btn-primary btn-block btn-lg mt-1 mb-2"><span>login<i class="fas fa-long-arrow-alt-right ml-2"></i></span></button>
            </form>
        </div>
    </div>
</div>

</body>
</html>