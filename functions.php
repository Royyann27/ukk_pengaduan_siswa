<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_ukk_pengaduan");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

/* =========================
   TAMBAH ASPIRASI
========================= */
function tambahAspirasi($data) {
    global $conn;

    $nis = htmlspecialchars($data["nis"]);
    $id_kategori = $data["id_kategori"];
    $lokasi = htmlspecialchars($data["lokasi"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $tanggal = date("Y-m-d");
    $status = "Menunggu";

    $query = "INSERT INTO aspirasi 
              VALUES (NULL, '$nis', '$id_kategori', '$lokasi', '$keterangan', '', '$tanggal', '$status', '')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/* =========================
   LOGIN
========================= */
function cek_login($username, $password) {
    global $conn;

    // ADMIN
    $q_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($q_admin) > 0) {
        $data = mysqli_fetch_assoc($q_admin);

        $_SESSION['login'] = true;
        $_SESSION['role'] = 'admin';
        $_SESSION['nama'] = $data['nama_petugas'];
        $_SESSION['id'] = $data['id_admin'];

        return "admin";
    }

    // SISWA
    $q_siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$username' AND password='$password'");
    if (mysqli_num_rows($q_siswa) > 0) {
        $data = mysqli_fetch_assoc($q_siswa);

        $_SESSION['login'] = true;
        $_SESSION['role'] = 'siswa';
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id'] = $data['nis'];

        return "siswa";
    }

    return false;
}

/* =========================
   UPDATE STATUS + FEEDBACK
========================= */
function updateStatus($id, $status, $feedback) {
    global $conn;

    $status = htmlspecialchars($status);
    $feedback = htmlspecialchars($feedback);

    $query = "UPDATE aspirasi 
              SET status='$status', feedback='$feedback'
              WHERE id_aspirasi='$id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/* =========================
   HAPUS DATA
========================= */
function hapusAspirasi($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM aspirasi WHERE id_aspirasi='$id'");
    return mysqli_affected_rows($conn);
}
?>