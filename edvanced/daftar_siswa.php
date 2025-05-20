<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   ED-VANCE Registration
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   /* Custom scrollbar for the form container */
    .scrollbar-thin::-webkit-scrollbar {
      width: 6px;
    }
    .scrollbar-thin::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 3px;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>
 </head>
 <body class="bg-white">
  <div class="max-w-[1500px] h-[600px] border border-gray-300 overflow-y-auto scrollbar-thin">
   <header class="bg-[#2e2e6e] flex items-center gap-2 px-4 py-3">
    <h1 class="text-white font-extrabold text-lg leading-none">
     ED-VANCE
    </h1>
    <img alt="Icon of an open book with stars above it, white on dark blue background" class="w-6 h-6" height="24" src="Gambar/Gmbr2.png" width="24"/>
   </header>
   <main class="p-4">
    <h2 class="font-bold text-base mb-2">
     Pendaftaran Akun
    </h2>
    <hr class="border border-gray-300 mb-3"/>
    <p class="text-[10px] mb-3">
     Masukan Data Anda dengan Benar !
    </p>
    <form class="text-[10px] space-y-3">
     <div>
      <label class="block mb-1" for="nis">
       NIS*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="nis" name="nis" type="text"/>
     </div>
     <div>
      <label class="block mb-1" for="nama">
       Nama Lengkap*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="nama" name="nama" type="text"/>
     </div>
     <div>
      <label class="block mb-1" for="tempat-lahir">
       Tempat Lahir*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="tempat-lahir" name="tempat-lahir" type="text"/>
     </div>
     <div>
      <label class="block mb-1" for="tanggal-lahir">
       Tanggal Lahir*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="tanggal-lahir" name="tanggal-lahir" type="date"/>
     </div>
     <div>
      <label class="block mb-1" for="jenis-kelamin">
       Jenis Kelamin*
      </label>
      <select class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="jenis-kelamin" name="jenis-kelamin">
       <option>
        -Pilih-
       </option>
      </select>
     </div>
     <div>
      <label class="block mb-1" for="agama">
       Agama*
      </label>
      <select class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="agama" name="agama">
       <option>
        -Pilih-
       </option>
      </select>
     </div>
     <div>
      <label class="block mb-1" for="nama-ayah">
       Nama Ayah*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="nama-ayah" name="nama-ayah" type="text"/>
     </div>
     <div>
      <label class="block mb-1" for="nama-ibu">
       Nama Ibu*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="nama-ibu" name="nama-ibu" type="text"/>
     </div>
     <div>
      <label class="block mb-1" for="nomor-telepon">
       Nomor Telepon*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="nomor-telepon" name="nomor-telepon" type="text"/>
     </div>
     <div>
      <label class="block mb-1" for="email">
       Email*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="email" name="email" type="email"/>
     </div>
     <div>
      <label class="block mb-1" for="alamat">
       Alamat*
      </label>
      <textarea class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="alamat" name="alamat" rows="2"></textarea>
     </div>
     <div>
      <label class="block mb-1" for="username">
       Username*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="username" name="username" type="text"/>
     </div>
     <div>
      <label class="block mb-1" for="kata-sandi">
       Kata Sandi*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="kata-sandi" name="kata-sandi" type="password"/>
     </div>
     <div>
      <label class="block mb-1" for="foto">
       Foto*
      </label>
      <input class="w-full border border-gray-300 rounded px-2 py-1 text-[10px]" id="foto" name="foto" type="file"/>
     </div>
     <p class="text-[8px] mb-2">
      Catatan: Tanda * wajib diisi
     </p>
     <div class="flex gap-2">
      <button class="bg-green-600 text-white text-[10px] px-3 py-1 rounded" type="submit " href="daftar_berhasil.php">
       Daftar
      </button>
      <button class="bg-red-600 text-white text-[10px] px-3 py-1 rounded" type="reset">
       Reset
      </button>
     </div>
    </form>
   </main>
  </div>
 </body>
</html>
