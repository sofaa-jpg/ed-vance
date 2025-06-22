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
  <?php require 'navbar.php'; ?>
  <?php require 'sidebar_guru.php'; ?>

    <!-- Main content -->
    <main class="flex-1 bg-[#e6e6e6] p-6">
      <h2 class="text-2xl font-serif mb-2 border-b border-gray-300 pb-2">Manajemen Pengajar</h2>
      <section class="bg-white p-6 shadow-sm">
        <div class="flex justify-end mb-2">
          <label class="text-xs mr-2 mt-1" for="search">Cari:</label>
          <input class="border border-gray-300 rounded text-xs px-2 py-1 w-24" id="search" type="text"/>
        </div>
        <table class="w-full border-collapse border border-gray-400 text-xs text-center">
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
      </section>
    </main>
  </div>
</body>
</html>
