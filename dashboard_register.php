<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/footer_header.css">
  <link rel="stylesheet" href="css/dashboard.css">
  <title>Registrasi Akun - Bernada.Id</title>
</head>
<body>
  <?php include('./header/inc_header_dashboard.php')?>
  <div class="container">
    <div class="form-box register">
      <h2>Register</h2>
      <form action="auth_process.php" method="POST">
        <div class="inputBox">
          <input type="text" name="name" placeholder="Username" required>
          <i class='bx bxs-user' ></i>
        </div>
        <div class="inputBox">
          <input type="email" name="email" placeholder="Email" required>
          <i class='bx bxs-envelope'></i>
        </div>
        <div class="inputBox">
          <input type="password" name="password" placeholder="Password" required>
          <i class='bx bxs-lock-alt' ></i>
        </div>          
        <button type="submit" name="register_btn" class="btn_register">Register</button>
        <span>Already have an account? <a href="#" class="login-link">Login</a></span>
      </form>
    </div>
  </div>
</body>
</html>