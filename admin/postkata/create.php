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
  <title>Add Post</title>
</head>
<body class="bg-black font-mulish">
<nav
      id="navbar"
      class="bg-transparent flex items-center justify-center fixed top-5 left-0 w-full z-50 transition duration-400 ease-in-out"
    >
      <div
        class="bg-black border border-gray-700 rounded-full px-4 py-2 flex items-center space-x-5"
      >
        <a href="../../index.html" class="text-white font-medium hover:text-gray-300"
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

    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-center mb-10">Add Post</h1>
        <form action="create.php" method="POST" enctype="multipart/form-data" class=" p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teks 1 <span class="text-red-600">*warna-warni</span></label>
                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teks 2 <span class="text-red-600">*warna putih</span></label>
                <input type="text" id="subtitle" name="subtitle" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text</label>
                <input type="file" id="image" name="image" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <a href="index.php" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Back</a>
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        include '../../anjay.php';
        
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $image = $_FILES['image']['name'];
        $target_dir = "../../uploads/";
        $target_file = $target_dir . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO post (title, subtitle, image_path) VALUES ('$title', '$subtitle', '$image')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Image uploaded successfully.'); window.location.href='index.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
        
        $conn->close();
    }
    ?>
</body>
</html>