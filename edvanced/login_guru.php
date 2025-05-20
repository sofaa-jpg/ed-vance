<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   ED-VANCE Login
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   @import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap');
    .font-alfa {
      font-family: 'Alfa Slab One', cursive;
    }
  </style>
 </head>
 <body>
  <div class="min-h-screen flex flex-col md:flex-row">
   <div class="md:w-1/2 bg-[#322f6d] flex justify-center items-center p-6">
    <img alt="Gambar" class="max-w-full h-auto" height="400" src="Gambar/Gmbr3.png" width="300"/>
   </div>
   <div class="md:w-1/2 bg-white flex flex-col justify-center items-center p-8">
    <h1 class="font-alfa text-4xl text-black flex items-center gap-2 drop-shadow-[3px_3px_3px_rgba(0,0,0,0.3)] select-none">
     ED-VANCE
     <i class="fas fa-book-open text-black text-4xl drop-shadow-lg"></i>
     </i>
    </h1>
    <h2 class="mt-4 font-bold text-xl text-black drop-shadow-[3px_3px_3px_rgba(0,0,0,0.3)] select-none">
     Masuk sebagai Guru
    </h2>
    <p class="mt-1 text-sm text-black select-none">
     Belum punya akun?
     <a class="text-red-600 hover:underline" href="daftar_guru.php">
      Daftar
     </a>
    </p>
    <form action="#" class="w-full max-w-md mt-6" method="POST" novalidate="">
     <label class="block text-sm text-black mb-1 select-none" for="email">
      Email
     </label>
     <input class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400" id="email" name="email" required="" type="email"/>
     <label class="block text-sm text-black mb-1 select-none" for="password">
      Kata Sandi
     </label>
     <input class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2 focus:outline-none focus:ring-2 focus:ring-blue-400" id="password" name="password" required="" type="password"/>
     <div class="flex justify-between items-center mb-6">
      <label class="inline-flex items-center text-black select-none">
       <input class="form-checkbox" type="checkbox"/>
       <span class="ml-2 text-sm">
        Ingatkan saya
       </span>
      </label>
      <a class="text-blue-600 text-sm hover:underline" href="#">
       Lupa Kata Sandi?
      </a>
     </div>
     <button class="w-full bg-green-500 hover:bg-green-600 text-black font-normal py-2 rounded-full drop-shadow-[3px_6px_6px_rgba(0,0,0,0.3)]" type="submit" >
      Masuk
     </button>
    </form>
   </div>
  </div>
 </body>
</html>
