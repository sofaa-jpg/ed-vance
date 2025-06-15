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
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Roboto Slab', serif;
    }
  </style>
 </head>
 <body class="bg-white">
  <header class="bg-[#2f2f6e] flex items-center px-6 py-4">
   <h1 class="text-white font-extrabold text-2xl drop-shadow-[2px_2px_0_rgba(0,0,0,0.5)]" style="font-family: 'Roboto Slab', serif">
    ED-VANCE
     <i class="fas fa-book-open text-white text-4.3xl"></i>
   </h1>
  </header>
  <main class="p-6 max-w-full overflow-y-auto h-[calc(100vh-72px)]">
   <h2 class="font-extrabold text-xl mb-2 border-b border-black pb-1" style="font-family: 'Roboto Slab', serif">
    Pendaftaran Akun
   </h2>
   <p class="mb-4 text-sm">
    Masukan Data Anda dengan Benar !
   </p>
   <form class="space-y-4 text-xs w-full max-w-full">
    <div>
     <label class="block mb-1" for="nis">
      NIS*
     </label>
     <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="nip" name="nip" type="text"/>
    </div>
    <div>
     <label class="block mb-1" for="nama">
      Nama Lengkap*
     </label>
     <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="nama" name="nama" type="text"/>
    </div>
    <div>
     <label class="block mb-1" for="jenis_kelamin">
      Jenis Kelamin*
     </label>
     <select class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs text-gray-400" id="jenis_kelamin" name="jenis_kelamin">
      <option disabled="" selected="">
       -Pilih-
      </option>
      <option>
       Laki-laki
      </option>
      <option>
       Perempuan
      </option>
     </select>
    </div>
    <div>
     <label class="block mb-1" for="telepon">
      Nomor Telepon*
     </label>
     <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="telepon" name="telepon" type="text"/>
    </div>
    <div>
     <label class="block mb-1" for="username">
      Username*
     </label>
     <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="username" name="username" type="text"/>
    </div>
    <div>
     <label class="block mb-1" for="password">
      Kata Sandi*
     </label>
     <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="password" name="password" type="password"/>
    </div>
    <div>
     <label class="block mb-1" for="foto">
      Foto*
     </label>
     <input class="w-full border border-gray-300 rounded-md px-3 py-1 text-xs" id="foto" name="foto" type="file"/>
    </div>
    <p class="text-xs mb-4">
     Catatan: Tanda * wajib diisi
    </p>
    <div class="flex space-x-3">
     <button class="bg-green-600 text-white text-xs px-4 py-1 rounded-md" type="submit">
      Daftar
     </button>
     <button class="bg-red-600 text-white text-xs px-4 py-1 rounded-md" type="reset">
      Reset
     </button>
    </div>
   </form>
  </main>
 </body>
</html>