<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
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
            border-color: #2196F3;
        }
        input[readonly] {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }
        .btn-submit {
            background-color: #e70b0bff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        .btn-submit:hover {
            background-color: #da0b0bff;
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
        
        <h2>Edit Karyawan</h2>
        
        <form action="index.php?action=update" method="POST">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" id="nik" name="nik" 
                       value="<?php echo htmlspecialchars($this->karyawan->nik); ?>" 
                       readonly required>
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" 
                       value="<?php echo htmlspecialchars($this->karyawan->nama); ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" id="jabatan" name="jabatan" 
                       value="<?php echo htmlspecialchars($this->karyawan->jabatan); ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki" <?php echo ($this->karyawan->jenis_kelamin == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo ($this->karyawan->jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="level">Level</label>
                <select id="level" name="level" required>
                    <option value="Staff" <?php echo ($this->karyawan->level == 'Staff') ? 'selected' : ''; ?>>Staff</option>
                    <option value="Manager" <?php echo ($this->karyawan->level == 'Manager') ? 'selected' : ''; ?>>Manager</option>
                    <option value="Direktur" <?php echo ($this->karyawan->level == 'Direktur') ? 'selected' : ''; ?>>Direktur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="divisi">Divisi</label>
                <select id="divisi" name="divisi" required>
                    <option value="HR" <?php echo ($this->karyawan->divisi == 'HR') ? 'selected' : ''; ?>>HR</option>
                    <option value="IT" <?php echo ($this->karyawan->divisi == 'IT') ? 'selected' : ''; ?>>IT</option>
                    <option value="Direksi" <?php echo ($this->karyawan->divisi == 'Direksi') ? 'selected' : ''; ?>>Direksi</option>
                    <option value="PIC Payroll" <?php echo ($this->karyawan->divisi == 'PIC Payroll') ? 'selected' : ''; ?>>PIC Payroll</option>
                </select>
            </div>

            <div class="form-group">
                <label for="masa_kerja">Masa Kerja (tahun)</label>
                <input type="number" id="masa_kerja" name="masa_kerja" 
                       value="<?php echo htmlspecialchars($this->karyawan->masa_kerja); ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="Tetap" <?php echo ($this->karyawan->status == 'Tetap') ? 'selected' : ''; ?>>Tetap</option>
                    <option value="Kontrak" <?php echo ($this->karyawan->status == 'Kontrak') ? 'selected' : ''; ?>>Kontrak</option>
                </select>
            </div>

            <div class="form-group">
                <label for="npwp">NPWP</label>
                <input type="text" id="npwp" name="npwp" 
                       value="<?php echo htmlspecialchars($this->karyawan->npwp); ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="saldo_cuti">Saldo Cuti (hari)</label>
                <input type="number" id="saldo_cuti" name="saldo_cuti" 
                       value="<?php echo htmlspecialchars($this->karyawan->saldo_cuti); ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="gaji">Gaji</label>
                <input type="number" id="gaji" name="gaji" 
                       value="<?php echo htmlspecialchars($this->karyawan->gaji); ?>" 
                       required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>