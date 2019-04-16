<?php
// Interface
// kelas abstrak yang tidak memiliki implementasi
// murni untuk template
// tidak boleh memiliki property
// semua method public
// boleh deklarasikan __construct
// satu kelas boleh implementasikan banyak interface
// dapat melakukan dependecy injection, type-hinting (object type)
// mencapai polimorphism

// STUDI KASUS
interface InfoProduk {
    public function getInfoProduk();
}

abstract class Produk {
   
    protected $judul,
            $penulis,
            $penerbit,
            $harga,
            $diskon = 0;


    // NILAI DEFAULT DIMASUKKAN KEDALAM CONSTRUCTOR
    // agar tidak error
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getJudul() {
        return $this->judul;
    }

    public function setJudul($judul) {
        $this->judul = $judul;
    }

    public function getPenulis() {
        return $this->penulis;
    }

    public function setPenulis($penulis) {
        $this->penulis = $penulis;
    }

    public function getPenerbit() {
        return $this->penerbit;
    }

    public function setPenerbit($penerbit) {
        $this->penerbit = $penerbit;
    }

    public function getHarga(){
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function setHarga($harga) {
        $this->harga = $harga;
    }

    public function getDiskon() {
        return $this->diskon;
    }

    public function setDiskon($diskon) {
        $this->diskon = $diskon;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }
    
    abstract public function getInfo();
    
}

// memaksimalkan konsep OO
// Gunakan fitur Overriding untuk memanggil method - property parent-nya
// contoh : memanggil method getInfoProduk yang sebelumnya sudah ada pada class parent
// agar tidak mengulang menulis kode pada class child
// ganti keyword this dengan parent::getInfoProduk()
// karena bukan variabel, keluarkan dari kurawal dan gabung dengan " . "

class Komik extends Produk implements InfoProduk {
    public $jmlHalaman;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0 ) {
        // panggil dari parent
        // hapus nilai defaultnya
        parent::__construct( $judul, $penulis, $penerbit, $harga);
        
        // prop milik komik
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;
    }

    // agar harga dapat diakses
    // karena properti harga protected
    // public function getHarga(){
    //     return $this->harga;
    // }

    public function getInfoProduk()
    {
        $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
        return $str;
    }
}

class Game extends Produk implements InfoProduk {
    public $wktMain;

    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $wktMain = 0) {
        
        parent::__construct( $judul, $penulis, $penerbit, $harga);

        $this->wktMain = $wktMain;
    }

    public function getInfo() {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

        return $str;
    }

    public function getInfoProduk() {
        $str = "Game : " . $this->getInfo() . " - {$this->wktMain} Jam.";
        return $str;
    }
}

class CetakInfoProduk {
    // mencetak banyak produk sekaligus
    // agar tidak instansiasi satu-satu
    // buat properti array

    public $daftarProduk = [];

    // buat method untuk menambah produk
    public function tambahProduk( Produk $produk ) {
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {
        $str = "DAFTAR PRODUK : <br>";

        foreach( $this->daftarProduk as $p ) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }
        return $str;
    }
}

// buat objek
$produk1 = new Komik("Naruto", "Masashi K", "Shonen Jump", 200000, 100);
$produk2 = new Game("Uncharted", "Neil D", "Sony Comp", 300000,200);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2 );

echo $cetakProduk->cetak();