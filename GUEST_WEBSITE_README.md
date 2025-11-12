# Website Guest - Sistem Informasi Persil Pertanahan

## Deskripsi
Website guest untuk mengelola data persil pertanahan dengan fitur CRUD (Create, Read, Update, Delete) lengkap menggunakan template Hielo yang sudah tersedia.

## Fitur yang Tersedia

### 1. **Halaman Home (Index)**
- Menampilkan semua data persil dalam bentuk card grid
- Pagination otomatis (12 data per halaman)
- Search dan filter data
- Tombol aksi: Detail, Edit

**URL:** `/` atau `http://localhost/`

### 2. **Halaman Detail Persil**
- Menampilkan informasi lengkap persil
- Data pemilik, dokumen terkait, peta, dan sengketa
- Tombol aksi: Kembali, Edit, Hapus

**URL:** `/guest/persil/{id}`

### 3. **Halaman Tambah Data**
- Form untuk menambah data persil baru
- Validasi input otomatis
- Field yang tersedia:
  - Kode Persil (wajib, unique)
  - Luas (m²)
  - Penggunaan Lahan
  - Alamat Lahan
  - RT / RW

**URL:** `/guest/persil/create`

### 4. **Halaman Edit Data**
- Form untuk mengubah data persil
- Pre-filled dengan data existing
- Validasi yang sama dengan create

**URL:** `/guest/persil/{id}/edit`

### 5. **Fitur Hapus Data**
- Konfirmasi sebelum menghapus
- Redirect ke halaman index setelah berhasil

## Routes yang Tersedia

```php
GET    /                           -> Halaman Home (Daftar Persil)
GET    /guest/persil/create        -> Form Tambah Data
POST   /guest/persil               -> Simpan Data Baru
GET    /guest/persil/{id}          -> Detail Persil
GET    /guest/persil/{id}/edit     -> Form Edit Data
PUT    /guest/persil/{id}          -> Update Data
DELETE /guest/persil/{id}          -> Hapus Data
```

## Struktur File

### Controllers
- `app/Http/Controllers/GuestPersilController.php` - Controller utama untuk guest

### Models
- `app/Models/Persil.php` - Model untuk data persil
- `app/Models/User.php` - Model untuk user/pemilik
- `app/Models/DokumenPersil.php` - Model untuk dokumen
- `app/Models/PetaPersil.php` - Model untuk peta
- `app/Models/SengketaPersil.php` - Model untuk sengketa

### Views
```
resources/views/
├── layouts/
│   └── guest.blade.php           (Layout utama menggunakan template Hielo)
└── guest/
    └── persil/
        ├── index.blade.php       (Daftar persil)
        ├── show.blade.php        (Detail persil)
        ├── create.blade.php      (Form tambah)
        └── edit.blade.php        (Form edit)
```

### Template Assets
```
public/guest-tamplate/
├── assets/
│   ├── css/
│   │   └── main.css
│   └── js/
│       ├── jquery.min.js
│       ├── skel.min.js
│       └── main.js
└── images/
    ├── slide01.jpg - slide05.jpg (Banner images)
    └── pic01.jpg - pic04.jpg (Content images)
```

## Cara Menjalankan

### 1. Setup Database
Pastikan database sudah dikonfigurasi di file `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=persil_guest
DB_USERNAME=root
DB_PASSWORD=
```

### 2. Jalankan Migration (Jika belum)
```bash
php artisan migrate
```

### 3. Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### 4. Jalankan Development Server
```bash
php artisan serve
```

### 5. Akses Website
Buka browser dan akses: `http://localhost:8000` atau `http://localhost`

## Testing CRUD Operations

### Create (Tambah Data)
1. Klik tombol "Tambah Data Persil" di halaman home
2. Isi form dengan data:
   - Kode Persil: PRS-004 (harus unique)
   - Luas: 600.50
   - Penggunaan: Perumahan
   - Alamat: Jl. Test No. 1
   - RT: 001
   - RW: 002
3. Klik "Simpan"
4. Akan redirect ke halaman detail

### Read (Lihat Data)
1. Di halaman home, semua data ditampilkan dalam bentuk cards
2. Klik "Detail" untuk melihat informasi lengkap

### Update (Edit Data)
1. Di halaman detail atau index, klik "Edit"
2. Ubah data yang diinginkan
3. Klik "Update"
4. Akan redirect ke halaman detail dengan pesan sukses

### Delete (Hapus Data)
1. Di halaman detail, klik "Hapus"
2. Konfirmasi penghapusan
3. Data akan dihapus dan redirect ke halaman home

## Validasi Input

### Kode Persil
- Wajib diisi
- Maksimal 50 karakter
- Harus unique (tidak boleh sama)

### Luas (m²)
- Optional
- Harus berupa angka
- Tidak boleh negatif

### Field Lainnya
- Semua optional
- RT/RW maksimal 5 karakter

## Fitur Keamanan

1. **CSRF Protection** - Semua form dilindungi token CSRF
2. **Validation** - Input validation di server side
3. **Error Handling** - Try-catch untuk semua operasi database
4. **SQL Injection Prevention** - Menggunakan Eloquent ORM

## Troubleshooting

### Error: Class not found
```bash
composer dump-autoload
```

### Error: View not found
```bash
php artisan view:clear
```

### Error: Route not found
```bash
php artisan route:clear
php artisan route:list
```

### Database Connection Error
- Cek konfigurasi `.env`
- Pastikan MySQL server berjalan
- Cek username dan password database

## Sample Data
Sudah dibuat 3 data sample:
- PRS-001: Perumahan, 500.50 m²
- PRS-002: Pertanian, 750.25 m²
- PRS-003: Komersial, 1000.00 m²

## Notes
- Pagination menampilkan 12 data per halaman
- Banner images akan rotate otomatis (menggunakan template slider)
- Responsive design untuk mobile dan desktop
- Semua error akan menampilkan pesan yang user-friendly

## Contact & Support
Jika ada bug atau error, silakan laporkan ke developer.

---
**Dibuat dengan:** Laravel 11.x + Template Hielo
**Database:** MySQL
**Tanggal:** November 2025
