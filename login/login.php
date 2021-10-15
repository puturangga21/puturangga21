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

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "belum login") {
        echo    "<script>
                Swal.fire({
                    title: 'Woy!',
                    text: 'Silahkan Login Terlebih dahulu!',
                    icon: 'warning'
                })
               </script>";
    } elseif (($_GET['pesan'] == "username atau password salah")) {
        echo    "<script>
                Swal.fire({
                    title: 'Woy!',
                    text: 'Username atau Password Yang Anda Masukkan Salah!',
                    icon: 'warning'
                })
               </script>";
    } elseif (($_GET['pesan'] == "logout")) {
        echo    "<script>
                Swal.fire({
                    title: 'Oke Deh!',
                    text: 'Anda Sudah Keluar!',
                    icon: 'success'
                })
               </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>


        <div class="form-container">
            <h1>login</h1>
            <form action="cek_login.php" method="POST">
                <div class="control">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="control">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <span><input type="checkbox">Ingat Saya</span>

                <div class="control">
                    <input type="submit" value="login">
                </div>

            </form>
            <div class="link">
                <a href="#">Lupa Password?</a>
            </div>

            <div class="link">
                <a href="#">Registrasi</a>
            </div>
        </div>
    </section>
</body>

</html>