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
                <h3 class="card-title">Data Transaksi</h3><br>
                <a href="?page=transaksi&aksi=tambah" class="btn btn-dark">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Jurusan</th>
                      <th>Kelas</th>
                      <th>Nama Petugas</th>
                      <th>Judul Buku</th>
                      <th>Stok Buku</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Mengembalikan</th>
                      <th>Jumlah Dipinjam</th>
                      <th>Jumlah Mengembalikan</th>
                      <th>Bulan</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $query  = mysqli_query($koneksi, "SELECT *, nis, nama_siswa, jurusan, kelas, nama_petugas, judul_buku, stok_buku FROM transaksi
                    JOIN siswa ON siswa.id_siswa = transaksi.id_siswa
                    JOIN petugas ON petugas.id_petugas = transaksi.id_petugas
                    JOIN buku ON buku.id_buku = transaksi.id_buku");
                    $no = 1;

                    while ($row = mysqli_fetch_array($query)) {
                      echo "
                            <tr>
                                <td>" . $no . "</td>
                                <td>" . $row['nis'] . "</td>
                                <td>" . $row['nama_siswa'] . "</td>                               
                                <td>" . $row['jurusan'] . "</td>
                                <td>" . $row['kelas'] . "</td>
                                <td>" . $row['nama_petugas'] . "</td>
                                <td>" . $row['judul_buku'] . "</td>
                                <td>" . $row['stok_buku'] . "</td>
                                <td>" . $row['tgl_pinjam'] . "</td>
                                <td>" . $row['tgl_mengembalikan'] . "</td>
                                <td>" . $row['jumlah_dipinjam'] . "</td>
                                <td>" . $row['jumlah_mengembalikan'] . "</td>
                                <td>" . $row['bulan'] . "</td>
                                <td>" . $row['keterangan'] . "</td>
                                <td>
                                  <a href='?page=transaksi&aksi=edit&id=" . $row['id_transaksi'] . "'><i class='fas fa-user-edit'></i></a> 

                                  <a href='modules/transaksi.php?aksi=hapus&id=" . $row['id_transaksi'] . "'><i class='fas fa-minus-circle'></i>
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
                      <th>Jurusan</th>
                      <th>Kelas</th>
                      <th>Nama Petugas</th>
                      <th>Judul Buku</th>
                      <th>Stok Buku</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Mengembalikan</th>
                      <th>Jumlah Dipinjam</th>
                      <th>Jumlah Mengembalikan</th>
                      <th>Bulan</th>
                      <th>Keterangan</th>
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

    $query_siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
    $query_petugas = mysqli_query($koneksi, "SELECT * FROM petugas");
    $query_buku = mysqli_query($koneksi, "SELECT * FROM buku");

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
                <h3 class="card-title">Tambah Data Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/transaksi.php?aksi=tambah" method="POST">
                <div class="card-body">

                  <div class="form-group">Nama Siswa</label>
                    <select type="text" name="id_siswa" class="form-control" placeholder="NAMA SISWA">
                      <?php
                      while ($row = mysqli_fetch_array($query_siswa)) {
                        echo '<option value = "' . $row['id_siswa'] . '">' . $row['nama_siswa'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">Nama Petugas</label>
                    <select type="text" name="id_petugas" class="form-control" placeholder="NAMA PETUGAS">
                      <?php
                      while ($row = mysqli_fetch_array($query_petugas)) {
                        echo '<option value = "' . $row['id_petugas'] . '">' . $row['nama_petugas'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">Judul Buku</label>
                    <select type="text" name="id_buku" class="form-control" placeholder="JUDUL BUKU">
                      <?php
                      while ($row = mysqli_fetch_array($query_buku)) {
                        echo '<option value = "' . $row['id_buku'] . '">' . $row['judul_buku'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">Tanggal Meminjam</label>
                    <input type="date" name="tgl_meminjam" class="form-control">
                  </div>

                  <div class="form-group">Tanggal Mengembalikan</label>
                    <input type="date" name="tgl_mengembalikan" class="form-control">
                  </div>

                  <div class="form-group">Jumlah Meminjam</label>
                    <input type="text" name="jumlah_meminjam" class="form-control" placeholder="JUMLAH MEMINJAM">
                  </div>

                  <div class="form-group">Jumlah Mengembalikan</label>
                    <input type="text" name="jumlah_mengembalikan" class="form-control" placeholder="JUMLAH MENGEMBALIKAN">
                  </div>

                  <div class="form-group">Bulan</label>
                    <select type="text" name="bulan" class="form-control">
                      <option selected disabled>Bulan</option>
                      <option value="Januari">Januari</option>
                      <option Value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option Value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">September</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                  </div>

                  <div class="form-group">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="KETERANGAN">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="form-group">
                  <a href="?page=transaksi" class="btn btn-danger">Batal</a>

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
    $query = "SELECT *, nama_siswa, jurusan, kelas, telepon, judul_buku, nama_petugas FROM transaksi 
  JOIN siswa ON transaksi.id_siswa = siswa.id_siswa 
  JOIN petugas ON transaksi.id_petugas = petugas.id_petugas 
  JOIN buku ON transaksi.id_buku = buku.id_buku WHERE id_transaksi = $id";

    $data = mysqli_query($koneksi, $query);
    $row_transaksi = mysqli_fetch_assoc($data);

    $id_buku = $row_transaksi['id_buku'];
    $id_petugas = $row_transaksi['id_petugas'];
    $id_siswa = $row_transaksi['id_siswa'];

    $data_siswa = mysqli_query($koneksi, "SELECT id_siswa, nama_siswa, jurusan, telepon, kelas FROM siswa ");

    $data_petugas = mysqli_query($koneksi, "SELECT id_petugas, nama_petugas FROM petugas ");

    $data_buku = mysqli_query($koneksi, "SELECT id_buku, judul_buku FROM buku ");

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
                <h3 class="card-title">Edit Data Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="modules/transaksi.php?aksi=edit" method="POST">
                <div class="card-body">
                  <input type="hidden" name="id_transaksi" class="form-control" value="<?php echo $id; ?>">

                  <div class="form-group">Nama Siswa</label>
                    <select type="text" name="id_siswa" class="form-control" placeholder="NAMA SISWA">
                      <?php

                      echo '<option value="' . $id_siswa . '">' . $row_transaksi['nama_siswa'] . '</option>';
                      while ($row = mysqli_fetch_array($data_siswa)) {
                        echo '<option value=' . $row['id_siswa'] . '>' . $row['nama_siswa'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">Nama Petugas</label>
                    <select class="form-control" name="id_petugas" class="form-control" placeholder="NAMA SISWA">
                      <?php
                      echo '<option value="' . $id_petugas . '">' . $row_transaksi['nama_petugas'] . '</option>';
                      while ($row = mysqli_fetch_array($data_petugas)) {
                        echo '<option value=' . $row['id_petugas'] . '>' . $row['nama_petugas'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">Judul Buku</label>
                    <select type="text" name="id_buku" value="<?php echo $id ?>" class="form-control" placeholder="JUDUL BUKU">
                      <?php
                      echo '<option value="' . $id_buku . '">' . $row_transaksi['judul_buku'] . '</option>';
                      while ($row = mysqli_fetch_array($data_buku)) {
                        echo '<option value=' . $row['id_buku'] . '>' . $row['judul_buku'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">Tanggal Meminjam</label>
                    <input type="date" class="form-control" name="tgl_pinjam" value="<?php echo $row_transaksi['tgl_pinjam'] ?>">
                  </div>

                  <div class="form-group">Tanggal Mengembalikan</label>
                    <input type="date" class="form-control" name="tgl_mengembalikan" value="<?php echo $row_transaksi['tgl_mengembalikan'] ?>">
                  </div>

                  <div class="form-group">Jumlah Meminjam</label>
                    <input type="text" class="form-control" name="jumlah_dipinjam" value="<?php echo $row_transaksi['jumlah_dipinjam'] ?>">
                  </div>

                  <div class="form-group">Jumlah Mengembalikan</label>
                    <input type="text" class="form-control" name="jumlah_mengembalikan" value="<?php echo $row_transaksi['jumlah_mengembalikan'] ?>">
                  </div>

                  <div class="form-group">Bulan</label>
                    <select type="text" name="bulan" class="form-control">
                      <option selected disabled>Bulan</option>
                      <option value="Januari">Januari</option>
                      <option Value="Februari">Februari</option>
                      <option value="Maret">Maret</option>
                      <option value="April">April</option>
                      <option value="Mei">Mei</option>
                      <option value="Juni">Juni</option>
                      <option Value="Juli">Juli</option>
                      <option value="Agustus">Agustus</option>
                      <option value="September">September</option>
                      <option value="Oktober">Oktober</option>
                      <option value="November">November</option>
                      <option value="Desember">Desember</option>
                    </select>
                  </div>

                  <div class="form-group">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="<?php echo $row_transaksi['keterangan'] ?>">
                  </div>

                  <!-- /.card-body -->
                  <div class="form-group">
                    <a href="?page=transaksi" class="btn btn-danger">Batal</a>

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