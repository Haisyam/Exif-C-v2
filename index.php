<?php
  include "anjay.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./src/style/output.css" />
    <link rel="stylesheet" href="./src/style/custom.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
      rel="stylesheet"
    />
    <title>Exif-C</title>
  </head>
  <body class="bg-black font-mulish">
    <nav
      id="navbar"
      class="bg-transparent flex items-center justify-center fixed top-5 left-0 w-full z-50 transition duration-400 ease-in-out"
    >
      <div
        class="bg-black border border-gray-700 rounded-full px-4 py-2 flex items-center space-x-5"
      >
        <a href="#home" class="text-white font-medium hover:text-gray-300"
          >Home</a
        >
        <a href="#anggota" class="text-white font-medium hover:text-gray-300"
          >Anggota</a
        >
        <a href="#galery" class="text-white font-medium hover:text-gray-300"
          >Galery</a
        >
        <a
          href="auth/login.php"
          class="font-medium border border-gray-700 rounded-full px-4 py-1 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-transparent"
        >
          Login
        </a>
      </div>
    </nav>
    <section
      id="home"
      class="text-white bg-cover bg-no-repeat"
      style="background-image: url('./src/assets/images/anu.svg')"
    >
      <div
        class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center"
      >
      <div class="mx-auto max-w-3xl text-center flex flex-col">
        <?php
          include "anjay.php";
          $sql = "SELECT * FROM jumbotron WHERE id = 1";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
              echo "<h1 class='text-white text-3xl font-extrabold text-transparent sm:text-5xl'>". $row["title"] ."";
              echo "<p class='bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-2xl font-extrabold text-transparent sm:text-5xl'>". $row["subtitle"] ."</p>";
              echo "</h1>";
              echo "<p class='mx-auto mt-3 max-w-xl text-sm sm:text-md/relaxed'>". $row["text"] ."</p>";
          } else {
              echo "<p>Data tidak ditemukan</p>";
          }
        ?>
        </div>
      </div>
    </section>
    <section
      class="text-white bg-cover bg-no-repeat pb-10 md:pb-32"
      style="background-image: url('./src/assets/images/anu.svg')"
    >
      <div class="container mx-auto">
        <div class="overflow-hidden rounded-xl">
          <img
            class="transform transition-transform duration-300 ease-in-out hover:scale-150"
            src="./src/assets/images/c.jpg"
            alt="foto all"
          />
        </div>
      </div>
    </section>
    <section class="text-white">
      <div class="mx-auto max-w-screen-xl">
        <div
          class="mx-auto max-w-screen-xl text-center flex flex-col px-5 py-10 md:my-16"
        >
          <h1
            class="px-5 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-sm sm:text-md/relaxed lg:text-2xl font-extrabold text-transparent"
          >
            Kami mengundang anda untuk bergabung dalam perjalanan kami, di mana
            ide dan inovasi bertemu dengan keahlian teknis. Di website ini, anda
            akan menemukan bukan hanya foto-foto yang
            <span class="text-white"
              >merepresentasikan kemahiran kami, tetapi juga kata-kata yang
              menginspirasi kami dan memotivasi kami untuk menjadi lebih baik
              setiap hari.</span
            >
          </h1>
        </div>
      </div>
    </section>
    <section
      class="text-white bg-cover bg-no-repeat"
      style="background-image: url('./src/assets/images/anu.svg')"
    >
      <div class="container mx-auto py-8">
        <?php
            $sql = "SELECT * FROM post ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="flex md:flex-row flex-col items-center mb-10">';
                    echo '<img src="uploads/'.$row['image_path'].'" class="rounded-sm w-[500px] md:w-[400px]">';
                    echo '<h1 class="md:pl-20 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-sm sm:text-md/relaxed lg:text-2xl font-extrabold text-transparent">'.$row['title'].' ';
                    echo '<span class="text-white">'.$row['subtitle'].'</span></h1>';
                    echo '</div>';
                }
            } else {
                echo "Belum ada foto dan kata-kata!.";
            }
            ?>
      </div>
    </section>
    <div class="bg-black py-5 md:py-10"></div>
    <section
      class="text-white bg-cover bg-no-repeat pb-10 md:pb-10"
      style="background-image: url('./src/assets/images/anu.svg')"
    >
      <div class="container text-center flex justify-center mb-5">
        <h1
          class="mt-10 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-md lg:text-2xl font-extrabold text-transparent"
        >
          Jadwal <span class="text-white text-4xl text-end">Matkul</span>
        </h1>
      </div>
      <div class="container">
        <div class="grid md:grid-cols-3 gap-4">
        <?php
                $sql = "SELECT * FROM matkul ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="glass shadow-md rounded p-4">';
                    echo '<h5 class="text-lg font-bold mb-6">'.$row['hari'].'</h5>';
                    echo '<p class="text-gray-400">'.$row['matkul1'].'</p>';
                    echo '<p class="text-gray-400">'.$row['matkul2'].'</p>';
                    echo '<p class="text-gray-400 mb-5">'.$row['matkul3'].'</p>';
                    echo '</div>';
                  }
                } else {
                    echo "Matkul belum ditambahkan!.";
                }
                ?>
        </div>
      </div>
    </section>
    <div class="bg-black py-5 md:py-10"></div>
    <section
      id="anggota"
      class="text-white bg-cover bg-no-repeat pb-10 md:pb-10"
      style="background-image: url('./src/assets/images/anu.svg')"
    >
      <div class="container text-center flex justify-center mb-5">
        <h1
          class="mt-5 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-md lg:text-2xl font-extrabold text-transparent"
        >
          Anggota <span class="text-white text-4xl text-end">Exif-C</span>
        </h1>
      </div>
      <div class="container">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <?php
            $sql = "SELECT * FROM anggota ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="relative">';
                    echo '<img src="uploads/'.$row['image_path'].'" alt="Image 1" class="w-full h-[300px] aspect-[1/1] object-cover rounded-3xl border-2"/>';
                    echo '<div class="digambar absolute left-0 right-0 bottom-0 bg-black/50 flex items-center justify-evenly m-2 p-2">';
                    echo '<h1 class="text-white text-md">'.$row['nama'].'</h1>';
                    echo '<a href="https://www.instagram.com/'.$row['instagram'].'" class="text-white text-md">Follow</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "Anggota belum ditambahkan!.";
            }
            ?>
        </div>
      </div>
    </section>
    <div class="bg-black py-5 md:py-10"></div>
    <section
      id="galery"
      class="text-white bg-cover bg-no-repeat"
      style="
        background-image: url('./src/assets/images/./src/assets/images/./src/assets/images/anu.svg');
      "
    >
      <div class="container text-center flex justify-center mb-5">
        <h1
          class="mt-5 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-md lg:text-2xl font-extrabold text-transparent"
        >
          Galery <span class="text-white text-4xl text-end">Exif-C</span>
        </h1>
      </div>
      <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <?php
            $sql = "SELECT * FROM gallery ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="relative">';
                    echo '<img src="uploads/'.$row['image_path'].'" alt="foto all" class="rounded-xl transform transition-transform duration-300 ease-in-out hover:scale-110 hover:shadow-2xl"/>';
                    echo '</div>';
                }
            } else {
                echo "Belum ada Foto!.";
            }
            $conn->close();
            ?>
        </div>
      </div>
    </section>
    <footer class="text-white mt-10">
      <div
        class="w-full flex h-[100px] py-2 justify-center sm:justify-between sm:px-12 items-center bottom-0"
      >
        <div class="flex flex-col w-full justify-center items-center">
          <div class="flex justify-center items-center gap-x-2">
            <p
              class="bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text font-extrabold text-transparent"
            >
              EXIF-C
            </p>
            <p class="text-xs sm:text-base">
              Copyright © 2024 - All rights reserved
            </p>
          </div>
          <div class="flex w-full justify-center items-center gap-x-2">
            <p class="text-xs sm:text-sm">
              Jl. Raya KH Abdul Halim No.103, Kab. Majalengka.
            </p>
            <a href="https://www.instagram.com/_exif_c/">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                height="20"
                width="20"
                viewBox="0 0 448 512"
              >
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                  fill="#ffffff"
                  d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                />
              </svg>
            </a>
            <a href="https://github.com/Haisyam">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                height="20"
                width="20"
                viewBox="0 0 496 512"
              >
                <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                  fill="#ffffff"
                  d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
                />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </footer>

    <script src="./src/js/index.js"></script>
    <script>
      const alertButton = document.getElementById("alertButton");
      alertButton.addEventListener("click", function () {
        alert("Masih dalam tahap pengembangan 🙏");
      });
    </script>
  </body>
</html>
