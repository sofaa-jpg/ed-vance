<?php
$conn = new mysqli("localhost", "root", "", "edvanced");

$mapel = $_GET['mapel'] ?? '';
$mapel = $conn->real_escape_string($mapel);

// Ambil daftar soal sesuai mata pelajaran
$soal = $conn->query("SELECT * FROM soal 
                      INNER JOIN quiz ON soal.id_quiz = quiz.id 
                      WHERE quiz.mata_pelajaran = '$mapel'");
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
            <label><input type="radio" name="jawaban[<?= $row['id'] ?>]" value="A"> A. <?= $row['opsi_a'] ?></label><br>
            <label><input type="radio" name="jawaban[<?= $row['id'] ?>]" value="B"> B. <?= $row['opsi_b'] ?></label><br>
            <label><input type="radio" name="jawaban[<?= $row['id'] ?>]" value="C"> C. <?= $row['opsi_c'] ?></label><br>
            <label><input type="radio" name="jawaban[<?= $row['id'] ?>]" value="D"> D. <?= $row['opsi_d'] ?></label>
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
