<?php
// Koneksi ke database
include 'database.php';
?>
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Registration Success
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   @import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap');
   body {
      font-family: 'Roboto Slab', serif;
    }
  </style>
 </head>
 <body class="bg-white m-0 p-0">
  <header class="bg-[#2c2f7c] border-b-2 border-[#2a6db0]">
   <div class="max-w-7xl mx-auto flex items-center gap-3 px-6 py-4">
    <h1 class="text-white font-extrabold text-3xl leading-none">
     ED-VANCE
    </h1>
    <i class="fas fa-book-open text-white text-4xl "></i>
   </div>
  </header>
  <main class="flex flex-col items-center justify-center min-h-[calc(100vh-72px)] px-4 text-center">
   <div aria-hidden="true" class="flex items-center justify-center w-20 h-20 rounded-full bg-green-600 mb-4">
    <i class="fas fa-check text-white text-3xl">
    </i>
   </div>
   <div class="bg-green-600 text-white rounded-md px-6 py-2 mb-4 text-base" style="min-width: 180px;">
    Pendaftaran Berhasil
   </div>
   <p class="text-black mb-4 text-base">
    Akun anda berhasil di daftarkan
   </p>
   <a class="text-blue-600 mb-2 inline-block text-base hover:underline" href="login_guru.php">
    → Login
   </a>
   <a class="text-blue-600 inline-block text-base hover:underline" href="index.php">
    → Kembali Ke Halaman Utama
   </a>
  </main>
 </body>
</html>
