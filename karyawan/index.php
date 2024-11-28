<?php
// menghubungkan file config dengan index
include("../koneksi.php");
session_start(); // Mulai sesi
?>
<!DOCTYPE html>
<html>
<head>
    <title>Human Resources</title>
    <style>
        /* membuat styling pada table */
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
</style>
</head>
<body>
    <h2>human resources</h2>
    <!--Tampilkan Notifikasi Jika Ada-->
    <?php if (isset($_SESSION['notifikasi'])): ?>
        <p><?php echo $_SESSION['notifikasi']; ?></p>
        <!-- Hapus notifikasi setelah ditampilkan -->
        <?php unset($_SESSION['notifikasi']); ?>
    <?php endif; ?>
    <table>
        <thead>
            <tr align="center">
                <th>#</th>
                <th>nama_karyawan</th>
                <th>posisi</th>
                <th>gaji</th>
                <th><a href="tambah_karyawan.php">Tambah Data</a></th>
            </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; // membuat penomoran data dari 1
        // memmbuat variabel untuk menjalankan query SQL
        $query =$db->query("SELECT * FROM karyawan");
        /* perulangan while akan terus berjalan (menampilkan data)
        selama kondisi $query bernilai true (adanya data pada
        table games) */
        while ($karyawan = $query->fetch_assoc()){
        /* fungsi fetch_assoc digunakan untuk mengambil
        data perulangan dalam bentuk array */
        ?> <!-- kode PHP ditutup untuk menyisipkan kode HTML
        yang akan di looping menggukan while loop -->
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $karyawan['nama_karyawan'] ?></td>
            <td><?php echo $karyawan['posisi'] ?></td>
            <td><?php echo $karyawan['gaji']?></td>
            <td align="center">
                <!-- URL ke halaman edit data dengan menggunakan
                 parameter id pada kolom table -->
                 <a href="edit_karyawan.php?id=<?php echo $karyawan['karyawan_id'] ?>">Edit</a>
                 <!-- URL untuk menghapus data dengan menggunakan parameter id
                pada kolom table dan alert confirmasi hapus data-->
                <a onclick="return confirm('anda yakin ingin menghapus menghapus data?')"
            href="hapus_karyawan.php?id=<?php echo $karyawan['karyawan_id'] ?>">Hapus</a>
    </td>
    </tr>
    <?php
    } /* Mengakhiri proses perulangan while yang dimulai pada baris 48 */
    ?>
    </tbody>
    </table>
        <!-- Menghitung jumlah baris yang ada pada table (calon_siswa) -->
            <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>