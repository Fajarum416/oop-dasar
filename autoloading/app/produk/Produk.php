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


    public function getInfo()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";


        return $str;
    }


}