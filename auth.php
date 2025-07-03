<?php
// Tampilkan semua error (untuk development; di production matikan)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mulai session di awal
session_start();

// Koneksi database
require './connection/koneksi.php';

// Proses login
if (isset($_POST["signIn"])) {
    // Sanitasi input
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $pass     = mysqli_real_escape_string($koneksi, $_POST["password"]);

    // Query
    $sql = "SELECT id_user, username, nama 
            FROM user 
            WHERE username='$username' 
              AND password=SHA1('$pass')
            LIMIT 1";
    $result = mysqli_query($koneksi, $sql);

    // Cek hasil
    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Set sesi
        $_SESSION['id_user']  = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama']     = $row['nama'];

        // Redirect—pastikan file dashboard.php memang ada
        header("Location: dashboard.php");
        exit;
    } 

    // Jika gagal
    echo "<script>alert('Username atau Password salah!');</script>";
}
?>
