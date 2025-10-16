<?php
require_once __DIR__ . '/../Models/Karyawan.php';
require_once __DIR__ . '/../../Config/Database.php';

class KaryawanController {
    private $db;
    private $karyawan;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->karyawan = new Karyawan($this->db);
    }

    public function index() {
        $stmt = $this->karyawan->read();
        $karyawans = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../Views/Karyawan/Index.php';
    }

    public function create() {
        require_once __DIR__ . '/../Views/Karyawan/Create.php';
    }

    public function store() {
        if($_POST) {
            $this->karyawan->nik = $_POST['nik'];
            $this->karyawan->nama = $_POST['nama'];
            $this->karyawan->jabatan = $_POST['jabatan'];
            $this->karyawan->jenis_kelamin = $_POST['jenis_kelamin'];
            $this->karyawan->level = $_POST['level'];
            $this->karyawan->divisi = $_POST['divisi'];
            $this->karyawan->masa_kerja = $_POST['masa_kerja'];
            $this->karyawan->status = $_POST['status'];
            $this->karyawan->npwp = $_POST['npwp'];
            $this->karyawan->saldo_cuti = $_POST['saldo_cuti'];
            $this->karyawan->gaji = $_POST['gaji'];

            if($this->karyawan->create()) {
                // === PERBAIKAN DI SINI ===
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Gagal menambahkan data.</div>";
            }
        }
    }

    public function edit($nik) {
        $this->karyawan->nik = $nik;
        $this->karyawan->readOne();
        require_once __DIR__ . '/../Views/Karyawan/Edit.php';
    }
    public function update() {
        if($_POST) {
            $this->karyawan->nik = $_POST['nik'];
            $this->karyawan->nama = $_POST['nama'];
            $this->karyawan->jabatan = $_POST['jabatan'];
            $this->karyawan->jenis_kelamin = $_POST['jenis_kelamin'];
            $this->karyawan->level = $_POST['level'];
            $this->karyawan->divisi = $_POST['divisi'];
            $this->karyawan->masa_kerja = $_POST['masa_kerja'];
            $this->karyawan->status = $_POST['status'];
            $this->karyawan->npwp = $_POST['npwp'];
            $this->karyawan->saldo_cuti = $_POST['saldo_cuti'];
            $this->karyawan->gaji = $_POST['gaji'];

            if($this->karyawan->update()) {
                header("Location: index.php");  // perbaikan file tdi malam pake location


                exit();
            } else {
                echo "<div class='alert alert-danger'>Gagal mengupdate data.</div>";
            }
        }
    }

    public function delete($nik) {
        $this->karyawan->nik = $nik;
        
        if($this->karyawan->delete()) {
          
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Gagal menghapus data.</div>";
        }
    }
}
?>