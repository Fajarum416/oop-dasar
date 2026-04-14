# Penjelasan Constant (Konstanta) dan Magic Constant di PHP

Di PHP, sebuah **Constant (Konstanta)** berfungsi sebagai tempat menyimpan nilai/data seperti variabel, **TETAPI** nilainya tidak dapat diubah sama sekali setelah dideklarasikan. Sangat cocok untuk menyimpan data paten seperti *URL Database*, *API Key*, atau *Versi Aplikasi*.

Aturan utama dalam penamaan Constant: **Gunakan Huruf Kapital Semua (UPPERCASE)**. Bebas memakai karakter *underscore* (`_`) namun jangan gunakan spasi.

---

## 2 Cara Membuat Constant di PHP

Terdapat dua cara mendefinisikan sebuah constant, yaitu dengan menggunakan `define()` dan `const`. Namun, keduanya memiliki fungsi penggunaan yang sedikit berbeda:

### 1. Menggunakan `define()`
```php
define('NAMA', 'Budi'); 
echo NAMA; // Output: Budi
```
  > [!WARNING]
  > **Fakta Penting:** `define()` adalah sebuah function. Kamu **tidak bisa** menggunakannya di dalam blok kode OOP (`class`). Ini hanya untuk mendefinisikan global constant di luar class.


### 2. Menggunakan `const`
```php
const UMUR = 32; 
echo UMUR; // Output: 32

class Coba 
{
    // const bisa digunakan di dalam class!
    const NAMA_USER = "Bowo"; 
}

// Memanggil constant yang ada di dalam class menggunakan simbol :: 
echo Coba::NAMA_USER; // Output: Bowo
```
  > [!TIP]
  > **Kapan pakenya?** Jika kamu sedang ngoding bebas di luar class OOP, kamu boleh pakai `define()` atau `const`. Tapi jika kamu butuh constant *di dalam class*, kamu **wajib** menggunakan `const`.

---

## ⚡ Magic Constant di PHP

Selain bikin constant sendiri, PHP itu super canggih! PHP sudah menyediakan constant bawaan yang nilainya "ajaib" bisa berubah-ubah tergantung lokasi kode itu ditulis. Constant bawaan ini disebut **Magic Constant**.

Ciri khas dari Magic Constant adalah namanya diapit oleh **dua buah garis bawah (_ _)** di awal dan akhir kata.

Berikut daftar Magic Constant yang bisa langsung kamu pakai:

| Magic Constant | Fungsinya (Penjelasan Singkat) |
|---|---|
| `__LINE__` | Mengembalikan angka baris ke berapa kode ini dijalankan di dalam file. Sangat berguna untuk melakukan ***debugging***. |
| `__FILE__` | Mengembalikan **path lengkap dan nama file** saat ini (Misal: `C:\laragon\www\materi\index.php`). |
| `__DIR__` | Mengembalikan **path/alamat direktori** file berada tanpa menyertakan nama filenya (Misal: `C:\laragon\www\materi`). |
| `__FUNCTION__` | Mengembalikan nama *function* (fungsi) di mana constant ini dipanggil dipanggil. |
| `__CLASS__` | Mengembalikan nama *class* (kelas) di mana kamu sedang berada saat itu. |
| `__METHOD__` | Sama seperti `__FUNCTION__`, tapi jika di dalam OOP, ini juga akan menyertakan nama class-nya (Berformat `NamaClass::NamaMethod`). |
| `__TRAIT__` | Mengembalikan nama dari sebuah *Trait* yang saat ini aktif dipanggil. |
| `__NAMESPACE__` | Mengembalikan nama dari sebuah *Namespace* file saat ini yang sedang aktif. |

  > [!NOTE]
  > **Analoginya:**
  > Constant biasa itu seperti **KTP**. Namanya paten, NIK-nya tidak mungkin kamu ganti, statis selamanya. 
  > Nah, Magic Constant ini ibarat **Aplikasi Maps/GPS**. GPS akan otomatis memberi tahu *"kamu di mana saat ini"*, nama jalan apa, dan jam berapa, datanya otomatis mendeteksi dari letak dan situasi lokasimu sekarang (otomatis diubah oleh PHP).

Semoga penjelasan singkat ini bisa membantu kamu bisa lebih lancar di PHP ya! Jangan takut untuk bereksperimen.
