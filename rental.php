<?php

// 1. Class Induk (Parent)
class Rental {
    // Properti private untuk Enkapsulasi
    private $hargaSewaPerHari;

    // Setter untuk mengisi nilai harga
    public function setHargaSewaPerHari($harga) {
        $this->hargaSewaPerHari = $harga;
    }

    // Getter untuk mengambil nilai harga
    public function getHargaSewaPerHari() {
        return $this->hargaSewaPerHari;
    }

    // Method dasar hitung diskon
    public function hitungDiskon($hari) {
        return 0; // Default tanpa diskon
    }
}

// 2 & 4. Class Anak Mobil mewarisi Rental + Polimorfisme
class RentalMobil extends Rental {
    // Override method hitungDiskon milik parent
    public function hitungDiskon($hari) {
        if ($hari > 3) {
            $totalHarga = $this->getHargaSewaPerHari() * $hari;
            return $totalHarga * 0.10; // Diskon 10%
        }
        return 0;
    }
}

// 2 & 4. Class Anak Motor mewarisi Rental + Polimorfisme
class RentalMotor extends Rental {
    // Override method hitungDiskon milik parent
    public function hitungDiskon($hari) {
        if ($hari > 3) {
            $totalHarga = $this->getHargaSewaPerHari() * $hari;
            return $totalHarga * 0.05; // Diskon 5%
        }
        return 0;
    }
}

// 5. Instansiasi dan Pengujian Objek

// Uji coba Mobil
$sewaMobil = new RentalMobil();
$sewaMobil->setHargaSewaPerHari(300000); // Rp300.000 / hari
$hariMobil = 4;
$diskonMobil = $sewaMobil->hitungDiskon($hariMobil);

echo "Harga Sewa Mobil: Rp" . $sewaMobil->getHargaSewaPerHari() . "/hari <br>";
echo "Lama Sewa: $hariMobil hari <br>";
echo "Potongan Diskon Mobil (10%): Rp" . $diskonMobil . "<br><br>";

// Uji coba Motor
$sewaMotor = new RentalMotor();
$sewaMotor->setHargaSewaPerHari(80000); // Rp80.000 / hari
$hariMotor = 4;
$diskonMotor = $sewaMotor->hitungDiskon($hariMotor);

echo "Harga Sewa Motor: Rp" . $sewaMotor->getHargaSewaPerHari() . "/hari <br>";
echo "Lama Sewa: $hariMotor hari <br>";
echo "Potongan Diskon Motor (5%): Rp" . $diskonMotor . "<br>";
?>