<?php
include 'koneksi.php';

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Enkripsi password MD5

    // Upload foto
    $foto_name = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $upload_dir = "uploads/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir);
    }

    $foto_path = $upload_dir . basename($foto_name);
    move_uploaded_file($foto_tmp, $foto_path);

    // Simpan ke database
    $sql = "INSERT INTO users (username, pass, nip, jenis_kelamin, nama_lengkap, no_telp, foto, role)
            VALUES ('$username', '$password', '$nip', '$jenis_kelamin', '$nama', '$telepon', '$foto_path', 'guru')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pendaftaran berhasil!'); window.location.href='login_guru.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>ED-VANCE Registration</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Roboto Slab', serif;
    }
  </style>
</head>
<body class="bg-white">
  <!-- Tombol kembali -->
  <a href="login_guru.php" class="fixed top-4 right-4 inline-flex items-center text-black transition duration-300 transform hover:scale-105 active:scale-90 cursor-pointer">
    <i class="fas fa-arrow-left bg-black text-white p-2 rounded-lg"></i>
  </a>
  <header class="bg-[#2f2f6e] flex items-center px-6 py-4">
    <h1 class="text-white font-extrabold text-2xl drop-shadow-[2px_2px_0_rgba(0,0,0,0.5)]">ED-VANCE <i class="fas fa-book-open text-white"></i></h1>
  </header>

  <main class="p-6 max-w-full overflow-y-auto h-[calc(100vh-72px)]">
    <h2 class="font-extrabold text-xl mb-2 border-b border-black pb-1">Pendaftaran Akun</h2>
    <p class="mb-4 text-sm">Masukan Data Anda dengan Benar!</p>

    <!-- Formulir POST ke file ini sendiri -->
    <form class="space-y-4 text-xs w-full max-w-full" method="POST" enctype="multipart/form-data">
      <div>
        <label class="block mb-1" for="nip">NIP*</label>
        <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="nip" name="nip" type="text" required/>
      </div>
      <div>
        <label class="block mb-1" for="nama">Nama Lengkap*</label>
        <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="nama" name="nama" type="text" required/>
      </div>
      <div>
        <label class="block mb-1" for="jenis_kelamin">Jenis Kelamin*</label>
        <select class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs text-gray-400" id="jenis_kelamin" name="jenis_kelamin" required>
          <option disabled selected>-Pilih-</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div>
        <label class="block mb-1" for="telepon">Nomor Telepon*</label>
        <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="telepon" name="telepon" type="text" required/>
      </div>
      <div>
        <label class="block mb-1" for="username">Username*</label>
        <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="username" name="username" type="text" required/>
      </div>
      <div>
        <label class="block mb-1" for="password">Kata Sandi*</label>
        <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="password" name="password" type="password" required/>
      </div>
      <div>
        <label class="block mb-1" for="foto">Foto*</label>
        <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="foto" name="foto" type="file" required/>
      </div>
      <p class="text-xs mb-4">Catatan: Tanda * wajib diisi</p>
      <div class="flex space-x-3">
        <button class="bg-green-600 text-white text-xs px-4 py-1 rounded-md" type="submit">Daftar</button>
        <button class="bg-red-600 text-white text-xs px-4 py-1 rounded-md" type="reset">Reset</button>
      </div>
    </form>
  </main>
</body>
</html>
