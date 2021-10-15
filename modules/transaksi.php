<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="../dist/sweetalert2/sweetalert2.css">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>

<body>
    <script src="../dist/sweetalert2/sweetalert2.min.js"></script>
    <script src="../dist/sweetalert2/sweetalert2.js"></script>
    <script src="../dist/sweetalert2/sweetalert2.all.js"></script>
    <script src="../dist/sweetalert2/sweetalert2.all.min.js"></script>
</body>

</html>

<?php

include("../koneksi/koneksi.php");

switch ($_GET['aksi']) {
    case 'tambah':

        $id_siswa               = $_POST['id_siswa'];
        $id_petugas             = $_POST['id_petugas'];
        $id_buku                = $_POST['id_buku'];
        $tgl_meminjam           = $_POST['tgl_meminjam'];
        $tgl_mengembalikan      = $_POST['tgl_mengembalikan'];
        $jumlah_meminjam        = $_POST['jumlah_meminjam'];
        $jumlah_mengembalikan   = $_POST['jumlah_mengembalikan'];
        $bulan                  = $_POST['bulan'];
        $keterangan             = $_POST['keterangan'];
        // Data sudah ditangkap namun belum dimasukan ke database

        mysqli_query($koneksi, "INSERT INTO transaksi VALUES(null,'$id_siswa','$id_petugas','$id_buku','$tgl_meminjam','$tgl_mengembalikan','$jumlah_meminjam','$jumlah_mengembalikan','$bulan','$keterangan')");

        echo    "<script>
                Swal.fire({
                    title: 'Oke!',
                    text: 'Kamu Menambah Data Transaksi!',
                    icon: 'success'
                }).then(function(){
                    window.location = '../index.php?page=transaksi';
                });
               </script>";

        break;

    case 'edit':

        $id                     = $_POST['id_transaksi'];
        $id_siswa               = $_POST['id_siswa'];
        $id_petugas             = $_POST['id_petugas'];
        $id_buku                = $_POST['id_buku'];
        $tgl_pinjam             = $_POST['tgl_pinjam'];
        $tgl_mengembalikan      = $_POST['tgl_mengembalikan'];
        $jumlah_dipinjam        = $_POST['jumlah_dipinjam'];
        $jumlah_mengembalikan   = $_POST['jumlah_mengembalikan'];
        $bulan                  = $_POST['bulan'];
        $keterangan             = $_POST['keterangan'];
        // Data sudah ditangkap namun belum dimasukan ke database

        mysqli_query($koneksi, "UPDATE transaksi SET
        id_siswa                 = '$id_siswa',
        id_petugas               = '$id_petugas',
        id_buku                  = '$id_buku',
        tgl_pinjam               = '$tgl_pinjam', 
        tgl_mengembalikan        = '$tgl_mengembalikan', 
        jumlah_dipinjam          = '$jumlah_dipinjam', 
        jumlah_mengembalikan     = '$jumlah_mengembalikan', 
        bulan                    = '$bulan', 
        keterangan               = '$keterangan'
        WHERE id_transaksi       = '$id'
        ");

        echo    "<script>
                Swal.fire({
                    title: 'Oke!',
                    text: 'Kamu Mengedit Data Transaksi!',
                    icon: 'success'
                }).then(function(){
                    window.location = '../index.php?page=transaksi';
                });
               </script>";

        break;

    case 'hapus':

        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id'");

        echo    "<script>
                Swal.fire({
                title: 'Oke!',
                text: 'Data Transaksi Berhasil Dihapus',
                imageUrl: 'https://unsplash.it/400/200',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                }).then(function(){
                    window.location = '../index.php?page=transaksi';
                });
               </script>";
}
?>