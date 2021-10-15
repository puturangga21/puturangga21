<?php

switch ($_GET["aksi"]) {

  default:
?>


    <!DOCTYPE html>
    <html>

    <head>
      <link rel="stylesheet" href="style.css">

    <body>
      <!-- bagian menampilkan data -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Siswa</h3><br>
                <a href="?page=siswa&aksi=tambah" class="btn btn-dark">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Jurusan</th>
                      <th>Kelas</th>
                      <th>Telepon</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $query  = mysqli_query($koneksi, "SELECT * FROM siswa");
                    $no = 1;

                    while ($row = mysqli_fetch_array($query)) {
                      echo "
                            <tr>
                                <td>" . $no . "</td>
                                <td>" . $row['nis'] . "</td>
                                <td>" . $row['nama_siswa'] . "</td>
                                <td>" . $row['jenis_kelamin'] . "</td>
                                <td>" . $row['jurusan'] . "</td>
                                <td>" . $row['kelas'] . "</td>
                                <td>" . $row['telepon'] . "</td>
                                <td>
                                  <a href='?page=siswa&aksi=edit&id=" . $row['id_siswa'] . "'><i class='fas fa-user-edit'></i></a> 

                                  <a href='modules/siswa.php?aksi=hapus&id=" . $row['id_siswa'] . "'><i class='fas fa-minus-circle'></i>
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
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Jurusan</th>
                      <th>Kelas</th>
                      <th>Telepon</th>
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
                <h3 class="card-title">Tambah Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/siswa.php?aksi=tambah" method="POST">
                <div class="card-body">

                  <div class="form-group">NIS</label>
                    <input type="text" name="nis" class="form-control" placeholder="NIS SISWA">
                  </div>

                  <div class="form-group">
                    <div class="form-group">Nama Siswa</label>
                      <input type="text" name="nama_siswa" class="form-control" placeholder="NAMA LENGKAP">
                    </div>

                    <div class="form-group">
                      <div class="form-group">Jenis Kelamin</label>
                        <select type="text" name="jenis_kelamin" class="form-control">
                          <option>Jenis Kelamin</option>
                          <option value="Laki - Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <div class="form-group">Jurusan</label>
                          <select type="text" name="jurusan" class="form-control">
                            <option>Jurusan</option>
                            <option value="Multimedia">Mutimedia</option>
                            <option Value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Perhotelan">Perhotelan</option>
                            <option value="Akutansi dan Keuangan Lembaga">Akuntansi</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <div class="form-group">Kelas</label>
                            <select type="text" name="kelas" class="form-control">
                              <option>Kelas</option>
                              <option value="X">X</option>
                              <option value="XI">XI</option>
                              <option value="XII">XII</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <div class="form-group">Telepon</label>
                              <input type="text" name="telepon" class="form-control" placeholder="TELEPON">
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="form-group">
                            <a href="?page=siswa" class="btn btn-danger">Batal</a>

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


    <!-- batas -->


  <?php

    break;

  case 'edit':

    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa = '$id'");
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
                <h3 class="card-title">Edit Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/siswa.php?aksi=edit" method="POST">
                <div class="card-body">
                  <input type="hidden" name="id_siswa" class="form-control" placeholder="NIS SISWA" value="<?php echo $id; ?>">

                  <div class="form-group">NIS</label>
                    <input type="text" name="nis" class="form-control" placeholder="NIS SISWA" value="<?php echo $row['nis']; ?>">
                  </div>

                  <div class="form-group">
                    <div class="form-group">Nama Siswa</label>
                      <input type="text" name="nama_siswa" class="form-control" placeholder="NAMA LENGKAP" value="<?php echo $row['nama_siswa']; ?>">
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
                        <div class="form-group">Jurusan</label>
                          <select type="text" name="jurusan" class="form-control">
                            <option><?php echo $row['jurusan']; ?></option>
                            <option value="Multimedia">Mutimedia</option>
                            <option Value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option value="Perhotelan">Perhotelan</option>
                            <option value="Akutansi dan Keuangan Lembaga">Akuntansi</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <div class="form-group">Kelas</label>
                            <select type="text" name="kelas" class="form-control">
                              <option><?php echo $row['kelas']; ?></option>
                              <option value="X">X</option>
                              <option value="XI">XI</option>
                              <option value="XII">XII</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <div class="form-group">Telepon</label>
                              <input type="text" name="telepon" class="form-control" placeholder="TELEPON" value="<?php echo $row['telepon']; ?>">
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="form-group">
                            <a href="?page=siswa" class="btn btn-danger">Batal</a>

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