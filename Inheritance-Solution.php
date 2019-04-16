<?php
// Inheritance Solution

class Produk {
   
    public $judul,
           $penulis,
           $penerbit,
           $harga,
           $jmlHalaman,
           $wktMain;

    // NILAI DEFAULT DIMASUKKAN KEDALAM CONSTRUCTOR
    // agar tidak error
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman, $wktMain) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->wktMain = $wktMain;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;
    }
}

class Komik extends Produk {
    public function getInfoProduk()
    {
        $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman.";
    }
}

class Game extends Produk {
    public function getInfoProduk()
    {
        $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->wktMain} Jam.";
    }
}

class CetakInfoProduk {
    // parameter objek
    // kurawal untuk mempermudah, tanpa gunakan . 
    // dikasih class agar lebih spesifik
    public function cetak( Produk $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// buat objek
$produk1 = new Komik("Naruto", "Masashi K", "Shonen Jump", 200000, 100);
$produk2 = new Game("Uncharted", "Neil D", "Sony Comp", 300000, 200);

echo $produk1->getInfoProduk()();
echo "<br>";
echo $produk2->getInfoProduk()();

// CARA DIATAS TIDAK SALAH, TAPI KURANG TEPAT
// KARENA AKAN KERJA BERULANG
// SOLUSINYA MENERAPKAN KONSEP INHERITANCE