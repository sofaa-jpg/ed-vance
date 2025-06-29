<?php
$conn = new mysqli("localhost", "root", "", "edvanced");

$mapel = $_GET['mapel'] ?? '';
$mapel = $conn->real_escape_string($mapel);

// Ambil daftar soal sesuai mata pelajaran
$soal = $conn->query("
    SELECT quiz_soal.id AS id_soal, quiz_soal.*, quiz.judul, quiz.mata_pelajaran 
    FROM quiz_soal
    INNER JOIN quiz ON quiz_soal.id_quiz = quiz.id 
    WHERE quiz.mata_pelajaran = '$mapel'
");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Kuis Mapel <?= htmlspecialchars($mapel) ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
  <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Quiz - <?= htmlspecialchars($mapel) ?></h1>

    <form method="post" action="proses_jawab.php">
      <input type="hidden" name="mapel" value="<?= htmlspecialchars($mapel) ?>">

      <?php $no = 1; while ($row = $soal->fetch_assoc()): ?>
        <div class="mb-4">
          <p class="font-semibold"><?= $no++ ?>. <?= htmlspecialchars($row['pertanyaan']) ?></p>
          <div class="ml-4">
            <label><input type="radio" name="jawaban[<?= $row['id_soal'] ?>]" value="A" required> A. <?= htmlspecialchars($row['opsi_a']) ?></label><br>
            <label><input type="radio" name="jawaban[<?= $row['id_soal'] ?>]" value="B"> B. <?= htmlspecialchars($row['opsi_b']) ?></label><br>
            <label><input type="radio" name="jawaban[<?= $row['id_soal'] ?>]" value="C"> C. <?= htmlspecialchars($row['opsi_c']) ?></label><br>
            <label><input type="radio" name="jawaban[<?= $row['id_soal'] ?>]" value="D"> D. <?= htmlspecialchars($row['opsi_d']) ?></label>
          </div>
        </div>
      <?php endwhile; ?>

      <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Kirim Jawaban
      </button>
    </form>
  </div>
</body>
</html>
