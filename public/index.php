<?php

phpinfo();

//koneksi ke database
$conn = mysqli_connect("db","pmd","permadi","tes");

//ambil data dari tabel
$result = mysqli_query($conn, "SELECT * FROM user") or die( mysqli_error($conn));

//tampilkan data
$user1 = mysqli_fetch_row($result);
var_dump($user1);
?>