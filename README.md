# InstaApp 📸

InstaApp adalah aplikasi web sederhana yang terinspirasi dari Instagram, dibangun menggunakan **Laravel**.  
Aplikasi ini memungkinkan pengguna untuk berbagi postingan berupa gambar dan caption, serta berinteraksi melalui like dan komentar.

---

## 🚀 Fitur Utama

-   🔐 **Autentikasi Pengguna**

    -   Register
    -   Login
    -   Logout

-   🖼️ **Post**

    -   Upload gambar
    -   Tambah caption
    -   Melihat daftar post pengguna lain

-   ❤️ **Like**

    -   User login dapat menyukai post
    -   Satu user hanya dapat memberikan satu like per post

-   💬 **Komentar**

    -   User login dapat memberikan komentar
    -   Menampilkan daftar komentar pada setiap post

-   🛡️ **Hak Akses**
    -   Hanya user yang sudah login yang bisa:
        -   Membuat post
        -   Like post
        -   Memberi komentar
    -   Post hanya bisa dihapus oleh pemiliknya

---

## 🧰 Prerequisite

Pastikan environment lokal kamu sudah memiliki:

-   PHP >= 8.1
-   Composer
-   MySQL
-   Node.js & NPM (untuk asset build)
-   Git

---

## ⚙️ Cara Menjalankan di Local

### 1️⃣ Clone Repository

1. Clone repo
2. Buka folder, run `composer install`
3. Lalu run `npm install`
4. Copy file `.env.example` menjadi `.env`
5. Generate app key `php artisan key:generate`
6. Sesuaikan konfigurasi database pada file .env

```env
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...
```

7. Migrasi Database `php artisan migrate`
8. Run `php artisan storage:link`
9. Jalankan app dengan `php artisan serve`

## 🎥 Demo Aplikasi

📺 Video Demo:


