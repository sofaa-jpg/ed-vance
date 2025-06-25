<?php
// Koneksi ke database
include 'koneksi.php';

// Ambil NIP dari URL
if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];

    // Ambil data guru berdasarkan NIP
    $query = "SELECT * FROM users WHERE nip = '$nip' AND role = 'guru'";
    $result = mysqli_query($conn, $query);
    $pengajar = mysqli_fetch_assoc($result);

    if (!$pengajar) {
        echo "Pengajar tidak ditemukan.";
        exit;
    }
} else {
    echo "NIP tidak ditemukan.";
    exit;
}

// Proses update data
if (isset($_POST['submit'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $update = "UPDATE users SET 
                nama_lengkap = '$nama_lengkap', 
                jenis_kelamin = '$jenis_kelamin'
               WHERE nip = '$nip'";

    if (mysqli_query($conn, $update)) {
        header("Location: data_pengajar.php?pesan=update_sukses");
        exit;
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Pengajar</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
  <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-md">
    <h2 class="text-xl font-semibold mb-4 text-center">Edit Data Pengajar</h2>
    <form method="POST">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">NIP</label>
        <input type="text" name="nip" value="<?= $pengajar['nip'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" disabled>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="<?= $pengajar['nama_lengkap'] ?>" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
        <select name="jenis_kelamin" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
          <option value="Laki-laki" <?= $pengajar['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
          <option value="Perempuan" <?= $pengajar['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>
      </div>
      <div class="flex items-center justify-between">
        <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Simpan
        </button>
        <a href="data_pengajar.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
          Batal
        </a>
      </div>
    </form>
  </div>
</body>
</html>
