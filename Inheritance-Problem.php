<?php
// Inheritance

class Produk {
   
    public $judul,
           $penulis,
           $penerbit,
           $harga,
           $jmlHalaman,
           $wktMain,
           $tipe;

    // NILAI DEFAULT DIMASUKKAN KEDALAM CONSTRUCTOR
    // agar tidak error
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman, $wktMain, $tipe) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->wktMain = $wktMain;
        $this->tipe = $tipe;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoLengkap() {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        if( $this->tipe === "Komik") {
            $str .= " - {$this->jmlHalaman} Halaman." ;
        } else if ( $this->tipe === "Game" ) {
            $str .= " - {$this->wktMain} Jam." ;
        }

        return $str;
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
$produk1 = new Produk("Naruto", "Masashi K", "Shonen Jump", 200000, 100, 0, "Komik");
$produk2 = new Produk("Uncharted", "Neil D", "Sony Comp", 300000, 0, 200, "Game");

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();

// CARA DIATAS TIDAK SALAH, TAPI KURANG TEPAT
// KARENA AKAN KERJA BERULANG
// SOLUSINYA MENERAPKAN KONSEP INHERITANCE