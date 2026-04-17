# Memahami Fitur Autoloading dalam PHP OOP

Halo! Dokumentasi (issue) ini bertujuan untuk menjelaskan konsep **Autoloading** berdasarkan perubahan arsitektur kode terbaru kita di branch `autoloading`. Kita baru saja merombak besar-besaran struktur folder dan cara aplikasi memanggil file PHP. 

Yuk, kita pahami kenapa perubahan ini sangat penting—khususnya ketika aplikasi kita berskala semakin besar!

## 1. Masalah Sebelum Autoloading (Struktur Monolitik)
Sebelumnya, kita meletakkan SEMUA deklarasi Class (`Produk`, `Komik`, `Game`, `CetakInfoProduk`) dan Interface (`InfoProduk`) bertumpuk menjadi satu di dalam file `interface.php` atau `autoloading.php`.

Pemosisian ini bukan masalah jika kamu hanya punya 5 atau 6 class. Tapi bayangkan di dunia nyata ketika sistem e-commerce kita semakin kompleks dan membutuhkan ratusan Class! Menyortir dan membaca file yang berisi ribuan baris kode tentu sangat membuat pusing dan *bad practice*. 

Cara lainnya adalah memecah Class ke filenya masing-masing, tapi sebagai gantinya kamu harus melakukan pemanggilan `require_once` satu per satu.
```php
require_once 'app/produk/InfoProduk.php';
require_once 'app/produk/Produk.php';
require_once 'app/produk/Komik.php';
require_once 'app/produk/Game.php';
// ... bayangkan jika kamu menulis baris ini sebanyak 200 kali! 😱
```
Sangat merepotkan dan tidak elegan.

## 2. Solusi Elegan: Memecah File dan Autoloading
Mari kita lihat pembedahan mutakhir yang baru saja diaplikasikan:

### A. Pemisahan "1 Panci 1 Isian" (Modularisasi)
Seluruh class kita sudah pecah dan dibuatkan kamarnya masing-masing di dalam direktori `app/produk/`.
- `InfoProduk.php` berisi `interface InfoProduk`
- `Produk.php` berisi induk `class Produk`
- `Komik.php` berisi turunan `class Komik`
- dsb.

**Golden Rule / Best Practice OOP:** *Satu File hanya boleh berisi Satu Class (atau interface/trait).* Nama file pun wajib sangat identik dan sensitif huruf besarnya dengan nama class tersebut.

### B. Robot "Pencari Kelas" dengan `app/init.php` (Autoloader)
Kita tidak meng-include/memanggil kumpulan file satu per satu. Tetapi kita membuat satu *"Command Center"* yaitu `init.php`. Di fitur inilah keajaiban Autoloading PHP bekerja:

```php
spl_autoload_register(function ($class) {
    require_once __DIR__ . '/produk/' . $class . '.php';
});
```

**Bagaimana Sih Cara Kerjanya?**
1. Misal kamu memanggil `new Komik(...)` atau ada kewajiban meng-`implements InfoProduk`—padahal kita belum menyuruh PHP meng-`include`-nya.
2. Secara internal PHP akan kebingungan dan berteriak: *"Hah? Class apa ini? Di mana letak filenya?"*
3. Biasanya ini akan berujung pesan *Fatal Error*. Namun karena kita menggunakan `spl_autoload_register()`, PHP menahan rasa bingung tersebut, lalu memanggil fungsi anonymous di atas.
4. Parameter fungsi `$class` akan dikirimkan otomatis oleh PHP yang kebingungan tadi (misal nilainya adalah string yang dicari: `"Komik"`).
5. Secara cerdas, kode kita langsung merangkai jalan mencarinya: `"Oh, nama class di memori yang dicari adalah 'Komik', coba cari dan muat file " . __DIR__ . "/produk/Komik.php "`.
6. Booyah! File ditemukan (diambil via require_once) dan program terus berjalan lancar. Semua berjalan otomatis *di belakang layar*.

### C. Satu Pintu Utama (`index.php`)
Imbas keindahan ini bisa dilirik di direktori utama `index.php`.
Sekarang `index.php` beroperasi murni untuk mengeksekusi saja (*entry point* instansiasi objek), tanpa diributkan keharusan memanggil banyak file dependensi. 
```php
require_once 'app/init.php'; // Cukup satu baris ajaib ini... 
```

## 3. Kesimpulan Penting (Takeaways Utama)
1. **Aturan Bersih (Clean Code):** Jangan pernah menumpuk deklarasi class. Pecah 1 Entity (class) ke dalam 1 File yang terpisah. 
2. **Kekuatan Autoloader:** Autoloader (`spl_autoload_register`) adalah pahlawan tanpa tanda jasa. Ia menyuntikkan dan memuat class-class yang tersebar dan belum dikenali secara otomatis dan *Malas (Lazy-loading)* yaitu hanya memberatkannya di memori ketika classnya dipanggil saja.  
Intinya: **Hindari baris `require` yang menggunung.**

Framework raksasa kekinian seperti *Laravel*, *Symfony*, maupun *CodeIgniter 4* beroperasi 100% menggunakan prinsip autoloading ini untuk menyulap jutaan file agar tereksekusi tanpa manual import. Memahami fundamental ini adalah gerbang untuk menjadi Backend Developer yang mapan! 🔥
