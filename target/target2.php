<?php
// Mulai sesi PHP
session_start();

// Jika ada pesan notifikasi, tampilkan dan hapus dari sesi
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    $color_message = $_SESSION['color_message'];

    // Hapus notifikasi dari sesi agar tidak ditampilkan lagi
    unset($_SESSION['success_message']);
    unset($_SESSION['color_message']);

    // Tampilkan pesan notifikasi sebagai toast Bootstrap
    echo '<div class="container position-relative bottom-0 end-0 p-3">
                <div class="toast align-items-center text-white bg-' . $color_message . ' border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                    <div class="d-flex">
                        <div class="toast-body">
                            <strong>Selamat</strong> ' . $success_message . ' <strong>x</strong>
                        </div>
                    </div>
                </div>
            </div>';
}
?>
<script>
    // Inisialisasi toast Bootstrap
    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
    var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl);
    });

    // Fungsi untuk menutup toast setelah 3 detik
    setTimeout(function() {
        toastList.forEach(function(toast) {
            toast.hide();
        });
    }, 3000); // Waktu penutupan dalam milidetik (misalnya 3000 untuk 3 detik)
</script>