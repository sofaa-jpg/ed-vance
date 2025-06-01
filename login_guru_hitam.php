<?php
// database ke database
include 'database.php';

// Query untuk mengambil data dari tabel logi_guru
$sql_users = "SELECT username, pass, nip, jenis_kelamin, nama_lengkap, no_telp FROM users";
$result_users = $conn->query($sql_users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>ED-VANCE Login - Dark</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap');
    body, .font-robotoslab {
      font-family: 'Roboto Slab', serif;
    }
  </style>
</head>
<body class="bg-grey-950 text-white">
   <!-- Tombol kembali -->
  <a href="index_hitam.php" class="fixed top-4 left-4 inline-flex items-center text-white transition duration-300 transform hover:scale-105 active:scale-90 cursor-pointer">
    <i class="fas fa-arrow-left bg-white text-black p-2 rounded-lg"></i>
  </a>

  <div class="min-h-screen flex flex-col md:flex-row">
    <!-- Bagian kiri -->
    <div class="md:w-1/2 bg-gray-700 flex justify-center items-center p-6">
      <img alt="Gambar" class="max-w-full h-auto" height="400" src="Gambar/Gbr3.png" width="250"/>
    </div>

    <!-- Form login -->
    <div class="flex flex-1 bg-[#1e1e2f] justify-center items-center p-8">
      <div class="w-full max-w-md text-center">
        <div class="flex justify-center items-center mb-6">
          <h1 class="font-robotoslab text-5xl text-white drop-shadow-[4px_4px_4px_rgba(0,0,0,0.3)]">
            <strong>ED-VANCE</strong>
            <i class="fas fa-book-open text-white text-4xl"></i>
          </h1>
        </div>

        <h2 class="font-robotoslab text-2xl mb-1 text-white drop-shadow-[4px_4px_4px_rgba(0,0,0,0.3)]">
          Masuk sebagai Guru
        </h2>
        <p class="mt-4 text-sm text-gray-300 select-none mb-8">
          Belum punya akun?
          <a class="text-red-400 hover:underline" href="daftar_guru.php">Daftar</a>
        </p>

        <form action="#" class="w-full mt-6" method="POST" novalidate>
          <label class="block text-sm text-gray-200 mb-1 text-left" for="email">Email</label>
          <input class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 mb-4 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" id="email" name="email" type="email" required/>

          <label class="block text-sm text-gray-200 mb-1 text-left" for="password">Kata Sandi</label>
          <input class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 mb-4 text-white focus:outline-none focus:ring-2 focus:ring-purple-500" id="password" name="password" type="password" required/>

          <div class="flex justify-between items-center mb-6">
            <label class="inline-flex items-center text-gray-200 select-none">
              <input class="form-checkbox text-purple-500 bg-gray-700 border-gray-600" type="checkbox"/>
              <span class="ml-2 text-sm">Ingatkan saya</span>
            </label>
          </div>

          <button class="w-full bg-green-500 hover:bg-green-600 text-black font-normal py-2 rounded-full drop-shadow-[3px_6px_6px_rgba(0,0,0,0.3)] transition duration-200" type="submit">
            Masuk
          </button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
