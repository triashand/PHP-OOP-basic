<?php
// Visibility
// konsep untuk mengatur akses properto dan method
// default ~ public, protected, private
// protected : hanya bisa digunakan didalam sebuah kelas beserta turunan
// private : hanya bisa digunakan dalam kelas tertentu
// jika harga protected, maka di kelas turunan diberi method
// jika harga private, maka dikelas produk diberi method getHarga
class Produk {
   
    public $judul,
           $penulis,
           $penerbit;

    protected $diskon;
    private $harga;

    // NILAI DEFAULT DIMASUKKAN KEDALAM CONSTRUCTOR
    // agar tidak error
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
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
        parent::__construct( $judul, $penulis, $penerbit, $harga);
        
        // prop milik komik
        $this->jmlHalaman = $jmlHalaman;
    }

    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }
    // agar harga dapat diakses
    // karena properti harga protected
    // public function getHarga(){
    //     return $this->harga;
    // }

    public function getInfoProduk()
    {
        $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk {
    public $wktMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $wktMain = 0) {
        
        parent::__construct( $judul, $penulis, $penerbit, $harga);

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
echo "<hr>";

// visibility bertujuan untuk menjaga properti
// misalnya pada harga diubah jadi protected atau private
// $produk1->harga = 2000; -> bahaya
$produk1->setDiskon(50);

echo $produk1->getHarga();