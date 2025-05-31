# Sistem Informasi Pemesanan dan Pengelolaan Bahan Baku

**Nama**: Davina Aura  
**NPM**: 2308107010052

---

## Deskripsi Singkat Aplikasi

Aplikasi ini adalah sistem berbasis web untuk mengelola data bahan baku dan proses pemesanan bahan baku.  
Pengguna dapat melakukan input, edit, dan hapus data bahan baku serta pemesanan dengan mudah dan terorganisir.  
Aplikasi ini dilengkapi dengan fitur login agar akses data dapat dijaga keamanannya.

---

## Penjelasan Kode dan User Interface

- Kode aplikasi menggunakan framework Laravel, dengan struktur Model-View-Controller (MVC).  
- Model berada di folder `app/Models` yang mengatur interaksi dengan database.  
- Controller di `app/Http/Controllers` menangani logika aplikasi dan proses permintaan dari pengguna.  
- User Interface dibuat dengan Blade templating di `resources/views`, menyediakan tampilan halaman login, halaman bahan baku, dan halaman pemesanan.  
- Desain halaman dibuat sederhana dan responsif agar mudah digunakan oleh pengguna.

### Cara Instalasi Aplikasi

1. **Clone repository dari GitHub:**

   ```bash
   git clone https://github.com/usernamekamu/namarepo.git
   cd namarepo
   ```

2. **Install dependency dengan Composer:**

   ```bash
   composer install
   ```

3. **Buat file konfigurasi `.env`:**

   ```bash
   cp .env.example .env
   ```

4. **Generate application key:**

   ```bash
   php artisan key:generate
   ```

5. **Lakukan migrasi database dan isi data awal:**

   ```bash
   php artisan migrate --seed
   ```

6. **Jalankan server lokal Laravel:**

   ```bash
   php artisan serve
   ```

7. **Akses aplikasi melalui browser:**

   ```
   http://127.0.0.1:8000
