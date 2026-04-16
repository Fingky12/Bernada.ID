<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');        // default XAMPP
define('DB_PASS', '');            // default XAMPP (kosong)
define('DB_NAME', 'bernada');

// Konfigurasi Fonnte WhatsApp API
define('FONNTE_TOKEN', 'DK3J8xh2pyetxgj1dpC8');
define('ADMIN_WA',     '6281939195110'); // nomor WA admin, format 628xxx

// Konfigurasi Email (Gmail SMTP)
define('MAIL_HOST',     'smtp.gmail.com');
define('MAIL_PORT',     587);
define('MAIL_USER',     'bernada.id811@gmail.com');
define('MAIL_PASS',     'qkhl rwcs oocv zgin'); // App Password Gmail (bukan password biasa)
define('MAIL_FROM',     'bernada.id811@gmail.com');
define('MAIL_NAME',     'Bernada.ID');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($conn->connect_error){
  die("Koneksi gagal...");
  }else {
    echo "Koneksi berhasil...";
  }
  
?>