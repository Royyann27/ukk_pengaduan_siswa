<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>✨ MyAspirasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
/* =========================
   🌈 BACKGROUND
========================= */
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(-45deg, #4facfe, #8f6ed5, #ff6ec4, #00f2fe);
    background-size: 400% 400%;
    animation: gradientMove 12s ease infinite;
    color: white;
}

/* ANIMASI */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* =========================
   🔝 NAVBAR
========================= */
.navbar {
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(12px);
}

.navbar-brand {
    font-weight: bold;
    font-size: 20px;
    color: white !important;
    text-shadow: 0 0 10px rgba(255,255,255,0.6);
}

/* =========================
   🚀 HERO
========================= */
.hero {
    min-height: 90vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 20px;
}

/* TITLE BESAR + GRADIENT */
.hero h1 {
    font-size: 48px;
    font-weight: 900;
    background: linear-gradient(90deg, #fff, #ffd6ff, #a0ffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 30px rgba(255,255,255,0.6);
}

/* SUBTITLE LEBIH JELAS */
.hero p {
    font-size: 17px;
    font-weight: 500;
    opacity: 0.95;
    margin-bottom: 35px;
    text-shadow: 0 0 12px rgba(255,255,255,0.4);
}

/* =========================
   🔘 BUTTON
========================= */
.mulai-btn {
    padding: 16px 40px;
    border-radius: 50px;
    font-size: 17px;
    font-weight: 800;
    border: none;
    color: white;
    background: linear-gradient(135deg, #00f2fe, #ff6ec4);
    box-shadow: 0 0 25px rgba(255,255,255,0.5);
    transition: 0.3s;
}

.mulai-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 0 45px rgba(255,255,255,0.9);
}

/* =========================
   💎 CARD
========================= */
.info-box {
    margin-top: 60px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px,1fr));
    gap: 25px;
    width: 100%;
    max-width: 1000px;
}

/* CARD UTAMA */
.info-card {
    background: rgba(255,255,255,0.18);
    padding: 25px;
    border-radius: 20px;
    backdrop-filter: blur(15px);
    transition: 0.3s;
}

/* JUDUL CARD (NAIK LEVEL 🔥) */
.info-card h5 {
    font-size: 20px;           /* 🔥 diperbesar */
    font-weight: 800;
    margin-bottom: 10px;
    background: linear-gradient(90deg, #fff, #ffd6ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 15px rgba(255,255,255,0.5);
}

/* ISI CARD */
.info-card p {
    font-size: 15px;           /* 🔥 diperbesar */
    line-height: 1.6;
    color: rgba(255,255,255,0.9);
    text-shadow: 0 0 8px rgba(255,255,255,0.3);
}

/* WARNA VARIASI */
.info-card:nth-child(1) {
    border: 1px solid rgba(0,255,255,0.6);
}
.info-card:nth-child(2) {
    border: 1px solid rgba(255,105,180,0.6);
}
.info-card:nth-child(3) {
    border: 1px solid rgba(255,255,0,0.6);
}

/* HOVER */
.info-card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 0 35px rgba(255,255,255,0.5);
}

/* =========================
   🔻 FOOTER
========================= */
.footer {
    text-align: center;
    padding: 20px;
    font-size: 14px;
    opacity: 0.9;
    text-shadow: 0 0 10px rgba(255,255,255,0.4);
}

/* =========================
   📱 MOBILE
========================= */
@media(max-width:480px){

    .hero h1 {
        font-size: 34px;
    }

    .hero p {
        font-size: 15px;
    }

    .info-card h5 {
        font-size: 18px;
    }

    .info-card p {
        font-size: 14px;
    }
}

</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg px-3">
    <a class="navbar-brand" href="#">✨ MyAspirasi</a>

     
</nav>
<!-- HERO -->
<div class="hero">

    <h1>✨ MyAspirasi</h1>
    <p>Sistem Pengaduan Siswa Modern & Interaktif</p>

    <div>
    <a href="login.php" class="btn mulai-btn">✨ Mulai Di Sini</a>
</div>
    <!-- FITUR -->
    <div class="info-box">

        <div class="info-card">
            <h5>📝 Laporan Mudah</h5>
            <p>Kirim aspirasi hanya dalam beberapa klik</p>
        </div>

        <div class="info-card">
            <h5>📊 Monitoring</h5>
            <p>Admin memantau laporan secara realtime</p>
        </div>

        <div class="info-card">
            <h5>⚡ Cepat & Transparan</h5>
            <p>Proses laporan cepat dan jelas</p>
        </div>

    </div>

</div>

<!-- FOOTER -->
<div class="footer">
    © <?= date('Y') ?> MyAspirasi • SMK Bhakti Insani Bogor
</div>

</body>
</html>