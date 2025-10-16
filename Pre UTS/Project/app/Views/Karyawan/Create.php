<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <style>
        /* CSS Anda tidak diubah */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #4CAF50;
        }
        .btn-submit {
            background-color: #707370ff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        .btn-submit:hover {
            background-color: #616461ff;
        }
        .btn-kembali {
            display: inline-block;
            background-color: #757575;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .btn-kembali:hover {
            background-color: #616161;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn-kembali">← Kembali</a>
        
        <h2>Tambah Karyawan</h2>
        
        <form action="index.php?action=store" method="POST">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" required 
                       placeholder="Contoh: K0001">
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required 
                       placeholder="Masukkan nama karyawan">
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" required 
                       placeholder="Contoh: Staff, Manager">
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="level">Level</label>
                <select id="level" name="level" required>
                    <option value="">Pilih Level</option>
                    <option value="Staff">Staff</option>
                    <option value="Manager">Manager</option>
                    <option value="Direktur">Direktur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="divisi">Divisi</label>
                <select id="divisi" name="divisi" required>
                    <option value="">Pilih Divisi</option>
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Direksi">Direksi</option>
                    <option value="PIC Payroll">PIC Payroll</option>
                </select>
            </div>

            <div class="form-group">
                <label for="masa_kerja">Masa Kerja (tahun)</label>
                <input type="number" id="masa_kerja" name="masa_kerja" required 
                       placeholder="Contoh: 4">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="Tetap">Tetap</option>
                    <option value="Kontrak">Kontrak</option>
                </select>
            </div>

            <div class="form-group">
                <label for="npwp">NPWP</label>
                <input type="text" id="npwp" name="npwp" required 
                       placeholder="Masukkan NPWP">
            </div>

            <div class="form-group">
                <label for="saldo_cuti">Saldo Cuti (hari)</label>
                <input type="number" id="saldo_cuti" name="saldo_cuti" required 
                       placeholder="Contoh: 12">
            </div>

            <div class="form-group">
                <label for="gaji">Gaji</label>
                <input type="number" id="gaji" name="gaji" required 
                       placeholder="Contoh: 5000000">
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>