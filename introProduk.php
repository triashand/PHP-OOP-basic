<?php
//  studi kasus
class Produk {
    // bikin property
    public $judul = "judul",
           $penulis = "penulis",
           $penerbit = "penerbit",
           $harga = 0;

    public function getLabel() {
        return "$this->judul, $this->penulis";
    }
}

// buat objek
$produk1 = new Produk();
$produk1->judul = 'Naruto';
$produk1->penulis = 'Masashi Kishimoto';
$produk1->penerbit = 'Shonen Jump';
$produk1->harga = 100000;
var_dump($produk1);
echo "<br>";
echo "Komik : $produk1->judul, $produk1->penulis";
echo "<br>";
echo $produk1->getLabel();

$produk2 = new Produk();
$produk2->judul = "Uncharted";
$produk2->penulis = "Neil Druckmann";
$produk2->penerbit = "Sony";
$produk2->harga = 300000;
echo "<hr>";
echo "Komik : " . $produk1->getLabel() . "<br>";
echo "Game : " . $produk2->getLabel();

// cara diatas sangat merepotkan
// untuk mengatasinya menggunakan constructor