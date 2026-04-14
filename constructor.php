<?php

class Produk
{

    public $judul = "judul";
    public $penulis = "penulis";
    public $penerbit = "penerbit";
    public $harga = 0;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = "harga") // jika objek tidak ada nilai, kasih nilai di constructor
    {

        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;

    }
    public function getLabel()
    {

        return "$this->judul, $this->penulis, $this->penerbit, Rp. $this->harga";
    }


}



$produk1 = new Produk(); // tampa nilai


$produk2 = new Produk("Uncarted", "Bobon", "Sony Computer", 500000);  //dengan nilai 

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();