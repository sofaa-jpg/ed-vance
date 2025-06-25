<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Ed-Vance | Tugas / Quiz</title>
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
    <h2 class="text-2xl font-serif mb-4 border-b border-gray-300 pb-2">Tugas / Quiz</h2>

    <section class="bg-white p-6 shadow rounded">
      <!-- Tombol Tambah Data -->
      <div class="flex justify-between mb-4">
        <a href="tambah_soal.php" class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded flex items-center gap-2">
          <i class="fas fa-plus"></i> Tambah Soal
        </a>
        <div class="flex items-center gap-2 text-xs">
          <label for="search">Cari:</label>
          <input type="text" id="search" class="border border-gray-300 rounded px-2 py-1 w-28" placeholder="Judul..."/>
        </div>
      </div>

      <!-- Tabel Data -->
      <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-400 text-xs">
          <thead>
            <tr class="bg-[#b0b4d1] text-center font-semibold text-black">
              <th class="border border-gray-400 px-2 py-1 w-12">No.</th>
              <th class="border border-gray-400 px-2 py-1">Judul</th>
              <th class="border border-gray-400 px-2 py-1">Mata Pelajaran</th>
              <th class="border border-gray-400 px-2 py-1 w-40">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM quiz ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($query)) :
            ?>
              <tr class="text-center hover:bg-gray-100">
                <td class="border border-gray-400 px-2 py-1"><?= $no++ ?></td>
                <td class="border border-gray-400 px-2 py-1"><?= htmlspecialchars($row['judul']) ?></td>
                <td class="border border-gray-400 px-2 py-1"><?= htmlspecialchars($row['mata_pelajaran']) ?></td>
                <td class="border border-gray-400 px-2 py-1">
                  <div class="flex justify-center gap-2">
                    <a href="detail_quiz.php?id=<?= $row['id'] ?>"
                       class="inline-flex items-center gap-1 bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded text-xs">
                      <i class="fas fa-eye"></i> Lihat
                    </a>
                    <a href="lihat_nilai.php?id=<?= $row['id'] ?>"
                       class="inline-flex items-center gap-1 bg-purple-600 hover:bg-purple-700 text-white px-2 py-1 rounded text-xs">
                      <i class="fas fa-chart-bar"></i> Nilai
                    </a>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>
</body>
</html>
