<?php
session_start();
require_once ('connect.php');
$usrname = $_POST['username'];
$pass = $_POST['password'];
$cekuser = mysqli_query($connect,"SELECT * FROM pegawai WHERE username = '$usrname'");
$hasil = mysqli_fetch_array($cekuser);
$jumlah = mysqli_num_rows($cekuser);
if ( $jumlah == 0 ) {
    echo 'User ID Belum Terdaftar!<br/>';
    echo '<a href="index.php">&laquo; Back</a>';
} else {
    if ( $pass <> $hasil['password'] ) {
        echo 'Password Salah!<br/>';
        echo '<a href="index.php">&laquo; Back</a>';
    } else {
    	header("location: lapor.php");

    }
}
?>