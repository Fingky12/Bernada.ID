<?php
session_start();
require_once 'config/koneksi.php';
$name = $_SESSION['name'] ?? null;
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Hubungi Kami – Bernada.ID</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/footer_header.css">
    <link rel="stylesheet" href="css/kontak.css">
  </head>
  <body>

  <?php include("./header/inc_header_second.php") ?>

  <div class="contact-title reveal">
    <h2 class="contact-title-tag">Contact</h2>
    <h1>Hubungi Kami</h1>
    <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi kami melalui kontak berikut:</p>
  </div>
  <div class="contact-container">
    <div class="image">
      <img src="img/contact-image.png" alt="Contact Us Image"/>
    </div>
    <div class="contact-wrapper reveal">
      <div class="contact-card">
        <i class='bx bxs-phone-call'></i>
        <h3>Telepon</h3>
        <p>+62 819-3919-5110</p>
      </div>
      <div class="contact-card">
        <i class='bx bxs-envelope'></i>
        <h3>Email</h3>
        <p>bernada.id811@gmail.com</p>
      </div>
    </div>
  </div>

<?php include("./footer/inc_footer_second.php") ?>
<script src="script.js"></script>
</body>
</html>