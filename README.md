# DAMRI UNSRI

Website pemesanan tiket dan informasi rute bus DAMRI untuk mahasiswa UNSRI. Dibangun dengan PHP, MySQL, Tailwind CSS, dan Leaflet untuk peta.

## Cara Menjalankan

1. Install [XAMPP](https://www.apachefriends.org/) lalu jalankan **Apache** dan **MySQL**.

2. Clone project ke folder `htdocs`:
```bash
cd C:\xampp\htdocs
git clone <url-repo-kamu> DAMRI-UNSRI
```
3. Buka phpMyAdmin, lalu import file `database/schema.sql`. Database `damri_unsri` akan dibuat otomatis.

4. Cek `backend/config/database.php`, sesuaikan `$port` dengan port MySQL XAMPP kamu (default 3306).

5. Install dependensi dan jalankan Tailwind:
```bash
npm install
npm run damri
```
Biarkan terminal tetap terbuka selama development. Tekan `Ctrl + C` untuk menghentikannya.

6. Buka di browser:
   - Halaman login (sementara): `http://localhost/DAMRI-UNSRI/public/frontend/login_page.php`
   - Halaman utama: `http://localhost/DAMRI-UNSRI/public/frontend/index.php`