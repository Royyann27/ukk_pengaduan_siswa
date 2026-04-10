<div class="sidebar">

<div class="mb-4">
    <h4 class="fw-bold">✨ MyAspirasi</h4>
    <small class="opacity-75">📢 Sistem Pengaduan</small>
</div>

<hr style="opacity:0.3;">

<?php 
$current = basename($_SERVER['PHP_SELF']);
?>

<?php if($_SESSION['role'] == 'admin'): ?>

<a href="admin.php#dashboard" class="menu-item <?= ($current=='admin.php') ? 'active' : '' ?>">
📊 Dashboard Admin
</a>

<a href="admin.php#data-laporan" class="menu-item <?= ($current=='admin.php') ? 'active' : '' ?>">
📋 Data Laporan
</a>

<?php elseif($_SESSION['role'] == 'siswa'): ?>

<a href="siswa.php#main-menu" class="menu-item <?= ($current=='siswa.php') ? 'active' : '' ?>">
📝 Buat Laporan
</a>

<a href="siswa.php#riwayat-laporan" class="menu-item <?= ($current=='siswa.php') ? 'active' : '' ?>">
📜 Riwayat
</a>

<?php endif; ?>

<hr style="opacity:0.3;">

<div class="profile-box mt-auto">

<div class="d-flex align-items-center mb-3">
    <div class="avatar">
        <?= strtoupper(substr($_SESSION['nama'],0,1)); ?>
    </div>

    <div class="ms-2">
        <small class="opacity-75">Login sebagai</small>
        <div><strong><?= $_SESSION['nama']; ?></strong></div>
    </div>
</div>

<a href="logout.php" 
   class="btn btn-light btn-sm w-100 text-danger fw-semibold"
   onclick="return confirm('Yakin logout?')">
🚪 Logout
</a>

</div>

</div>