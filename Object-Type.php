<?php
// OBJECT TYPE
// menggunakan objek sebagai tipe data menggunakan class
// studi kasus :
// membuat fungsionalitas untuk mencetak informasi
// dengan membuat kelas baru yg khusus untuk mencetak informasi
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
$produk = new Produk("Naruto", "Masashi K", "Shonen Jump", 200000);
$produk1 = new Produk();
var_dump($produk1);
echo "Komik : " . $produk->getLabel();
echo "<hr>";
$info = new CetakInfoProduk();
echo $info->cetak($produk);