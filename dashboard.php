<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/dashboard_auth.css">
  <title>Dashboard Login | BERNADA.ID</title>
</head>
<body>
  <div>
    <a href="halaman.php" class="logo">BERNADA<span>.ID</span></a>
  </div>
  <div class="container">
    <div class="img-dashboard">
      <img src="./img/gambar_dashboard.png" alt="Dashboard">
    </div>
    <div class="wrapper">
      <div class="formBox login">
        <h2>Login Account</h2>
        <form action="#">
          <div class="inputBox">
            <div class="icon"><i class='bx bx-envelope'></i></div>
            <input type="email" placeholder="Email" required></input>
          </div>
          <div class="inputBox">
            <div class="icon"><i class='bx bx-lock' ></i></div>
            <input type="password" placeholder="Password" required></input>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox"> Remember me</label>
            <a href="#">Forgot Password?</a>
          </div>
          <button type="submit" class="btn">Login</button>
          <div class="loginRegister">
            <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
          </div>
          <div class="social-icons">
            <a href=""><i class='bx bxl-google' ></i></a>
            <a href=""><i class='bx bxl-facebook' ></i></a>
            <a href=""><i class='bx bxl-twitter' ></i></a>
            <a href=""><i class='bx bxl-github' ></i></a>
          </div>
        </form>
      </div>

      <div class="formBox register">
        <h2>Registration</h2>
        <form action="#">
          <div class="inputBox">
            <div class="icon"><i class='bx bx-envelope'></i></div>
            <input type="email" placeholder="Email" required></input>
          </div>
          <div class="inputBox">
            <div class="icon"><i class='bx bx-lock' ></i></div>
            <input type="password" placeholder="Password" required></input>
          </div>
          <div class="remember-forgot">
            <label><input type="checkbox"> i agree to the terms & conditions</label>
            <a href="#">Forgot Password?</a>
          </div>
          <button type="submit" class="btn">Regiter</button>
          <div class="loginRegister">
            <p>Already have an account? <a href="#" class="login-link">Login</a></p>
          </div>
          <div class="social-icons">
            <a href=""><i class='bx bxl-google' ></i></a>
            <a href=""><i class='bx bxl-facebook' ></i></a>
            <a href=""><i class='bx bxl-twitter' ></i></a>
            <a href=""><i class='bx bxl-github' ></i></a>
          </div>
        </form>
      </div>
    </div>
  </div>


  </body>
</html>