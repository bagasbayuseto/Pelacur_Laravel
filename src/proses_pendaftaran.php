<?php
include "../config/connected.php"; // Pastikan ini sesuai dengan lokasi file connected.php
// Pastikan Anda telah mengatur koneksi ke database sebelumnya

if (isset($_POST['proses_pendaftaran'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi data di sini sesuai kebutuhan

    // Contoh validasi: Pastikan semua kolom tidak kosong
    if (empty($nama) || empty($username) || empty($password)) {
        echo "Semua kolom harus diisi.";
        exit; // Hentikan proses jika ada kolom yang kosong
    }

    // Hash password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data ke dalam database
    $query = "INSERT INTO pengelola (nama, username, password) VALUES ('$nama', '$username', '$hashed_password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Mulai sesi PHP
        session_start();

        // Simpan pesan notifikasi ke dalam sesi
        $_SESSION['success_message'] = 'Selamat Kepada ' . $nama . ' Yang Telah Mendaftar Silahkan Login';

        // Set warna pesan notifikasi
        $_SESSION['color_message'] = 'success';

        header('Location: ' . $url);
        exit(); // Pastikan tidak ada kode PHP yang dijalankan setelah header
    } else {
        die("Query Failed.");
    }
}
