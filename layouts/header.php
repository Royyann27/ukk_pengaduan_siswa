<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>✨ MyAspirasi</title>

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>

/* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* BODY */
body {
    font-family: 'Poppins', sans-serif;
    background: #eef2ff;
}

/* SIDEBAR FIX */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100vh;
    background: linear-gradient(180deg, #4facfe, #8f6ed5);
    color: white;
    padding: 25px 15px;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    z-index: 1000;
    transition: transform 0.3s ease;
}

/* MENU */
.menu-item {
    display: block;
    color: white;
    text-decoration: none;
    padding: 12px;
    border-radius: 10px;
    margin-bottom: 8px;
    transition: 0.2s;
}

.menu-item:hover {
    background: rgba(255,255,255,0.2);
}

/* ACTIVE */
.menu-item.active {
    background: rgba(255,255,255,0.3);
}

/* PROFILE */
.profile-box {
    background: rgba(255,255,255,0.15);
    padding: 12px;
    border-radius: 12px;
}

/* AVATAR */
.avatar {
    width: 40px;
    height: 40px;
    background: white;
    color: #4facfe;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* CONTENT FIX */
.content {
    margin-left: 250px;
    padding: 25px;
    min-height: 100vh;
    transition: 0.3s;
}

/* CARD */
.card {
    border-radius: 16px;
}

/* =========================
   🔥 TAMBAHAN MOBILE NAVBAR
========================= */

/* NAVBAR MOBILE (default hidden) */
.mobile-navbar {
    display: none;
}

/* OVERLAY */
.overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    top: 0;
    left: 0;
    display: none;
    z-index: 999;
}

.overlay.active {
    display: block;
}

/* MOBILE MODE */
@media(max-width:768px){

    /* NAVBAR MUNCUL */
    .mobile-navbar {
        display: flex;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 55px;
        background: linear-gradient(90deg, #4facfe, #8f6ed5);
        color: white;
        align-items: center;
        padding: 0 15px;
        z-index: 1100;
    }

    /* 🔥 FIX TOMBOL ☰ */
    .mobile-navbar .menu-toggle {
        display: inline-block !important; /* 🔥 override */
        background: none;
        border: none;
        font-size: 22px;
        color: white;
        margin-right: 10px;
    }

    .brand {
        font-weight: bold;
    }

    /* SIDEBAR DIHIDDEN */
    .sidebar {
        transform: translateX(-100%);
        z-index: 1200;
    }

    .sidebar.active {
        transform: translateX(0);
    }

    /* CONTENT FULL */
    .content {
        margin-left: 0 !important;
        padding: 15px;
        padding-top: 70px;
    }

    /* tombol menu lama tetap boleh muncul */
    .menu-toggle {
        display: inline-block;
    }
}

/* BIAR BISA SCROLL KE SAMPING */
.table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto !important;
    -webkit-overflow-scrolling: touch;
}

.table-responsive table {
    min-width: 900px !important;
}

/* BIKIN TABLE LEBIH LEBAR DARI HP */
.custom-table {
    min-width: 800px; /* 🔥 ini kunci */
}

.custom-table td:nth-child(6) {
    max-width: 250px;
    white-space: normal;
    word-break: break-word;
}

.custom-table td:nth-child(7),
.custom-table td:nth-child(8),
.custom-table td:nth-child(9) {
    white-space: nowrap;
}

/* tombol menu default hidden */
.menu-toggle {
    display: none;
}

.form-filter .d-flex > * {
    min-width: 0;
}

/* biar teks ga turun */
@media(max-width:768px){
    .custom-table th,
    .custom-table td {
        white-space: nowrap;
    }
}

 .custom-table th,
    .custom-table td {
        font-size: 13px;
        vertical-align: middle;
    }

    /* kasih jarak biar ga padet */
    .custom-table td {
        padding: 10px 8px;
    }




</style>
</head>

<body>

<!-- 🔥 NAVBAR MOBILE -->
<nav class="mobile-navbar">
    <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    <span class="brand">✨ MyAspirasi</span>
</nav>

<?php include 'layouts/sidebar.php'; ?>

<!-- 🔥 OVERLAY -->
<div class="overlay" onclick="toggleSidebar()"></div>

<div class="content">

<button class="btn btn-primary menu-toggle mb-3" onclick="toggleSidebar()">
☰ Menu
</button>