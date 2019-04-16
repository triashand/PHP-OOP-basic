<?php
// Static Keyword
// akses property dan method dalam konteks class
// akses property tanpa instansiasi dengan static keyword

class ContohStatic {
    public static $angka = 1;

    public static function halo() {
        // cara ambil properti angka didalam method
        // gabung properti angka dengan string
        // tidak bisa gunakan $this karena tidak instansiasi
        // dengan keyword self::$angka
        return "Halo..." . self::$angka++ . " kali.";
    }
}

// cara akses properti method static ::
echo ContohStatic::$angka;
echo "<br>";
// cetak method halo
echo ContohStatic::halo();
echo "<hr>";
echo ContohStatic::halo();
echo "<br>";

// MANFAAT STATIC KEYWORD
// member terikat class
// Nilai akan tetap meski objek diinstansiasi berulang kali
// membuat kode prosedural
// biasanya digunakan untuk membuat fungsi helper
// digunakan pada class utility pada framework

// Contoh lain jika pakai oop biasa
echo "<br>";
class Contoh {
    public $angka = 1;

    public function halo() {
        return "Halo " . $this->angka++ . " kali.<br>";
    }
}

// Instansiasi
$cth = new Contoh();
echo $cth->halo();
echo $cth->halo();
echo $cth->halo();

$cth1 = new Contoh();
echo $cth1->halo();
echo $cth1->halo();
echo $cth1->halo();

echo "<hr>";
// Lihat bedanya
class Contoh1 {
    public static $angka = 1;

    public function halo() {
        return "Halo..." . self::$angka++ . " kali.<br>";
    }
}

// Instansiasi
$cths = new Contoh1();
echo $cths->halo();
echo $cths->halo();
echo $cths->halo();

$ctha = new Contoh1();
echo $ctha->halo();
echo $ctha->halo();
echo $ctha->halo();
?>

