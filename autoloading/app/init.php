<?php

//require_once 'app/produk/InfoProduk.php'; // interface dulu di panggil karna class anak menggunakannya 
//require_once 'app/produk/Produk.php'; // class utama
//require_once 'app/produk/Komik.php'; // class anak
//require_once 'app/produk/Game.php'; // class anak
//require_once 'app/produk/CetakInfoProduk.php'; // class helper


//cara otomatis memanggil file 
spl_autoload_register(function ($class) {

    require_once __DIR__ . '/produk/' . $class . '.php';

});
