<?php
// Koneksi ke database
include 'database.php';

// Ambil data pengguna dengan role guru
$query = "SELECT * FROM users WHERE role = 'guru'";
$result = mysqli_query($conn, $query);
$no = 1;
?>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Ed-Vance Manajemen Pengajar</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-[#b0a9d6] min-h-screen flex flex-col">
  <!-- Header -->
  <header class="bg-[#322c6d] flex items-center px-6 py-4 shadow-lg">
    <h1 class="text-white font-serif font-extrabold text-3xl drop-shadow-[3px_3px_3px_rgba(0,0,0,0.5)]">
      ED-VANCE
      <i class="fas fa-book-open text-white text-4.3xl"></i>
    </h1>
    <img class="ml-4" src="https://storage.googleapis.com/a1aa/image/1f634ba2-fba5-4b5e-f89b-340113f6f91c.jpg" width="40" height="40" loading="lazy" alt="Logo"/>
  </header>
  <div class="flex flex-1">
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar bg-[#9b95cc] flex flex-col items-start py-8 px-2 space-y-6 border border-black border-r-0">
      <button class="bg-[#a9a1d1] rounded-full px-2 py-1 text-black text-sm font-normal flex items-center justify-between w-full cursor-pointer">
        <span class="menu-icon"><i class="fas fa-home text-base"></i></span>
        <span class="menu-item ml-2">Beranda</span>
      </button>
      <a href="data_pengajar.php" class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer px-2 w-full">
        <span class="menu-icon"><i class="fas fa-users"></i></span>
        <span class="menu-item">Data Pengajar</span>
      </a>
      <button class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer px-2 w-full">
        <span class="menu-icon"><i class="fas fa-folder-open"></i></span>
        <span class="menu-item">Data Siswa</span>
      </button>
      <button class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer px-2 w-full">
        <span class="menu-icon"><i class="fas fa-lightbulb text-lg"></i></span>
        <span class="menu-item">Tugas/Quiz</span>
      </button>
      <button class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer px-2 w-full">
        <span class="menu-icon"><i class="fas fa-book text-lg"></i></span>
        <span class="menu-item">Materi</span>
      </button>
    </nav>

    <!-- Main content -->
    <main class="flex-1 bg-[#e6e6e6] p-6">
      <h2 class="text-2xl font-serif mb-2 border-b border-gray-300 pb-2">Manajemen Pengajar</h2>
      <section class="bg-white p-6 shadow-sm">
        <button class="bg-[#0099ff] text-black text-xs px-2 py-1 rounded mb-4 inline-block">Cek Data Pengajar</button>
        <div class="flex justify-end mb-2">
          <label class="text-xs mr-2 mt-1" for="search">Cari:</label>
          <input class="border border-gray-300 rounded text-xs px-2 py-1 w-24" id="search" type="text"/>
        </div>
        <table class="w-full border-collapse border border-gray-400 text-xs">
          <thead>
            <tr class="bg-[#b0b4d1] text-center font-semibold">
              <th class="border border-gray-400 px-2 py-1">No.</th>
              <th class="border border-gray-400 px-2 py-1">NIP</th>
              <th class="border border-gray-400 px-2 py-1">Nama Lengkap</th>
              <th class="border border-gray-400 px-2 py-1">Jenis Kelamin</th>
              <th class="border border-gray-400 px-2 py-1">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr class="text-center">
              <td class="border border-gray-400 px-2 py-1 text-left"><?= $no++; ?></td>
              <td class="border border-gray-400 px-2 py-1"><?= $row['nip']; ?></td>
              <td class="border border-gray-400 px-2 py-1 text-left"><?= $row['nama_lengkap']; ?></td>
              <td class="border border-gray-400 px-2 py-1"><?= $row['jenis_kelamin']; ?></td>
              <td class="border border-gray-400 px-2 py-1">
                <a href="edit_pengajar.php?nip=<?= $row['nip']; ?>" class="bg-blue-500 text-white text-xs rounded px-2 py-0.5">Details</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <div class="flex justify-end gap-1 mt-4 text-xs">
          <button class="border border-gray-300 rounded px-2 py-1">Sebelumnya</button>
          <button class="bg-[#0099ff] text-black rounded px-2 py-1">1</button>
          <button class="border border-gray-300 rounded px-2 py-1">Selanjutnya</button>
        </div>
      </section>
    </main>
  </div>
</body>
</html>
