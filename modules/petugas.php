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

        $nama_petugas      = $_POST['nama_petugas'];
        $jenis_kelamin     = $_POST['jenis_kelamin'];
        $jabatan           = $_POST['jabatan'];
        // Data sudah ditangkap namun belum dimasukan ke database

        mysqli_query($koneksi, "INSERT INTO petugas VALUES(null,'$nama_petugas','$jenis_kelamin','$jabatan')");

        echo    "<script>
                Swal.fire({
                    title: 'Oke!',
                    text: 'Kamu Menambah Data Petugas!',
                    icon: 'success'
                }).then(function(){
                    window.location = '../index.php?page=petugas';
                });
               </script>";

        break;

    case 'edit':

        $id                = $_POST['id_petugas'];
        $nama_petugas      = $_POST['nama_petugas'];
        $jenis_kelamin     = $_POST['jenis_kelamin'];
        $jabatan           = $_POST['jabatan'];
        // Data sudah ditangkap namun belum dimasukan ke database

        mysqli_query($koneksi, "UPDATE petugas SET
        nama_petugas      ='$nama_petugas',
        jenis_kelamin     ='$jenis_kelamin',
        jabatan           ='$jabatan'
        WHERE id_petugas  ='$id'
        ");

        echo    "<script>
                Swal.fire({
                    title: 'Oke!',
                    text: 'Kamu Mengedit Data Petugas!',
                    icon: 'success'
                }).then(function(){
                    window.location = '../index.php?page=petugas';
                });
               </script>";

        break;

    case 'hapus':

        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = '$id'");

        echo    "<script>
                Swal.fire({
                title: 'Oke!',
                text: 'Data Siswa Berhasil Dihapus',
                imageAlt: 'Custom image',
                imageUrl: 'https://unsplash.it/400/200',
                }).then(function(){
                    window.location = '../index.php?page=petugas';
                });
               </script>";

        break;
}
