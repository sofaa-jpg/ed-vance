<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Materi - Ed-Vance</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet"/>
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
    .menu-item-wrapper.active {
      background-color: #d1cce3;
      border-radius: 6px;
    }
  </style>
</head>
<body class="bg-white">
  <div class="min-h-screen flex flex-col">
    <header class="bg-[#2f2c6e] border border-black border-b-0 flex items-center px-6 py-4">
      <h1 class="text-white font-extrabold text-3xl tracking-wide font-serif select-none">
        ED-VANCE
        <i class="fas fa-book-open text-white text-4.3xl"></i>
      </h1>
    </header>

    <div class="flex flex-1">
      <nav id="sidebar" class="sidebar bg-[#9b95cc] flex flex-col items-start py-8 px-1 space-y-8 border border-black border-r-0">

        <!-- Tombol Toggle Sidebar -->
        <button id="toggleSidebar" class="bg-[#a9a1d1] rounded-full px-2 py-1 text-black text-sm font-normal flex items-center justify-between w-full cursor-pointer select-none menu-item-wrapper" type="button">
          <span class="menu-icon"><i class="fas fa-home text-base"></i></span>
          <span class="menu-item ml-2">Beranda</span>
        </button>

        <!-- Menu lainnya -->
        <button class="menu-item-wrapper flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-lightbulb text-lg"></i></span>
          <span class="menu-item">Tugas/Quiz</span>
        </button>

        <button class="menu-item-wrapper active flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-book text-lg"></i></span>
          <span class="menu-item">Materi</span>
        </button>

        <button class="menu-item-wrapper flex items-center space-x-2 text-black text-sm font-normal cursor-pointer select-none px-2 w-full">
          <span class="menu-icon"><i class="fas fa-chart-bar text-lg"></i></span>
          <span class="menu-item">Nilai</span>
        </button>
      </nav>

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
            <tbody>
              <tr>
                <td class="border px-4 py-2">1</td>
                <td class="border px-4 py-2 text-left">Bahasa Indonesia</td>
                <td class="border px-4 py-2">
                  <a href="nilai.php?mapel=bahasa_indonesia" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-800">Lihat Materi</a>
                </td>
              </tr>
              <tr>
                <td class="border px-4 py-2">2</td>
                <td class="border px-4 py-2 text-left">IPA</td>
                <td class="border px-4 py-2">
                  <a href="nilai.php?mapel=ipa" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-800">Lihat Materi</a>
                </td>
              </tr>
              <tr>
                <td class="border px-4 py-2">3</td>
                <td class="border px-4 py-2 text-left">IPS</td>
                <td class="border px-4 py-2">
                  <a href="nilai.php?mapel=ips" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-800">Lihat Materi</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <!-- SCRIPT SIDEBAR -->
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('expanded');
    });

    const menuItems = document.querySelectorAll('.menu-item-wrapper');
    menuItems.forEach(item => {
      item.addEventListener('click', function () {
        menuItems.forEach(i => i.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>
</body>
</html>
