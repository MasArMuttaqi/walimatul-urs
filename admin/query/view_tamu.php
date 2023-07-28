<?php
              include 'conn.php';
              $agenda=$_POST['agenda'];
              $sql = "SELECT * FROM tamu_undangan WHERE nama IS NOT NULL AND undangan LIKE '%{$agenda}%'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?> 
            <tr>
              <td><?=$row['callname'].' '.$row['nama'];?></td>
              <!-- <td width="20%"> -->
                <?php
                  // $undangan=explode(";",$row['undangan']);
                  // foreach ($undangan as $value) {
                  //   echo '<span class="badge badge-pill badge-info">'.$value.'</span>';
                  // }
                ?>
              <!-- </td> -->
              <td width="25%">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#view-tamu" id="<?=$row['uid'];?>" data-id="<?=$row['uid'];?>"><i class="fa fa-search" aria-hidden="true"></i></button>
                  <button type="button" class="btn btn-primary btn-xs dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Tambah" id="<?=$row['uid'];?>" data-id="<?=$row['uid'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete-tamu" id="<?=$row['uid'];?>" data-id="<?=$row['uid'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</a>
                  </div>
                </div>
              </td>
            </tr>
            <?php
              }
            }else{
              echo "<tr><td colspan='2' align='center'>Data Masih Kosong</td></tr>";
            }
            ?>