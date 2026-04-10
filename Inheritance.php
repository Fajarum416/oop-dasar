<?php

class Produk
{

    public $judul,
    $penulis,
    $penerbit,
    $harga,
    $jmlHalaman,
    $waktuMain;

    public function __construct(
        $judul = "judul",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = 0,
        $jmlHalaman = 0,
        $waktuMain = 0
    ) // jika objek tidak ada nilai, kasih nilai di constructor
    {

        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;


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

    public function getInfoLengkap()
    {
        $str = " Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman.";
        return $str;
    }

}

class Game extends Produk
{

    public function getInfoLengkap()
    {
        $str = " Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->waktuMain} Jam.";
        return $str;

    }

}

class CetakInfoProduk
{
    public function cetak(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }


}



//Objek dari Class Produk-------
$produk1 = new Komik("Buruto", "Masahi", "Kadokawa", 70000, 100, 0); // tampa nilai
$produk2 = new Game("Uncarted", "Bobon", "Sony Computer", 500000, 0, 50);  //dengan nilai 

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
//Objek dari Class Produk