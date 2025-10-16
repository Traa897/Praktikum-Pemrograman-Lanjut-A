<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
    <style>
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
            max-width: 1400px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-tambah {
            display: inline-block;
            background-color: #828782ff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .btn-tambah:hover {
            background-color: #0673c1ff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #8f8f8fff;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn-edit {
            background-color: #2196F3;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 12px;
        }
        .btn-edit:hover {
            background-color: #0b7dda;
        }
        .btn-hapus {
            background-color: #f44336;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 3px;
            font-size: 12px;
            border: none;
            cursor: pointer;
        }
        .btn-hapus:hover {
            background-color: #da190b;
        }
        .status-habis {
            color: #f44336;
            font-weight: bold;
        }
        .status-hampir {
            color: #ff9800;
            font-weight: bold;
        }
        .status-tersedia {
            color: #4CAF50;
            font-weight: bold;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Karyawan</h2>
        
        <a href="index.php?action=create" class="btn-tambah">+ Tambah Karyawan</a>
        
        <table>
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th>Saldo Cuti</th>
                    <th>Status Cuti</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($karyawans) && count($karyawans) > 0): ?>
                    <?php foreach($karyawans as $row): ?>
                        <?php
                        $saldo_cuti = $row['saldo_cuti'];
                        if ($saldo_cuti == 0) {
                            $status_cuti = "Cuti Habis";
                            $status_class = "status-habis";
                        } elseif ($saldo_cuti < 5) {
                            $status_cuti = "Cuti Hampir Habis";
                            $status_class = "status-hampir";
                        } else {
                            $status_cuti = "Cuti Tersedia";
                            $status_class = "status-tersedia";
                        }
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['nik']); ?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td><?php echo htmlspecialchars($row['jabatan']); ?></td>
                            <td><?php echo htmlspecialchars($row['divisi']); ?></td>
                            <td><?php echo htmlspecialchars($row['saldo_cuti']); ?></td>
                            <td class="<?php echo $status_class; ?>"><?php echo $status_cuti; ?></td>
                            <td>
                                <a href="index.php?action=edit&nik=<?php echo $row['nik']; ?>" class="btn-edit">Edit</a>
                                <a href="index.php?action=delete&nik=<?php echo $row['nik']; ?>" 
                                   class="btn-hapus" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">Tidak ada data karyawan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>