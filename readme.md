# Market Project

Market Project adalah aplikasi web sederhana untuk mengelola transaksi penjualan barang.

Project ini dibuat sebagai project pembelajaran untuk menerapkan **CodeIgniter 3**, database, autentikasi pengguna, serta konsep CRUD dan transaksi dalam sebuah aplikasi web.

## 🎯 Tujuan Project

Project ini dikembangkan secara bertahap dengan tujuan mempelajari dan menerapkan:

- CodeIgniter 3
- PHP
- MySQL
- HTML, CSS, dan JavaScript
- CRUD
- Authentication & Authorization
- Relasi database
- Transaksi penjualan
- Git & GitHub
- Struktur aplikasi MVC

## 👥 Role Pengguna

Aplikasi direncanakan memiliki dua jenis pengguna:

### 🛒 Pembeli

Pembeli dapat:

- Login ke dalam sistem
- Melihat daftar produk
- Melihat detail produk
- Membeli produk
- Melihat transaksi yang dilakukan

### 🏪 Penjual

Penjual dapat:

- Login ke dalam sistem
- Mengelola produk
- Menambahkan produk
- Mengubah produk
- Menghapus produk
- Mengelola stok
- Melihat transaksi penjualan

## 🗃️ Rancangan Data

Beberapa tabel yang akan digunakan dalam project ini antara lain:

- `users`
- `produk`
- `transaksi`
- `detail_transaksi`

Struktur database akan dikembangkan secara bertahap sesuai kebutuhan aplikasi.

## 🛠️ Teknologi

Project ini menggunakan:

| Teknologi | Keterangan |
|---|---|
| PHP | Bahasa pemrograman |
| CodeIgniter 3 | Framework |
| MySQL | Database |
| HTML | Struktur halaman |
| CSS | Tampilan |
| JavaScript | Interaksi halaman |
| Git | Version control |
| GitHub | Repository |

## 📁 Struktur Project

Project menggunakan struktur standar CodeIgniter 3:

```text
Market-Project/
├── application/
├── system/
├── tests/
├── .github/
├── .gitignore
├── composer.json
├── index.php
└── README.md