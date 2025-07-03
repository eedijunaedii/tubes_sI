<?php
// Perhatikan: path koneksi.php sudah diubah sesuai dengan yang Anda berikan
require './connection/koneksi.php'; // Atau '../koneksi.php' jika koneksi.php langsung di root

// Ambil Session
session_start();

// Cek apakah id_user sudah diset dalam sesi
// Jika tidak, arahkan ke halaman login
if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php"); // Path ini diasumsikan dari folder function ke root/login.php
    exit;
}

$id_user = $_SESSION['id_user'];

// Ambil data user dari database berdasarkan id_user
$querySession = mysqli_query(
    $koneksi,
    "SELECT * 
       FROM `user` 
      WHERE `id_user` = '$id_user'"
) or die("Query session error: " . mysqli_error($koneksi));

// Cek apakah query mengembalikan baris
if (mysqli_num_rows($querySession) > 0) {
    // Ambil array asosiatif
    $rowSession = mysqli_fetch_assoc($querySession);
    // Sekarang baris ini aman, karena kita sudah tahu 'nama' ada
    $_SESSION['nama'] = $rowSession['nama'];
} else {
    // Kalau tidak ada record, bisa redirect ke login atau set default
    header("Location: ./login.php");
    exit;
}

// Setting User (data untuk modal pengaturan akun)
$sqlEditUser = "SELECT * FROM user WHERE id_user = '$id_user'";
$querySetting = mysqli_query($koneksi, $sqlEditUser);
$rowSet = mysqli_fetch_array($querySetting);

if (isset($_POST["eksekusiEdit"])) {
    $id_user_post = $_POST["id_user"]; // Menggunakan nama variabel berbeda untuk menghindari konflik
    $password_lama = $_POST["password_lama"];
    $password_baru = $_POST["password_baru"];
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $no_hp = $_POST["no_hp"];

    if (empty($password_baru)) { // Menggunakan empty() untuk cek string kosong
        $querySet = mysqli_query($koneksi, "UPDATE user SET username='$username', nama='$nama', no_hp='$no_hp' WHERE id_user='$id_user_post'") or die(mysqli_error($koneksi)); // Tambahkan mysqli_error untuk debugging
        if ($querySet) {
            echo "
                    <script>
                        alert('Berhasil Update User!');
                        document.location.href = 'dashboard.php'; // Arahkan ke dashboard universal
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Gagal Update User!');
                        document.location.href = 'dashboard.php'; // Arahkan ke dashboard universal
                    </script>
                ";
        }
    } else {
        // Memeriksa password lama sebelum update password baru
        $check_password_query = mysqli_query($koneksi, "SELECT password FROM user WHERE id_user='$id_user_post'") or die(mysqli_error($koneksi));
        $current_password_row = mysqli_fetch_array($check_password_query);
        $current_hashed_password = $current_password_row['password'];

        if (SHA1($password_lama) === $current_hashed_password) {
            $querySet = mysqli_query($koneksi, "UPDATE user SET password=SHA1('$password_baru'),username='$username', nama='$nama', no_hp='$no_hp' WHERE id_user='$id_user_post'") or die(mysqli_error($koneksi));
            if ($querySet) {
                echo "
                        <script>
                            alert('Berhasil Update User dan Password!');
                            document.location.href = 'dashboard.php'; // Arahkan ke dashboard universal
                        </script>
                    ";
            } else {
                echo "
                        <script>
                            alert('Gagal Update User!');
                            document.location.href = 'dashboard.php'; // Arahkan ke dashboard universal
                        </script>
                    ";
            }
        } else {
            echo "
                    <script>
                        alert('Password lama salah!');
                        document.location.href = 'dashboard.php'; // Arahkan ke dashboard universal
                    </script>
                ";
        }
    }
}
