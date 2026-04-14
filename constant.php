<?php


//cara yang pertama,
define('NAMA', 'Budi'); //  nama dari contanta nya huruf besar semua, tidak bisa di dalam class 

echo NAMA;



//cara yang kedua
const UMUR = "32"; // nama dari contanta nya huruf besar semua, bisa di dalam class 

echo UMUR;

echo "<br>";

class Coba // contoh constant di dalam class
{
    const NAMA = "Bowo";
}

echo Coba::NAMA; // cara memanggil constant di dalam class



//MAGIC CONSTANT

echo __LINE__; //menampilkan baris berapa saat ini
echo "<br>";

class coba2 // contoh magic instan __FILE_
{
    const FILE = __FILE__; //menampilkan file berapa saat ini

}

$obj = new coba2();
echo coba2::FILE;
echo "<br>";

echo __DIR__; //menampilkan directory berapa saat ini
echo "<br>";

function coba()
{
    echo __FUNCTION__; //menampilkan function berapa saat ini
    echo "<br>";
}

echo coba();

class coba3 // contoh magic instan __CLASS_
{
    const KELAS = __CLASS__; //menampilkan class berapa saat ini
}

$obj = new coba3();
echo coba3::KELAS;


echo __TRAIT__; //menampilkan trait berapa saat ini
echo "<br>";

echo __METHOD__; //menampilkan method berapa saat ini
echo "<br>";

echo __NAMESPACE__; //menampilkan namespace berapa saat ini
echo "<br>";

