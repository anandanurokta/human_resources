<?php
session_start();

// Menghubungkan dengan file konfigurasi database
include("../koneksi.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])) {
    /* Mengambil nilai dari form input
    dan menyimpannya ke dalam variabel */
    $nama_karyawan = $_POST['nama_karyawan'];
    $posisi= $_POST['posisi'];
    $gaji = $_POST['gaji'];
    

    /* Menyusun query SQL untuk menambahkan data
    ke tabel karyawan */
    $sql = "INSERT INTO karyawan 
            ( nama_karyawan, posisi, gaji)
            VALUES ( '$nama_karyawan', '$posisi', '$gaji')";

    // Menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if($query) {
        $_SESSION['notifikasi'] = "Data karyawan berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data karyawan gagal ditambahkan!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>