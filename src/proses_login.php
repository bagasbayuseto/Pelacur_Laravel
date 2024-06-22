<?php
session_start(); // Mulai sesi
include "../config/connected.php"; // Pastikan ini sesuai dengan lokasi file connected.php
// Pastikan Anda telah mengatur koneksi ke database sebelumnya

// Simpan data form login
$username = $_POST['username'];
$password = $_POST['password'];

// Validasi data form (contoh: pastikan tidak kosong)
if (empty($username) || empty($password)) {
    $_SESSION['success_message'] = 'Username dan password harus diisi.';
    $_SESSION['color_message'] = 'danger';
    header('Location: ' . $url); // Redirect kembali ke halaman login
    exit();
}

// Cek apakah username dan password valid (cocokkan dengan data di database)
$query = "SELECT * FROM pengelola WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Username ditemukan, cek password
    $user_data = mysqli_fetch_assoc($result);
    if (password_verify($password, $user_data['password'])) {
        // Password cocok, autentikasi berhasil
        $_SESSION['success_message'] = 'Selamat Kepada ' . $username . ' Berhasil Login';
        $_SESSION['color_message'] = 'success'; // Set warna pesan notifikasi
        header('Location: ' . $url . 'admin/index.php'); // Redirect ke halaman yang sesuai setelah login
        exit();
    } else {
        // Password tidak cocok
        $_SESSION['success_message'] = 'Username atau password salah.';
        $_SESSION['color_message'] = 'danger'; // Set warna pesan notifikasi
        header('Location: ' . $url); // Redirect kembali ke halaman login
        exit();
    }
} else {
    // Username tidak ditemukan
    $_SESSION['success_message'] = 'Username atau password salah.';
    $_SESSION['color_message'] = 'danger'; // Set warna pesan notifikasi
    header('Location: ' . $url); // Redirect kembali ke halaman login
    exit();
}
