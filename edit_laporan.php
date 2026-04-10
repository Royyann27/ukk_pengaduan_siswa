<?php
session_start();
require 'functions.php';

$id = $_GET['id'];
$data = query("SELECT * FROM aspirasi WHERE id_aspirasi = $id")[0];

if (isset($_POST['update'])) {

    $isi = htmlspecialchars($_POST['isi']);
    $lokasi = htmlspecialchars($_POST['lokasi']);

    $query = "UPDATE aspirasi SET 
                keterangan = '$isi',
                lokasi = '$lokasi'
              WHERE id_aspirasi = $id";

    mysqli_query($conn, $query);

    echo "
    <script>
        alert('Laporan berhasil diupdate!');
        document.location.href = 'siswa.php';
    </script>
    ";
}
?>

<?php include 'layouts/header.php'; ?>

<div class="card p-4">
    <h4>Edit Laporan</h4>

    <form method="post">
        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="<?= $data['lokasi']; ?>">
        </div>

        <div class="mb-3">
            <label>Isi Laporan</label>
            <textarea name="isi" class="form-control"><?= $data['keterangan']; ?></textarea>
        </div>

        <button type="submit" name="update" class="btn btn-success">Simpan</button>
        <a href="siswa.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include 'layouts/footer.php'; ?>