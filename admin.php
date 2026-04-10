<?php
require 'functions.php';
include 'layouts/header.php';


if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

/* =========================
   HAPUS MULTIPLE
========================= */
if (isset($_POST['hapus_terpilih'])) {
    if (!empty($_POST['pilih'])) {
        $ids = implode(",", $_POST['pilih']);
        mysqli_query($conn, "DELETE FROM aspirasi WHERE id_aspirasi IN ($ids)");
        echo "<script>alert('Data berhasil dihapus!'); location='admin.php';</script>";
    }
}

/* =========================
   FILTER
========================= */
$kategori_list = query("SELECT * FROM kategori");

$query = "SELECT aspirasi.*, siswa.nama, kategori.nama_kategori 
FROM aspirasi 
JOIN siswa ON aspirasi.nis = siswa.nis 
JOIN kategori ON aspirasi.id_kategori = kategori.id_kategori 
WHERE 1=1";

if (isset($_POST['cari'])) {

    if (!empty($_POST['id_kategori'])) {
        $id = $_POST['id_kategori'];
        $query .= " AND aspirasi.id_kategori='$id'";
    }

    if (!empty($_POST['status'])) {
        $status = $_POST['status'];
        $query .= " AND aspirasi.status='$status'";
    }

    if (!empty($_POST['tgl_awal']) && !empty($_POST['tgl_akhir'])) {
        $awal = $_POST['tgl_awal'];
        $akhir = $_POST['tgl_akhir'];
        $query .= " AND aspirasi.tanggal BETWEEN '$awal' AND '$akhir'";
    }
}

$query .= " ORDER BY aspirasi.tanggal DESC";
$laporan = query($query);

/* =========================
   STATS
========================= */
$total = query("SELECT COUNT(*) as jml FROM aspirasi")[0]['jml'];
$proses = query("SELECT COUNT(*) as jml FROM aspirasi WHERE status='Proses'")[0]['jml'];
$selesai = query("SELECT COUNT(*) as jml FROM aspirasi WHERE status='Selesai'")[0]['jml'];
?>



<h3 class="page-title mb-4" id="dashboard" >📊 Dashboard Admin</h3>

<!-- STATS -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card p-3 text-center">
            <small>Total Laporan</small>
            <h2 class="fw-bold"><?= $total ?></h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center">
            <small>Diproses</small>
            <h2 class="fw-bold text-warning"><?= $proses ?></h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 text-center">
            <small>Selesai</small>
            <h2 class="fw-bold text-success"><?= $selesai ?></h2>
        </div>
    </div>
</div>

<!-- FILTER -->
<!-- FILTER -->
<div class="card p-4 mb-4">
<h5 class="mb-3">🔍 Filter Data</h5>

<form method="post" class="row g-3 form-filter">

<div class="col-md-4">
<label class="form-label">Kategori</label>
<select name="id_kategori" class="form-select w-100">
<option value="">Semua Kategori</option>
<?php foreach($kategori_list as $k): ?>
<option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
<?php endforeach; ?>
</select>
</div>

<div class="col-md-4">
<label class="form-label">Status</label>
<select name="status" class="form-select w-100">
<option value="">Semua Status</option>
<option>Menunggu</option>
<option>Proses</option>
<option>Selesai</option>
</select>
</div>

<div class="col-md-4">
<label class="form-label">Tanggal</label>
<div class="d-flex flex-column flex-md-row gap-2 w-100">
<input type="date" name="tgl_awal" class="form-control w-100">
<input type="date" name="tgl_akhir" class="form-control w-100">
</div>
</div>

<div>
<button name="cari" class="btn btn-primary btn-sm">Tampilkan</button>
<a href="admin.php" class="btn btn-secondary btn-sm">Reset</a>
</div>

</form>
</div>

<!-- TABLE -->
<form method="post">
<div class="card p-4" id="data-laporan">

<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
<h5 class="mb-0">📋 Data Laporan</h5>

<div class="d-flex gap-2">
<button name="hapus_terpilih" class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data?')">
🗑 Hapus
</button>

<a href="print_laporan.php" target="_blank" class="btn btn-success btn-sm">
🖨 Cetak
</a>
</div>
</div>

<div class="table-responsive">
<table class="table table-hover align-middle custom-table">

<thead class="table-dark">
<tr>
<th><input type="checkbox" id="checkAll"></th>
<th>No</th>
<th>Tanggal</th>
<th>Pelapor</th>
<th>Kategori</th>
<th>Isi</th>
<th>Bukti</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $i=1; foreach($laporan as $row): ?>
<tr>

<td><input type="checkbox" name="pilih[]" value="<?= $row['id_aspirasi']; ?>"></td>
<td><?= $i++ ?></td>
<td><?= $row['tanggal'] ?></td>
<td><?= $row['nama'] ?></td>
<td><?= $row['nama_kategori'] ?></td>

<td class="text-wrap" style="max-width:200px"><?= $row['keterangan'] ?></td>

<td>
<?php if($row['foto']): ?>
<a href="assets/img/<?= $row['foto']; ?>" target="_blank" class="btn btn-info btn-sm">Lihat</a>
<?php else: ?>-<?php endif; ?>
</td>

<td>
<span class="badge 
<?= $row['status']=='Selesai'?'bg-success':
($row['status']=='Proses'?'bg-warning text-dark':'bg-danger') ?>">
<?= $row['status'] ?>
</span>
</td>

<td>
<div class="d-flex flex-column flex-md-row gap-1">
<a href="proses_laporan.php?id=<?= $row['id_aspirasi']; ?>" 
class="btn btn-primary btn-sm">Tanggapi</a>
</div>
</td>

</tr>
<?php endforeach; ?>
</tbody>

</table>
</div>
</div>
</form>



<script>
document.getElementById('checkAll').onclick = function() {
document.querySelectorAll('input[name="pilih[]"]').forEach(cb => cb.checked = this.checked);
}
</script>

<?php include 'layouts/footer.php'; ?>