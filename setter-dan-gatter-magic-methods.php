<?php

class Produk
{
    private $judul,
    $penulis,
    $penerbit,
    $harga,
    $diskon = 0;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function __set($property, $nilai)   // property = nama properti, nilai = nilai propertinya
    {
        $this->$property = $nilai;
    }

    public function __get($property)
    {
        return match ($property) {
            'harga' => $this->harga - ($this->harga * $this->diskon / 100),
            default => $this->$property
        };
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}

class Komik extends Produk
{
    public $jmlHalaman;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoLengkap()
    {
        $str = " Komik : " . parent::getInfoLengkap() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk
{
    public $waktuMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoLengkap()
    {
        $str = " Game : " . parent::getInfoLengkap() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }
}


$produk1 = new Komik("Buruto", "Masahi", "Kadokawa", 70000, 100);
$produk2 = new Game("Euro Truck simulator 2", "Bobon", "Sony Computer", 500000, 50);

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();

echo "<hr>";
$produk2->diskon = 40;
echo $produk2->diskon;
echo "<hr>";

$produk2->judul = "Overwatch";
echo $produk2->judul;
echo "<hr>";

$produk2->penulis = "Wawan";
echo $produk2->penulis;
echo "<hr>";

$produk2->penerbit = "IGRS";
echo $produk2->penerbit;
echo "<hr>";

$produk2->harga = 400000;
echo $produk2->harga;