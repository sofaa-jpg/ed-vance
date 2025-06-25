<?php
// Koneksi ke database
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ed-Vance Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&family=Roboto&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
    .font-robotoslab {
      font-family: 'Roboto Slab', serif;
    }
  </style>
</head>
<body class="bg-white min-h-screen flex flex-col">
  <!-- Header -->
  <header class="bg-[#352f6c] flex justify-between items-center px-8 py-4 shadow-md">
    <div class="flex items-center space-x-3">
      <h1 class="text-white font-robotoslab font-extrabold text-3xl select-none">
        <?php echo "ED-VANCE"; ?>
      </h1>
      <i class="fas fa-book-open text-white text-5xl"></i>
    </div>
     <div>
      <a href="index_hitam.php">
        <i class="fas fa-moon text-white text-3xl"></i>
      </a>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow flex flex-col md:flex-row items-center justify-center px-6 md:px-20 py-12 gap-12 md:gap-24">
  <img src="Gambar/Gambar1.png" 
     alt="Gambar" 
     class="w-80 md:w-[25rem]"/>
    <section class="text-center md:text-left max-w-md">
      <h2 class="text-3xl font-serif mb-2 drop-shadow-md">
        <?php echo "Selamat datang di Ed-Vance !"; ?>
      </h2>
      <h3 class="text-4xl font-robotoslab font-extrabold mb-8 drop-shadow-lg">
        <?php echo "Pilih Portal Anda:"; ?>
      </h3>
      <div class="flex flex-col gap-6">
        <!-- Tombol Guru -->
        <button onclick="window.location.href='login_guru.php'" class="flex items-center justify-center gap-4 bg-gray-300 rounded-lg py-4 px-8 shadow-lg hover:shadow-xl transition duration-300 font-robotoslab text-2xl select-none">
          <i class="fas fa-user text-4xl"></i>
          <?php echo "Guru"; ?>
        </button>

        <!-- Tombol Siswa -->
        <button onclick="window.location.href='login_siswa.php'" class="flex items-center justify-center gap-4 bg-gray-300 rounded-lg py-4 px-8 shadow-lg hover:shadow-xl transition duration-300 font-robotoslab text-2xl select-none">
          <i class="fas fa-users text-4xl"></i>
          <?php echo "Siswa"; ?>
        </button>
      </div>
    </section>
  </main>
</body>
</html>
