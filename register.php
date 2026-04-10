<?php
require 'functions.php';

if (isset($_POST['register'])) {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $password = $_POST['password'];
    $password_hash = $password; // TANPA HASH

    $cek = mysqli_query($conn, "SELECT * FROM siswa WHERE nis = '$nis'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('NIS sudah terdaftar!');</script>";
    } else {
        $query = "INSERT INTO siswa VALUES ('$nis', '$nama', '$kelas', '$password_hash')";
        mysqli_query($conn, $query);

        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>
                    alert('Registrasi berhasil!');
                    document.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>alert('Registrasi gagal!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>✨ MyAspirasi Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>

/* =========================
   🌈 BACKGROUND (SAMA LOGIN)
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

/* ANIMASI */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* GLOW HALUS */
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
   💎 CARD (SAMA LOGIN)
========================= */
.register-card {
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

.register-card:hover {
    transform: translateY(-5px);
}

/* HEADER */
.register-header {
    background: linear-gradient(135deg, #4facfe, #8f6ed5);
    color: white;
    text-align: center;
    padding: 25px 15px 20px;
}

.register-header h4 {
    margin: 0;
    font-weight: 600;
}

.register-header small {
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

/* BUTTON */
.btn-primary {
    background: linear-gradient(135deg, #4facfe, #8f6ed5);
    border: none;
    border-radius: 14px;
    color: white;
    font-weight: 600;
    padding: 10px;
    transition: 0.3s;
}

.btn-primary:hover {
    transform: scale(1.04);
    box-shadow: 0 6px 15px rgba(95,114,255,0.5);
}

/* LINK */
.login-link {
    text-align: center;
    margin-top: 12px;
    font-size: 13px;
    color: #333;
}

.login-link a {
    color: #5f72ff;
    text-decoration: none;
    font-weight: 500;
}

.login-link a:hover {
    text-decoration: underline;
}

/* ICON */
.register-header i {
    font-size: 28px;
    margin-bottom: 8px;
}

/* RESPONSIVE */
@media(max-width:480px){
    .register-card {
        margin: 10px;
    }
}

</style>
</head>

<body>

<div class="register-card">
    
    <div class="register-header">
        <i class="fas fa-user-plus"></i>
        <h4>Register</h4>
        <small>Buat Akun Siswa</small>
    </div>

    <div class="card-body">
        <form action="" method="post">
            
            <div class="mb-3">
                <label>NIS</label>
                <input type="text" name="nis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" name="register" class="btn btn-primary w-100">
                <i class="fas fa-user-plus"></i> Daftar
            </button>
        </form>

        <div class="login-link">
            <small>
                Sudah punya akun? 
                <a href="login.php">Login disini</a>
            </small>
        </div>
    </div>

</div>

</body>
</html>