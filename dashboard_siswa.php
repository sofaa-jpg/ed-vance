<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login_siswa.php");
    exit();
}

// Ambil id user dari username
$username = $_SESSION['username'];
$getUser = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
$userData = mysqli_fetch_assoc($getUser);
$userId = (int) $userData['id'];

// Hitung jumlah data
$qQuiz    = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM quiz"))['total'];
$qMateri  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM materi"))['total'];
$qNilai   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tbl_nilai WHERE id_siswa = $userId"))['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Siswa - Ed-Vance</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet" />
  <style> body { font-family: 'PT Serif', serif; } </style>
</head>
<body class="bg-[#b0a9d6] min-h-screen flex flex-col">

<?php require 'navbar.php'; ?>
<?php require 'sidebar_siswa.php'; ?>

<main class="flex-1 bg-[#e6e6e6] p-6">
  <p class="text-black text-xl font-normal leading-tight mb-4">
    Selamat datang di Ed-Vance.<br>
    Silahkan pilih menu sesuai kebutuhan Anda.
  </p>
  <hr class="border-t border-gray-300 mb-8"/>

  <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

    <!-- Quiz -->
    <a href="tugas_quiz-siswa.php" class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
      <div class="pt-10 pb-4 flex flex-col items-center">
        <i class="fas fa-lightbulb text-5xl mb-5 text-orange-400"></i>
        <span class="bg-orange-400 text-white font-bold text-base px-6 py-1 rounded-full mb-2">
          <?= $qQuiz ?>
        </span>
      </div>
      <div class="bg-orange-400 w-full text-center text-white text-sm font-normal py-2 mt-auto">
        Tugas / Quiz
      </div>
    </a>

    <!-- Materi -->
    <a href="materi_siswa.php" class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
      <div class="pt-10 pb-4 flex flex-col items-center">
        <i class="fas fa-book text-5xl mb-5 text-purple-600"></i>
        <span class="bg-purple-600 text-white font-bold text-base px-6 py-1 rounded-full mb-2">
          <?= $qMateri ?>
        </span>
      </div>
      <div class="bg-purple-600 w-full text-center text-white text-sm font-normal py-2 mt-auto">
        Materi
      </div>
    </a>

    <!-- Nilai -->
    <a href="nilai_siswa.php" class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
      <div class="pt-10 pb-4 flex flex-col items-center">
        <i class="fas fa-chart-bar text-5xl mb-5 text-blue-500"></i>
        <span class="bg-blue-500 text-white font-bold text-base px-6 py-1 rounded-full mb-2">
          <?= $qNilai ?>
        </span>
      </div>
      <div class="bg-blue-500 w-full text-center text-white text-sm font-normal py-2 mt-auto">
        Nilai
      </div>
    </a>

  </div>
</main>
</body>
</html>
