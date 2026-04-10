<?php
require 'functions.php';
include 'layouts/header.php';


if (!isset($_SESSION['login']) || $_SESSION['role'] != 'siswa') {
    header("Location: index.php");
    exit;
}

$nis = $_SESSION['id'];

/* =======================
   KIRIM LAPORAN
======================= */
if (isset($_POST["kirim"])) {

    $isi_laporan = htmlspecialchars($_POST["isi_laporan"]);
    $id_kategori = $_POST["id_kategori"];
    $lokasi = htmlspecialchars($_POST["lokasi"]);
    $tanggal = date("Y-m-d");
    $status = "Menunggu";

    $nama_foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "assets/img/";

    if ($nama_foto != "") {
        move_uploaded_file($tmp, $folder . $nama_foto);
    } else {
        $nama_foto = "";
    }

    mysqli_query($conn, "INSERT INTO aspirasi 
        VALUES (NULL, '$nis', '$id_kategori', '$lokasi', '$isi_laporan', '$nama_foto', '$tanggal', '$status', '')");

    echo "<script>alert('Laporan terkirim!'); location='siswa.php';</script>";
}

/* =======================
   HAPUS MULTIPLE
======================= */
if (isset($_POST['hapus_terpilih']) && !empty($_POST['pilih'])) {
    $ids = implode(",", $_POST['pilih']);
    mysqli_query($conn, "DELETE FROM aspirasi WHERE id_aspirasi IN ($ids) AND nis='$nis'");
    echo "<script>alert('Data dihapus!'); location='siswa.php';</script>";
}

/* =======================
   HAPUS SINGLE
======================= */
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    mysqli_query($conn, "DELETE FROM aspirasi WHERE id_aspirasi=$id AND nis='$nis'");
    echo "<script>alert('Laporan dihapus!'); location='siswa.php';</script>";
}

/* =======================
   EDIT
======================= */
$edit_data = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $edit_data = query("SELECT * FROM aspirasi WHERE id_aspirasi=$id AND nis='$nis'")[0];
}

/* =======================
   UPDATE
======================= */
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $isi = htmlspecialchars($_POST['isi_laporan']);
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $kategori = $_POST['id_kategori'];

    $nama_foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "assets/img/";

    $lama = query("SELECT foto FROM aspirasi WHERE id_aspirasi=$id")[0]['foto'];

    if (isset($_POST['hapus_foto'])) {
        if ($lama && file_exists($folder.$lama)) unlink($folder.$lama);
        $final = "";

    } elseif ($nama_foto != "") {
        move_uploaded_file($tmp, $folder.$nama_foto);
        if ($lama && file_exists($folder.$lama)) unlink($folder.$lama);
        $final = $nama_foto;

    } else {
        $final = $lama;
    }

    mysqli_query($conn, "UPDATE aspirasi SET 
        keterangan='$isi',
        lokasi='$lokasi',
        id_kategori='$kategori',
        foto='$final'
        WHERE id_aspirasi=$id AND nis='$nis'");

    echo "<script>alert('Berhasil diupdate!'); location='siswa.php';</script>";
}

/* =======================
   DATA
======================= */
$kategori = query("SELECT * FROM kategori");

$riwayat = query("SELECT aspirasi.*, kategori.nama_kategori 
FROM aspirasi 
JOIN kategori ON aspirasi.id_kategori=kategori.id_kategori
WHERE nis='$nis'");
?>



<h3 class="page-title"  id="main-menu">Halo, <?= $_SESSION['nama']; ?> 👋</h3>

<!-- FORM -->
<div class="card p-4 mb-4">
<h5 class="mb-3"><?= $edit_data ? "✏️ Edit Laporan" : "📝 Tulis Laporan" ?></h5>

<form method="post" enctype="multipart/form-data">

<?php if($edit_data): ?>
<input type="hidden" name="id" value="<?= $edit_data['id_aspirasi']; ?>">
<?php endif; ?>

<div class="mb-3">
<label class="form-label">Pilih Kategori</label>
<select name="id_kategori" class="form-select">
<?php foreach($kategori as $k): ?>
<option value="<?= $k['id_kategori']; ?>" <?= ($edit_data && $edit_data['id_kategori']==$k['id_kategori'])?'selected':'' ?>>
<?= $k['nama_kategori']; ?>
</option>
<?php endforeach; ?>
</select>
</div>

<div class="mb-3">
<label class="form-label">Lokasi Kejadian</label>
<input type="text" name="lokasi" class="form-control" placeholder="Lokasi"
value="<?= $edit_data['lokasi'] ?? '' ?>">
</div>

<div class="mb-3">
<label class="form-label">Isi Laporan</label>
<textarea name="isi_laporan" class="form-control" rows="4"><?= $edit_data['keterangan'] ?? '' ?></textarea>
</div>


<div class="mb-3">
    <label>Bukti Foto</label>

 <?php if($edit_data && $edit_data['foto']): ?>
                <div class="mb-2">
                    <img src="assets/img/<?= $edit_data['foto']; ?>" class="img-fluid rounded" style="max-width:150px;">
                </div>
  <div class="mb-3">
    <input type="checkbox" class="btn-check" id="hapusFoto" name="hapus_foto" value="1" autocomplete="off">
    
    <label class="btn btn-danger btn-sm" for="hapusFoto"  onclick="return confirm('Yakin Anda Ingin Menghapus?')">
        🗑️ Hapus Foto
    </label>
</div>

<?php endif; ?>

<input type="file" name="foto" class="form-control">
</div>

<button name="<?= $edit_data?'update':'kirim' ?>" class="btn btn-primary">
<?= $edit_data?'Update':'Kirim' ?>
</button>

<?php if($edit_data): ?>
<a href="siswa.php" class="btn btn-secondary ms-2">Batal</a>
<?php endif; ?>

</form>
</div>

<!-- RIWAYAT -->
<form method="post">
<div class="card p-4" id="riwayat-laporan">

<div class="d-flex justify-content-between mb-3">
<h5>📜 Riwayat Laporan</h5>

<button 
    type="submit" 
    name="hapus_terpilih" 
    class="btn btn-danger btn-sm align-self-start align-self-md-center"
    onclick="return confirm('Yakin ingin menghapus data yang dipilih?')"
>
    <i class="fas fa-trash"></i> 🗑 Hapus
</button>
</div>

<div class="table-responsive">
<table class="table table-hover align-middle custom-table">
<thead class="table-dark">
<tr>
<th><input type="checkbox" id="checkAll"></th>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Tanggapan</th>
                    <th>Aksi</th>
</tr>
</thead>
<?php $i=1; foreach($riwayat as $r): ?>
<tr>

<td>
<?php if($r['status']=='Menunggu'||$r['status']=='Selesai'): ?>
<input type="checkbox" name="pilih[]" value="<?= $r['id_aspirasi']; ?>">
<?php endif; ?>
</td>

<td><?= $i++ ?></td>
<td><?= $r['tanggal']; ?></td>
<td><?= $r['nama_kategori'] ?></td>
<td><?= $r['keterangan'] ?></td>

<td>
<?php if($r['status']=='Selesai'): ?>
<span class="badge bg-success">✔ Selesai</span>

<?php elseif($r['status']=='Proses'): ?>
<span class="badge bg-warning text-dark">⏳ Proses</span>

<?php else: ?>
<span class="badge bg-danger">⚠ Menunggu</span>
<?php endif; ?>
</td>

<td style="max-width:200px; white-space:normal;">
                    <?= $r['feedback'] ?: '<i class="text-muted">Belum ditanggapi</i>'; ?>
                </td>   

<td>    
<div class="d-flex gap-2 flex-wrap">    

<?php if($r['status']=='Menunggu'): ?>
<a href="?edit=<?= $r['id_aspirasi']; ?>" class="btn btn-warning btn-sm mb-1">Edit</a>
<a href="?hapus=<?= $r['id_aspirasi']; ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm mb-1">Hapus</a>
<?php elseif($r['status']=='Selesai'): ?>
<a href="?hapus=<?= $r['id_aspirasi']; ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm mb-1">Hapus</a>

<?php else: ?>
<span class="text-muted">Terkunci</span>
<?php endif; ?>

</div>
</td>

</tr>
<?php endforeach; ?>

</table>
</div>


</form>

</div>

<script>
let checkAll=document.getElementById('checkAll');
if(checkAll){
checkAll.onclick=()=>document.querySelectorAll('input[name="pilih[]"]').forEach(cb=>cb.checked=checkAll.checked);
}
</script>

<?php include 'layouts/footer.php'; ?>