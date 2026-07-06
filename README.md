<p align="center">
  <img src="public/logo.png" alt="Matrix Logo" width="120">
</p>

<h1 align="center">MATRIX</h1>
<p align="center"><b>Aplikasi Penyewaan Komputer Warnet Berbasis Web</b></p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white">
  <img src="https://img.shields.io/badge/PHP-%5E8.2-777BB4?logo=php&logoColor=white">
  <img src="https://img.shields.io/badge/MySQL-database-4479A1?logo=mysql&logoColor=white">
  <img src="https://img.shields.io/badge/TailwindCSS-4-06B6D4?logo=tailwindcss&logoColor=white">
  <img src="https://img.shields.io/badge/Vite-6-646CFF?logo=vite&logoColor=white">
  <img src="https://img.shields.io/badge/Payment-Xendit-1868DB">
  <img src="https://img.shields.io/badge/status-academic%20project-yellow">
</p>

---

## 📌 Tentang Proyek

**Matrix** adalah platform penyewaan komputer berbasis web yang dirancang untuk operasional warung internet (warnet) modern. Aplikasi ini dikembangkan sebagai proyek **Proyek Berbasis Pembelajaran (PBL)** oleh mahasiswa Program Studi Teknik Informatika, **Politeknik Negeri Batam**.

Matrix menjembatani proses **booking online** dengan **aktivasi fisik di lokasi warnet**: pengguna memesan dan membayar sewa komputer secara online, lalu memasukkan kode aktivasi unik saat tiba di warnet untuk memulai sesi pemakaian. Status setiap unit komputer (tersedia, akan digunakan, sedang online, atau maintenance) dihitung secara real-time berdasarkan jadwal sewa yang tersimpan di database.

## 👥 Tim Pengembang

Proyek ini dikembangkan oleh **Kelompok 7** — Program Studi Teknik Informatika, Politeknik Negeri Batam:

| Nama | NIM |
|---|---|
| Nasrullah (achul) | 3312401030 |
| Arabella Advania Ginting | 3312401049 |
| Nabila Maya Shafira | 3312401053 |
| Salsa Putri Ajriyanti | 3312401043 |

## ✨ Fitur Utama

### 🙋 Sisi Pengguna (User)
- Registrasi & login manual, serta login dengan **Google OAuth**
- Lupa password dengan verifikasi kode **OTP via email**
- Pencarian & filter komputer berdasarkan spesifikasi (CPU, GPU, RAM, lantai/ruang)
- Sistem **saldo (token)** untuk pembayaran, dengan top up online via **Xendit** dan penukaran **kupon**
- Booking jadwal sewa komputer beserta **kode aktivasi** unik untuk memulai sesi di lokasi
- Riwayat top up dan riwayat sewa
- Invoice / struk digital yang dapat diunduh (PDF)
- Pengaturan profil: foto, data akun, ubah password, hapus akun
- Formulir kritik & saran

### 🛠️ Sisi Admin
- Login admin terpisah dengan middleware berbasis peran (role-based)
- Dashboard **live rent report** — memantau sewa yang sedang aktif secara real-time
- Laporan sewa & laporan top up
- Manajemen komputer (CRUD) beserta monitoring status tiap unit
- Manajemen akun pengguna (tambah, edit, ban/unban, hapus, top up manual)
- Manajemen kupon promo
- Manajemen multi-admin
- Manajemen informasi & event warnet
- Manajemen kritik & saran, dapat diekspor ke **Excel** dan **PDF**
- Pengaturan warnet (jumlah komputer tersedia, status operasional)

## ⚙️ Alur Kerja Singkat

1. Pengguna mendaftar/masuk, lalu **top up saldo** melalui Xendit atau kupon.
2. Pengguna mencari komputer yang tersedia dan **memesan jadwal sewa**.
3. Sistem menghasilkan **kode aktivasi** unik untuk pemesanan tersebut.
4. Saat tiba di warnet, pengguna memasukkan kode aktivasi → status komputer otomatis berubah menjadi *online* dan sesi mulai dihitung.
5. Sistem menghitung status komputer secara real-time (*available / prepare / online / maintenance*) serta biaya tambahan (*overtime*) bila pemakaian melebihi durasi yang dipesan.
6. Admin memantau seluruh transaksi, sewa, dan laporan melalui dashboard.

## 🧰 Teknologi yang Digunakan

**Backend**
- Laravel 12 (PHP ^8.2)
- Laravel Sanctum (autentikasi API)
- Laravel Socialite (login Google)
- MySQL

**Frontend**
- Blade Templating
- Tailwind CSS 4 & Bootstrap 5
- Flowbite (komponen UI)
- ApexCharts (grafik/laporan)
- Tiptap (rich text editor)
- Cropper.js (crop foto profil)
- Vite (build tool)

**Payment & Utilitas**
- Xendit PHP SDK (payment gateway)
- barryvdh/laravel-dompdf (invoice & laporan PDF)
- maatwebsite/excel (ekspor laporan Excel)
- intervention/image (pengolahan gambar)
- anhskohbo/no-captcha (Google reCAPTCHA)

## 🗄️ Struktur Data Utama

Entitas inti pada basis data meliputi: `users`, `admins`, `products` (unit komputer), `rentals`, `rental_reports`, `payment_report`, `topup_report`, `coupons`, `coupons_report`, `events`, `user_suggests`, `user_otp_codes`, `activation_logs`, dan `warnet_settings`.

Relasi utama:
- `User` **hasMany** `Rental`, `TopUpReport`, `PaymentReport`
- `Product` **hasMany** `Rental`; setiap `Rental` **belongsTo** `Product` dan `User`
- `Rental` **hasMany** `ActivationLog` (riwayat percobaan aktivasi kode)
- `Rental` **hasOne** `RentalReport` (ringkasan sesi setelah selesai)

## 📂 Struktur Direktori (Ringkas)

```
app/
 ├─ Http/Controllers/   → Logic seluruh fitur (Auth, Product, Rental, Topup, Payment, Admin, dst.)
 ├─ Http/Middleware/    → IsAdmin, UpdateLastOnline
 ├─ Models/             → Eloquent models
 ├─ Mail/                → Template email OTP
 ├─ Exports/             → Kelas ekspor Excel
database/
 ├─ migrations/         → Skema tabel
 ├─ seeders/             → Data awal (admin, produk, kupon, dsb.)
resources/
 └─ views/pages/         → 35 halaman Blade (sisi user & admin)
routes/
 └─ web.php              → Seluruh rute aplikasi
```

## 🚀 Instalasi & Menjalankan Proyek

### Prasyarat
- PHP >= 8.2 & Composer
- Node.js >= 18 & NPM
- MySQL

> 💡 Repositori ini juga menyertakan runtime portable PHP (folder `php/`) dan Node.js (folder `nodejs/`) untuk Windows beserta `start.sh`, agar proyek tetap bisa dijalankan di perangkat tanpa instalasi PHP/Node secara global. Lihat `how_to_use_nodejs_portable.txt` untuk panduannya. Jika PHP & Node sudah terpasang di sistem, cukup ikuti langkah standar di bawah ini.

### Langkah Instalasi

**1. Clone repositori**
```bash
git clone https://github.com/achul-cos/project-matrix-pbl.git
cd project-matrix-pbl
```

**2. Install dependency**
```bash
composer install
npm install
```

**3. Salin file environment & generate app key**
```bash
cp .env.example .env
php artisan key:generate
```

**4. Atur variabel pada `.env`** (lihat bagian [Konfigurasi Environment](#-konfigurasi-environment))

**5. Jalankan migrasi & seeder**
```bash
php artisan migrate --seed
```

**6. Jalankan aplikasi**
```bash
php artisan serve
npm run dev
```

**7. Buka di browser**
```
http://127.0.0.1:8000
```

### 🔑 Konfigurasi Environment

Isi variabel berikut pada `.env` sesuai kredensial masing-masing:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=matrix
DB_USERNAME=root
DB_PASSWORD=

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/login/google/callback

XENDIT_SECRET_KEY=
XENDIT_CALLBACK_TOKEN=

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls

NOCAPTCHA_SITEKEY=
NOCAPTCHA_SECRET=
```

> ⚠️ Gunakan nilai placeholder di atas hanya sebagai contoh. Jangan pernah menyimpan kredensial asli (password database, secret key, app password email) pada file yang ikut ter-commit ke repositori publik.

### 🔐 Akun Default (Hasil Seeder)

| Peran | Email | Password |
|---|---|---|
| Super Admin | superadmin@warnet.com | password123 |
| Admin | admin@warnet.com | admin123 |

*(Ganti kredensial ini sebelum digunakan pada environment produksi.)*

## 🎥 Dokumentasi & Demo

- ▶️ Presentasi AAS: [YouTube](https://youtu.be/vFuJpwbProo)
- ▶️ Tutorial Penggunaan Aplikasi: [YouTube](https://youtu.be/RVzrvbb6bec)
- 📄 Laporan AAS: [`LAPORAN AAS_KEL7_MATRIX_IF2B PAGI.pdf`](./LAPORAN%20AAS_KEL7_MATRIX_IF2B%20PAGI.pdf)
- 📄 Laporan ATS: [`Laporan ATS_Pagi_Kelp7_Aplikasi Penyewaan Komputer Warung Internet.pdf`](./Laporan%20ATS_Pagi_Kelp7_Aplikasi%20Penyewaan%20Komputer%20Warung%20Internet.pdf)
- 🎬 Video Presentasi Capaian Proyek ATS: [`Presentasi Capain Proyek ATS Kelompok 7 - Matrix.mp4`](./Presentasi%20Capain%20Proyek%20ATS%20Kelompok%207%20-%20Matrix.mp4)

## 📄 Lisensi & Konteks Akademik

Proyek ini dikembangkan untuk keperluan akademik mata kuliah **Proyek Berbasis Pembelajaran (PBL)**, Program Studi Teknik Informatika, **Politeknik Negeri Batam**.
