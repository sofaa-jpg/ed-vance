<?php
session_start();
include 'koneksi.php';

$error = '';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['pass'] ?? '';

    // Cek user aktif dan cocokkan username + status aktif
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND role = 'siswa' AND status = 'aktif'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['pass'])) {
            // Simpan session
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            header("Location: dashboard_siswa.php");
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "Username tidak ditemukan atau akun Anda nonaktif.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>ED-VANCE Login Siswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap');
    body, .font-robotoslab {
      font-family: 'Roboto Slab', serif;
    }
  </style>
</head>
<body class="bg-white text-black">
  <!-- Tombol kembali -->
  <a href="index.php" class="fixed top-4 left-4 inline-flex items-center text-black transition duration-300 transform hover:scale-105 active:scale-90 cursor-pointer">
    <i class="fas fa-arrow-left bg-gray-800 text-white p-2 rounded-lg"></i>
  </a>

  <div class="min-h-screen flex flex-col md:flex-row">
    <!-- Gambar -->
    <div class="md:w-1/2 bg-[#2f2c6e] flex justify-center items-center p-6">
      <img src="Gambar/G4.png" alt="Gambar" class="max-w-full h-auto" width="550"/>
    </div>

    <!-- Form -->
    <div class="flex flex-1 bg-white justify-center items-center p-8">
      <div class="w-full max-w-md text-center">
        <div class="flex justify-center items-center mb-6">
          <h1 class="font-robotoslab text-5xl text-black [4px_4px_4px_rgba(0,0,0,0.3)]">
            <strong>ED-VANCE</strong>
            <i class="fas fa-book-open text-black text-4xl"></i>
          </h1>
        </div>

        <h2 class="font-robotoslab text-2xl mb-1">Masuk sebagai Siswa</h2>
        <p class="mt-4 text-sm text-gray-600 mb-8">Belum punya akun?
          <a class="text-red-600 hover:underline" href="daftar_siswa.php">Daftar</a>
        </p>

        <!-- Alert kesalahan -->
        <?php if (!empty($loginError)): ?>
          <p class="text-red-600 mb-4"><?= $loginError ?></p>
        <?php endif; ?>

        <!-- Form -->
        <form class="w-full mt-6" method="POST">
          <label class="block text-sm text-gray-700 mb-1 text-left" for="username">Username</label>
          <input class="w-full bg-white border border-gray-300 rounded-md px-3 py-2 mb-4 text-black focus:outline-none focus:ring-2 focus:ring-blue-400"
                 id="username" name="username" type="text" required />

          <label class="block text-sm text-gray-700 mb-1 text-left" for="password">Kata Sandi</label>
          <input class="w-full bg-white border border-gray-300 rounded-md px-3 py-2 mb-4 text-black focus:outline-none focus:ring-2 focus:ring-blue-400"
                 id="password" name="password" type="password" required />

          <div class="flex justify-between items-center mb-6">
            <label class="inline-flex items-center text-gray-700">
              <input class="form-checkbox text-blue-600" type="checkbox"/>
              <span class="ml-2 text-sm">Ingatkan saya</span>
            </label>
          </div>

          <button type="submit"
                  class="w-full bg-green-500 hover:bg-green-600 text-white font-normal py-2 rounded-full shadow transition duration-200">
            Masuk
          </button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
