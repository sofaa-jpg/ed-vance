<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Ed-Vance Login
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&amp;display=swap" rel="stylesheet"/>
  <style>
   .font-alfa {
      font-family: 'Alfa Slab One', cursive;
    }
  </style>
 </head>
 <body class="min-h-screen flex">
  <div class="hidden md:flex md:w-1/2 bg-[#352f6e] justify-center items-center">
   <img alt="Gambar4" class="max-w-[300px] max-h-[500px]" height="500" src="Gambar/Gmbr4.png" width="300"/>
  </div>
  <div class="flex flex-1 bg-white justify-center items-center p-8">
   <form class="w-full max-w-md">
    <div class="flex items-center mb-6">
     <h1 class="font-alfa text-4xl text-black drop-shadow-[4px_4px_4px_rgba(0,0,0,0.3)]">
      ED-VANCE
     </h1>
     <i aria-hidden="true" class="fas fa-book ml-3 text-black drop-shadow-[4px_4px_4px_rgba(0,0,0,0.3)] text-4xl">
     </i>
    </div>
    <h2 class="font-alfa text-2xl mb-1 text-black drop-shadow-[4px_4px_4px_rgba(0,0,0,0.3)]">
     Masuk sebagai Siswa
    </h2>
    <p class="mb-6 text-black drop-shadow-[4px_4px_4px_rgba(0,0,0,0.3)]">
     Belum punya akun?
     <a class="text-red-600 hover:underline" href="daftar_siswa.php">
      Daftar
     </a>
    </p>
    <label class="block mb-1 text-black text-base" for="email">
     Email
    </label>
    <input class="w-full mb-5 px-3 py-2 border border-gray-300 rounded-md text-black text-base focus:outline-none focus:ring-2 focus:ring-green-500" id="email" type="email"/>
    <label class="block mb-1 text-black text-base" for="password">
     Kata Sandi
    </label>
    <input class="w-full mb-4 px-3 py-2 border border-gray-300 rounded-md text-black text-base focus:outline-none focus:ring-2 focus:ring-green-500" id="password" type="password"/>
    <div class="flex justify-between items-center mb-6 text-black text-base">
     <label class="flex items-center space-x-2">
      <input type="checkbox"/>
      <span>
       Ingatkan saya
      </span>
     </label>
     <a class="text-blue-600 hover:underline" href="#">
      Lupa Kata Sandi?
     </a>
    </div>
    <button class="w-full bg-green-500 text-black text-base py-2 rounded-lg shadow-[8px_8px_8px_rgba(0,0,0,0.2)] hover:bg-green-600 transition" type="submit">
     Masuk
    </button>
   </form>
  </div>
 </body>
</html>
