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

        $nis            = $_POST['nis'];
        $nama_siswa     = $_POST['nama_siswa'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $jurusan        = $_POST['jurusan'];
        $kelas          = $_POST['kelas'];
        $telepon        = $_POST['telepon'];
        // Data sudah ditangkap namun belum dimasukan ke database

        mysqli_query($koneksi, "INSERT INTO siswa VALUES(null,'$nis','$nama_siswa','$jenis_kelamin','$jurusan','$kelas','$telepon')");

        echo    "<script>
                Swal.fire({
                    title: 'Oke!',
                    text: 'Kamu Menambah Data Siswa!',
                    icon: 'success'
                }).then(function(){
                    window.location = '../index.php?page=siswa';
                });
               </script>";

        break;


    case 'edit':

        $id             = $_POST['id_siswa'];
        $nis            = $_POST['nis'];
        $nama_siswa     = $_POST['nama_siswa'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $jurusan        = $_POST['jurusan'];
        $kelas          = $_POST['kelas'];
        $telepon        = $_POST['telepon'];
        // Data sudah ditangkap namun belum dimasukan ke database

        mysqli_query($koneksi, "UPDATE siswa SET
        nis             = '$nis', 
        nama_siswa      = '$nama_siswa', 
        jenis_kelamin   = '$jenis_kelamin', 
        jurusan         = '$jurusan', 
        kelas           = '$kelas', 
        telepon         = '$telepon'
        WHERE id_siswa  = '$id'
        ");

        echo    "<script>
                Swal.fire({
                    title: 'Oke!',
                    text: 'Kamu Mengedit Data Siswa!',
                    icon: 'success'
                }).then(function(){
                    window.location = '../index.php?page=siswa';
                });
               </script>";

        break;


    case 'hapus':

        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '$id'");

        echo    "<script>
                Swal.fire({
                title: 'Oke!',
                text: 'Data Siswa Berhasil Dihapus',
                imageUrl: 'https://unsplash.it/400/200',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                }).then(function(){
                    window.location = '../index.php?page=siswa';
                });
               </script>";

        break;
}
