<!DOCTYPE html>
<html>
<head>
    <body>
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
                    // adminnya adalah nama di database
                    $query  = mysqli_query($koneksi,"SELECT * FROM transaksi");
                    $no = 1;

                    while
                        ($row = mysqli_fetch_array($query))

                    {
                        echo "
                            <tr>
                                <td>".$no."</td> 
                                <td>".$row['id_siswa']."</td>
                                <td>".$row['id_petugas']."</td>
                                <td>".$row['id_buku']."</td>
                                <td>".$row['tgl_pinjam']."</td>
                                <td>".$row['tgl_mengembalikan']."</td>
                                <td>".$row['jumlah_dipinjam']."</td>
                                <td>".$row['jumlah_mengembalikan']."</td>
                                <td>".$row['bulan']."</td>
                                <td>".$row['keterangan']."</td>
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