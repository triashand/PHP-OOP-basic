<?php
// Inheritance Solution

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
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;
    }
}

// memaksimalkan konsep OO
// Gunakan fitur Overriding untuk memanggil method - property parent-nya
// contoh : memanggil method getInfoProduk yang sebelumnya sudah ada pada class parent
// agar tidak mengulang menulis kode pada class child
// ganti keyword this dengan parent::getInfoProduk()
// karena bukan variabel, keluarkan dari kurawal dan gabung dengan " . "

class Komik extends Produk {
    public $jmlHalaman;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0 ) {
        // panggil dari parent
        // hapus nilai defaultnya
        parent::__construct( $judul, $penulis, $penerbit, $harga = 0 );
        
        // prop milik komik
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk {
    public $wktMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $wktMain = 0) {
        
        parent::__construct( $judul, $penulis, $penerbit, $harga = 0 );

        $this->wktMain = $wktMain;
    }

    public function getInfoProduk() {
        $str = "Game : " . parent::getInfoProduk() . " - {$this->wktMain} Jam.";
        return $str;
    }
}

class CetakInfoProduk {
    // parameter objek
    // kurawal untuk mempermudah, tanpa gunakan " . " 
    // dikasih class agar lebih spesifik
    public function cetak( Produk $produk ) {
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// buat objek
$produk1 = new Komik("Naruto", "Masashi K", "Shonen Jump", 200000, 100);
$produk2 = new Game("Uncharted", "Neil D", "Sony Comp", 300000,200);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();