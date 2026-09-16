# LamasiBantu — SIP-BANSOS Kelurahan Lamasi

> **Sistem Informasi Pengelolaan Data Penerima Bantuan Sosial**
> Kantor Kelurahan Lamasi, Kecamatan Lamasi, Kabupaten Luwu, Sulawesi Selatan.

Sistem berbasis web yang menggantikan pencatatan bantuan sosial secara manual (kertas/dokumen terpisah) menjadi sistem terkomputerisasi yang terintegrasi — mencakup pendataan penerima, pengajuan, verifikasi, penyaluran bantuan, dan laporan.

---

## 🗂 Daftar Isi

- [Tech Stack](#-tech-stack)
- [Fitur Utama](#-fitur-utama)
- [Prasyarat](#-prasyarat)
- [Instalasi](#-instalasi)
- [Konfigurasi](#-konfigurasi)
- [Migrasi dan Seeding Database](#-migrasi--seeding-database)
- [Menjalankan Aplikasi](#-menjalankan-aplikasi)
- [Akun Default](#-akun-default)
- [Struktur Proyek](#-struktur-proyek)
- [Role dan Hak Akses](#-role--hak-akses)

---

## 🛠 Tech Stack

| Layer | Teknologi |
|---|---|
| **Backend Framework** | CodeIgniter 4 (v4.7+) |
| **Bahasa Pemrograman** | PHP 8.2+ |
| **Database** | MySQL 8.0 |
| **Frontend / Styling** | Tailwind CSS (via CDN) |
| **Ikon** | Google Material Symbols |
| **Tipografi** | Google Fonts — Inter |
| **Export Excel** | PhpSpreadsheet (v5.9+) |
| **Server Lokal** | XAMPP (Apache + MySQL) |
| **Package Manager** | Composer |

---

## ✨ Fitur Utama

- 🔐 **Autentikasi** — Login/logout berbasis session dengan proteksi route per-role
- 📊 **Dashboard** — Ringkasan KPI: total penerima, pengajuan pending, dana tersalurkan, program aktif
- 👥 **Data Penerima Bantuan** — CRUD lengkap beserta upload foto KTP/KK
- 📦 **Jenis Bantuan** — Kelola program bantuan (PKH, BLT, BPNT, dll.) — khusus Admin
- 📋 **Pengajuan Bantuan** — Ajukan, filter, dan proses verifikasi (setujui/tolak)
- 🚚 **Penyaluran Bantuan** — Catat realisasi distribusi bantuan kepada warga
- 📄 **Laporan** — Cetak dan export Excel per periode, per penerima
- 👤 **Manajemen Pengguna** — Kelola akun dan role sistem — khusus Admin

---

## 📋 Prasyarat

Pastikan perangkat Anda sudah terinstal:

| Software | Versi Minimum | Link Unduh |
|---|---|---|
| **XAMPP** | 8.2+ (PHP 8.2, Apache, MySQL 8.0) | https://www.apachefriends.org/download.html |
| **Composer** | 2.x | https://getcomposer.org/download/ |
| **Git** | 2.x | https://git-scm.com/downloads |
| **Browser** | Google Chrome (disarankan) | https://www.google.com/chrome/ |

> **Catatan:** XAMPP sudah mencakup PHP, Apache, dan MySQL sekaligus. Tidak perlu instalasi terpisah untuk ketiganya.

---

## 🚀 Instalasi

### Langkah 1 — Mulai XAMPP

Buka **XAMPP Control Panel**, lalu klik **Start** pada:
- Apache
- MySQL

### Langkah 2 — Clone atau Salin Proyek

**Opsi A — Clone via Git:**
```bash
git clone https://github.com/username/sistem-bansos-kelurahan-lamasi.git
cd sistem-bansos-kelurahan-lamasi
```

**Opsi B — Unduh ZIP:**
1. Unduh file ZIP dari repository
2. Ekstrak ke folder: `C:\xampp\htdocs\sistem-bansos-kelurahan-lamasi\`

### Langkah 3 — Install Dependensi PHP

Buka terminal / Command Prompt di dalam folder proyek, lalu jalankan:

```bash
composer install
```

> Perintah ini mengunduh semua library yang dibutuhkan (CodeIgniter 4, PhpSpreadsheet, dll.) ke folder `vendor/`.

---

## ⚙️ Konfigurasi

### 1. Buat File `.env`

Salin file template konfigurasi:

```bash
# Windows (Command Prompt)
copy env .env

# Mac / Linux
cp env .env
```

### 2. Edit File `.env`

Buka file `.env` dengan teks editor (Notepad, VS Code, dll.) dan sesuaikan:

```ini
# Ubah mode ke development untuk melihat pesan error detail
CI_ENVIRONMENT = development

# Sesuaikan URL dengan nama folder proyek Anda
app.baseURL = 'http://localhost/sistem-bansos-kelurahan-lamasi/public/'

# Konfigurasi koneksi database
database.default.hostname = localhost
database.default.database = db_bansos_lamasi
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

> **Catatan:** Secara default, XAMPP menggunakan `username = root` dan `password` kosong (tidak ada password).

### 3. Buat Database

1. Buka browser dan akses phpMyAdmin: `http://localhost/phpmyadmin`
2. Klik tab **"Database"**
3. Masukkan nama database: `db_bansos_lamasi`
4. Klik **"Create"**

---

## 🗃 Migrasi & Seeding Database

Buka terminal di dalam folder proyek dan jalankan secara berurutan:

### Langkah 1 — Buat Tabel (Migrasi)

```bash
php spark migrate
```

Perintah ini membuat semua tabel secara otomatis:
- `users` — Akun pengguna sistem
- `penerima_bantuan` — Data warga penerima bantuan
- `jenis_bantuan` — Jenis/program bantuan sosial
- `pengajuan_bantuan` — Data pengajuan bantuan
- `penyaluran_bantuan` — Realisasi penyaluran bantuan

### Langkah 2 — Isi Data Awal (Seeder)

```bash
php spark migrate:refresh && php spark db:seed DatabaseSeeder /
php spark db:seed DatabaseSeeder
```

Perintah ini mengisi data awal ke database:
- 3 akun pengguna default (admin, petugas, lurah)
- Contoh jenis bantuan (PKH, BLT, BPNT, dll.)
- Contoh data penerima bantuan

---

## ▶️ Menjalankan Aplikasi

Pastikan Apache dan MySQL di XAMPP sudah berjalan, lalu buka browser dan akses:

```
http://localhost/sistem-bansos-kelurahan-lamasi/public/
```

Anda akan diarahkan ke halaman **Login**.

---

## 👤 Akun Default

Setelah seeder dijalankan, gunakan akun berikut untuk login:

| Role | Username | Password | Keterangan |
|---|---|---|---|
| **Admin** | `admin` | `password123` | Akses penuh ke semua fitur |
| **Petugas** | `petugas` | `password123` | CRUD data dan laporan |
| **Lurah** | `lurah` | `password123` | View-only dan verifikasi pengajuan |

> ⚠️ **Penting:** Segera ubah password default setelah sistem digunakan secara resmi melalui menu Manajemen Pengguna.

---

## 📁 Struktur Proyek

```
sistem-bansos-kelurahan-lamasi/
├── app/
│   ├── Config/
│   │   ├── Routes.php               # Definisi semua route aplikasi
│   │   └── Filters.php              # Konfigurasi auth filter
│   ├── Controllers/
│   │   ├── Auth.php                 # Login & Logout
│   │   ├── Dashboard.php            # Halaman utama & KPI
│   │   ├── PenerimaBantuan.php      # CRUD data penerima
│   │   ├── JenisBantuan.php         # CRUD jenis bantuan
│   │   ├── PengajuanBantuan.php     # Pengajuan & verifikasi
│   │   ├── PenyaluranBantuan.php    # Realisasi penyaluran
│   │   ├── Pengguna.php             # Manajemen akun
│   │   └── Laporan.php              # Cetak & export laporan
│   ├── Models/                      # Model database per entitas
│   ├── Views/
│   │   ├── layouts/main.php         # Layout utama (sidebar + topbar)
│   │   ├── auth/login.php           # Halaman login
│   │   ├── dashboard/               # Dashboard
│   │   ├── penerima/                # Data penerima (list, form, detail)
│   │   ├── pengajuan/               # Pengajuan (list, form, detail, verifikasi)
│   │   ├── penyaluran/              # Penyaluran (list, form)
│   │   ├── laporan/                 # Laporan (ringkasan, cetak, per penerima)
│   │   └── pengguna/                # Manajemen pengguna
│   ├── Filters/
│   │   └── AuthFilter.php           # Middleware: cek login & role
│   └── Database/
│       ├── Migrations/              # Definisi skema tabel
│       └── Seeds/                   # Data awal (user, jenis bantuan, dll.)
├── public/
│   ├── assets/images/               # Logo & aset gambar
│   └── uploads/ktp/                 # Upload foto KTP penerima
├── desain/                          # Desain UI/UX referensi (mockup)
├── PRD_Backend_Sistem_Bantuan_Lamasi.md  # Dokumen kebutuhan sistem
├── env                              # Template konfigurasi environment
├── composer.json                    # Dependensi PHP
└── spark                            # CLI CodeIgniter
```

---

## 🔑 Role & Hak Akses

| Fitur | Admin | Petugas | Lurah |
|---|:---:|:---:|:---:|
| Dashboard | ✅ | ✅ | ✅ |
| Lihat Data Penerima | ✅ | ✅ | ✅ |
| Tambah / Edit / Hapus Penerima | ✅ | ✅ | ❌ |
| Kelola Jenis Bantuan | ✅ | ❌ | ❌ |
| Lihat Pengajuan | ✅ | ✅ | ✅ |
| Buat / Edit Pengajuan | ✅ | ✅ | ❌ |
| Verifikasi Pengajuan | ✅ | ❌ | ✅ |
| Catat Penyaluran | ✅ | ✅ | ❌ |
| Cetak & Export Laporan | ✅ | ✅ | ✅ |
| Manajemen Pengguna | ✅ | ❌ | ❌ |

---

## 🐛 Masalah Umum

**Q: Halaman menampilkan error 404 "Page Not Found"**
A: Pastikan `app.baseURL` di file `.env` sudah sesuai dengan path folder proyek Anda di htdocs.

**Q: Error koneksi database**
A: Pastikan MySQL di XAMPP sudah berjalan dan konfigurasi database di `.env` (nama DB, username, password) sudah benar.

**Q: Perintah `composer install` gagal**
A: Pastikan Composer sudah terinstal dan versi PHP adalah 8.2+. Cek dengan perintah `php -v`.

**Q: Foto KTP gagal diupload**
A: Buat folder `public/uploads/ktp/` secara manual jika belum ada, lalu pastikan folder tersebut memiliki izin tulis.

---

