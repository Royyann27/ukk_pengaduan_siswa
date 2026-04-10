<?php
require 'functions.php';

$query = "SELECT aspirasi.*, siswa.nama, kategori.nama_kategori 
          FROM aspirasi 
          JOIN siswa ON aspirasi.nis = siswa.nis 
          JOIN kategori ON aspirasi.id_kategori = kategori.id_kategori 
          WHERE 1=1";

// ambil filter dari URL
if (!empty($_GET['id_kategori'])) {
    $query .= " AND aspirasi.id_kategori = '".$_GET['id_kategori']."'";
}

if (!empty($_GET['status'])) {
    $query .= " AND aspirasi.status = '".$_GET['status']."'";
}

if (!empty($_GET['tgl_awal']) && !empty($_GET['tgl_akhir'])) {
    $query .= " AND aspirasi.tanggal BETWEEN '".$_GET['tgl_awal']."' AND '".$_GET['tgl_akhir']."'";
}

$query .= " ORDER BY aspirasi.tanggal DESC";

$data = query($query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Cetak Laporan</title>

<style>

body {
    font-family: 'Segoe UI', sans-serif;
    padding: 30px;
    background: #f4f6fb;
}

/* HEADER */
.header {
    text-align: center;
    margin-bottom: 20px;
}

.header h2 {
    margin: 0;
    color: #4facfe;
}

.header p {
    margin: 5px 0 0;
    color: #666;
}

/* LINE */
hr {
    border: none;
    height: 3px;
    background: linear-gradient(to right, #4facfe, #8f6ed5);
    margin: 20px 0;
}

/* TABLE */
table {
    border-collapse: collapse;
    width: 100%;
    background: white;
    border-radius: 10px;
    overflow: hidden;
}

/* HEADER TABLE */
th {
    background: linear-gradient(135deg, #4facfe, #8f6ed5);
    color: white;
    font-weight: 500;
}

/* CELL */
th, td {
    padding: 10px;
    font-size: 13px;
    text-align: center;
}

/* ROW */
tr:nth-child(even) {
    background: #f8f9ff;
}

/* STATUS */
.status {
    padding: 4px 8px;
    border-radius: 8px;
    font-size: 12px;
    color: white;
}

.menunggu { background: #dc3545; }
.proses { background: #ffc107; color: black; }
.selesai { background: #198754; }

* {
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
}

/* PRINT ONLY */
@media print {
    body {
        background: white !important;
    }

    th {
        background: #4facfe !important;
        color: white !important;
    }

    .status {
        color: white !important;
    }

    .menunggu { background: #dc3545 !important; }
    .proses { background: #ffc107 !important; color: black !important; }
    .selesai { background: #198754 !important; }
}

</style>
</head>

<body onload="window.print()">

<div class="header">
    <h2>✨ Laporan Pengaduan Siswa</h2>
    <p>Sistem MyAspirasi</p>
</div>

<hr>

<table>
<tr>
<th>No</th>
<th>Tanggal</th>
<th>Nama</th>
<th>Kategori</th>
<th>Laporan</th>
<th>Lokasi</th>
<th>Status</th>
</tr>

<?php $i=1; foreach($data as $d): ?>
<tr>
<td><?= $i++; ?></td>
<td><?= $d['tanggal']; ?></td>
<td><?= $d['nama']; ?></td>
<td><?= $d['nama_kategori']; ?></td>
<td style="text-align:left;"><?= $d['keterangan']; ?></td>
<td><?= $d['lokasi']; ?></td>

<td>
<?php if($d['status']=='Menunggu'): ?>
<span class="status menunggu">Menunggu</span>

<?php elseif($d['status']=='Proses'): ?>
<span class="status proses">Proses</span>

<?php else: ?>
<span class="status selesai">Selesai</span>
<?php endif; ?>
</td>

</tr>
<?php endforeach; ?>

</table>

</body>
</html>