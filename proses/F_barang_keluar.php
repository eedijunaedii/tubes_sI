<?php
require './connection/koneksi.php';
require 'session.php';
//Read Data Laptop
$queryRead = mysqli_query($koneksi, "SELECT id_produk, merek, nama, stok FROM data_produk");
//Read id_produk
$queryID = mysqli_query($koneksi, "SELECT id_produk FROM data_produk");
//Transaksi
$nowID = "";
if (isset($_POST["pilihID"])) {
    $id_produk = $_POST['id_produk'];
    $nowID = $id_produk;
    $queryGetID = mysqli_query($koneksi, "SELECT nama, merek FROM data_produk WHERE id_produk='$id_produk'");
    $getRow = mysqli_fetch_array($queryGetID);
}
if (!isset($_POST["pilihID"])) {
    $getRow['nama'] = "";
    $getRow['merek'] = "";
}
if (isset($_POST["prosesKeluar"])) {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    // Ambil stok saat ini dari database
    $queryStok = mysqli_query($koneksi, "SELECT stok FROM data_produk WHERE id_produk='$id_produk'");
    $dataStok = mysqli_fetch_array($queryStok);
    $stok_saat_ini = $dataStok['stok'];

    // Validasi: Pastikan jumlah keluar tidak melebihi stok yang tersedia
    if ($jumlah > $stok_saat_ini) {
        echo "<script>alert('Stok tidak cukup untuk transaksi ini! Stok tersedia: " . $stok_saat_ini . "');
            window.location.replace('barang_keluar.php');</script>";
    } else {
        // Lanjutkan proses transaksi jika stok mencukupi
        $queryID = mysqli_query($koneksi, "SELECT max(id_keluar) as id_terbesar FROM barang_keluar");
        $data = mysqli_fetch_array($queryID);
        $id_keluar = $data['id_terbesar'];
        $urutan = (int) substr($id_keluar, 3, 7);
        $urutan++;
        $huruf = "KLR";
        $id_keluar = $huruf . sprintf("%07s", $urutan);

        $id_user = $_SESSION['id_user'];
        $nama_user = $_SESSION['nama'];

        $queryCreate = "INSERT INTO barang_keluar VALUES ('$id_keluar','$id_user','$id_produk',NOW(),'$nama_user','$jumlah','Keluar')";
        $queryUpdate = "UPDATE data_produk SET stok=stok-$jumlah WHERE id_produk='$id_produk'";

        $createData = mysqli_query($koneksi, $queryCreate);
        $updateData = mysqli_query($koneksi, $queryUpdate);

        if ($createData and $updateData) {
            echo "<script>alert('Transaksi berhasil diproses!');
                window.location.replace('barang_keluar.php');</script>";
        } else {
            // Tambahkan penanganan kesalahan jika kueri gagal
            echo "<script>alert('Terjadi kesalahan saat memproses transaksi! " . mysqli_error($koneksi) . "');
                window.location.replace('barang_keluar.php');</script>";
        }
    }
}
//Pencarian Data
if (isset($_POST["searchData"])) {
    $cari = $_POST["pencarian"];
    $queryRead = mysqli_query($koneksi, "SELECT id_produk, merek, nama, stok FROM data_produk WHERE id_produk LIKE '%$cari%' OR nama LIKE '%$cari%' OR merek LIKE '%$cari%'");
}
