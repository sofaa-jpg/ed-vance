<?php
// database ke database
include 'database.php';

// Query untuk mengambil data dari tabel logi_guru
$sql_users = "SELECT username, pass, nis, jenis_kelamin, nama_lengkap, no_telp FROM users";
$result_users = $conn->query($sql_users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>ED-VANCE Login - Dark</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
    body, .font-robotoslab {
      font-family: 'Roboto Slab', serif;
    }
  </style>
</head>
<body class="bg-gray-900 text-white">
  <!-- Tombol kembali -->
  <a href="index_hitam.php" class="fixed top-4 left-4 inline-flex items-center text-white transition duration-300 transform hover:scale-105 active:scale-90 cursor-pointer">
    <i class="fas fa-arrow-left bg-white text-black p-2 rounded-lg"></i>
  </a>

  <div class="min-h-screen flex flex-col md:flex-row">
    <!-- Gambar -->
    <div class="md:w-1/2 bg-gray-800 flex justify-center items-center p-6">
      <img src="Gambar/G4.png" alt="Gambar" class="max-w-full h-auto" width="550"/>
    </div>

    <!-- Form -->
    <div class="flex flex-1 bg-gray-900 justify-center items-center p-8">
      <div class="w-full max-w-md text-center">
        <div class="flex justify-center items-center mb-6">
          <h1 class="font-robotoslab text-5xl text-white drop-shadow-md">
            <strong>ED-VANCE</strong>
            <i class="fas fa-book-open text-white text-4xl"></i>
          </h1>
        </div>

        <h2 class="font-robotoslab text-2xl mb-1">Masuk sebagai Siswa</h2>
        <p class="mt-4 text-sm text-gray-300 mb-8">Belum punya akun?
          <a class="text-red-400 hover:underline" href="daftar_guru.php">Daftar</a>
        </p>

        <!-- Alert kesalahan -->
        <p id="errorMsg" class="text-red-500 mb-4 hidden">Username atau password salah!</p>

        <!-- Form -->
        <form id="loginForm" class="w-full mt-6" method="POST" onsubmit="return validateForm()">
          <label class="block text-sm text-gray-300 mb-1 text-left" for="username">Username</label>
          <input class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 mb-4 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                 id="username" name="username" type="text" required />

          <label class="block text-sm text-gray-300 mb-1 text-left" for="password">Kata Sandi</label>
          <input class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 mb-4 text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                 id="password" name="password" type="password" required />

          <div class="flex justify-between items-center mb-6">
            <label class="inline-flex items-center text-gray-300">
              <input class="form-checkbox text-purple-500 bg-gray-700 border-gray-600" type="checkbox"/>
              <span class="ml-2 text-sm">Ingatkan saya</span>
            </label>
          </div>

          <button type="submit"
                  class="w-full bg-green-500 hover:bg-green-600 text-black font-normal py-2 rounded-full shadow transition duration-200">
            Masuk
          </button>
        </form>
      </div>
    </div>
  </div>

<script>
  function validateForm() {
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const errorMsg = document.getElementById('errorMsg');

    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    if (!username || !password) {
      alert("Harap isi semua bidang: Username dan Kata Sandi!");
      return false;
    }

    // Simulasi akun
    const validUsername = "siswa";
    const validPassword = "123456";

    if (username !== validUsername || password !== validPassword) {
      errorMsg.classList.remove('hidden');
      usernameInput.value = "";
      passwordInput.value = "";
      return false;
    }

    // Login berhasil - redirect ke dashboard
    window.location.href = "dashboard_siswa.php";
    return false;
  }
</script>
</body>
</html>
