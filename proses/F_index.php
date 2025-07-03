<?php
    require './connection/koneksi.php';
    require 'session.php';
// Ambil Jumlah Data Laptop
    $queryData = mysqli_query($koneksi, "SELECT * FROM data_produk");
    $rowData = mysqli_num_rows($queryData);
// Ambil Jumlah Series Laptop
    // $querySeries = mysqli_query($koneksi, "SELECT DISTINCT series FROM data_produk");
    // $rowSeries = mysqli_num_rows($querySeries);
// Ambil Jumlah Stok di Gudang
    $queryStok = mysqli_query($koneksi, "SELECT SUM(stok) FROM data_produk");
    $rowStok = mysqli_fetch_array($queryStok);
// Ambil Jumlah Data Pengguna
    $queryPengguna = mysqli_query($koneksi, "SELECT * FROM user");
    $rowPengguna = mysqli_num_rows($queryPengguna);
?>
