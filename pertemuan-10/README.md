# Pertemuan 10 - Analisis Kebutuhan Data dan Dasar MySQL Satu Tabel

| Keterangan  | Isi                                                           |
| ----------- | ------------------------------------------------------------- |
| Mata kuliah | Pemrograman Web Dasar (IS205)                                 |
| Nama        | Zazkia Rahmadani                                              |
| NIM         | 2622500042                                                    |
| Kelas       | SI1J (Sistem Informasi)                                       |
| Semester    | Gasal 2026/2027                                               |
| Repositori  | https://github.com/zazkia-rahmadani/2622500042-PWD-SI1J-2627O |

> Catatan: bagian bertanda **[ISI]** diisi setelah pengujian benar-benar dijalankan. Jangan mencatat hasil yang belum diperiksa sebagai berhasil.

## 1. Struktur Direktori

```
pertemuan-10\
├── index.php
├── fungsi.php
├── script.js
├── style.css
├── README.md
├── db_pwd_2622500042.sql
└── img\
    └── foto-profil.jpeg
```

Lokasi proyek: `C:\laragon\www\pwd\2627\ti1a\2622500042-PWD-SI1J-2627O\pertemuan-10`

## 2. Cara Menjalankan

1. Buka Laragon, klik **Start All**, pastikan Apache dan MySQL berjalan.
2. Buka browser:
   `http://localhost/pwd/2627/ti1a/2622500042-PWD-SI1J-2627O/pertemuan-10/index.php`
3. Untuk mengelola basis data, buka `http://localhost/phpmyadmin/` (username `root`, password kosong).

## 3. Kondisi Awal (Baseline dari P9)

Berkas P9 disalin ke `pertemuan-10\` tanpa mengubah artefak P9. Kode dan fitur P9 dipertahankan.

- Hasil pemeriksaan baseline: **[ISI: berhasil / gagal + catatan]**

## 4. Persiapan Lingkungan

| Pemeriksaan                                | Hasil     |
| ------------------------------------------ | --------- |
| Apache berjalan di Laragon                 | **[ISI]** |
| MySQL berjalan di Laragon                  | **[ISI]** |
| phpMyAdmin dapat dibuka dan login `root`   | **[ISI]** |
| Aplikasi P10 dapat diakses via `localhost` | **[ISI]** |

## 5. Analisis Kebutuhan Data Formulir Kontak

Formulir Kontak P9 memiliki delapan data:

| No  | Data                | Atribut `name` | Jenis input |
| --- | ------------------- | -------------- | ----------- |
| 1   | Nama lengkap        | `nama`         | Text        |
| 2   | Email               | `email`        | Email       |
| 3   | Semester            | `semester`     | Number      |
| 4   | Tanggal kunjungan   | `tanggal`      | Date        |
| 5   | Jenis pesan         | `jenis_pesan`  | Radio       |
| 6   | Topik yang diminati | `minat[]`      | Checkbox    |
| 7   | Program studi       | `prodi`        | Select      |
| 8   | Pesan               | `pesan`        | Textarea    |

- Data yang disimpan dibatasi pada delapan data formulir. Informasi profil (NIM, nama mahasiswa) tidak termasuk.
- Field `minat` (checkbox `minat[]`) dapat berisi lebih dari satu pilihan. Pada P10 disimpan dalam satu kolom sebagai teks dipisahkan koma, contoh: `HTML, CSS`. Ini penyederhanaan untuk pembelajaran, bukan normalisasi yang ideal.
- Hasil pencocokan dengan kode `index.php`: **[ISI]**

## 6. Rancangan Struktur Tabel

- Nama basis data: `db_pwd_2622500042`
- Nama tabel: `tbl_kontak_2622500042`

| No  | Atribut       | Tipe data    | Ketentuan                   |
| --- | ------------- | ------------ | --------------------------- |
| 1   | `id`          | INT          | PRIMARY KEY, AUTO_INCREMENT |
| 2   | `nama`        | VARCHAR(50)  | -                           |
| 3   | `email`       | VARCHAR(255) | -                           |
| 4   | `semester`    | TINYINT      | -                           |
| 5   | `tanggal`     | DATE         | -                           |
| 6   | `jenis_pesan` | VARCHAR(20)  | -                           |
| 7   | `minat`       | VARCHAR(50)  | -                           |
| 8   | `prodi`       | VARCHAR(2)   | -                           |
| 9   | `pesan`       | VARCHAR(300) | -                           |

## 7. Pembuatan Basis Data dan Tabel (phpMyAdmin)

Langkah: menu **Databases** → isi nama `db_pwd_2622500042` → **Create** → buat tabel `tbl_kontak_2622500042` dengan 9 kolom → **Save**.

Perintah SQL yang setara:

```sql
CREATE DATABASE db_pwd_2622500042;

USE db_pwd_2622500042;

CREATE TABLE tbl_kontak_2622500042 (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50),
    email VARCHAR(255),
    semester TINYINT,
    tanggal DATE,
    jenis_pesan VARCHAR(20),
    minat VARCHAR(50),
    prodi VARCHAR(2),
    pesan VARCHAR(300)
);
```

Pemeriksaan struktur (tab **Structure** atau `DESCRIBE tbl_kontak_2622500042;`):

- Nama basis data dan tabel tanpa spasi, sesuai pola NIM: **[ISI]**
- Sembilan atribut, tipe data, dan panjang sesuai rancangan: **[ISI]**
- `id` memiliki indeks PRIMARY dan AUTO_INCREMENT: **[ISI]**

## 8. Data Awal

Data dimasukkan melalui fasilitas **Insert** (kolom `id` dikosongkan) atau perintah SQL `INSERT`.

| id        | nama      | email     | semester  | tanggal   | jenis_pesan | minat     | prodi     | pesan     |
| --------- | --------- | --------- | --------- | --------- | ----------- | --------- | --------- | --------- |
| **[ISI]** | **[ISI]** | **[ISI]** | **[ISI]** | **[ISI]** | **[ISI]**   | **[ISI]** | **[ISI]** | **[ISI]** |

- Pemeriksaan melalui tab **Browse** (id terbentuk otomatis, nilai `minat` tampil sebagai teks): **[ISI]**
- Kesesuaian data dengan ketentuan formulir P9 (`prodi` SI/TI, `jenis_pesan` pertanyaan/saran, `minat` HTML/CSS): **[ISI]**

## 9. Ekspor Basis Data

- Export method: **Quick**
- Format: **SQL**
- Berkas hasil ekspor: `db_pwd_2622500042.sql`, dipindahkan ke direktori `pertemuan-10\`
- Ekspor dilakukan pada 17 November 2026 (phpMyAdmin 5.2.0, MySQL 8.0.30), terlihat pada header berkas SQL.

Pemeriksaan isi berkas SQL di VS Code:

- Terdapat `CREATE TABLE` dengan 9 atribut: **[ISI]**
- Terdapat `INSERT INTO` dengan data awal: **[ISI]**
- Data pada berkas SQL sama dengan hasil Browse: **[ISI]**

## 10. Masalah yang Ditemui dan Perbaikan

| Masalah                                                   | Penyebab                                                                                                                                   | Perbaikan                                                      |
| --------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------ | -------------------------------------------------------------- |
| Halaman `localhost/.../pertemuan-10/` tampil putih kosong | Kesalahan sintaks PHP pada `index.php`: baris `const PROFIL_GITHUB = ...` tidak diakhiri titik koma `;`, sehingga PHP gagal memproses file | Menambahkan `;` di akhir baris                                 |
| Link GitHub pada bagian Kontak berpotensi salah           | Konstanta `PROFIL_GITHUB` berisi URL penuh, padahal link dibentuk dari `https://github.com/` + `PROFIL_GITHUB`                             | Isi konstanta diubah menjadi username saja: `zazkia-rahmadani` |
| Nama berkas SQL tidak sesuai modul                        | Nama awal `_db_pwd__2622500042.sql`                                                                                                        | Diganti menjadi `db_pwd_2622500042.sql`                        |

Hasil pengujian ulang setelah perbaikan (halaman tampil dan formulir berfungsi): **[ISI]**

## 11. Riwayat Git

Perubahan direkam bertahap menggunakan Git:

```bash
git add .
git commit -m "pesan commit sesuai tahap"
git push
```

Contoh pesan commit yang dipakai pada P10:

- `memperbaiki kesalahan sintaks index.php dan mengganti nama berkas SQL pertemuan-10`
- `mengekspor basis data ke berkas SQL`
- `memeriksa kelengkapan berkas ekspor SQL`

## 12. Catatan

- Artefak P9 tidak diubah.
- Integrasi PHP dengan MySQL belum dibahas pada P10 dan menjadi materi pertemuan berikutnya.
