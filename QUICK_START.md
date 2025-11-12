# 🚀 Quick Start Guide - Website Guest Persil

## Langkah Cepat Memulai

### 1️⃣ Start Development Server
```bash
php artisan serve
```

### 2️⃣ Buka Browser
```
http://localhost:8000
```

### 3️⃣ Selesai! 🎉
Website guest sudah bisa digunakan!

---

## 📋 Fitur Yang Bisa Langsung Digunakan

### ✅ Lihat Daftar Persil
- Buka homepage: `http://localhost:8000`
- Anda akan melihat 3 data sample yang sudah ada

### ✅ Tambah Data Baru
1. Klik tombol **"Tambah Data Persil"**
2. Isi form:
   - **Kode Persil**: PRS-004 (harus unique!)
   - **Luas**: 850.75
   - **Penggunaan**: Pertanian
   - **Alamat**: Jl. Raya Desa No. 99
   - **RT**: 005
   - **RW**: 003
3. Klik **"Simpan"**
4. ✅ Data berhasil ditambahkan!

### ✅ Lihat Detail
1. Di homepage, klik tombol **"Detail"** pada salah satu card
2. Lihat informasi lengkap persil

### ✅ Edit Data
1. Di halaman detail, klik **"Edit"**
2. Ubah data yang diinginkan
3. Klik **"Update"**
4. ✅ Data berhasil diupdate!

### ✅ Hapus Data
1. Di halaman detail, klik **"Hapus"**
2. Konfirmasi di popup
3. ✅ Data berhasil dihapus!

---

## 🎯 URL Penting

| Fungsi | URL |
|--------|-----|
| Homepage (List) | `http://localhost:8000/` |
| Tambah Data | `http://localhost:8000/guest/persil/create` |
| Detail | `http://localhost:8000/guest/persil/{id}` |
| Edit | `http://localhost:8000/guest/persil/{id}/edit` |

---

## 💾 Database Info

**Database Name:** `persil_guest`

**Sample Data:**
- PRS-001 (Perumahan)
- PRS-002 (Pertanian)
- PRS-003 (Komersial)

---

## 🐛 Troubleshooting Cepat

### Website tidak bisa diakses?
```bash
# Pastikan server running
php artisan serve
```

### Error 500?
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Database error?
```bash
# Cek file .env
# Pastikan database sudah dibuat
# Jalankan migration jika belum
php artisan migrate
```

### Asset/gambar tidak muncul?
```bash
# Pastikan folder public/guest-tamplate ada
# Refresh browser dengan Ctrl+F5
```

---

## ✨ Tips

1. **Kode Persil harus UNIQUE** - Tidak boleh sama dengan yang sudah ada
2. **Luas harus angka** - Bisa desimal (contoh: 500.50)
3. **Semua field optional** - Kecuali Kode Persil
4. **RT/RW max 5 karakter** - Contoh: 001, 02, 123

---

## 📱 Testing Di Mobile

Buka di browser mobile:
```
http://192.168.x.x:8000
```
(Ganti IP dengan IP komputer Anda)

---

## 🎨 Kustomisasi Warna

Edit file: `resources/views/layouts/guest.blade.php`

Warna primary saat ini: `#2ebaae` (Teal)

---

## 📞 Need Help?

Baca dokumentasi lengkap di:
- `GUEST_WEBSITE_README.md` - Panduan lengkap
- `IMPLEMENTATION_SUMMARY.md` - Detail implementasi

---

**Happy Coding! 🎉**
