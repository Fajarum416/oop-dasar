<?php

class Produk
{

    public $judul,
    $penulis,
    $penerbit,
    $harga;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) // jika objek tidak ada nilai, kasih nilai di constructor
    {

        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;

    }
    public function getLabel()
    {

        return "$this->penulis, $this->penerbit";
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
$produk1 = new Produk(); // tampa nilai


$produk2 = new Produk("Uncarted", "Bobon", "Sony Computer", 500000);  //dengan nilai 

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";
//Objek dari Class Produk


//Objek dari Class CetakInfoProduk----
$infoproduk1 = new CetakInfoProduk();

echo $infoproduk1->cetak($produk2);
//Objek dari Class CetakInfoProduk