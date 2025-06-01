<?php
// Koneksi ke database
include 'database.php';
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
    body {
      font-family: 'PT Serif', serif;
    }
    .sidebar {
      width: 44px;
      transition: width 0.3s ease;
      overflow: hidden;
    }
    .sidebar.expanded {
      width: 176px;
    }
    .menu-item {
      opacity: 0;
      transition: opacity 0.2s ease 0.1s;
      white-space: nowrap;
    }
    .sidebar.expanded .menu-item {
      opacity: 1;
    }
    .menu-icon {
      min-width: 20px;
      text-align: center;
    }
  </style>
</head>
<body class="bg-white">
  <div class="min-h-screen flex flex-col">
    <header class="bg-[#2f2c6e] border border-black border-b-0 flex items-center px-6 py-4">
      <h1 class="text-white font-extrabold text-3xl tracking-wide font-serif select-none">
        ED-VANCE
        <i class="fas fa-book-open text-white text-4.3xl"></i>
      </h1>
    </header>

    <div class="flex flex-1">
      <nav id="sidebar" class="sidebar bg-[#9b95cc] flex flex-col items-start py-8 px-2 space-y-6 border border-black border-r-0">
        <button id="toggleSidebar" class="bg-[#a9a1d1] rounded-full px-2 py-1 text-black text-sm font-normal flex items-center justify-between w-full cursor-pointer select-none" type="button">
          <span class="menu-icon"><i class="fas fa-home text-base"></i></span>
          <span class="menu-item ml-2">Beranda</span>
          <span class="menu-icon ml-auto"><i class="fas text-base"></i></span>
        </button>

        <a href="data_pengajar.php" class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-users"></i></span>
          <span class="menu-item">Data Pengajar</span>
        </a>

        <button class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full" type="button">
          <span class="menu-icon"><i class="fas fa-folder-open"></i></span>
          <span class="menu-item">Data Siswa</span>
        </button>

        <button class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full" type="button">
          <span class="menu-icon"><i class="fas fa-lightbulb text-lg"></i></span>
          <span class="menu-item">Tugas/Quiz</span>
        </button>

        <button class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full" type="button">
          <span class="menu-icon"><i class="fas fa-book text-lg"></i></span>
          <span class="menu-item">Materi</span>
        </button>
      </nav>

      <main class="flex-1 p-8">
        <div class="max-w-7xl mx-auto">
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

            <!-- Data Siswa -->
            <div class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
              <div class="pt-10 pb-4 flex flex-col items-center">
                <i class="fas fa-folder-open text-5xl mb-5 text-red-800"></i>
                <span class="bg-red-800 text-white font-bold text-base px-8 py-1 rounded-full mb-2">4</span>
              </div>
              <div class="bg-red-800 w-full text-center text-white text-sm font-normal py-2 mt-auto">
                Data Siswa
              </div>
            </div>

            <!-- Tugas / Quiz -->
            <div class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
              <div class="pt-10 pb-4 flex flex-col items-center">
                <i class="fas fa-lightbulb text-5xl mb-5 text-orange-400"></i>
                <span class="bg-orange-400 text-white font-bold text-base px-8 py-1 rounded-full mb-2">5</span>
              </div>
              <div class="bg-orange-400 w-full text-center text-white text-sm font-normal py-2 mt-auto">
                Tugas / Quiz
              </div>
            </div>

            <!-- Materi -->
            <div class="bg-white shadow-lg flex flex-col items-center w-full border border-gray-300 transition duration-300 transform hover:scale-105 active:scale-95 cursor-pointer">
              <div class="pt-10 pb-4 flex flex-col items-center">
                <i class="fas fa-book text-5xl mb-5 text-purple-600"></i>
                <span class="bg-purple-600 text-white font-bold text-base px-8 py-1 rounded-full mb-2">5</span>
              </div>
              <div class="bg-purple-600 w-full text-center text-white text-sm font-normal py-2 mt-auto">
                Materi
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('expanded');
    });
  </script>
</body>
</html>
