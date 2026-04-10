<?php
require 'functions.php';
include 'layouts/header.php';


if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

/* =========================
   AMBIL ID AMAN
========================= */
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$data = query("SELECT * FROM aspirasi 
JOIN siswa ON aspirasi.nis = siswa.nis 
JOIN kategori ON aspirasi.id_kategori = kategori.id_kategori 
WHERE id_aspirasi = $id");

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!');location='admin.php';</script>";
    exit;
}

$laporan = $data[0];

/* =========================
   UPDATE
========================= */
if (isset($_POST["update"])) {

    $status = htmlspecialchars($_POST["status"]);
    $feedback = htmlspecialchars($_POST["feedback"]);

    mysqli_query($conn, "UPDATE aspirasi SET 
        status='$status',
        feedback='$feedback'
        WHERE id_aspirasi='$id'
    ");

    echo "<script>
        alert('Tanggapan berhasil disimpan!');
        location='admin.php';
    </script>";
}
?>



<h3 class="page-title">📝 Detail & Tanggapan Laporan</h3>

<!-- DETAIL -->
<div class="card p-4 mb-4">

<h5 class="mb-3">📋 Detail Laporan</h5>

<div class="row">

<div class="col-md-6 mb-3">
<label>Pelapor</label>
<input type="text" class="form-control" value="<?= $laporan['nama']; ?>" disabled>
</div>

<div class="col-md-6 mb-3">
<label>Tanggal</label>
<input type="text" class="form-control" value="<?= $laporan['tanggal']; ?>" disabled>
</div>

<div class="col-md-6 mb-3">
<label>Kategori</label>
<input type="text" class="form-control" value="<?= $laporan['nama_kategori']; ?>" disabled>
</div>

<div class="col-md-6 mb-3">
<label>Lokasi Kejadian</label>
<input type="text" class="form-control" value="<?= $laporan['lokasi']; ?>" disabled>
</div>

</div>

<div class="mb-3">
<label>Status Saat Ini</label><br>

<?php if($laporan['status']=='Selesai'): ?>
<span class="badge bg-success">✔ Selesai</span>
<?php elseif($laporan['status']=='Proses'): ?>
<span class="badge bg-warning text-dark">⏳ Proses</span>
<?php else: ?>
<span class="badge bg-danger">⚠ Menunggu</span>
<?php endif; ?>

</div>

<div class="mb-3">
<label>Isi Laporan</label>
<textarea class="form-control" rows="4" disabled><?= $laporan['keterangan']; ?></textarea>
</div>

<div class="mb-3">
<label>Bukti Foto</label><br>

<?php if($laporan['foto']): ?>
<img src="assets/img/<?= $laporan['foto']; ?>" 
     class="img-fluid rounded shadow-sm" 
     style="max-width:250px;">
<?php else: ?>
<span class="text-muted">Tidak ada foto</span>
<?php endif; ?>

</div>

</div>

<!-- FORM TANGGAPAN -->
<div class="card p-4">

<h5 class="mb-3">💬 Tanggapan Admin</h5>

<form method="post">

<div class="mb-3">
<label>Status Laporan</label>
<select name="status" class="form-select">
<option value="Menunggu" <?= $laporan['status']=='Menunggu'?'selected':'' ?>>Menunggu</option>
<option value="Proses" <?= $laporan['status']=='Proses'?'selected':'' ?>>Proses</option>
<option value="Selesai" <?= $laporan['status']=='Selesai'?'selected':'' ?>>Selesai</option>
</select>
</div>

<div class="mb-3">
<label>Feedback / Tanggapan</label>
<textarea name="feedback" class="form-control" rows="4"
placeholder="Tulis tanggapan..."><?= $laporan['feedback']; ?></textarea>
</div>

<div class="d-flex gap-2">
<button name="update" class="btn btn-primary">
💾 Simpan 
</button>

<a href="admin.php" class="btn btn-secondary">
Kembali
</a>
</div>

</form>

</div>



<?php include 'layouts/footer.php'; ?>