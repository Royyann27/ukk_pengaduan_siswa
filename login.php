<?php

require 'functions.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $role = cek_login($username, $password);

    if ($role == 'admin') {
        header("Location: admin.php");
    } elseif ($role == 'siswa') {
        header("Location: siswa.php"); 
    } else {
        echo "<script>alert('Username atau Password Salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>✨ MyAspirasi Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>

/* =========================
   🌈 BACKGROUND
========================= */
body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins', sans-serif;

    background: linear-gradient(-45deg, #4facfe, #8f6ed5, #ff6ec4, #00f2fe);
    background-size: 400% 400%;
    animation: gradientMove 12s ease infinite;
}

/* animasi */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* glow halus */
body::before {
    content: "";
    position: fixed;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle at center, rgba(255,255,255,0.15), transparent 70%);
    top: -200px;
    left: -200px;
    z-index: 0;
    filter: blur(80px);
}

body::after {
    content: "";
    position: fixed;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle at center, rgba(255,0,255,0.15), transparent 70%);
    bottom: -200px;
    right: -200px;
    z-index: 0;
    filter: blur(80px);
}

/* =========================
   💎 CARD
========================= */
.login-card {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 360px;
    border-radius: 20px;
    overflow: hidden;
    background: white;
    box-shadow: 0 20px 50px rgba(0,0,0,0.25);
    transition: 0.3s;
}

.login-card:hover {
    transform: translateY(-5px);
}

/* HEADER */
.login-header {
    background: linear-gradient(135deg, #4facfe, #8f6ed5);
    color: white;
    text-align: center;
    padding: 25px 15px 20px;
}

.login-header h4 {
    margin: 0;
    font-weight: 600;
}

.login-header small {
    opacity: 0.9;
}

/* BODY */
.card-body {
    padding: 20px;
    background: white;
}

/* LABEL */
label {
    color: #333;
    font-size: 13px;
    font-weight: 500;
    margin-bottom: 4px;
}

/* INPUT */
.form-control {
    border-radius: 14px;
    border: none;
    padding: 10px;
    font-size: 14px;
    background: #eef2ff;
    color: #333;
}

.form-control:focus {
    background: #e0e7ff;
    box-shadow: none;
}

/* BUTTON LOGIN */
.btn-login {
    background: linear-gradient(135deg, #4facfe, #8f6ed5);
    border: none;
    border-radius: 14px;
    color: white;
    font-weight: 600;
    padding: 10px;
    transition: 0.3s;
}

.btn-login:hover {
    transform: scale(1.04);
    box-shadow: 0 6px 15px rgba(95,114,255,0.5);
}

/* 🔥 BUTTON KEMBALI */
.btn-back {
    background: transparent;
    border: 2px solid #8f6ed5;
    color: #8f6ed5;
    border-radius: 14px;
    padding: 8px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-back:hover {
    background: linear-gradient(135deg, #4facfe, #8f6ed5);
    color: white;
}

/* LINK */
.register-link {
    text-align: center;
    margin-top: 12px;
    font-size: 13px;
    color: #333;
}

.register-link a {
    color: #5f72ff;
    text-decoration: none;
    font-weight: 500;
}

.register-link a:hover {
    text-decoration: underline;
}

/* ICON */
.login-header i {
    font-size: 28px;
    margin-bottom: 8px;
}

/* RESPONSIVE */
@media(max-width:480px){
    .login-card {
        margin: 10px;
    }
}

</style>
</head>

<body>

<div class="login-card">

    <!-- HEADER -->
    <div class="login-header">
        <i class="fas fa-user-circle"></i>
        <h4>Login</h4>
        <small>Aplikasi Pengaduan</small>
    </div>

    <!-- BODY -->
    <div class="card-body">
        <form method="post">

            <div class="mb-3">
                <label>Username / NIS</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" name="login" class="btn btn-login w-100 mb-2">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>

            <!-- 🔥 TOMBOL KEMBALI -->
            <a href="index.php" class="btn btn-back w-100">
                ⬅ Kembali ke Beranda
            </a>

        </form>

        <div class="register-link">
            Belum punya akun? 
            <a href="register.php">Buat akun siswa</a>
        </div>
    </div>

</div>

</body>
</html>