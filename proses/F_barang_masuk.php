<?php
    require './connection/koneksi.php';
    require 'session.php';
    
//Read Data Produk
    $queryRead = mysqli_query($koneksi, "SELECT id_produk, merek, nama, stok FROM data_produk");
//Read id_produk
    $queryID = mysqli_query($koneksi, "SELECT id_produk FROM data_produk");
//Transaksi
    $nowID = "";
    if(isset($_POST["pilihID"])){
        $id_produk = $_POST['id_produk'];
        $nowID = $id_produk;
        $queryGetID = mysqli_query($koneksi, "SELECT nama, merek FROM data_produk WHERE id_produk='$id_produk'");
        $getRow = mysqli_fetch_array($queryGetID);
    }
    if(!isset($_POST["pilihID"])){
        $getRow['nama'] = "";
        $getRow['merek'] = "";
    }
    if(isset($_POST["prosesMasuk"])){
        $queryID = mysqli_query($koneksi, "SELECT max(id_masuk) as id_terbesar FROM barang_masuk");
        $data = mysqli_fetch_array($queryID);
        $id_masuk = $data['id_terbesar'];
        $urutan = (int) substr($id_masuk, 3, 7);
        $urutan++;
        $huruf = "MSK";
        $id_masuk = $huruf . sprintf("%07s", $urutan);
        $id_produk = $_POST['id_produk'];
        $id_user = $_SESSION['id_user'];
        $nama_user = $_SESSION['nama'];
        $jumlah = $_POST['jumlah'];
        $queryCreate = "INSERT INTO barang_masuk VALUES ('$id_masuk','$id_user','$id_produk',NOW(),'$nama_user','$jumlah','Masuk')";
        $queryUpdate = "UPDATE data_produk SET stok=stok+$jumlah WHERE id_produk='$id_produk'";
        $createData = mysqli_query($koneksi, $queryCreate);
        $updateData = mysqli_query($koneksi, $queryUpdate);
        if ($createData AND $updateData){
            echo "<script>alert('Transaksi berhasil diproses!')
            window.location.replace('barang_masuk.php');</script>";
        }
    }
//Pencarian Data
    if(isset($_POST["searchData"])){
        $cari = $_POST["pencarian"];
        $queryRead = mysqli_query($koneksi, "SELECT id_produk, merek, nama, stok FROM data_produk WHERE id_produk LIKE '%$cari%' OR nama LIKE '%$cari%' OR merek LIKE '%$cari%'");
    }
?>