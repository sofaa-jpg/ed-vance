<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login_siswa.php");
    exit();
}

// Ambil ID siswa dari username
$username = $_SESSION['username'];
$getUser = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
$user = mysqli_fetch_assoc($getUser);
$id_siswa = (int)$user['id'];

// Ambil jawaban
$jawaban = $_POST['jawaban'] ?? [];
$mapel = $_POST['mapel'] ?? '';
$mapel = mysqli_real_escape_string($conn, $mapel);

// Ambil soal dan kunci jawaban
$ambilSoal = mysqli_query($conn, "SELECT soal.id, soal.jawaban_benar, quiz.id as id_quiz 
                                  FROM soal 
                                  JOIN quiz ON soal.id_quiz = quiz.id 
                                  WHERE quiz.mata_pelajaran = '$mapel'");

$benar = 0;
$total = 0;
$id_quiz = 0;

while ($s = mysqli_fetch_assoc($ambilSoal)) {
    $id_soal = $s['id'];
    $kunci = $s['jawaban_benar'];
    $id_quiz = $s['id_quiz'];
    $total++;

    if (isset($jawaban[$id_soal]) && $jawaban[$id_soal] == $kunci) {
        $benar++;
    }
}

// Hitung nilai
$nilai = $total > 0 ? round(($benar / $total) * 100) : 0;

// Cek apakah sudah pernah mengerjakan
$cek = mysqli_query($conn, "SELECT * FROM tbl_nilai WHERE id_siswa=$id_siswa AND id_quiz=$id_quiz");
if (mysqli_num_rows($cek) == 0) {
    // Simpan nilai
    mysqli_query($conn, "INSERT INTO tbl_nilai (id_siswa, id_quiz, nilai) VALUES ($id_siswa, $id_quiz, $nilai)");
}

// Arahkan ke halaman nilai
header("Location: nilai_siswa.php");
exit;
?>
