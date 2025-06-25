<?php
include 'koneksi.php';

$id_quiz = $_GET['id'] ?? 0;

// Ambil info quiz
$quiz = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM quiz WHERE id = $id_quiz"));

// Ambil nilai siswa untuk quiz ini
$nilai = mysqli_query($conn, "
  SELECT tn.nilai, tn.tanggal_submit, u.nama_lengkap
  FROM tbl_nilai tn
  JOIN users u ON tn.id_siswa = u.id
  WHERE tn.id_quiz = $id_quiz
  ORDER BY tn.nilai DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nilai Siswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-blue-800 mb-4">Nilai Siswa - <?= htmlspecialchars($quiz['judul']) ?></h1>
    
    <table class="w-full border-collapse border text-sm">
      <thead class="bg-blue-100 text-center">
        <tr>
          <th class="border px-2 py-1">No</th>
          <th class="border px-2 py-1">Nama Siswa</th>
          <th class="border px-2 py-1">Nilai</th>
          <th class="border px-2 py-1">Tanggal</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($nilai)) : ?>
        <tr class="text-center hover:bg-gray-50">
          <td class="border px-2 py-1"><?= $no++ ?></td>
          <td class="border px-2 py-1"><?= htmlspecialchars($row['nama_siswa']) ?></td>
          <td class="border px-2 py-1"><?= $row['nilai'] ?></td>
          <td class="border px-2 py-1"><?= $row['tanggal_submit'] ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <div class="mt-4 text-right">
      <a href="tugas_quiz_guru.php" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">← Kembali</a>
    </div>
  </div>
</body>
</html>
