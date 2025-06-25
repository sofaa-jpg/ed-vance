<?php
session_start();
include 'koneksi.php';

// Cek apakah sudah login, kalau belum → arahkan ke login
if (!isset($_SESSION['username'])) {
    header("Location: login_guru.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Ed-Vance</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet"/>
  <style>
  </style>
</head>
<body class="bg-[#b0a9d6] min-h-screen flex flex-col">
  <?php require 'navbar.php'; ?>
  <?php require 'sidebar_guru.php'; ?>

    <!-- Main content -->
    <main class="flex-1 bg-[#e6e6e6] p-6">
          <p class="text-black text-2xl font-normal leading-tight mb-4">Selamat datang di Ed-Vance.</p>
          <hr class="border-t border-gray-300 mb-8"/>

          <div class="grid grid-cols-1 sm:grid-cols-4 gap-10">
            <!-- Data Pengajar -->
            <a href="data_pengajar.php" class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
              <div class="pt-10 pb-4 flex flex-col items-center">
                <i class="fas fa-users text-5xl mb-5 text-blue-500"></i>
                <span class="bg-blue-500 text-white font-bold text-base px-8 py-1 rounded-full mb-2">5</span>
              </div>
              <div class="bg-blue-500 w-full text-center text-white text-sm font-normal py-2 mt-auto">
                Data Pengajar
              </div>
            </a>

             <a href="data_siswa.php" class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
              <div class="pt-10 pb-4 flex flex-col items-center">
                <i class="fas fa-folder-open text-5xl mb-5 text-red-800"></i>
                <span class="bg-red-800 text-white font-bold text-base px-8 py-1 rounded-full mb-2">4</span>
              </div>
              <div class="bg-red-800 w-full text-center text-white text-sm font-normal py-2 mt-auto">
                Data Siswa
              </div>
            </a>

            <a href="tugas_quiz_guru.php" class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
              <div class="pt-10 pb-4 flex flex-col items-center">
                <i class="fas fa-lightbulb text-5xl mb-5 text-orange-400"></i>
                <span class="bg-orange-400 text-white font-bold text-base px-8 py-1 rounded-full mb-2">5</span>
              </div>
              <div class="bg-orange-400 w-full text-center text-white text-sm font-normal py-2 mt-auto">
                Tugas / Quiz
              </div>
            </a>

              <a href="materi_guru.php" class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
              <div class="pt-10 pb-4 flex flex-col items-center">
                <i class="fas fa-book text-5xl mb-5 text-purple-600"></i>
                <span class="bg-purple-600 text-white font-bold text-base px-8 py-1 rounded-full mb-2">5</span>
              </div>
              <div class="bg-purple-600 w-full text-center text-white text-sm font-normal py-2 mt-auto">
                Materi
              </div>
            </a>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
