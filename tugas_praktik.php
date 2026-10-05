<?php

class Produk
{

    public $kode, $nama, $harga, $stok, $jumlah, $total;
    public $diskon = 0;

    public function __construct($kode, $nama, $harga, $stok)
    {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
        
        $this->hitungNilaiStok();
        $this->aturDiskon(0);
    }

    public function hitungNilaiStok()
    {
        return $this->jumlah = $this->stok * $this->harga;
    }


    public function totalHarga()
    {
        return $this->total;
    }

    public function aturDiskon($diskon)
    {
        if ($diskon === null || $diskon === "") {
            $diskon = 0;
        }
        $this->diskon = $diskon;
        $nilai_diskon = $this->jumlah * ($this->diskon / 100);
        $this->total = $this->jumlah - $nilai_diskon;
    }

    public function tampilkanData()
    {
        echo "<h3>Data Produk : </h3>";

        echo "Kode Produk : " . $this->kode . "<br>";
        echo "Nama Produk : " . $this->nama . "<br>";
        echo "Harga Produk : " . number_format($this->harga, 0, ",", ".") . "<br>";
        echo "Stok Produk : " . $this->stok . "<br>";
        echo "Nilai Stok : " . number_format($this->hitungNilaiStok(), 0, ",", ".") . "<br>";
        echo "Jumlah Diskon : " . $this->diskon . "% <br>";
        echo "Harga Total : " . number_format($this->totalHarga(), 0, ",", ".") . "<br>";
    }
}

$produk1 = new Produk("P001", "Laptop", 1000000, 20);
$produk2 = new Produk("P002", "Mouse", 200000, 50);

$produk1->tampilkanData();

echo "<hr>";

$produk1->aturDiskon(10);
$produk1->tampilkanData();

echo "<hr>";

$produk2->tampilkanData();

