<?php
$conn = new mysqli("localhost", "root", "", "edvanced");

// Cegah SQL injection
$id_quiz = (int)($_GET['id'] ?? 0);

// Ambil data quiz
$quiz = $conn->query("SELECT * FROM quiz WHERE id = $id_quiz")->fetch_assoc();

// Ambil soal
$soal = $conn->query("SELECT * FROM soal WHERE id_quiz = $id_quiz");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Detail Quiz</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
</head>
<body class="bg-gray-100 min-h-screen p-6 font-sans">

  <div class="max-w-5xl mx-auto bg-white p-8 rounded shadow-md">
    <!-- Header -->
    <div class="mb-6 border-b pb-4">
      <h1 class="text-3xl font-bold text-blue-800 mb-2"><i class="fas fa-file-alt mr-2"></i> Detail Quiz</h1>
      <p class="text-gray-600 text-sm">Informasi dan daftar soal untuk quiz ini.</p>
    </div>

    <!-- Info Quiz -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 text-sm text-gray-700">
      <div>
        <span class="font-semibold block mb-1">Judul Quiz:</span>
        <?= htmlspecialchars($quiz['judul']) ?>
      </div>
      <div>
        <span class="font-semibold block mb-1">Mata Pelajaran:</span>
        <?= htmlspecialchars($quiz['mata_pelajaran']) ?>
      </div>
      <div>
        <span class="font-semibold block mb-1">Tanggal Dibuat:</span>
        <?= htmlspecialchars($quiz['tanggal_dibuat']) ?>
      </div>
    </div>

    <!-- Soal -->
    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2"><i class="fas fa-question-circle mr-1"></i> Daftar Soal</h2>

    <?php if ($soal->num_rows > 0): ?>
      <?php $no = 1; while($row = $soal->fetch_assoc()): ?>
        <div class="mb-6 border-l-4 border-blue-500 bg-blue-50 p-4 rounded">
          <p class="font-bold mb-2 text-blue-800">Soal <?= $no++ ?>:</p>
          <p class="mb-3 text-gray-800"><?= nl2br(htmlspecialchars($row['pertanyaan'])) ?></p>

          <ul class="space-y-1 text-sm pl-5 list-disc text-gray-700">
            <li><strong>A.</strong> <?= htmlspecialchars($row['opsi_a']) ?></li>
            <li><strong>B.</strong> <?= htmlspecialchars($row['opsi_b']) ?></li>
            <li><strong>C.</strong> <?= htmlspecialchars($row['opsi_c']) ?></li>
            <li><strong>D.</strong> <?= htmlspecialchars($row['opsi_d']) ?></li>
          </ul>

          <div class="mt-3 text-sm font-semibold text-green-600">
            Jawaban Benar: <?= strtoupper(htmlspecialchars($row['jawaban_benar'])) ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p class="text-gray-500 italic">Belum ada soal yang tersedia untuk quiz ini.</p>
    <?php endif; ?>

    <div class="mt-8 z-10 relative">
  <a href="tugas_quiz_guru.php"
     class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm transition">
    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Quiz
  </a>
</div>
</body>
</html>
