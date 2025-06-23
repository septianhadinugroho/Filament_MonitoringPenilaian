# Sistem Monitoring Penilaian Siswa

Sebuah aplikasi web yang dibangun untuk memantau nilai akademik siswa. Aplikasi ini memiliki tiga panel berbeda berdasarkan peran pengguna: Admin, Guru, dan Siswa. Dibangun menggunakan TALL stack (Tailwind CSS, Alpine.js, Laravel, dan Livewire) dengan panel administrasi yang powerful dari Filament.

## 🌟 Fitur Utama

Aplikasi ini menyediakan fungsionalitas yang disesuaikan untuk setiap peran pengguna:

### 👨‍💻 Panel Admin (`/admin`)

Panel Admin memiliki kontrol penuh atas data master dalam sistem.

  * **Manajemen Pengguna**: Mengelola semua akun pengguna (Admin, Guru, Siswa).
  * **Manajemen Kelas**: Membuat, mengubah, dan menghapus data kelas.
  * **Manajemen Mata Pelajaran**: Mengelola daftar mata pelajaran yang tersedia di sekolah.
  * **Manajemen Penilaian**: Mengelola data penilaian secara keseluruhan.

### 👩‍🏫 Panel Guru (`/guru`)

Panel Guru dirancang untuk membantu guru memantau dan mengelola nilai siswa dengan efisien.

  * **Monitoring Nilai**: Memantau nilai siswa untuk setiap mata pelajaran dan kelas yang diajar.
  * **Statistik Kelas**: Widget untuk melihat statistik performa kelas secara keseluruhan.
  * **Distribusi Nilai**: Widget untuk melihat distribusi nilai siswa dalam bentuk chart.

### 🎓 Panel Siswa (`/siswa`)

Panel Siswa memberikan akses kepada siswa untuk melihat progres akademik mereka.

  * **Lihat Nilai**: Siswa dapat melihat daftar nilai yang telah mereka peroleh.
  * **Statistik Nilai**: Widget yang menampilkan statistik nilai individu.
  * **Grafik Nilai**: Widget yang menyajikan perkembangan nilai dalam bentuk grafik.

## 🛠️ Teknologi yang Digunakan

  * **Backend**: Laravel 11
  * **Frontend & Panel**: Filament 3, Tailwind CSS, Alpine.js
  * **Bahasa**: PHP 8.2

## 🚀 Instalasi dan Setup

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

1.  **Clone repositori:**

    ```bash
    git clone https://github.com/septianhadinugroho/Filament_MonitoringPenilaian.git
    cd Filament_MonitoringPenilaian
    ```

2.  **Install dependensi PHP & JS:**

    ```bash
    composer install
    npm install
    ```

3.  **Buat file `.env`:**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.

    ```bash
    cp .env.example .env
    ```

4.  **Generate application key:**

    ```bash
    php artisan key:generate
    ```

5.  **Jalankan migrasi dan seeder database:**
    Perintah ini akan membuat struktur tabel dan mengisi data awal yang diperlukan.

    ```bash
    php artisan migrate --seed
    ```

6.  **Jalankan development server:**

    ```bash
    php artisan serve
    ```

7.  **Akses Aplikasi:**
    Aplikasi akan berjalan di `http://127.0.0.1:8000`. Panel dapat diakses melalui:

      * Admin: `http://127.0.0.1:8000/admin`
      * Guru: `http://127.0.0.1:8000/guru`
      * Siswa: `http://127.0.0.1:8000/siswa`

## 🔑 Akun Default

Anda dapat membuat pengguna baru melalui seeder atau menggunakan `php artisan tinker`.

**Contoh membuat admin via Tinker:**

```bash
php artisan tinker
```

```php
User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'role' => 'admin' // role bisa 'admin', 'guru', atau 'siswa'
]);
```

-----
