<?php

// 1. Ini adalah Abstract Class (Si Template)
abstract class Hewan
{
    public $nama;

    public function __construct($nama)
    {
        $this->nama = $nama;
    }

    // Ini adalah Abstract Method. 
    // Artinya: "Semua hewan HARUS punya suara, tapi suaranya terserah mereka."
    abstract public function bersuara();

    // Ini method biasa. Bisa langsung dipakai oleh anak-anaknya.
    public function makan()
    {
        echo $this->nama . " sedang makan... nyam nyam!<br>";
    }
}

// 2. Class Turunan: Kucing
class Kucing extends Hewan
{
    public function bersuara()
    {
        echo $this->nama . " berkata: Meong! Meong!<br>";
    }
}

// 3. Class Turunan: Anjing
class Anjing extends Hewan
{
    public function bersuara()
    {
        echo $this->nama . " berkata: Guk! Guk!<br>";
    }
}

// --- CARA PENGGUNAAN ---

// $hewanAnu = new Hewan("Misterius"); // ERROR! Abstract class tidak bisa dijadikan objek.

$kucing = new Kucing("Kitty");
$kucing->sapa();    // Output: Halo, saya Kitty
$kucing->bersuara(); // Output: Kitty berkata: Meong! Meong!
$kucing->makan();    // Output: Kitty sedang makan... nyam nyam!

echo "<hr>";

$anjing = new Anjing("Doggo");
$anjing->bersuara(); // Output: Doggo berkata: Guk! Guk!
$anjing->makan();    // Output: Doggo sedang makan... nyam nyam!