<?php
// Koneksi ke database
include 'koneksi.php';
?>

<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Tugas / Quiz Siswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&amp;display=swap" rel="stylesheet"/>
  <style>
  </style>
</head>
<body class="bg-[#b0a9d6] min-h-screen flex flex-col">
  <?php require 'navbar.php'; ?>
  <?php require 'sidebar_siswa.php'; ?>

    <!-- Main content -->
    <main class="flex-1 bg-[#e6e6e6] p-6">
<h1 class="text-2xl font-semibold mb-2">Tugas / Quiz</h1>
        <hr class="mb-6">

        <div class="overflow-x-auto">
          <table class="min-w-full border border-gray-300 bg-white shadow-md rounded">
            <thead class="bg-gray-200">
              <tr>
                <th class="border px-4 py-2">No.</th>
                <th class="border px-4 py-2">Mata Pelajaran</th>
                <th class="border px-4 py-2">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $mapel_query = $conn->query("SELECT DISTINCT mata_pelajaran FROM quiz");
              $no = 1;
              while ($row = $mapel_query->fetch_assoc()):
              ?>
                <tr>
                  <td class="border px-4 py-2 text-center"><?= $no++ ?></td>
                  <td class="border px-4 py-2"><?= htmlspecialchars($row['mata_pelajaran']) ?></td>
                  <td class="border px-4 py-2 text-center">
                    <a href="kerjakan_quiz.php?mapel=<?= urlencode($row['mata_pelajaran']) ?>"
                      class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-800">
                      Kerjakan Quiz
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>

            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
