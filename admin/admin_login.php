<?php
// FILE: admin/login.php
session_start();
if (isset($_SESSION['admin_id'])) {
  header('Location: admin_dashboard.php');
  exit;
}

require_once '../config/koneksi.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';
  $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
  $stmt->execute([$username]);
  $admin = $stmt->fetch();
  if ($admin && password_verify($password, $admin['password'])) {
    $_SESSION['admin_id']   = $admin['id'];
    $_SESSION['admin_nama'] = $admin['nama'];
    header('Location: admin_dashboard.php');
    exit;
  } else {
    $error = 'Username atau password salah!';
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login – Bernada.ID</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet" />
  <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
  <link rel="manifest" href="../favicon_io/site.webmanifest">
  <style>
  :root {
  --red:    #cf3538; /* ml */
  --red-d:  #a10909; /* m */  
  --dark:   #1a1a1a;  /*g*/ /*c*/
  }
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-position: center;
      background-size: cover;
      background-image: url('../img/bg-admin.jpg');
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem
    }

    .box {
      background: #fff;
      box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .05), 0 4px 12px rgba(0, 0, 0, .1);
      border-radius: 16px;
      padding: 2.5rem 2rem;
      width: 100%;
      max-width: 380px
    }

    .brand {
      text-align: center;
      margin-bottom: 2rem
    }

    .brand a {
      font-weight: 600;
      text-decoration: none;
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      color: var(--dark);
    }
    
    .brand a span {
      font-family: 'Inter', serif;
      color: var(--red);
    }

    .brand p {
      font-size: 12px;
      color: #aaa;
      margin-top: 4px;
      letter-spacing: .05em
    }

    label {
      display: block;
      font-size: 13px;
      font-weight: 500;
      color: #444;
      margin-bottom: 5px
    }

    input {
      width: 100%;
      padding: 11px 14px;
      border: 1.5px solid #e0e0e0;
      border-radius: 9px;
      font-size: 14px;
      font-family: inherit;
      outline: none;
      margin-bottom: 1rem;
      background: #fafafa
    }

    input:focus {
      border-color: #C0393B;
      box-shadow: 0 0 0 3px rgba(192, 57, 59, .08);
      background: #fff
    }

    .btn {
      width: 100%;
      padding: 13px;
      background: #C0393B;
      color: #fff;
      border: none;
      border-radius: 9px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      font-family: inherit
    }

    .btn:hover {
      background: #8a2020
    }

    .err {
      background: #fdeaea;
      color: #a32d2d;
      border: 1px solid #f5c1c1;
      padding: 11px 14px;
      border-radius: 8px;
      font-size: 13px;
      margin-bottom: 1rem
    }

    .back {
      display: flex;
      justify-content: space-between;
      text-align: center;
      margin-top: 1rem;
      font-size: 13px;
      color: #aaa
    }

    .back a {
      color: #C0393B;
      text-decoration: none
    }
  </style>
</head>

<body>
  <div class="box">
    <div class="brand">
      <a href="../halaman.php" class="logo">BERNADA<span>.ID</span></a>
      <p>ADMIN PANEL</p>
    </div>
    <?php if ($error): ?>
      <div class="err"><?= $error ?></div>
    <?php endif ?>
    <form method="POST">
      <label>Username</label>
      <input type="text" name="username" placeholder="admin" required />
      <label>Password</label>
      <input type="password" name="password" placeholder="••••••••" required />
      <button type="submit" class="btn">Masuk</button>
    </form>
    <div class="back">
      <a href="../halaman.php">← Kembali ke Website</a>
      <a href="../admin/buat_akun.php">+ Buat Akun</a>
    </div>
  </div>
</body>

</html>