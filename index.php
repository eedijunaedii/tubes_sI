<?php
    require './connection/koneksi.php'; // Tetap butuh koneksi jika nanti ada pemeriksaan login
    session_start(); // Tetap butuh start session jika ada data sesi login
    
    // Periksa apakah pengguna sudah login (misal, ada ID pengguna di sesi)
    if (isset($_SESSION['id_user'])) {
        // Jika sudah login, arahkan ke dashboard utama (misal, index.php di root atau halaman dashboard yang disatukan)
        // Anda perlu membuat satu halaman dashboard universal jika folder admin/staff disatukan.
        header("Location: dashboard.php"); // Contoh: Arahkan ke dashboard.php (jika Anda membuat satu dashboard universal)
        exit;
    } else {
        // Jika belum login, selalu arahkan ke halaman login
        header("Location: login.php");
        exit;
    }
?>