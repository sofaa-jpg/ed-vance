<?php
$conn = new mysqli("localhost", "root", "", "edvanced");

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $mapel = $_POST['mata_pelajaran'];

    $conn->query("INSERT INTO quiz (judul, mata_pelajaran) VALUES ('$judul', '$mapel')");
    $id_quiz = $conn->insert_id;

    for ($i = 0; $i < count($_POST['pertanyaan']); $i++) {
        $pertanyaan = $_POST['pertanyaan'][$i];
        $opsi_a = $_POST['opsi_a'][$i];
        $opsi_b = $_POST['opsi_b'][$i];
        $opsi_c = $_POST['opsi_c'][$i];
        $opsi_d = $_POST['opsi_d'][$i];
        $jawaban = $_POST['jawaban_benar'][$i];

        $conn->query("INSERT INTO quiz_soal (id_quiz, pertanyaan, opsi_a, opsi_b, opsi_c, opsi_d, jawaban_benar)
                      VALUES ($id_quiz, '$pertanyaan', '$opsi_a', '$opsi_b', '$opsi_c', '$opsi_d', '$jawaban')");
    }

    echo "<script>alert('Berhasil ditambahkan!'); window.location.href='tugas_quiz-guru.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Soal Dinamis</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    let soalIndex = 1;

    function tambahSoal() {
      const container = document.getElementById('soal-container');

      const soal = document.createElement('div');
      soal.className = 'soal-item mb-6 p-4 border rounded bg-gray-50 relative';
      soal.innerHTML = `
        <button type="button" onclick="hapusSoal(this)" class="absolute top-2 right-2 text-red-600 hover:text-red-800 text-sm">🗑 Hapus Soal</button>
        <h3 class="font-bold mb-2">Soal</h3>
        <div class="mb-2">
          <label>Pertanyaan</label>
          <textarea name="pertanyaan[]" required class="w-full p-2 border rounded"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-2">
          <div><label>Opsi A</label><input name="opsi_a[]" class="w-full p-2 border rounded" required /></div>
          <div><label>Opsi B</label><input name="opsi_b[]" class="w-full p-2 border rounded" required /></div>
          <div><label>Opsi C</label><input name="opsi_c[]" class="w-full p-2 border rounded" required /></div>
          <div><label>Opsi D</label><input name="opsi_d[]" class="w-full p-2 border rounded" required /></div>
        </div>
        <label>Jawaban Benar</label>
        <select name="jawaban_benar[]" required class="w-full p-2 border rounded">
          <option value="">Pilih Jawaban</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
      `;

      container.appendChild(soal);
      soalIndex++;
    }

    function hapusSoal(button) {
      const soalItem = button.closest('.soal-item');
      soalItem.remove();
    }
  </script>
</head>
<body class="bg-gray-100 p-10">
  <div class="max-w-5xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Tambah Quiz dan Soal Dinamis</h2>
    <form method="POST">
      <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
          <label class="block font-semibold">Judul Quiz</label>
          <input type="text" name="judul" required class="w-full p-2 border rounded">
        </div>
        <div>
          <label class="block font-semibold">Mata Pelajaran</label>
          <input type="text" name="mata_pelajaran" required class="w-full p-2 border rounded">
        </div>
      </div>

      <div id="soal-container">
        <!-- Soal pertama -->
        <div class="soal-item mb-6 p-4 border rounded bg-gray-50 relative">
          <button type="button" onclick="hapusSoal(this)" class="absolute top-2 right-2 text-red-600 hover:text-red-800 text-sm">🗑 Hapus Soal</button>
          <h3 class="font-bold mb-2">Soal</h3>
          <div class="mb-2">
            <label>Pertanyaan</label>
            <textarea name="pertanyaan[]" required class="w-full p-2 border rounded"></textarea>
          </div>
          <div class="grid grid-cols-2 gap-4 mb-2">
            <div><label>Opsi A</label><input name="opsi_a[]" class="w-full p-2 border rounded" required /></div>
            <div><label>Opsi B</label><input name="opsi_b[]" class="w-full p-2 border rounded" required /></div>
            <div><label>Opsi C</label><input name="opsi_c[]" class="w-full p-2 border rounded" required /></div>
            <div><label>Opsi D</label><input name="opsi_d[]" class="w-full p-2 border rounded" required /></div>
          </div>
          <label>Jawaban Benar</label>
          <select name="jawaban_benar[]" required class="w-full p-2 border rounded">
            <option value="">Pilih Jawaban</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
          </select>
        </div>
      </div>

      <button type="button" onclick="tambahSoal()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 mb-6">
        + Tambah Soal
      </button>

      <br>
      <button type="submit" name="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
        Simpan Semua Soal
      </button>
    </form>
  </div>
</body>
</html>
