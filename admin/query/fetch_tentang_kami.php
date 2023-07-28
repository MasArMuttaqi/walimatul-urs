<?php
	// create database connectivity
	include 'conn.php';
	$id=$_POST['id'];
	// $rec = 1;
  	$query = "SELECT * FROM tentang_kami WHERE id = '$id'";  
  	$result = mysqli_query($conn, $query);   
  	$row = mysqli_fetch_assoc($result);
  	// echo json_encode($row);
  	echo "
  		<form action='query/tentang_kami.php' method='post'>
            <div id='img'></div>
          <input type='hidden' name='id' id='Id' value='".$row['id']."'>
          <input type='hidden' name='foto' id='foto' value='".$row['foto']."'>
          <div class='input-group mb-3'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='basic-addon1'><i class='material-icons md-18'>account_circle</i></span>
            </div>
            <input type='text' class='form-control' placeholder='nama' aria-label='Nama' aria-describedby='basic-addon1' id='nama' name='nama' value='".$row['nama']."'>
          </div>
          <div class='input-group mb-3'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='basic-addon1'><i class='material-icons md-18'>account_circle</i></span>
            </div>
            <input type='text' class='form-control' placeholder='family name' aria-label='Nama' aria-describedby='basic-addon1' id='familyname' name='familyname' 
            value='".$row['familyname']."'>
          </div>

          <textarea name='editor1' id='deskripsi'>".$row['deskripsi']."</textarea>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
          <br>

          <img src='https://drive.google.com/uc?export=view&id=".$row['foto']."' style='width:100px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;'>
          <br><br>
          <input type='hidden' name='x' id='x' value='".$row['foto']."'>
          <div class='input-group mb-3'>
            <div class='input-group-prepend'>
              <span class='input-group-text' id='basic-addon1'><i class='material-icons md-18'>add_to_drive</i></span>
            </div>
            <input type='text' class='form-control' placeholder='url share google drive' aria-label='foto' aria-describedby='basic-addon1' id='url' name='url' >
            
          </div>
          <small>Jika ingin mengubah foto, tempel tautan share google drive dengan foto yang baru</small>

        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-sm btn-secondary' data-dismiss='modal' onclick='cancel()'>Batal</button>
          <button type='submit' class='btn btn-sm btn-primary' id='butsave'>Ubah</button>
        </div>
        </form>

  	";  
?>