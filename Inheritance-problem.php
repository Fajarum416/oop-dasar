<?php

class Produk
{

    public $judul,
    $penulis,
    $penerbit,
    $harga,
    $jmlHalaman,
    $waktuMain,
    $tipe;

    public function __construct(
        $judul = "judul",
        $penulis = "penulis",
        $penerbit = "penerbit",
        $harga = 0,
        $jmlHalaman = 0,
        $waktuMain = 0,
        $tipe = "tipe"
    ) // jika objek tidak ada nilai, kasih nilai di constructor
    {

        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;


    }
    public function getLabel()
    {

        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap()
    {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        if ($this->tipe == "Komik") {
            $str .= " - {$this->jmlHalaman} Halaman.";
        } elseif ($this->tipe == "Game") {
            $str .= " ~ {$this->waktuMain} Jam.";
        }

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
$produk1 = new Produk("Buruto", "Masahi", "Kadokawa", 70000, 100, 0, "Komik"); // tampa nilai
$produk2 = new Produk("Uncarted", "Bobon", "Sony Computer", 500000, 0, 50, "Game");  //dengan nilai 

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
//Objek dari Class Produk