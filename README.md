<h1 align="center">Complaint Management</h1>

## Tentang Aplikasi

Complaint Management adalah sistem untuk mengelola berbagai keluhan penghuni pada sebuah apartemen. Tujuan dari sistem ini adalah mencatat dan menangani setiap keluhan penghuni terkait apartemen mereka. Penghuni tinggal melaporkan apa yang ingin mereka keluhkan, kemudian sistem akan mencarikan petugas untuk menangani keluhan tersebut sesuai kategorinya.

## Cara Menginstal

- Siapkan database mysql
- Clone repository ini https://github.com/Ahmad0126/SmartCPM
- Jalankan perintah `composer install`
- Buat file `.env` sesuaikan dengan lingkungan database anda
- Jalankan perintah `php artisan key:generate` dan `php artisan migrate --seed`
- Aplikasi siap digunakan

## Cara Menjalankan

- Jalankan perintah `php artisan serve`
- Login dengan akun super admin `email: "superadmin@example.com"` `password:"password"`

