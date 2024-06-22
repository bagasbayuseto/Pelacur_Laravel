<?php
include "../config/connected.php"; // Pastikan ini sesuai dengan lokasi file connected.php
// Pengguna sudah login, tampilkan konten halaman admin
include "header.php";
include "navbar.php";
// Tampilkan konten admin
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    include "../target/target2.php";
    ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $name_default; ?></small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg">
                    <div class="card card-purple card-outline">
                        <div class="card-header">
                            <h5 class="card-title text-gray-dark">Data Tagihan</h5>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-sm table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM penyewa");
                                    $no = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['status'] ?></td>
                                            <td>
                                                <a href=""></a>
                                                <a href=""></a>
                                                <a href=""></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    function removeParametersAndRefresh() {
        var urlTanpaParameter = window.location.href.split('?')[0];
        window.history.replaceState(null, null, urlTanpaParameter);
        window.location.reload();
    }
</script>
<?php
include "../jobs/tambah/tambah_tagihan.php";
include "footer.php";
?>