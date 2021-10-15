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
include '../koneksi/koneksi.php';

session_start();

$username = $_POST['username'];
$password = MD5($_POST['password']);

$row = mysqli_query($koneksi, "SELECT * FROM admin WHERE username ='$username' and password ='$password'");

$cek = mysqli_num_rows($row);

if ($cek > 0) {
    $_SESSION['username'] = $username;
    echo    "<script>
                Swal.fire({
                    title: 'Oke!',
                    text: 'Kamu Berhasil Login!',
                    icon: 'success'
                }).then(function(){
                    window.location = '../index.php';
                });
               </script>";
} else {
    header('location:login.php?pesan=username atau password salah');
}
