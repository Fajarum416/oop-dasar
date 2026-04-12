<?php

class Produk
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

    public function getInfoLengkap() // getter
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
/*
class CetakInfoProduk
{
    public function cetak(Produk $produk)
    {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }


}
*/


//Objek dari Class Produk-------
$produk1 = new Komik("Buruto", "Masahi", "Kadokawa", 70000, 100); // tampa nilai
$produk2 = new Game("Euro Truck simulator 2", "Bobon", "Sony Computer", 500000, 50);  //dengan nilai 

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
//Objek dari Class Produk

echo "<hr>";
$produk2->setDiskon(40);   // mengganti diskon dari objek
echo $produk2->getDiskon(); // mengambil nilai diskon nya atau hasil dari diskon nya
echo "<hr>";

$produk2->setJudul("Overwatch"); // mengganti judul dari objek
echo $produk2->getJudul(); // mengambil nilai judul nya atau hasil dari judul nya
echo "<hr>";

$produk2->setPenulis("Wawan"); // mengganti penulis dari objek
echo $produk2->getPenulis(); // mengambil nilai penulis nya atau hasil dari penulis nya
echo "<hr>";

$produk2->setpenerbit("IGRS"); // mengganti penerbit dari objek
echo $produk2->getPenerbit(); // mengambil nilai penerbit nya atau hasil dari penerbit nya
echo "<hr>";

$produk2->setHarga(400000); // mengganti harga dari objek
echo $produk2->getHarga(); // mengambil nilai harga nya atau hasil dari harga nya