<?php
session_start();

if (!isset($_SESSION['npm'])) {
    header('Location: ../auth/login.php');
    exit();
}

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header('location: ../auth/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../src/style/output.css" />
    <link rel="stylesheet" href="../src/style/custom.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
      rel="stylesheet"
    />
    <title>Exif-C - Dashboard</title>
  </head>
  <body class="bg-black font-mulish">
  <nav
  id="navbar"
  class="bg-transparent flex items-center justify-center fixed top-5 left-0 w-full z-50 transition duration-400 ease-in-out"
>
  <div
    class="bg-black border border-gray-700 rounded-full px-4 py-2 flex items-center space-x-5"
  >
    <a href="../index.php" class="text-white font-medium hover:text-gray-300">Home</a>

    <!-- Dropdown Menu for Anggota -->
    <div class="relative group">
      <a
        href="#"
        class="text-white font-medium hover:text-gray-300 flex items-center"
        >Kelola
        <!-- <svg
          class="ml-1 w-4 h-4"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          />
        </svg> -->
      </a>
      <div
        class="absolute inputan hidden group-hover:block text-white mt-2 lg z-50"
      >
        <a
          href="./jumbotron/index.php"
          class="block px-4 py-2 hover:bg-blue-500 hover:text-white hover:rounded-[6px] transition duration-300"
          >Jumbotron</a
        >
        <a
          href="./postkata/index.php"
          class="block px-4 py-2 hover:bg-blue-500 hover:text-white hover:rounded-[6px] transition duration-300"
          >Kata-kata</a
        >
        <a
          href="./matkul/index.php"
          class="block px-4 py-2 hover:bg-blue-500 hover:text-white hover:rounded-[6px] transition duration-300"
          >Matkul</a
        >
        <a
          href="./anggota/index.php"
          class="block px-4 py-2 hover:bg-blue-500 hover:text-white hover:rounded-[6px] transition duration-300"
          >Anggota</a
        >
        <a
          href="./gallery/index.php"
          class="block px-4 py-2 hover:bg-blue-500 hover:text-white hover:rounded-[6px] transition duration-300"
          >Gallery</a
        >
      </div>
    </div>

    <a href="../tugas/index.html" class="text-white font-medium hover:text-gray-300"
      >Tugas</a
    >
    <a
      href="../auth/logout.php"
      class="font-medium border border-gray-700 rounded-full px-4 py-1 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-transparent"
    >
      Logout
    </a>
  </div>
</nav>
<section
    class="text-white bg-cover bg-no-repeat h-screen"
    style="background-image: url('../src/assets/images/anu.svg')">
    <div class="mt-[90px]">
      <div class="grid grid-cols-3 xl:grid-cols-3 gap-2 px-4 py-4">
      <div class="w-full h-[180px] glass flex justify-center items-center">
        <div class="flex-col text-center">
          <h1 class="text-xl font-bold mb-2">Matkul</h1>
          <p class="text-4xl font-bold">8</p>
        </div>    
      </div>
      <div class="w-full h-[180px] glass col-span-2 flex justify-center items-center">
        <div class="flex-col text-center">
          <h1 class="text-xl font-bold mb-2">Uang Kas</h1>
          <p class="text-4xl font-bold">Rp.500.000</p>
        </div>  
      </div>
      <div class="w-full h-[180px] glass col-span-2 flex justify-center items-center">
        <div class="flex-col text-center">
          <h1 class="text-xl font-bold mb-2">Anggota Kelas</h1>
          <p class="text-4xl font-bold">29</p>
        </div> 
      </div>
      <div class="w-full h-[180px] glass flex justify-center items-center">
        <div class="flex-col text-center">
          <h1 class="text-xl font-bold mb-2">Foto di Gallery</h1>
          <p class="text-4xl font-bold">5</p>
        </div> 
      </div>
      <div class="w-full h-[180px] glass flex justify-center items-center">
        <div class="flex-col text-center">
          <h1 class="text-xl font-bold mb-2">Kelola Fitur</h1>
          <p class="text-4xl font-bold">5</p>
        </div> 
      </div>
      <div class="w-full h-[180px] glass col-span-2 flex justify-center items-center">
        <div class="flex-col text-center">
          <h1 class="text-xl font-bold mb-2">Kata-kata hari ini</h1>
          <p class="text-sm md:text-2xl font-bold">
"Istirahat sejenak tidak masalah, asalkan kita kembali melanjutkan perjuangan."</p>
        </div> 
      </div>
    </div>
    </div>
</section>
    
</body>
</html>