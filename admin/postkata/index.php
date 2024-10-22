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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../src/style/output.css" />
    <link rel="stylesheet" href="../../src/style/custom.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
      rel="stylesheet"
    />
    <title>Kelaola Post</title>
  </head>
  <body class="bg-black font-mulish">
    <nav
      id="navbar"
      class="bg-transparent flex items-center justify-center mt-5 top-5 left-0 w-full z-50 transition duration-400 ease-in-out"
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
    <section
      id="home"
      class="text-white bg-cover bg-no-repeat h-screen"
      style="background-image: url('../../src/assets/images/anu.svg')"
    >
    <div class="text-center flex justify-center">
          <h1
            class="mt-10 mb-5 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-md lg:text-2xl font-extrabold text-transparent"
          >
            Login <span class="text-white text-4xl text-end">Admin</span>
          </h1>
        </div>
    <div
      id="navbar"
      class="bg-transparent flex items-center justify-center top-5 left-0 w-full z-50 transition duration-400 ease-in-out"
    >
      <div
        class="bg-black border border-gray-700 rounded-full px-4 py-2 flex items-center space-x-5"
      >
        <a
          href="create.php"
          class="font-medium border border-gray-700 rounded-full px-4 py-1 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-transparent"
        >
          Add Post
        </a>
      </div>
    </div>
        <div class="mt-5 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            include '../../anjay.php';
            $sql = "SELECT * FROM post ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="bg-[#2D2F39] p-2 rounded-lg shadow-md">';
                    echo '<img src="../../uploads/'.$row['image_path'].'" class="w-full h-50 object-cover rounded-lg">';
                    echo '<div class="flex flex-col px-2">';
                    echo '<h2 class="text-xl text-white font-semibold mt-2"></h2>';
                    echo '<p class="text-white mb-2"></p>';
                    echo '<div class="flex flex-col">';
                    echo '<a href="update.php?id='.$row['id'].'" class="bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-2 px-4 my-2 rounded-3xl">Edit</a>';
                    echo '<a href="delete.php?id='.$row['id'].'" class="bg-red-500 hover:bg-red-900 text-white text-center font-bold py-2 px-4 my-2 rounded-3xl">Delete</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "Belum ada foto dan kata-kata!.";
            }
            $conn->close();
            ?>
        </div>
    </section>
  </body>
</html>
