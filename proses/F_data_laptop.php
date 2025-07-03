<?php
require './connection/koneksi.php';
require 'session.php';

// Read Data Produk
$queryRead = mysqli_query($koneksi, "SELECT * FROM data_produk")
    or die('Query Read Error: ' . mysqli_error($koneksi));

// Create Data Produk
if (isset($_POST['createData'])) {
    $nama      = $_POST['nama'];
    $merek     = $_POST['merek'];
    $kategori  = $_POST['kategori'];
    $stok      = $_POST['stok'];
    $harga     = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    // Generate new ID: LTP + 7-digit number
    $queryID = mysqli_query($koneksi, "SELECT MAX(id_produk) AS id_terbesar FROM data_produk")
        or die('Query ID Error: ' . mysqli_error($koneksi));
    $data  = mysqli_fetch_assoc($queryID);
    $last  = $data['id_terbesar'];
    $num   = intval(substr($last, 3)) + 1;
    $idNew = 'LTP' . sprintf('%07d', $num);

    // Insert tanpa gambar
    $sql = "INSERT INTO data_produk
        (id_produk, nama, merek, kategori, stok, harga, deskripsi)
        VALUES
        ('$idNew', '$nama', '$merek', '$kategori', '$stok', '$harga', '$deskripsi')";
    $create = mysqli_query($koneksi, $sql)
        or die('Create Error: ' . mysqli_error($koneksi));

    if ($create) {
        echo "<script>
            alert('Data berhasil ditambahkan!');
            window.location.replace('data_produk.php');
        </script>";
    }
}

// Edit Data Produk
if (isset($_POST['editData'])) {
    $id_produk = $_POST['id_produk'];
    $nama      = $_POST['nama'];
    $merek     = $_POST['merek'];
    $kategori  = $_POST['kategori'];
    $stok      = $_POST['stok'];
    $harga     = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "UPDATE data_produk SET
        nama='$nama', merek='$merek', kategori='$kategori',
        stok='$stok', harga='$harga', deskripsi='$deskripsi'
        WHERE id_produk='$id_produk'";
    $update = mysqli_query($koneksi, $sql)
        or die('Update Error: ' . mysqli_error($koneksi));

    if ($update) {
        echo "<script>
            alert('Data $id_produk berhasil diupdate!');
            window.location.replace('data_produk.php');
        </script>";
    }
}

// Delete Data Produk
if (isset($_POST['hapusData'])) {
    $id_produk = $_POST['id_produk'];

    $sql    = "DELETE FROM data_produk WHERE id_produk='$id_produk'";
    $delete = mysqli_query($koneksi, $sql)
        or die('Delete Error: ' . mysqli_error($koneksi));

    if ($delete) {
        echo "<script>
            alert('Data $id_produk berhasil dihapus!');
            window.location.replace('data_produk.php');
        </script>";
    }
}

// Search Data Produk
if (isset($_POST['searchData'])) {
    $cari      = $_POST['pencarian'];
    $sqlSearch = "SELECT * FROM data_produk WHERE
        id_produk LIKE '%$cari%' OR
        nama      LIKE '%$cari%' OR
        merek     LIKE '%$cari%' OR
        kategori  LIKE '%$cari%' OR
        stok      LIKE '%$cari%' OR
        harga     LIKE '%$cari%' OR
        deskripsi LIKE '%$cari%'
    ";
    $queryRead = mysqli_query($koneksi, $sqlSearch)
        or die('Search Error: ' . mysqli_error($koneksi));
}
?>
