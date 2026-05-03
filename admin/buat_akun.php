<?php
// ============================================
// FILE: admin/register.php
// Buat akun admin baru — HAPUS setelah pakai!
// ============================================
session_start();
require_once '../config/koneksi.php';

// ── KUNCI KEAMANAN ──────────────────────────
// Ganti kode ini, hanya yang tahu kode ini yang bisa daftar
define('REGISTER_KEY', 'bernada280326');
// ────────────────────────────────────────────

$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $key      = trim($_POST['register_key'] ?? '');
  $username = trim($_POST['username']     ?? '');
  $nama     = trim($_POST['nama']         ?? '');
  $password = $_POST['password']          ?? '';
  $konfirm  = $_POST['konfirmasi']        ?? '';

  // Validasi kunci
  if ($key !== REGISTER_KEY) {
    $error = 'Kunci registrasi salah!';
    // Validasi field
  } elseif (!$username || !$nama || !$password) {
    $error = 'Semua field wajib diisi!';
  } elseif (strlen($username) < 4) {
    $error = 'Username minimal 4 karakter!';
  } elseif (strlen($password) < 6) {
    $error = 'Password minimal 6 karakter!';
  } elseif ($password !== $konfirm) {
    $error = 'Konfirmasi password tidak cocok!';
  } else {
    // Cek username sudah ada
    $cek = $pdo->prepare("SELECT id FROM admin WHERE username = ?");
    $cek->execute([$username]);
    if ($cek->rowCount() > 0) {
      $error = "Username '{$username}' sudah digunakan!";
    } else {
      // Simpan
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $pdo->prepare("INSERT INTO admin (username, password, nama) VALUES (?,?,?)")
        ->execute([$username, $hash, $nama]);
      $success = $username;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Admin – Bernada.ID</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ballet:opsz@16..72&family=Bebas+Neue&family=Carattere&family=DM+Serif+Display:ital@0;1&family=DM+Serif+Text:ital@0;1&family=Dancing+Script:wght@400..700&family=Dosis:wght@200..800&family=Imperial+Script&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lexend+Deca:wght@100..900&family=Lexend+Giga:wght@100..900&family=Libre+Baskerville:ital,wght@0,400..700;1,400..700&family=Lilita+One&family=Luxurious+Script&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Oswald:wght@200..700&family=Permanent+Marker&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sacramento&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&family=Tangerine:wght@400;700&family=Varela+Round&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
  <link rel="manifest" href="../favicon_io/site.webmanifest">
<style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --r: #C0393B;
      --rl: #fff5f5;
      --dark: #1a1a1a;
      --gray: #5a5a5a;
      --border: #e0e0e0;
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
      padding: 1.5rem;
    }

    .box {
      background: #fff;
      border-radius: 16px;
      padding: 2.5rem 2rem;
      width: 100%;
      max-width: 420px;
    }

    .brand {
      text-align: center;
      margin-bottom: 2rem;
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
      color: var(--r);
    }

    .brand p {
      font-size: 12px;
      color: #aaa;
      margin-top: 4px;
    }

    .field {
      margin-bottom: 1rem;
    }

    label {
      display: block;
      font-size: 13px;
      font-weight: 500;
      color: #444;
      margin-bottom: 5px;
    }

    label .req {
      color: var(--r);
    }

    .input-wrap {
      position: relative;
    }

    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 11px 42px 11px 14px;
      border: 1.5px solid var(--border);
      border-radius: 9px;
      font-size: 14px;
      font-family: inherit;
      color: var(--dark);
      background: #fafafa;
      outline: none;
      transition: all .2s;
    }

    input:focus {
      border-color: var(--r);
      box-shadow: 0 0 0 3px rgba(192, 57, 59, .08);
      background: #fff;
    }

    .input-icon {
      position: absolute;
      right: 13px;
      top: 50%;
      transform: translateY(-50%);
      color: #aaa;
      font-size: 18px;
      cursor: pointer;
    }

    .input-icon:hover {
      color: var(--r);
    }

    .strength-bar {
      height: 3px;
      border-radius: 2px;
      margin-top: 5px;
      background: #eee;
      overflow: hidden;
    }

    .strength-fill {
      height: 100%;
      width: 0%;
      transition: width .3s, background .3s;
      border-radius: 2px;
    }

    .strength-text {
      font-size: 11px;
      color: #aaa;
      margin-top: 3px;
    }

    .alert {
      padding: 12px 16px;
      border-radius: 9px;
      font-size: 14px;
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .alert-error {
      background: #fdeaea;
      color: #a32d2d;
      border: 1px solid #f5c1c1;
    }

    .alert-success {
      background: #eaf7f0;
      color: #1a6640;
      border: 1px solid #5cb88a;
    }

    .alert i {
      font-size: 18px;
    }

    .btn {
      width: 100%;
      padding: 13px;
      background: var(--r);
      color: #fff;
      border: none;
      border-radius: 9px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      font-family: inherit;
      transition: background .2s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 7px;
    }

    .btn:hover {
      background: #8a2020;
    }

    .divider {
      text-align: center;
      margin: 1.25rem 0;
      font-size: 13px;
      color: #aaa;
    }

    .link-login {
      display: block;
      text-align: center;
      padding: 11px;
      border: 1.5px solid var(--border);
      border-radius: 9px;
      color: var(--gray);
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      transition: all .2s;
    }

    .link-login:hover {
      border-color: var(--r);
      color: var(--r);
    }

    .success-box {
      text-align: center;
      padding: 1rem 0;
    }

    .success-icon {
      font-size: 3.5rem;
      margin-bottom: 1rem;
    }

    .success-box h3 {
      font-size: 18px;
      color: var(--dark);
      margin-bottom: .5rem;
    }

    .success-box p {
      font-size: 13px;
      color: var(--gray);
      margin-bottom: 1.25rem;
      line-height: 1.7;
    }

    .btn-login {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      padding: 12px 28px;
      background: var(--r);
      color: #fff;
      border-radius: 9px;
      text-decoration: none;
      font-size: 14px;
      font-weight: 600;
      transition: background .2s;
    }

    .btn-login:hover {
      background: #8a2020;
    }
  </style>
</head>

<body>
  <div class="box">

    <?php if ($success): ?>
      <!-- SUCCESS STATE -->
      <div class="success-box">
        <div class="success-icon">🎉</div>
        <h3>Akun Berhasil Dibuat!</h3>
        <p>Akun admin <strong><?= htmlspecialchars($success) ?></strong> sudah aktif.<br>
          Silakan login sekarang.</p>
        <a href="../admin/admin_login.php" class="btn-login"><i class='bx bx-log-in'></i> Login Sekarang</a>
      </div>

    <?php else: ?>
      <!-- FORM STATE -->
      <div class="brand">
        <a href="../halaman.php" class="logo">BERNADA<span>.ID</span></a>
        <p>DAFTAR AKUN ADMIN</p>
      </div>

      <?php if ($error): ?>
        <div class="alert alert-error"><i class='bx bxs-error-circle'></i><?= $error ?></div>
      <?php endif ?>

      <form method="POST" autocomplete="off">

        <div class="field">
          <label>Kunci Registrasi <span class="req">*</span></label>
          <div class="input-wrap">
            <input type="password" name="register_key" id="regKey" placeholder="Masukkan kunci registrasi..." />
            <i class='bx bx-lock-alt input-icon' onclick="togglePass('regKey', this)"></i>
          </div>
        </div>

        <div class="field">
          <label>Nama Lengkap <span class="req">*</span></label>
          <div class="input-wrap">
            <input type="text" name="nama" placeholder="cth. Administrator" value="<?= htmlspecialchars($_POST['nama'] ?? '') ?>" />
            <i class='bx bx-user input-icon' style="cursor:default"></i>
          </div>
        </div>

        <div class="field">
          <label>Username <span class="req">*</span></label>
          <div class="input-wrap">
            <input type="text" name="username" placeholder="min. 4 karakter" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" />
            <i class='bx bx-at input-icon' style="cursor:default"></i>
          </div>
        </div>

        <div class="field">
          <label>Password <span class="req">*</span></label>
          <div class="input-wrap">
            <input type="password" name="password" id="passInput" placeholder="min. 6 karakter" oninput="cekKekuatan(this.value)" />
            <i class='bx bx-hide input-icon' id="passIcon" onclick="togglePass('passInput', this)"></i>
          </div>
          <div class="strength-bar">
            <div class="strength-fill" id="strengthFill"></div>
          </div>
          <div class="strength-text" id="strengthText"></div>
        </div>

        <div class="field">
          <label>Konfirmasi Password <span class="req">*</span></label>
          <div class="input-wrap">
            <input type="password" name="konfirmasi" id="konfirmInput" placeholder="Ulangi password..." />
            <i class='bx bx-hide input-icon' id="konfirmIcon" onclick="togglePass('konfirmInput', this)"></i>
          </div>
        </div>

        <button type="submit" class="btn">
          <i class='bx bx-user-plus'></i> Buat Akun Admin
        </button>

      </form>

      <div class="divider">atau</div>
      <a href="../admin/admin_login.php" class="link-login"><i class='bx bx-log-in'></i> Sudah punya akun? Login</a>

    <?php endif ?>
  </div>

  <script>
    // Toggle show/hide password
    function togglePass(inputId, icon) {
      const input = document.getElementById(inputId);
      if (input.type === 'password') {
        input.type = 'text';
        icon.className = icon.className.replace('bx-hide', 'bx-show');
      } else {
        input.type = 'password';
        icon.className = icon.className.replace('bx-show', 'bx-hide');
      }
    }

    // Password strength checker
    function cekKekuatan(val) {
      const fill = document.getElementById('strengthFill');
      const text = document.getElementById('strengthText');
      let score = 0;
      if (val.length >= 6) score++;
      if (val.length >= 10) score++;
      if (/[A-Z]/.test(val)) score++;
      if (/[0-9]/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val)) score++;
      const levels = [{
          w: '0%',
          bg: '#eee',
          label: ''
        },
        {
          w: '20%',
          bg: '#e05555',
          label: 'Sangat Lemah'
        },
        {
          w: '40%',
          bg: '#e07820',
          label: 'Lemah'
        },
        {
          w: '60%',
          bg: '#c9a227',
          label: 'Cukup'
        },
        {
          w: '80%',
          bg: '#5cb88a',
          label: 'Kuat'
        },
        {
          w: '100%',
          bg: '#2e9e5b',
          label: 'Sangat Kuat'
        },
      ];
      const lv = levels[Math.min(score, 5)];
      fill.style.width = lv.w;
      fill.style.background = lv.bg;
      text.textContent = lv.label;
      text.style.color = lv.bg;
    }
  </script>
</body>

</html>