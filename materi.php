<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Ed-Vance - Materi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Roboto Slab', serif;
    }
    .sidebar {
      width: 44px;
      transition: width 0.3s ease;
      overflow: hidden;
    }
    .sidebar.expanded {
      width: 176px;
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
    .menu-item-wrapper {
      width: 100%;
      padding: 0.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      border-radius: 6px;
      cursor: pointer;
    }
    .menu-item-wrapper.active {
      background-color: #d1cce3;
    }
  </style>
</head>
<body class="bg-white">
  <div class="min-h-screen flex flex-col">
    <header class="bg-[#2f2c6e] border border-black border-b-0 flex items-center px-6 py-4">
      <h1 class="text-white font-extrabold text-3xl tracking-wide font-serif select-none">
        ED-VANCE <i class="fas fa-book-open text-white text-4.3xl"></i>
      </h1>
    </header>

    <div class="flex flex-1">
      <!-- Sidebar -->
      <nav id="sidebar" class="sidebar bg-[#9b95cc] flex flex-col py-8 px-1 space-y-2 border border-black border-r-0">
        <div class="menu-item-wrapper" data-menu="beranda">
          <a href="Dashboard_Guru.php" class="menu-item-wrapper flex items-center space-x-2 text-black text-sm font-normal select-none px-0 w-full">
            <span class="menu-icon"><i class="fas fa-home text-base"></i></span>
            <span class="menu-item">Beranda</span>
          </a>
        </div>
        <div class="menu-item-wrapper" data-menu="pengajar">
          <span class="menu-icon"><i class="fas fa-users"></i></span>
          <span class="menu-item">Data Pengajar</span>
        </div>
        <div class="menu-item-wrapper" data-menu="siswa">
          <span class="menu-icon"><i class="fas fa-folder-open"></i></span>
          <span class="menu-item">Data Siswa</span>
        </div>
        <div class="menu-item-wrapper" data-menu="tugas">
          <span class="menu-icon"><i class="fas fa-lightbulb text-lg"></i></span>
          <span class="menu-item">Tugas/Quiz</span>
        </div>
        <div class="menu-item-wrapper active" data-menu="materi">
          <span class="menu-icon"><i class="fas fa-book text-lg"></i></span>
          <span class="menu-item">Materi</span>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="flex-1 bg-[#e6e6e6] p-6">
        <h2 class="text-2xl font-serif mb-2 border-b border-gray-300 pb-2">Materi</h2>
        <section class="bg-white p-6 shadow-sm">
          <div class="flex justify-between items-center mb-4">
            <div>
              <button class="bg-green-500 hover:bg-green-600 text-white text-xs px-3 py-1 rounded">Tambah Data</button>
              <button class="bg-gray-400 hover:bg-gray-500 text-white text-xs px-3 py-1 rounded ml-2">Cetak</button>
            </div>
            <div class="flex items-center space-x-2">
              <label class="text-xs" for="search">Cari:</label>
              <input class="border border-gray-300 rounded text-xs px-2 py-1 w-24" id="search" type="text" />
            </div>
          </div>

          <div class="mb-2">
            <label class="text-xs"> 
              <select class="border border-gray-300 rounded text-xs px-1 py-1">
                <option value="5">5</option>
                <option value="10">10</option>
              </select> records per page
            </label>
          </div>

          <table class="w-full border-collapse border border-gray-400 text-xs">
            <thead>
              <tr class="bg-[#b0b4d1] text-center font-semibold">
                <th class="border border-gray-400 px-2 py-1">No.</th>
                <th class="border border-gray-400 px-2 py-1">Judul</th>
                <th class="border border-gray-400 px-2 py-1">Nama File</th>
                <th class="border border-gray-400 px-2 py-1">Mata Pelajaran</th>
                <th class="border border-gray-400 px-2 py-1">Opsi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </section>
      </main>
    </div>
  </div>

  <script>
    const sidebar = document.getElementById('sidebar');
    const menuItems = document.querySelectorAll('.menu-item-wrapper');

    menuItems.forEach(item => {
      item.addEventListener('click', function () {
        if (!sidebar.classList.contains('expanded')) {
          sidebar.classList.add('expanded');
        }
        menuItems.forEach(i => i.classList.remove('active'));
        this.classList.add('active');
      });
    });

    document.addEventListener('click', function (e) {
      const isClickInsideSidebar = sidebar.contains(e.target);
      if (!isClickInsideSidebar) {
        sidebar.classList.remove('expanded');
        menuItems.forEach(i => i.classList.remove('active'));
      }
    });
  </script>
</body>
</html>
