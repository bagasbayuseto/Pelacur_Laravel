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

    // Tampilkan pesan notifikasi sebagai toast Bootstrap 5
    echo '<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
              <div class="toast align-items-center text-white bg-' . $color_message . ' border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="d-flex">
                      <div class="toast-body">
                          ' . $success_message . '
                      </div>
                      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
              </div>
          </div>';
}
?>
<script>
    // Fungsi untuk menutup toast setelah beberapa detik
    setTimeout(function() {
        var toastElement = document.querySelector('.toast');
        var toast = new bootstrap.Toast(toastElement);
        toast.hide();
    }, 5000); // Waktu penutupan dalam milidetik (misalnya 3000 untuk 3 detik)
</script>