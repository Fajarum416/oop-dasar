<?php

abstract class Produk
{

    private $judul,
    $penulis,
    $penerbit,
    $harga,
    $diskon = 0;  //private hanya bisa diakses si class nya tidak bisa di luar class 

    //protected bisa diakses oleh class anak     

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) // jika objek tidak ada nilai, kasih nilai di constructor
    {

        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;


    }

    public function setPenerbit($penerbit) // setter/input nilai dari luar class
    {
        $this->penerbit = $penerbit;

    }

    public function getPenerbit() // getter/output 
    {
        return $this->penerbit;
    }

    public function setPenulis($penulis) // setter/input
    {
        $this->penulis = $penulis;
    }

    public function getPenulis() // getter/output
    {
        return $this->penulis;
    }

    public function setJudul($judul) // setter/input
    {
        $this->judul = $judul;
    }

    public function getJudul() // getter/output
    {
        return $this->judul;
    }

    public function setDiskon($diskon) // setter/input
    {
        $this->diskon = $diskon;

    }

    public function getDiskon() // getter/output
    {
        return $this->diskon;
    }
    public function setHarga($harga) // setter/input
    {
        $this->harga = $harga;
    }

    public function getHarga() // getter/output
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
    public function getLabel() // getter/output
    {

        return "$this->penulis, $this->penerbit";
    }

    abstract public function getInfoLengkap();

    public function getInfo()
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
        $str = " Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
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
        $str = " Game : " . $this->getInfo() . " ~ {$this->waktuMain} Jam.";
        return $str;

    }

}

class CetakInfoProduk
{
    public $daftarProduk = array();

    public function tambahProduk(Produk $produk)
    {
        $this->daftarProduk[] = $produk;
    }
    public function cetak()
    {
        $str = "DAFTAR PRODUK : <br>";

        foreach ($this->daftarProduk as $p) {
            $str .= "- {$p->getInfoLengkap()}; <br>";
        }
        return $str;
    }


}



//Objek dari Class Produk-------
$produk1 = new Komik("Buruto", "Masahi", "Kadokawa", 70000, 100); // tampa nilai
$produk2 = new Game("Euro Truck simulator 2", "Bobon", "Sony Computer", 500000, 50);  //dengan nilai 

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();
