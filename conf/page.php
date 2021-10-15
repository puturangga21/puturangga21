<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];
switch ($page) {
// Beranda
  case 'data_mahasiswa':
    include 'halaman/beranda.php';
    break;
  }
}else{
    include "halaman/beranda.php";
  }
?>