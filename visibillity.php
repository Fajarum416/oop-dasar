<?php

class Produk
{

    public $judul,
    $penulis,
    $penerbit;
    protected $diskon = 0;  //protected bisa diakses oleh class anak
    private $harga;         //private hanya bisa diakses oleh class itu sendiri 

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) // jika objek tidak ada nilai, kasih nilai di constructor
    {

        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;


    }



    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
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
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;

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
$produk1 = new Komik("Buruto", "Masahi", "Kadokawa", 70000, 100); // tampa nilai
$produk2 = new Game("Uncarted", "Bobon", "Sony Computer", 500000, 50);  //dengan nilai 

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
//Objek dari Class Produk

echo "<hr>";
$produk2->setDiskon(50);
echo $produk2->getHarga();