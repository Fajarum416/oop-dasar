<?php

class Produk
{

    public $judul = "judul";
    public $penulis = "penulis";
    public $penerbit = "penerbit";
    public $harga = 0;

    public function getLabel()
    {

        return "$this->penulis, $this->penerbit, Rp. $this->harga";
    }


}


//$produk1 = new Produk();
//$produk1->judul = "Naruto";
//$produk1->penulis = "Masashi Kishimoto";
//$produk1->penerbit = "Shonen Jump";
//$produk1->harga = 30000;

//$produk2 = new Produk();
//$produk2->judul = "Naruto";
//$produk2->penulis = "Masashi Kishimoto";
//$produk2->penerbit = "Shonen Jump";
//$produk2->harga = 30000;


//echo "<pre>"; //kode prev ini biar rapih

//var_dump($produk1);
//var_dump($produk2);

//echo "</pre>";


$produk3 = new Produk();
$produk3->judul;
$produk3->penulis;
$produk3->penerbit;
$produk3->harga;

$produk4 = new Produk();
$produk4->judul = "Uncarted";
$produk4->penulis = "Bobon";
$produk4->penerbit = "Sony Computer";
$produk4->harga = 500000;

echo "Komik:" . $produk3->getLabel();
echo "<br>";
echo "Game : " . $produk4->getLabel();