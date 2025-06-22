<?php
// Koneksi database
$conn = new mysqli("localhost", "root", "", "edvanced");

// Ambil ID quiz dari URL
$id_quiz = $_GET['id'] ?? 0;

// Ambil data quiz
$quiz = $conn->query("SELECT * FROM quiz WHERE id = $id_quiz")->fetch_assoc();

// Ambil semua soal terkait quiz ini
$soal = $conn->query("SELECT * FROM soal WHERE id_quiz = $id_quiz");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Quiz</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
  <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Detail Quiz</h1>

    <div class="mb-6">
      <p><strong>Judul Quiz:</strong> <?= htmlspecialchars($quiz['judul']) ?></p>
      <p><strong>Mata Pelajaran:</strong> <?= htmlspecialchars($quiz['mata_pelajaran']) ?></p>
      <p><strong>Tanggal Dibuat:</strong> <?= htmlspecialchars($quiz['tanggal_dibuat']) ?></p>
    </div>

    <h2 class="text-xl font-semibold mb-2">Daftar Soal:</h2>

    <?php if ($soal->num_rows > 0): ?>
      <?php $no = 1; while($row = $soal->fetch_assoc()): ?>
        <div class="mb-4 p-4 border rounded bg-gray-50">
          <p class="font-bold">Soal <?= $no++ ?>:</p>
          <p class="mb-2"><?= nl2br(htmlspecialchars($row['pertanyaan'])) ?></p>

          <ul class="mb-2 list-disc pl-6">
            <li><strong>A.</strong> <?= htmlspecialchars($row['opsi_a']) ?></li>
            <li><strong>B.</strong> <?= htmlspecialchars($row['opsi_b']) ?></li>
            <li><strong>C.</strong> <?= htmlspecialchars($row['opsi_c']) ?></li>
            <li><strong>D.</strong> <?= htmlspecialchars($row['opsi_d']) ?></li>
          </ul>

          <p><strong>Jawaban Benar:</strong> <?= $row['jawaban_benar'] ?></p>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="text-gray-600">Belum ada soal untuk quiz ini.</p>
    <?php endif; ?>

    <a href="tugas_quiz-guru.php" class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
  Kembali ke Daftar Quiz
</a>

  </div>
</body>
</html>
