<?php
    require './connection/koneksi.php';
    require 'session.php'; 
//Read Rekap Transaksi
    $sqlRead = "SELECT m.tgl_transaksi, m.keterangan, m.nama_user, d.nama, d.merek, m.jumlah 
    FROM barang_masuk m, data_produk d WHERE d.id_produk = m.id_produk 
    UNION SELECT k.tgl_transaksi, k.keterangan, k.nama_user, d.nama, d.merek, k.jumlah 
    FROM  barang_keluar k, data_produk d WHERE d.id_produk = k.id_produk ORDER BY tgl_transaksi";
    $queryRead = mysqli_query($koneksi, $sqlRead);
//Pencarian Data
    if(isset($_POST["searchData"])){
        $cari = $_POST["pencarian"];
        $sqlCari = "SELECT m.tgl_transaksi, m.keterangan, m.nama_user, d.nama, d.merek, m.jumlah 
        FROM barang_masuk m, data_produk d WHERE d.id_produk = m.id_produk AND (
        tgl_transaksi LIKE '%$cari%' OR 
        keterangan LIKE '%$cari%' OR 
        nama_user LIKE '%$cari%' OR  
        nama LIKE '%$cari%' OR 
        merek LIKE '%$cari%') 
        UNION SELECT k.tgl_transaksi, k.keterangan, k.nama_user, d.nama, d.merek, k.jumlah 
        FROM  barang_keluar k, data_produk d WHERE d.id_produk = k.id_produk AND (
        tgl_transaksi LIKE '%$cari%' OR 
        keterangan LIKE '%$cari%' OR 
        nama_user LIKE '%$cari%' OR  
        nama LIKE '%$cari%' OR 
        merek LIKE '%$cari%') 
        ORDER BY tgl_transaksi";
        $queryRead = mysqli_query($koneksi, $sqlCari);
    }
?>
