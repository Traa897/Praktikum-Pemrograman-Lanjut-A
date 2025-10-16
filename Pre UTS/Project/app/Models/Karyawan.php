<?php
class Karyawan {
    private $conn;
    private $table_name = "perusahaan_karyawan";

    public $nik;
    public $nama;
    public $jabatan;
    public $jenis_kelamin;
    public $level;
    public $divisi;
    public $masa_kerja;
    public $status;
    public $npwp;
    public $saldo_cuti;
    public $gaji;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Tambah Karyawan
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nik=:nik, nama=:nama, jabatan=:jabatan, 
                      jenis_kelamin=:jenis_kelamin, level=:level, 
                      divisi=:divisi, masa_kerja=:masa_kerja, 
                      status=:status, npwp=:npwp, 
                      saldo_cuti=:saldo_cuti, gaji=:gaji";

        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->nik = htmlspecialchars(strip_tags($this->nik));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->jabatan = htmlspecialchars(strip_tags($this->jabatan));
        $this->jenis_kelamin = htmlspecialchars(strip_tags($this->jenis_kelamin));
        $this->level = htmlspecialchars(strip_tags($this->level));
        $this->divisi = htmlspecialchars(strip_tags($this->divisi));
        $this->masa_kerja = htmlspecialchars(strip_tags($this->masa_kerja));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->npwp = htmlspecialchars(strip_tags($this->npwp));
        $this->saldo_cuti = htmlspecialchars(strip_tags($this->saldo_cuti));
        $this->gaji = htmlspecialchars(strip_tags($this->gaji));

        // Bind values
        $stmt->bindParam(":nik", $this->nik);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":jabatan", $this->jabatan);
        $stmt->bindParam(":jenis_kelamin", $this->jenis_kelamin);
        $stmt->bindParam(":level", $this->level);
        $stmt->bindParam(":divisi", $this->divisi);
        $stmt->bindParam(":masa_kerja", $this->masa_kerja);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":npwp", $this->npwp);
        $stmt->bindParam(":saldo_cuti", $this->saldo_cuti);
        $stmt->bindParam(":gaji", $this->gaji);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Read - Ambil semua data karyawan
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY nik ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Read One - Ambil satu data karyawan berdasarkan NIK
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nik = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->nik);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->nama = $row['nama'];
            $this->jabatan = $row['jabatan'];
            $this->jenis_kelamin = $row['jenis_kelamin'];
            $this->level = $row['level'];
            $this->divisi = $row['divisi'];
            $this->masa_kerja = $row['masa_kerja'];
            $this->status = $row['status'];
            $this->npwp = $row['npwp'];
            $this->saldo_cuti = $row['saldo_cuti'];
            $this->gaji = $row['gaji'];
            return true;
        }
        return false;
    }

    // Update - Update data karyawan
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET nama=:nama, jabatan=:jabatan, 
                      jenis_kelamin=:jenis_kelamin, level=:level, 
                      divisi=:divisi, masa_kerja=:masa_kerja, 
                      status=:status, npwp=:npwp, 
                      saldo_cuti=:saldo_cuti, gaji=:gaji 
                  WHERE nik=:nik";

        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->nik = htmlspecialchars(strip_tags($this->nik));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->jabatan = htmlspecialchars(strip_tags($this->jabatan));
        $this->jenis_kelamin = htmlspecialchars(strip_tags($this->jenis_kelamin));
        $this->level = htmlspecialchars(strip_tags($this->level));
        $this->divisi = htmlspecialchars(strip_tags($this->divisi));
        $this->masa_kerja = htmlspecialchars(strip_tags($this->masa_kerja));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->npwp = htmlspecialchars(strip_tags($this->npwp));
        $this->saldo_cuti = htmlspecialchars(strip_tags($this->saldo_cuti));
        $this->gaji = htmlspecialchars(strip_tags($this->gaji));

        // Bind values
        $stmt->bindParam(":nik", $this->nik);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":jabatan", $this->jabatan);
        $stmt->bindParam(":jenis_kelamin", $this->jenis_kelamin);
        $stmt->bindParam(":level", $this->level);
        $stmt->bindParam(":divisi", $this->divisi);
        $stmt->bindParam(":masa_kerja", $this->masa_kerja);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":npwp", $this->npwp);
        $stmt->bindParam(":saldo_cuti", $this->saldo_cuti);
        $stmt->bindParam(":gaji", $this->gaji);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete - Hapus data karyawan
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE nik = ?";
        $stmt = $this->conn->prepare($query);
        $this->nik = htmlspecialchars(strip_tags($this->nik));
        $stmt->bindParam(1, $this->nik);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Fungsi untuk mendapatkan status cuti berdasarkan saldo_cuti
    public function getStatusCuti($saldo_cuti) {
        if ($saldo_cuti == 0) {
            return "Cuti Habis";
        } elseif ($saldo_cuti < 5) {
            return "Cuti Hampir Habis";
        } else {
            return "Cuti Tersedia";
        }
    }
}
?>