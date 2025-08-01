# Smart CRM - Aplikasi Customer Relationship Management Sederhana

Aplikasi web CRM sederhana yang dibangun untuk memenuhi tugas seleksi Fullstack Developer. Aplikasi ini bertujuan untuk mendigitalisasi proses kerja divisi sales di PT. Smart, sebuah perusahaan Internet Service Provider.

---

## 📋 Fitur Utama

- **Autentikasi Pengguna**: Sistem login dan registrasi yang aman.
- **Manajemen Peran (Roles)**: Terdapat dua peran pengguna, yaitu **Sales** dan **Manajer**, dengan hak akses yang berbeda.
- **CRUD Produk**: Manajemen data master untuk produk atau layanan internet yang ditawarkan.
- **Manajemen Leads**: Manajemen data calon pelanggan (leads).
- **Alur Kerja Approval**: Sales dapat mengajukan *lead* menjadi *project* yang kemudian akan disetujui atau ditolak oleh Manajer.
- **Manajemen Customer**: Setelah disetujui, *lead* secara otomatis menjadi *customer*.
- **Manajemen Langganan**: Pengguna dapat menambahkan layanan/produk ke *customer* yang sudah ada.
- **Dasbor Dinamis**: Tampilan dasbor yang berbeda sesuai dengan peran pengguna (Sales/Manajer).

---

## 💻 Tumpukan Teknologi (Tech Stack)

- **Framework**: Laravel 11
- **Frontend**: Blade, Tailwind CSS, Alpine.js
- **Database**: PostgreSQL
- **Development Tools**: Vite, Composer, NPM

---

## 🚀 Instalasi & Cara Menjalankan

Berikut adalah langkah-langkah untuk menjalankan proyek ini secara lokal.

1.  **Clone Repositori**
    ```bash
    git clone [URL_REPOSITORI_ANDA]
    cd nama_repositori
    ```

2.  **Install Dependensi**
    Pastikan Anda memiliki Composer dan Node.js terinstal.
    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment**
    Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```
    Buka file `.env` dan sesuaikan konfigurasi database PostgreSQL Anda:
    ```env
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=nama_database_anda
    DB_USERNAME=user_database_anda
    DB_PASSWORD=password_database_anda
    ```

4.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5.  **Jalankan Server**
    Jalankan server development Laravel dan proses build Vite secara bersamaan.

    * Di terminal pertama:
    ```bash
    php artisan serve
    ```
    * Buka terminal kedua dan jalankan:
    ```bash
    npm run dev
    ```
    Aplikasi sekarang bisa diakses di `http://127.0.0.1:8000`.

---

## 🧑‍💻 Cara Penggunaan

Aplikasi ini sudah dilengkapi dengan dua akun default untuk pengujian.

* **Akun Sales**:
    * **Email**: `sales@gmail.com`
    * **Password**: `00000000`

* **Akun Manajer**:
    * **Email**: `manajer@gmail.com`
    * **Password**: `00000000`

Silakan login menggunakan salah satu akun di atas untuk menguji alur kerja sesuai perannya masing-masing.

---

## 👤 Penulis

- **Nama**: Naufal Firman Dhani

## ⏰ Waktu Pengerjaan

- **Mulai**: 31-07-2025 pukul 14.00
- **Selesai**: 01-08-2025 pukul 15.00
````
