<?php

require_once 'app/init.php';

//Objek dari Class Produk-------
$produk1 = new Komik("Buruto", "Masahi", "Kadokawa", 70000, 100); // tampa nilai
$produk2 = new Game("Euro Truck simulator 2", "Bobon", "Sony Computer", 500000, 50);  //dengan nilai 

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);

echo $cetakProduk->cetak();