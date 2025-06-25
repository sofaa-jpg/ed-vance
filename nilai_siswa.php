<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login_siswa.php");
    exit();
}

// Ambil id siswa berdasarkan username
$username = $_SESSION['username'];
$userQuery = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
$user = mysqli_fetch_assoc($userQuery);
$id_siswa = $user['id'];

// Ambil data nilai siswa
$nilaiQuery = mysqli_query($conn, "
  SELECT q.mata_pelajaran, n.nilai, n.tanggal 
  FROM tbl_nilai n
  JOIN quiz q ON n.id_quiz = q.id
  WHERE n.id_siswa = $id_siswa
  ORDER BY n.tanggal DESC
");
?>


<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Materi Siswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&amp;display=swap" rel="stylesheet"/>
  <style>
  </style>
</head>
<body class="bg-[#b0a9d6] min-h-screen flex flex-col">
  <?php require 'navbar.php'; ?>
  <?php require 'sidebar_siswa.php'; ?>

    <!-- Main content -->
    <main class="flex-1 bg-[#e6e6e6] p-6">
        <main class="flex-1 p-8">
        <h1 class="text-2xl font-semibold mb-2">Nilai</h1>
        <hr class="mb-6">

        <div class="overflow-x-auto">
          <table class="min-w-full border border-gray-300 bg-white shadow-md rounded text-center">
            <thead class="bg-gray-200">
              <tr>
                <th class="border px-4 py-2">No.</th>
                <th class="border px-4 py-2">Mata Pelajaran</th>
                <th class="border px-4 py-2">Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
