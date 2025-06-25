<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Ed-Vance</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'PT Serif', serif;
    }
    .sidebar {
      width: 50px;
      transition: width 0.3s ease;
      overflow: hidden;
    }
    .sidebar.expanded {
      width: 170px;
    }
    .menu-item {
      opacity: 0;
      transition: opacity 0.2s ease 0.1s;
      white-space: nowrap;
    }
    .sidebar.expanded .menu-item {
      opacity: 1;
    }
    .menu-icon {
      min-width: 20px;
      text-align: center;
    }
  </style>
</head>
<body class="bg-white">
    <div class="flex flex-1">
      <nav id="sidebar" class="sidebar flex flex-col items-start py-6 px-2 space-y-6">
        <button id="toggleSidebar" class="px-2 py-1 text-black text-sm font-normal flex items-center justify-between w-full cursor-pointer select-none" type="button">
          <span class="menu-icon"><i class="fas fa-bars"></i></span>
            <span class="menu-item ml-2">Menu</span>
            <span class="menu-icon ml-auto"></span>
        </button>

        <a href="Dashboard_Guru.php" class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-home"></i></span>
          <span class="menu-item">Beranda</span>
        </a>

        <a href="data_pengajar.php" class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-users"></i></span>
          <span class="menu-item">Data Pengajar</span>
        </a>

        <a href="data_siswa.php" class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-folder-open"></i></span>
          <span class="menu-item">Siswa</span>
        </a>

        <a href="tugas_quiz_guru.php" class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-lightbulb"></i></span>
          <span class="menu-item">Tugas/Quiz</span>
        </a>

        <a href="materi_guru.php" class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-book"></i></span>
          <span class="menu-item">Materi</span>
        </a>

      <a href="logout.php" class="flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-sign-out-alt"></i></span>
          <span class="menu-item">Keluar</span>
        </a>        
      </nav>
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('expanded');
    });
  </script>
</body>
</html>