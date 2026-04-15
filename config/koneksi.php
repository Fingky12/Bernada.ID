<?php

$host = "localhost";
$user= "root";
$pass = "";
$db = "bernada";


// WA Admin – ganti dengan nomor WA kamu
$no_wa = "628123456789";  // format 628xxx

// Email – ganti dengan email Gmail kamu
$mail_user = "emailkamu@gmail.com";
$mail_pass = "xxxx xxxx xxxx xxxx"; // App Password (lihat Step 5)
$mail_from = "emailkamu@gmail.com";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
  die("Koneksi gagal...");
}


?>