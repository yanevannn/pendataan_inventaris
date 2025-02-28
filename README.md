# Sistem Informasi Inventaris

Sistem Informasi Inventaris adalah aplikasi berbasis web yang dibangun menggunakan Laravel untuk mengelola data inventaris barang. Sistem ini memungkinkan pengguna untuk menambah, mengedit, menghapus, dan melihat daftar inventaris dengan fitur unggahan gambar.

## Fitur

- Menambah data inventaris
- Mengedit data inventaris
- Menghapus data inventaris
- Menampilkan daftar inventaris dengan gambar

## Teknologi yang Digunakan

- **Framework:** Laravel 11
- **Database:** MySQL
- **Frontend:** Blade Template & Bootstrap
- **Storage:** Laravel Storage untuk mengelola unggahan gambar

## Instalasi

1. **Instal Dependensi**

```bash
composer install
npm install
```

2. **Konfigurasi Environment** Salin file `.env.example` ke `.env` dan atur konfigurasi database sesuai kebutuhan.

```bash
cp .env.example .env
```

### **Contoh Konfigurasi**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_inventaris
DB_USERNAME=root
DB_PASSWORD=

APP_NAME=InventarisApp
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

FILESYSTEM_DISK=public
```

3. **Generate Application Key**

```bash
php artisan key:generate
```

4. **Buat Storage Link**

```bash
php artisan storage:link
```

5. **Pastikan Folder `storage/app/public/inventaris_fotos` Ada**
   Secara default, Laravel tidak membuat folder otomatis. Jadi, buat folder ini secara manual:

```bash
mkdir -p storage/app/public/inventaris_fotos
chmod -R 775 storage/app/public/inventaris_fotos
```

6. **Migrasi Database**

```bash
php artisan migrate
```

7. **Jalankan Server**

```bash
php artisan serve
```

Akses aplikasi melalui `http://127.0.0.1:8000`

## Struktur Tabel `inventaris`

| Nama Kolom   | Tipe Data          | Keterangan |
|-------------|------------------|------------|
| id          | INT (Auto Increment, Primary Key) | ID unik tiap barang |
| nama_barang | VARCHAR(255)      | Nama barang |
| status      | ENUM('baik', 'rusak', 'hilang') | Status kondisi barang |
| jumlah      | INT               | Jumlah barang |
| foto        | VARCHAR(255)       | Path gambar barang (opsional) |
| created_at  | TIMESTAMP          | Waktu pembuatan data |
| updated_at  | TIMESTAMP          | Waktu terakhir data diperbarui |

## Penggunaan

- Tambah inventaris melalui halaman `Tambah Data`
- Edit atau hapus inventaris melalui daftar inventaris
- Unggah gambar inventaris saat menambahkan atau mengedit data

