# Penjelasan Konsep Keyword `static` pada OOP PHP

Dokumen ini berisi penjelasan detail mengenai implementasi kode pada file `static.php`. Penjelasan ini dibuat khusus untuk mempermudah *programmer junior* dalam memahami fungsi dan cara penggunaan *keyword* `static` pada *class* dalam Object-Oriented Programming (OOP) PHP.

---

## 1. Apa itu Keyword `static`?

Pada OOP dasar, untuk menggunakan fungsi atau variabel di dalam sebuah *class*, kita biasanya harus **membuat objek (instansiasi)** dari *class* tersebut terlebih dahulu menggunakan kata kunci `new`.

Misal: `$objek = new ContohStatic();` lalu dipanggil `$objek->halo();`

**Namun, jika kita menambahkan *keyword* `static`:**
Kita **tidak perlu lagi membuat objek (instansiasi)** untuk bisa menggunakan suatu properti (variabel) ataupun *method* (fungsi). Method atau properti statis terikat atau menempel langsung pada **Class**-nya, bukan pada *objek (instance)*-nya.

## 2. Cara Penulisan dan Mengakses Anggota `static`

Pada file `static.php`, kita memiliki *class* bernama `ContohStatic`:

```php
class ContohStatic
{
    // Menambahkan keyword static pada properti
    public static $angka = 1;

    // Menambahkan keyword static pada method
    public static function halo()
    {
        return "Halo " . self::$angka;
    }
}
```

### A. Mengakses dari Luar Class
Karena *static* menempel pada class, kita bisa langsung mengaksesnya dengan cara menyebutkan nama class, lalu diikuti tanda **Titik Dua Ganda / Double Colon (`::`)** (bahasa teknisnya *Scope Resolution Operator*).

Berdasarkan contoh kode:
```php
// Mengambil nilai properti static (TIDAK PERLU 'new')
echo ContohStatic::$angka; // Output: 1
echo "<br>";

// Memanggil method static (TIDAK PERLU 'new')
echo ContohStatic::halo(); // Output: Halo 1
```

### B. Mengakses dari Dalam Class
Satu hal yang **sangat penting**: karena pada method *static* kita tidak dalam sebuah objek (`new`), maka kita **tidak bisa** menggunakan pseudovariabel `$this->`.

Sebagai gantinya, jika kita ingin memanggil properti *static* lain dari dalam method *static* di *class* yang sama, kita menggunakan perintah `self::`.

Lihat kembali penulisan di dalam fungsi `halo()` pada kode:
```php
// SALAH (Akan Error): 
// return "Halo " . $this->angka; 

// BENAR (Pengganti $this):
return "Halo " . self::$angka;
```

## 3. Keuntungan dan Kapan Menggunakan `static`?

Penggunaan `static` sangat berguna untuk kondisi-kondisi khusus di mana nilainya bersifat *global* atau bersama (berbagi data alias *shared data*) untuk satu *class* itu sendiri, bukan data individu, dan ketika kita hanya butuh *tools/helper* praktis tanpa menduplikasi objek di memori secara terus menerus.

---

## Kesimpulan
*   Tandai variabel atau fungsi dengan keyword `static` jika Anda ingin menggunakannya tanpa harus melakukan instansiasi (`new`).
*   Akses dari luar class dengan Format: `NamaClass::$properti` atau `NamaClass::namaFungsi()`.
*   Di dalam method ber-keyword `static`, gunakan `self::` alih-alih `$this->` untuk merujuk pada member *class* itu sendiri.
