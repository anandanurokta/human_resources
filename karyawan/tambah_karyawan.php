<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa | SMK Negeri 4 Tanjungpinang</title>
</head>
<body>
    <h3>Tambah Data Karyawan</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama_karyawan" required></td>
            </tr>
            <tr>
                <td>posisi</td>
                <td>
                    <select name="posisi" style="width: 100%" required>
                        <option value="" selected disabled>-- Pilih Salah Satu --</option>
                        <option value="Fronted Developer">Fronted Developer</option>
                        <option value="Backend Developer">Backend Developer</option>
                        <option value="QA Enginer">QA Enginer</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gaji</td>
                <td><input type="text" name="gaji"></td>
        </tr>
    </table>
    <button type="submit" name="simpan" class="btn btn-primary">
       Simpan</button>
    </form>
</body>
</html>