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
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Ed-Vance | Manajemen Siswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'PT Serif', serif;
    }
  </style>
</head>

<body class="bg-[#b0a9d6] min-h-screen flex flex-col">
  <?php require 'navbar.php'; ?>
  <?php require 'sidebar_guru.php'; ?>

  <main class="flex-1 bg-[#e6e6e6] p-6">
    <h2 class="text-2xl font-serif mb-2 border-b border-gray-300 pb-2">Manajemen Siswa</h2>

    <section class="bg-white p-6 shadow rounded">
      <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-3 text-sm rounded mb-4">
        Pengajar <b>tidak bisa mengedit data siswa</b>. Pengajar hanya bisa <b>mengaktifkan</b>, <b>menonaktifkan</b>, dan <b>menghapus</b> akun siswa.
      </div>

      <button class="bg-[#0099ff] text-black text-xs px-3 py-1 rounded mb-4 inline-flex items-center gap-2" type="button">
        <i class="fas fa-search"></i> Cek Data Siswa
      </button>

      <div class="flex justify-end mb-3">
        <label class="text-xs mr-2 mt-1" for="search">Cari:</label>
        <input class="border border-gray-300 rounded text-xs px-2 py-1 w-28" id="search" type="text" />
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
        <tbody>
          <?php
          $query = "SELECT * FROM users WHERE role = 'siswa'";
          $result = mysqli_query($conn, $query);
          $no = 1;

          while ($row = mysqli_fetch_assoc($result)) :
          ?>
            <tr class="text-center">
              <td class="border border-gray-400 px-2 py-1"><?= $no++; ?></td>
              <td class="border border-gray-400 px-2 py-1"><?= htmlspecialchars($row['nis']); ?></td>
              <td class="border border-gray-400 px-2 py-1"><?= htmlspecialchars($row['nama_lengkap']); ?></td>
              <td class="border border-gray-400 px-2 py-1"><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
              <td class="border border-gray-400 px-2 py-1 flex justify-center gap-1 py-1">

                <?php if ($row['status'] == 'aktif') : ?>
                  <a href="?action=nonaktifkan&id=<?= $row['id']; ?>" class="bg-yellow-400 hover:bg-yellow-500 text-black text-xs px-2 py-1 rounded">Nonaktifkan</a>
                <?php else : ?>
                  <a href="?action=aktifkan&id=<?= $row['id']; ?>" class="bg-green-500 hover:bg-green-600 text-white text-xs px-2 py-1 rounded">Aktifkan</a>
                <?php endif; ?>

                <a href="?action=hapus&id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus siswa ini?')" class="bg-red-500 hover:bg-red-600 text-white text-xs px-2 py-1 rounded">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </section>
  </main>
</body>

</html>
