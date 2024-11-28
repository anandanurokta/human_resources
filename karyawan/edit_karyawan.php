<?php
// Termasuk file konfigurasi
include("../koneksi.php");

// Mengambil ID siswa dari parameter URL
$id = $_GET['id'];

// Mengambil data siswa dari database berdasarkan ID
$query = $db->query("SELECT * FROM karyawan WHERE karyawan_id = '$id'");
$karyawan = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>EDIT KARYAWAN</title>
</head>
<body>
    <h3>Edit Data Karyawan</h3>
    <form action="proses_edit.php" method="POST">
        <!-- Menyimpan ID untuk proses selanjutnya -->
        <input type="hidden" name="karyawan_id" value="<?php echo $karyawan['karyawan_id']; ?>">

        <table border="0">
            <tr>
                <td>nama karyawan</td>
                <td>
                    <input type="text" name="nama_karyawan" value="<?php echo $karyawan['nama_karyawan']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>posisi</td>
                <td>
                    <select name="posisi" style="width: 100%" required>
                        <option value="" disabled>--Pilih Salah Satu--</option>
                        <option value="Frontend developer" <?php echo ($karyawan['posisi'] == 'rontend developer') 
                        ? 'selected' : ''; ?>>Frontend developer</option>
                        <option value="Backend Developer" <?php echo ($karyawan['posisi'] == 'Backend Developer')
                         ? 'selected' : ''; ?>>Backend Developer</option>
                         <option value="QA Enginee" <?php echo ($karyawan['posisi'] == 'QA Enginee')
                         ? 'selected' : ''; ?>>QA Engineer</option>
                    </select>
                </td>
            </tr>
              <tr>
                <td>gaji</td>
                <td>
                <input type="text" name="gaji" value="<?php echo $karyawan['gaji']; ?>" required>
               </td>
               </tr>
    </table>
    <button type="submit" name="simpan">Simpan</button>
   </form>
</body>
</html>