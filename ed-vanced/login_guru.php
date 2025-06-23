<?php
session_start();
include 'database.php';

// Cek apakah sudah login
if (isset($_SESSION['username'])) {
    header("Location: Dashboard_Guru.php");
    exit;
}

$loginError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: Dashboard_Guru.php");
        exit();
    } else {
        $loginError = "❌ Username atau kata sandi salah!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>ED-VANCE Login Guru</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');
    body, .font-robotoslab {
      font-family: 'Roboto Slab', serif;
    }
  </style>
</head>
<body class="bg-white text-black font-robotoslab">
  <a href="index.php" class="fixed top-4 left-4 inline-flex items-center text-black transition duration-300 transform hover:scale-105 active:scale-90 cursor-pointer">
    <i class="fas fa-arrow-left bg-gray-800 text-white p-2 rounded-lg"></i>
  </a>

  <div class="min-h-screen flex flex-col md:flex-row">
    <div class="md:w-1/2 bg-[#322f6d] flex justify-center items-center p-6">
      <img src="Gambar/Gbr3.png" alt="Gambar" class="max-w-full h-auto" width="250"/>
    </div>

    <div class="flex flex-1 bg-white justify-center items-center p-8">
      <div class="w-full max-w-md text-center">
        <div class="flex justify-center items-center mb-6">
          <h1 class="text-5xl text-black drop-shadow-md font-robotoslab">
            <strong>ED-VANCE</strong>
            <i class="fas fa-book-open text-black text-4xl"></i>
          </h1>
        </div>

        <h2 class="text-2xl mb-1 text-black">Masuk sebagai Guru</h2>
        <p class="mt-4 text-sm text-black mb-8">Belum punya akun?
          <a class="text-red-600 hover:underline" href="daftar_guru.php">Daftar</a>
        </p>

        <!-- Alert kesalahan -->
        <?php if (!empty($loginError)): ?>
          <p class="text-red-600 mb-4"><?= $loginError ?></p>
        <?php endif; ?>

        <form method="POST" class="w-full mt-6">
          <label class="block text-sm text-black mb-1 text-left" for="username">Username</label>
          <input class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 text-black focus:outline-none focus:ring-2 focus:ring-blue-400"
                 id="username" name="username" type="text" required/>

          <label class="block text-sm text-black mb-1 text-left" for="password">Kata Sandi</label>
          <input class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 text-black focus:outline-none focus:ring-2 focus:ring-blue-400"
                 id="password" name="password" type="password" required/>

          <div class="flex justify-between items-center mb-6">
            <label class="inline-flex items-center text-black">
              <input class="form-checkbox text-blue-600" type="checkbox"/>
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
</body>
</html>
