<?php
session_start();
unset($_SESSION['login/login']);
session_destroy();

header("Location:login/login.php?pesan=logout");
