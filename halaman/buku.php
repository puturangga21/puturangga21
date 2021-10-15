<?php

switch ($_GET["aksi"]) {

  default:
?>


    <!DOCTYPE html>
    <html>

    <head>
      <link rel="stylesheet" href="style.css">

    <body>
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Buku</h3><br>
                <a href="?page=buku&aksi=tambah" class="btn btn-dark">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Judul Buku</th>
                      <th>Stock Buku</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $query  = mysqli_query($koneksi, "SELECT * FROM buku");
                    $no = 1;

                    while ($row = mysqli_fetch_array($query)) {
                      echo "
                            <tr>
                                <td>" . $no . "</td> 
                                <td>" . $row['kode_buku'] . "</td>
                                <td>" . $row['judul_buku'] . "</td>
                                <td>" . $row['stok_buku'] . "</td>
                                <td>
                                  <a href='?page=buku&aksi=edit&id=" . $row['id_buku'] . "'><i class='fas fa-user-edit'></i></a> 

                                  <a href='modules/buku.php?aksi=hapus&id=" . $row['id_buku'] . "'><i class='fas fa-minus-circle'></i>
                                </td>
                            </tr>
                        ";
                      $no++;
                    }
                    ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Judul Buku</th>
                      <th>Stock Buku</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
    </body>
    </head>

    </html>

  <?php

    break;

  case 'tambah':


  ?>

    <!-- bagian menambahkan data -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Buku</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/buku.php?aksi=tambah" method="POST">
                <div class="card-body">

                  <div class="form-group">Kode Buku</label>
                    <input type="text" name="kode_buku" class="form-control" placeholder="KODE BUKU">
                  </div>

                  <div class="form-group">
                    <div class="form-group">Judul Buku</label>
                      <input type="text" name="judul_buku" class="form-control" placeholder="JUDUL BUKU">
                    </div>

                    <div class="form-group">
                      <div class="form-group">Stok Buku</label>
                        <input type="text" name="stok_buku" class="form-control" placeholder="STOK BUKU">
                      </div>
                      <!-- /.card-body -->
                      <div class="form-group">
                        <a href="?page=buku" class="btn btn-danger">Batal</a>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>

              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
    </section>

  <?php

    break;

  case 'edit':

    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$id'");
    $row = mysqli_fetch_assoc($query);

  ?>

    <!-- bagian edit data -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Buku</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/buku.php?aksi=edit" method="POST">
                <div class="card-body">
                  <input type="hidden" name="id_buku" class="form-control" placeholder="NIS SISWA" value="<?php echo $id; ?>">

                  <div class="form-group">Kode Buku</label>
                    <input type="text" name="kode_buku" class="form-control" placeholder="NIS SISWA" value="<?php echo $row['kode_buku']; ?>">
                  </div>

                  <div class="form-group">Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" placeholder="NIS SISWA" value="<?php echo $row['judul_buku']; ?>">
                  </div>

                  <div class="form-group">Stok Buku</label>
                    <input type="text" name="stok_buku" class="form-control" placeholder="NIS SISWA" value="<?php echo $row['stok_buku']; ?>">
                  </div>

                  <!-- /.card-body -->
                  <div class="form-group">
                    <a href="?page=buku" class="btn btn-danger">Batal</a>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>

              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
    </section>


<?php
    break;
}
?>