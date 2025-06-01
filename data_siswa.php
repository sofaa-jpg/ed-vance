<?php
// Koneksi ke database
include 'database.php';
?>

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
            <span class="menu-icon ml-auto"><i class="fas text-base"></i></span>
          </a>
        </div>
        <div class="menu-item-wrapper" data-menu="pengajar">
          <span class="menu-icon"><i class="fas fa-users"></i></span>
          <span class="menu-item">Data Pengajar</span>
          <span class="menu-icon ml-auto"><i class="fas text-base"></i></span>
        </div>
        <div class="menu-item-wrapper" data-menu="siswa">
          <span class="menu-icon"><i class="fas fa-folder-open"></i></span>
          <span class="menu-item">Data Siswa</span>
          <span class="menu-icon ml-auto"><i class="fas text-base"></i></span>
        </div>
        <div class="menu-item-wrapper" data-menu="tugas">
          <span class="menu-icon"><i class="fas fa-lightbulb text-lg"></i></span>
          <span class="menu-item">Tugas/Quiz</span>
          <span class="menu-icon ml-auto"><i class="fas text-base"></i></span>
        </div>
        <div class="menu-item-wrapper" data-menu="materi">
          <span class="menu-icon"><i class="fas fa-book text-lg"></i></span>
          <span class="menu-item">Materi</span>
          <span class="menu-icon ml-auto"><i class="fas text-base"></i></span>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="flex-1 bg-[#e6e6e6] p-6">
        <h2 class="text-2xl font-serif mb-2 border-b border-gray-300 pb-2">Manajemen Siswa</h2>
        <section class="bg-white p-6 shadow-sm">
          <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 text-sm mb-4">
            Pengajar tidak bisa mengedit data siswa. Pengajar hanya bisa mengaktifkan dan menonaktifkan serta menghapus akun siswa. Untuk mengedit data siswa yang berhak adalah siswa itu sendiri.
          </div>
          <button class="bg-[#0099ff] text-black text-xs px-2 py-1 rounded mb-4 inline-block" type="button">
            Cek Data Siswa
          </button>
          <div class="flex justify-end mb-2">
            <label class="text-xs mr-2 mt-1" for="search">Cari:</label>
            <input class="border border-gray-300 rounded text-xs px-2 py-1 w-24" id="search" type="text" />
          </div>
          <table class="w-full border-collapse border border-gray-400 text-xs">
            <thead>
              <tr class="bg-[#b0b4d1] text-center font-semibold">
                <th class="border border-gray-400 px-2 py-1">No.</th>
                <th class="border border-gray-400 px-2 py-1">NIS</th>
                <th class="border border-gray-400 px-2 py-1">Nama Lengkap</th>
                <th class="border border-gray-400 px-2 py-1">Jenis Kelamin</th>
                <th class="border border-gray-400 px-2 py-1">Opsi</th>
              </tr>
            </thead>
              <!-- Data rows siswa -->
               <tbody>
<?php
include 'database.php';
// Proses aktifkan, nonaktifkan, atau hapus akun siswa
if (isset($_GET['action']) && isset($_GET['id'])) {
  $id = intval($_GET['id']);
  if ($_GET['action'] == 'aktifkan') {
    mysqli_query($conn, "UPDATE users SET status = 'aktif' WHERE id = $id");
  } elseif ($_GET['action'] == 'nonaktifkan') {
    mysqli_query($conn, "UPDATE users SET status = 'nonaktif' WHERE id = $id");
  } elseif ($_GET['action'] == 'hapus') {
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
  }
}

// Ambil semua data siswa dari database
$query = "SELECT * FROM users WHERE role = 'siswa'";
$result = mysqli_query($conn, $query);
$no = 1;

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr class='text-center'>";
  echo "<td class='border border-gray-400 px-2 py-1'>" . $no++ . "</td>";
  echo "<td class='border border-gray-400 px-2 py-1'>" . htmlspecialchars($row['nis']) . "</td>";
  echo "<td class='border border-gray-400 px-2 py-1'>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
  echo "<td class='border border-gray-400 px-2 py-1'>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
  echo "<td class='border border-gray-400 px-2 py-1'>";

  if ($row['status'] == 'aktif') {
    echo "<a href='?action=nonaktifkan&id=" . $row['id'] . "' class='bg-yellow-400 hover:bg-yellow-500 text-black text-xs px-2 py-1 rounded mr-1'>Nonaktifkan</a>";
  } else {
    echo "<a href='?action=aktifkan&id=" . $row['id'] . "' class='bg-green-400 hover:bg-green-500 text-white text-xs px-2 py-1 rounded mr-1'>Aktifkan</a>";
  }

  echo "<a href='?action=hapus&id=" . $row['id'] . "' onclick=\"return confirm('Yakin ingin menghapus siswa ini?')\" class='bg-red-500 hover:bg-red-600 text-white text-xs px-2 py-1 rounded'>Hapus</a>";

  echo "</td>";
  echo "</tr>";
}
?>
            </tbody>
          </table>
        </section>
      </main>
    </div>
  </div>

  <!-- Script -->
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
