<?php

switch ($_GET["aksi"]) {

  default:
?>


    <!DOCTYPE html>
    <html>

    <head>
      <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
      <link rel="stylesheet" href="style.css">

    <body>
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Petugas</h3><br>
                <a href="?page=petugas&aksi=tambah" class="btn btn-dark">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Petugas</th>
                      <th>Jenis kelamin</th>
                      <th>Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $query  = mysqli_query($koneksi, "SELECT * FROM petugas");
                    $no = 1;

                    while ($row = mysqli_fetch_array($query)) {
                      echo "
                            <tr>
                                <td>" . $no . "</td> 
                                <td>" . $row['nama_petugas'] . "</td>
                                <td>" . $row['jenis_kelamin'] . "</td>
                                <td>" . $row['jabatan'] . "</td>
                                <td>
                                <a href='?page=petugas&aksi=edit&id=" . $row['id_petugas'] . "'><i class='fas fa-user-edit'></i></a> 

                                <a href='modules/petugas.php?aksi=hapus&id=" . $row['id_petugas'] . "'><i class='fas fa-minus-circle'></i>
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
                      <th>Nama Petugas</th>
                      <th>Jenis kelamin</th>
                      <th>Jabatan</th>
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
      <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
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
                <h3 class="card-title">Tambah Data Petugas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/petugas.php?aksi=tambah" method="POST">
                <div class="card-body">

                  <div class="form-group">Nama Petugas</label>
                    <input type="text" name="nama_petugas" class="form-control" placeholder="NAMA PETUGAS">
                  </div>

                  <div class="form-group">
                    <div class="form-group">Jenis Kelamin</label>
                      <select type="text" name="jenis_kelamin" class="form-control">
                        <option selected disabled>Jenis Kelamin</option>
                        <option value="Laki - Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <div class="form-group">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" placeholder="JABATAN">
                      </div>
                      <!-- /.card-body -->
                      <div class="form-group">
                        <a href="?page=petugas" class="btn btn-danger">Batal</a>

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
    $query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas = '$id'");
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
                <h3 class="card-title">Edit Data Petugas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/petugas.php?aksi=edit" method="POST">
                <div class="card-body">
                  <input type="hidden" name="id_petugas" class="form-control" placeholder="NAMA LENGKAP" value="<?php echo $id; ?>">

                  <div class="form-group">
                    <div class="form-group">Nama Petugas</label>
                      <input type="text" name="nama_petugas" class="form-control" placeholder="NAMA LENGKAP" value="<?php echo $row['nama_petugas']; ?>">
                    </div>

                    <div class="form-group">
                      <div class="form-group">Jenis Kelamin</label>
                        <select type="text" name="jenis_kelamin" class="form-control">
                          <option><?php echo $row['jenis_kelamin']; ?></option>
                          <option value="Laki - Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <div class="form-group">Jabatan</label>
                          <input type="text" name="jabatan" class="form-control" placeholder="JABATAN" value="<?php echo $row['jabatan']; ?>">
                        </div>

                        <!-- /.card-body -->
                        <div class="form-group">
                          <a href="?page=petugas" class="btn btn-danger">Batal</a>

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