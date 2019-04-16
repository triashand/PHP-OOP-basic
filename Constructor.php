<?php
//  studi kasus
// membuat objek dengan metode sebelumnya sangat merepotkan
// maka gunakan constructor untuk mempermudahnya
class Produk {
   
    public $judul,
           $penulis,
           $penerbit,
           $harga;

    // NILAI DEFAULT DIMASUKKAN KEDALAM CONSTRUCTOR
    // agar tidak error
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel() {
        return "$this->judul, $this->penulis";
    }
}

// buat objek
$produk = new Produk("Naruto", "Masashi K", "Shonen Jump", 200000);
$produk1 = new Produk();
var_dump($produk1);
echo "Komik : " . $produk->getLabel();