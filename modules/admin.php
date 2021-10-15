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

        $username     = $_POST['username'];
        $password     = $_POST['password'];
        // Data sudah ditangkap namun belum dimasukan ke database

        mysqli_query($koneksi, "INSERT INTO admin VALUES(null,'$username','$password')");

        echo    "<script>
                Swal.fire({
                    title: 'Oke!',
                    text: 'Kamu Menambah Data Admin!',
                    icon: 'success'
                }).then(function(){
                    window.location = '../index.php?page=admin';
                });
               </script>";

        break;

    case 'edit':

        $id           = $_POST['id_admin'];
        $username     = $_POST['username'];
        $password     = $_POST['password'];
        // Data sudah ditangkap namun belum dimasukan ke database

        mysqli_query($koneksi, "UPDATE admin SET
        username        = '$username', 
        password        = '$password'
        WHERE id_admin  = '$id'
        ");

        echo    "<script>
                Swal.fire({
                    title: 'Oke!',
                    text: 'Kamu Mengedit Data Admin!',
                    icon: 'success'
                }).then(function(){
                    window.location = '../index.php?page=admin';
                });
               </script>";

        break;


    case 'hapus':

        $id = $_GET['id'];
        mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$id'");

        echo    "<script>
                Swal.fire({
                title: 'Oke!',
                text: 'Data Admin Berhasil Dihapus',
                imageUrl: 'https://unsplash.it/400/200',
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: 'Custom image',
                }).then(function(){
                    window.location = '../index.php?page=admin';
                });
               </script>";

        break;
}
