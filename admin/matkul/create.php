<?php
include '../../anjay.php';

session_start();

if (!isset($_SESSION['npm'])) {
  header('Location: ../../auth/login.php');
  exit();
}

if (isset($_POST["submit"])) {
  $hari = $_POST["hari"];
  $matkul1 = $_POST["matkul1"];
  $matkul2 = $_POST["matkul2"];
  $matkul3 = $_POST["matkul3"];

  try {
    $sql = "INSERT INTO matkul (hari, matkul1, matkul2, matkul3) VALUES ('$hari', '$matkul1', '$matkul2', '$matkul3')";

    if ($conn->query($sql)) {
      echo "<script>alert('Matkul add successfully.'); window.location.href='index.php';</script>";
    } else {
      echo "Error uploading file.";
    }
  } catch (mysqli_sql_exception) {
    echo "Error uploading file.";
  }
  $conn->close();
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
  <title>Add Matkul</title>
</head>
<body class="bg-black font-mulish">
<div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-center mb-10">Add Post</h1>
        <form action="create.php" method="POST" enctype="multipart/form-data" class=" p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="hari" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                <input type="text" name="hari" id="hari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="matkul1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matkul Ke-1</label>
                <input type="text" id="matkul1" name="matkul1" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="matkul2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matkul Ke-2</label>
                <input type="text" id="matkul2" name="matkul2" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="matkul3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matkul Ke-3</label>
                <input type="text" id="matkul3" name="matkul3" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <a href="index.php" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Back</a>
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>