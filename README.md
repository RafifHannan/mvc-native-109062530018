# MVC PHP Native - Data Buku

Aplikasi CRUD sederhana untuk mempelajari pola Model-View-Controller pada PHP Native,
dengan studi kasus pengelolaan data buku perpustakaan.

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- Web server lokal seperti XAMPP atau Laragon
- Git

## Instalasi
1. Salin project ke folder web server (htdocs atau www).
2. Import `database/perpustakaan.sql`.
3. Sesuaikan koneksi pada `config/database.php`.
4. Buka `http://localhost/mvc-native/public/index.php`.

## Struktur MVC
- `app/models/`: akses dan operasi data buku.
- `app/controllers/`: alur request dan pemanggilan Model/View.
- `app/views/`: tampilan HTML.
- `config/`: konfigurasi koneksi database.
- `database/`: skema dan data awal SQL.
- `public/`: entry point aplikasi.

## Fitur
- Menampilkan daftar buku
- Menambah data buku
- Mengubah data buku
- Menghapus data buku
- Pesan berhasil dan gagal pada setiap operasi

## Histori Git
Gunakan `git log --oneline --graph --decorate` untuk melihat tahapan pengembangan.