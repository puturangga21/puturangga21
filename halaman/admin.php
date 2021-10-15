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
                <h3 class="card-title">Data Admin</h3><br>
                <a href="?page=admin&aksi=tambah" class="btn btn-dark">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // adminnya adalah nama di database
                    $query  = mysqli_query($koneksi, "SELECT * FROM admin");
                    $no = 1;

                    while ($row = mysqli_fetch_array($query)) {
                      echo "
                            <tr>
                                <td>" . $no . "</td> 
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['password'] . "</td>
                                <td>
                                  <a href='?page=admin&aksi=edit&id=" . $row['id_admin'] . "'><i class='fas fa-user-edit'></i></a> 

                                  <a href='modules/admin.php?aksi=hapus&id=" . $row['id_admin'] . "'><i class='fas fa-minus-circle'></i>
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
                      <th>Username</th>
                      <th>Password</th>
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
                <h3 class="card-title">Tambah Data Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/admin.php?aksi=tambah" method="POST">
                <div class="card-body">

                  <div class="form-group">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="USERNAME">
                  </div>

                  <div class="form-group">
                    <div class="form-group">Password</label>
                      <input type="text" name="password" class="form-control" placeholder="PASSWORD">
                    </div>
                    <!-- /.card-body -->
                    <div class="form-group">
                      <a href="?page=admin" class="btn btn-danger">Batal</a>

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
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id'");
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
                <h3 class="card-title">Edit Data Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/admin.php?aksi=edit" method="POST">
                <div class="card-body">
                  <input type="hidden" name="id_admin" class="form-control" placeholder="NIS SISWA" value="<?php echo $id; ?>">

                  <div class="form-group">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="NIS SISWA" value="<?php echo $row['username']; ?>">
                  </div>

                  <div class="form-group">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="NIS SISWA" value="<?php echo $row['password']; ?>">
                  </div>

                  <!-- /.card-body -->
                  <div class="form-group">
                    <a href="?page=admin" class="btn btn-danger">Batal</a>

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