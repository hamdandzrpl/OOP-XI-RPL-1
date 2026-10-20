<?php
class Karyawan {
    // ini properti yg harus dilindungin
    protected $nama;
    protected $nik;
    protected $gajiPokok;
    // ini buat ngasih properti yg bakal dikasih ke karyawan nantinya
    public function __construct($nama, $nik, $gajiPokok) {
        $this->nama = $nama;
        $this->nik = $nik;
        $this->gajiPokok = $gajiPokok;
    }
    // 3 function public ini buatt nantinya ngambil data dari properti yg di protected diatas tadi
    public function getNama() {
        return $this->nama;
    }

    public function getNik() {
        return $this->nik;
    }

    public function getGajiPokok() {
        return $this->gajiPokok;
    }

    // nanti ini buat ngasih ke kode dibawah yg ngambil data gaji pokok dari karyawan trus nanti diitung total gaji karyawan nya
    public function hitungTotalGaji() {
        return $this->gajiPokok;
    }
}






// buat bikin class baru yg namanya karyawan tetap yg fungsinya extend biar si karyawan tetap ini bisa ngambil semua properti dan method kayak class karyawan diatas, jadi class ini bisa dianggap seperti class karyawan dengan nama yg beda
class KaryawanTetap extends Karyawan {
    private $tunjanganKeluarga;
    public function __construct($nama, $nik, $gajiPokok, $tunjanganKeluarga) {
        // parent::__construct artinya kita oper nama, nik, gaji dari class karyawan ke class karyawantetap tanpa harus bikin propertinya lagi dari awal di class ini
        parent::__construct($nama, $nik, $gajiPokok);
        $this->tunjanganKeluarga = $tunjanganKeluarga;
}

// ini buat ngambil nilai gaji pokok pakai hitungtotalgaji trus dihitung nantinya pakai rumuss
    // rumusnya (Gaji Pokok + Tunjangan) - Pajak 5%
    public function hitungTotalGaji() {
        $kotor = $this->gajiPokok + $this->tunjanganKeluarga;
        $pajak = $kotor * 0.05;
        $totalBersih = $kotor - $pajak;
        return $totalBersih;
    }
}







// buat bikin class baru yg namanya karyawan kontrak yg fungsinya extend biar si karyawan kontrak ini bisa ngambil semua properti dan method kayak class karyawan diatas, jadi class ini bisa dianggap seperti class karyawan dengan nama yg beda
class KaryawanKontrak extends Karyawan {
private $bonusLembur;
public function __construct($nama, $nik, $gajiPokok, $bonusLembur) {
        parent::__construct($nama, $nik, $gajiPokok);
        $this->bonusLembur = $bonusLembur;
    }
    // ini buat ngambil nilai gaji pokok pakai hitungtotalgaji trus dihitung nantinya pakai rumuss
    // Rumusnya Gaji Pokok + Bonus Lembur (TANPA potongan pajak)
    public function hitungTotalGaji() {
        return $this->gajiPokok + $this->bonusLembur;
    }
}



// Bagian testing semuanya

// ini buat bikin objek baru buat karyawan tetap
$karyawan1 = new KaryawanTetap("ibnu fathah", "3201012345", 5000000000, 1000000000);
$karyawan2 = new KaryawanTetap("ade nandang", "3201012346", 5100000000, 1000000000);

// ini buat bikin objek baru buat karyawan kontrak
$karyawan3 = new KaryawanKontrak("maul UMR", "3201012347", 3000000, 500000);




// ini buat nampilin hasil karyawan tetap
echo "=== DATA KARYAWAN TETAP === <br>";
echo "Nama: " . $karyawan1->getNama() . "<br>";
echo "NIK: " . $karyawan1->getNik() . "<br>";
echo "Total Gaji Bersih: Rp " . number_format($karyawan1->hitungTotalGaji(), 0, ',', '.') . "<br><br>";

echo "=== DATA KARYAWAN TETAP === <br>";
echo "Nama: " . $karyawan2->getNama() . "<br>";
echo "NIK: " . $karyawan2->getNik() . "<br>";
echo "Total Gaji Bersih: Rp " . number_format($karyawan2->hitungTotalGaji(), 0, ',', '.') . "<br><br>";




echo "<br><br>";




// ini buat nampilin hasil karyawan kontrak
echo "=== DATA KARYAWAN KONTRAK === <br>";
echo "Nama: " . $karyawan3->getNama() . "<br>";
echo "NIK: " . $karyawan3->getNik() . "<br>";
echo "Total Gaji: Rp " . number_format($karyawan3->hitungTotalGaji(), 0, ',', '.') . "<br><br>";

?>