<?php
      session_start();

      if (!isset($_SESSION['npm'])) {
        header('Location: ../../auth/login.php');
        exit();
      }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../src/style/output.css" />
    <link rel="stylesheet" href="../../src/style/custom.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
      rel="stylesheet"
    />
  <title>Kelola Anggota</title>
</head>
<body class="bg-black font-mulish">
    <section
      id="home"
      class="text-white bg-cover bg-no-repeat h-screen"
      style="background-image: url('../../src/assets/images/anu.svg')"
    >
    <nav
      id="navbar"
      class="bg-transparent flex items-center justify-center mt-3 top-5 left-0 w-full z-50 transition duration-400 ease-in-out"
      >
      <div
        class="bg-black border border-gray-700 rounded-full px-4 py-2 flex items-center space-x-5"
      >
        <a
          href="../../index.php"
          class="text-white font-medium hover:text-gray-300"
          >Home</a
        >
        <a
          href="../index.php"
          class="text-white font-medium hover:text-gray-300"
          >Dashboard</a
        >
        <a
          href="../../auth/logout.php"
          class="font-medium border border-gray-700 rounded-full px-4 py-1 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-transparent"
        >
          Logout
        </a>
      </div>
    </nav>
      <div class="container text-center flex justify-center mb-5">
        <h1
          class="mt-10 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-md lg:text-2xl font-extrabold text-transparent"
        >
          Kelola <span class="text-white text-4xl text-end">Anggota</span>
        </h1>
      </div>
      <div
      id="navbar"
      class="bg-transparent flex items-center justify-center mb-3 top-5 left-0 w-full z-50 transition duration-400 ease-in-out"
    >
      <div
        class="bg-black border border-gray-700 rounded-full px-4 py-2 flex items-center space-x-5"
      >
        <a
          href="create.php"
          class="font-medium border border-gray-700 rounded-full px-4 py-1 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-transparent"
        >
          Add Anggota
        </a>
      </div>
    </div>
    <div class="container">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
          <?php
            include '../../anjay.php';
            $sql = "SELECT * FROM anggota ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="relative">';
                    echo '<img src="../../uploads/'.$row['image_path'].'" alt="Image 1" class="w-full h-[300px] aspect-[1/1] object-cover rounded-3xl border-2"/>';
                    echo '<div class="absolute left-0 right-0 bottom-0 top-0 flex items-start m-2 p-2 z-10">';
                    echo '<a href="update.php?id='.$row['id'].'" class=" bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-2 px-4 my-2 rounded-xl mr-2">Edit</a>';
                    echo '<a href="delete.php?id='.$row['id'].'" class="bg-red-500 hover:bg-red-900 text-white text-center font-bold py-2 px-4 my-2 rounded-xl">Delete</a>';
                    echo '</div>';
                    echo '<div class="digambar absolute left-0 right-0 bottom-0 bg-black/50 flex items-center justify-evenly m-2 p-2">';
                    echo '<h1 class="text-white text-md">'.$row['nama'].'</h1>';
                    echo '<a href="https://www.instagram.com/'.$row['instagram'].'" class="text-white text-md">Follow</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "Belum ada Anggota!.";
            }
            $conn->close();
            ?>
        </div>
      </div>
</section>
</body>
</html>