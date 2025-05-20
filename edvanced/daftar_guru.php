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
   /* Custom scrollbar for vertical scroll */
    ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-thumb {
      background-color: #4b5563;
      border-radius: 4px;
    }
  </style>
 </head>
 <body class="overflow-y-scroll min-h-screen bg-white">
  <header class="bg-[#2e2b66] flex items-center px-6 py-4">
   <h1 class="text-white font-extrabold text-xl tracking-wide font-serif">
    ED-VANCE
   </h1>
   <img alt="Open book with stars icon" class="ml-2" height="32" src="https://storage.googleapis.com/a1aa/image/fbfe07d3-4ca8-42c0-0e65-f8aed3cb7be4.jpg" width="32"/>
  </header>
  <main class="px-6 py-4 max-w-3xl">
   <h2 class="font-extrabold text-lg font-serif border-b border-gray-300 pb-1 mb-2">
    Pendaftaran Akun
   </h2>
   <p class="text-xs mb-3 font-normal font-sans text-gray-900 drop-shadow-[0_1px_1px_rgba(0,0,0,0.1)]">
    Masukan Data Anda dengan Benar !
   </p>
   <form class="space-y-3 text-xs font-sans text-gray-900 max-w-md">
    <div>
     <label class="block mb-0.5 font-semibold" for="nip">
      NIP*
     </label>
     <input class="w-full rounded border border-gray-300 px-2 py-1 text-xs" id="nip" name="nip" type="text"/>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="nama">
      Nama Lengkap*
     </label>
     <input class="w-full rounded border border-gray-300 px-2 py-1 text-xs" id="nama" name="nama" type="text"/>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="tempat-lahir">
      Tempat Lahir*
     </label>
     <input class="w-full rounded border border-gray-300 px-2 py-1 text-xs" id="tempat-lahir" name="tempat-lahir" type="text"/>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="tanggal-lahir">
      Tanggal Lahir*
     </label>
     <input class="w-full rounded border border-gray-300 px-2 py-1 text-xs placeholder:text-gray-400" id="tanggal-lahir" name="tanggal-lahir" placeholder="mm/dd/yyyy" type="date"/>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="jenis-kelamin">
      Jenis Kelamin*
     </label>
     <select class="w-full rounded border border-gray-300 px-2 py-1 text-xs text-gray-400" id="jenis-kelamin" name="jenis-kelamin">
      <option>
       -Pilih-
      </option>
     </select>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="agama">
      Agama*
     </label>
     <select class="w-full rounded border border-gray-300 px-2 py-1 text-xs text-gray-400" id="agama" name="agama">
      <option>
       -Pilih-
      </option>
     </select>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="nomor-telepon">
      Nomor Telepon*
     </label>
     <input class="w-full rounded border border-gray-300 px-2 py-1 text-xs" id="nomor-telepon" name="nomor-telepon" type="text"/>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="email">
      Email*
     </label>
     <input class="w-full rounded border border-gray-300 px-2 py-1 text-xs" id="email" name="email" type="email"/>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="alamat">
      Alamat*
     </label>
     <textarea class="w-full rounded border border-gray-300 px-2 py-1 text-xs resize-none" id="alamat" name="alamat" rows="3"></textarea>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="username">
      Username*
     </label>
     <input class="w-full rounded border border-gray-300 px-2 py-1 text-xs" id="username" name="username" type="text"/>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="kata-sandi">
      Kata Sandi*
     </label>
     <input class="w-full rounded border border-gray-300 px-2 py-1 text-xs" id="kata-sandi" name="kata-sandi" type="password"/>
    </div>
    <div>
     <label class="block mb-0.5 font-semibold" for="foto">
      Foto*
     </label>
     <input class="w-full rounded border border-gray-300 px-2 py-1 text-xs" id="foto" name="foto" type="file"/>
    </div>
    <p class="text-[10px] font-normal">
     <span class="font-semibold">
      Catatan:
     </span>
     Tanda * wajib diisi
    </p>
    <div class="flex space-x-2 mt-1">
     <button class="bg-green-700 text-white text-[10px] px-3 py-1 rounded" type="submit">
      Daftar
     </button>
     <button class="bg-red-600 text-white text-[10px] px-3 py-1 rounded" type="reset">
      Reset
     </button>
    </div>
   </form>
  </main>
 </body>
</html>
