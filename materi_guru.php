<?php
session_start();
require 'koneksi.php'; // koneksi ke database

// Ambil data dari tabel materi
$data = mysqli_query($conn, "SELECT * FROM materi ORDER BY tanggal_upload DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Ed-Vance - Materi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'PT Serif', serif;
    }
  </style>
</head>
<body class="bg-[#b0a9d6] min-h-screen flex flex-col">
  
  <?php require 'navbar.php'; ?>
  <?php require 'sidebar_guru.php'; ?>

  <!-- Main Content -->
  <main class="flex-1 bg-[#e6e6e6] p-6">
    <h2 class="text-2xl font-serif mb-4 border-b border-gray-300 pb-2">Materi</h2>
    
    <section class="bg-white p-6 rounded shadow-sm">
      <!-- Action Buttons -->
      <div class="flex justify-between items-center mb-4">
        <div class="flex gap-2">
         <button onclick="document.getElementById('tambahModal').classList.remove('hidden')" class="bg-green-500 hover:bg-green-600 active:bg-green-700 text-white text-xs px-3 py-1 rounded flex items-center gap-1">
  <i class="fas fa-plus text-sm"></i> Tambah Data
</button>
        </div>
        <div class="flex items-center gap-2">
          <label class="text-xs" for="search">Cari:</label>
          <input id="search" type="text" placeholder="Cari..." class="border border-gray-300 rounded text-xs px-2 py-1 w-28"/>
        </div>
      </div>
<!-- Modal Popup -->
<div id="tambahModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
    <h3 class="text-lg font-semibold mb-4 border-b pb-2">Tambah Materi</h3>
    
    <form action="proses_tambah_materi.php" method="POST" enctype="multipart/form-data" class="space-y-3">
      <div>
        <label class="text-sm font-medium">Judul Materi</label>
        <input type="text" name="judul" required class="w-full border border-gray-300 rounded px-2 py-1 text-sm mt-1" />
      </div>

      <div>
        <label class="text-sm font-medium">Mata Pelajaran</label>
        <input type="text" name="mata_pelajaran" required class="w-full border border-gray-300 rounded px-2 py-1 text-sm mt-1" />
      </div>

      <div>
        <label class="text-sm font-medium">Upload File</label>
        <input type="file" name="file_materi" required class="w-full border border-gray-300 rounded px-2 py-1 text-sm mt-1" />
      </div>

      <div class="flex justify-end gap-2 pt-3 border-t">
        <button type="button" onclick="document.getElementById('tambahModal').classList.add('hidden')" class="bg-gray-300 hover:bg-gray-400 text-sm px-3 py-1 rounded">Batal</button>
        <button type="submit" name="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-3 py-1 rounded">Simpan</button>
      </div>
    </form>
  </div>
</div>


      <!-- Table -->
      <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-400 text-xs">
          <thead>
            <tr class="bg-[#b0b4d1] text-center font-semibold text-black">
              <th class="border border-gray-400 px-2 py-1">No.</th>
              <th class="border border-gray-400 px-2 py-1">Judul</th>
              <th class="border border-gray-400 px-2 py-1">Nama File</th>
              <th class="border border-gray-400 px-2 py-1">Mata Pelajaran</th>
              <th class="border border-gray-400 px-2 py-1">Opsi</th>
            </tr>
          </thead>
         <tbody>
  <?php
  $no = 1;
  if (mysqli_num_rows($data) > 0):
    while ($row = mysqli_fetch_assoc($data)):
  ?>
    <tr class="text-center hover:bg-gray-100">
      <td class="border border-gray-400 px-2 py-1"><?= $no++ ?></td>
      <td class="border border-gray-400 px-2 py-1"><?= htmlspecialchars($row['judul']) ?></td>
      <td class="border border-gray-400 px-2 py-1">
        <a href="uploads/<?= htmlspecialchars($row['nama_file']) ?>" class="text-blue-600 underline" target="_blank">
          <?= htmlspecialchars($row['nama_file']) ?>
        </a>
      </td>
      <td class="border border-gray-400 px-2 py-1"><?= htmlspecialchars($row['mata_pelajaran']) ?></td>
      <td class="border border-gray-400 px-2 py-1">
        <a href="hapus_materi.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus file ini?')" class="text-red-600 hover:underline text-xs">
          <i class="fas fa-trash-alt"></i> Hapus
        </a>
      </td>
    </tr>
  <?php
    endwhile;
  else:
  ?>
    <tr class="text-center">
      <td class="border border-gray-400 px-2 py-1" colspan="5">Belum ada data materi.</td>
    </tr>
  <?php endif; ?>
</tbody>

        </table>
      </div>
    </section>
  </main>

</body>
</html>
