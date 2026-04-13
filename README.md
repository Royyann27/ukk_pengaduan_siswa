# ✨ MyAspirasi - Sistem Pengaduan Siswa

Aplikasi berbasis web untuk mempermudah siswa dalam menyampaikan aspirasi, laporan, atau pengaduan kepada pihak sekolah secara digital.

---

## 🎯 Fitur Utama

### 👨‍🎓 Siswa

* Mengirim laporan / aspirasi
* Upload bukti foto
* Edit laporan (jika belum diproses)
* Hapus laporan
* Melihat status laporan
* Melihat tanggapan admin

### 🧑‍💼 Admin

* Melihat semua laporan siswa
* Filter laporan (kategori, status, tanggal)
* Mengubah status laporan
* Memberikan tanggapan
* Hapus laporan
* Cetak laporan (PDF / print)

---

## 🔐 Login Aplikasi

### 👨‍💼 Admin

* **Username:** `admin_royyan`
* **Password:** `Admin123`

### 👨‍🎓 Siswa

* Registrasi terlebih dahulu melalui halaman **Register**
* Login menggunakan **NIS dan Password**

---

## 🧭 Cara Menggunakan Aplikasi

### 🔹 1. Login

1. Buka aplikasi melalui browser
2. Masukkan username & password
3. Klik tombol **Login**

---

### 🔹 2. Menu Siswa

#### 📝 Kirim Laporan

1. Pilih kategori
2. Isi lokasi kejadian
3. Tulis isi laporan
4. Upload foto (opsional)
5. Klik **Kirim**

#### 📜 Riwayat Laporan

* Melihat semua laporan yang pernah dikirim
* Status:

  * 🔴 Menunggu
  * 🟡 Proses
  * 🟢 Selesai

#### ✏️ Edit Laporan

* Hanya bisa jika status **Menunggu**
* Klik tombol **Edit**

#### 🗑 Hapus Laporan

* Bisa dihapus jika:

  * Status Menunggu / Selesai

---

### 🔹 3. Menu Admin

#### 📊 Dashboard

* Melihat jumlah laporan:

  * Total
  * Diproses
  * Selesai

#### 🔍 Filter Data

* Berdasarkan:

  * Kategori
  * Status
  * Tanggal

#### 📋 Data Laporan

* Melihat semua laporan siswa
* Aksi:

  * Tanggapi laporan
  * Hapus laporan
  * Cetak laporan

#### 💬 Tanggapan Laporan

1. Klik tombol **Tanggapi**
2. Ubah status laporan
3. Isi feedback
4. Klik **Simpan**

---

## 🛠️ Teknologi yang Digunakan

* PHP Native
* MySQL
* Bootstrap 5 (Offline/Online)
* HTML, CSS, JavaScript

---

## 📂 Struktur Folder

```bash
/assets
   /css
   /js
   /img
/layouts
   header.php
   sidebar.php
   footer.php
/functions.php
/index.php
/admin.php
/edit_laporan.php
/register.php
/login.php
/logout.php
/siswa.php
/proses_laporan.php
/print_laporan.php
```

---

## ⚙️ Cara Menjalankan Project

1. Clone repository ini
2. Pindahkan ke folder `htdocs` (XAMPP) atau `www` (Laragon)
3. Import database ke **phpMyAdmin**
4. Jalankan:

```
http://localhost/nama-folder
```

---

## 📌 Catatan

* Pastikan server Apache & MySQL aktif
* Folder `assets/img` harus bisa upload file
* Gunakan browser modern (Chrome/Edge)

---

## 💡 Pengembang

👨‍💻 **Royyan Nur Ramadhani**
Project UKK - Sistem Pengaduan Siswa

---

## ⭐ Penutup

Aplikasi ini dibuat untuk mempermudah komunikasi antara siswa dan pihak sekolah secara digital, cepat, dan transparan.

---
