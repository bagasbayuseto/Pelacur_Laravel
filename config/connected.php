<?php

//deklasrasi variabel
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "pelacur";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if ($conn) {
    // echo "Koneksi Berhasil!";
} else {
    echo "Koneksi Gagal! : " . mysqli_connect_error();
}

$url = "http://localhost/pelacur/";

$name_default = "PeLaCuR";
