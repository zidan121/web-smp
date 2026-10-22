# Website SMPIT Al Firdaus Purwodadi

Website sekolah berbasis CodeIgniter 4 dengan panel admin untuk mengelola profil, program, berita, galeri, dan prestasi.

## Persyaratan
- PHP 8.2 atau lebih baru
- Composer
- MySQL/MariaDB
- Extension PHP: `intl`, `mbstring`, `mysqli`, `json`, `curl`, dan `xml`

## Persiapan lokal dengan XAMPP (Windows)

1. Tarik source code terbaru dan pasang dependensi:

```powershell
git checkout main
git pull origin main
composer install
```

2. Buat file konfigurasi lokal dari template:

```powershell
Copy-Item env.example .env
```

3. Periksa nilai di `.env`:
   - `app.baseURL = 'http://localhost:8000/'`
   - `database.default.database = smpit_alfirdaus`
   - `database.default.username = root`
   - `database.default.password =` (kosong jika MySQL lokal tidak memakai password)
   - `database.default.port = 3307` (ganti menjadi `3306` bila itu port MySQL Anda)

Sesuaikan nilainya dengan database yang benar-benar ada di phpMyAdmin. Jangan impor ulang backup atau menjalankan migration/seeder sebelum memastikan status database.

4. Jalankan server pengembangan:

```powershell
php spark serve --port 8000
```

Kemudian buka `http://localhost:8000`.

## Keamanan dan deployment
- Jangan commit `.env`, password database, token, atau encryption key asli.
- Di production, atur `CI_ENVIRONMENT = production`, gunakan HTTPS, dan kredensial database khusus dengan hak akses minimum.
- Biarkan `app.forceGlobalSecureRequests = false` untuk HTTP lokal. Ubah ke `true` hanya setelah HTTPS production berjalan.
- Arahkan document root Apache/Nginx ke folder `public/`, bukan ke root repository.
- Filter CSRF dan secure headers yang dikonfigurasi di aplikasi harus tetap aktif.
