<?php 
// Konstanta atau Constant
// adalah sebuah identifier utk menyimpan nilai
// hampir sama dengan variabel bedanya nilai constant tidak berubah
// ada 2 cara dalam php untuk membuat constant
// keyword const dan define()
// 1. define(name, value)

define('NAMA', 'Trias');

// akses
// tanpa tanda $
echo NAMA;
echo "<br>";
// 2. const

const UMUR = 29;
echo UMUR;

// Perbedaan ???
// define() tidak bisa disimpan didalam kelas, OOP pakai const didalam kelas
// define() sebagai konstanta global

// Contoh

class Coba {
    // define('NAMA', 'Trias'); --> akan error
    const NAMA = 'Trias';

}

// aksesnya sama kayak static

echo Coba::NAMA;

// MAGIC CONSTANT
// __LINE__
// __FILE__
// __DIR__
// __FUNCTION__
// __CLASS__
// __TRAIT__
// __METHOD__
// __METHOD__

// CONTOH IMPLEMENTASI
echo "<br>";
echo "Baris Ke " . __LINE__ . "<br>";
echo __FILE__;

function test() {
    return __FUNCTION__;
}

echo "<br>ada di method/function " . test();
?>