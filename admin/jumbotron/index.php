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
    <title>Kelola Jumbotron</title>
  </head>
  <body class="bg-black font-mulish">
    <nav
      id="navbar"
      class="bg-transparent flex items-center justify-center fixed top-5 left-0 w-full z-50 transition duration-400 ease-in-out"
    >
      <div
        class="bg-black border border-gray-700 rounded-full px-4 py-2 flex items-center space-x-5"
      >
        <a href="../../index.php" class="text-white font-medium hover:text-gray-300"
          >Home</a
        >
        <a href="../index.php" class="text-white font-medium hover:text-gray-300"
          >Dashboard</a
        >
        <!-- <a href="#galery" class="text-white font-medium hover:text-gray-300"
          >Galery</a
        > -->
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
      class="text-white bg-cover bg-no-repeat"
      style="background-image: url('../../src/assets/images/anu.svg')"
    >
      <div
        class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center"
      >
        <div class="mx-auto max-w-3xl text-center flex flex-col">
        <?php
          include "../../anjay.php";
          $sql = "SELECT * FROM jumbotron WHERE id = 1";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
              echo "<h1 class='text-white text-3xl font-extrabold text-transparent sm:text-5xl'>". $row["title"] ."";
              echo "<p class='bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-2xl font-extrabold text-transparent sm:text-5xl'>". $row["subtitle"] ."</p>";
              echo '</h1>';
              echo "<p class='mx-auto mt-3 max-w-xl text-sm sm:text-md/relaxed'>". $row["text"] ."</p>";
          } else {
              echo "<p>Data tidak ditemukan</p>";
          }
          $conn->close();
        ?>
          <a href="update.php?id=1" class="btn-tugas bg-blue-500 hover:bg-blue-700 text-white text-center font-bold py-2 px-4 my-2 rounded-3xl">Edit</a>
        </div>
      </div>
    </section>
</body>
</html>