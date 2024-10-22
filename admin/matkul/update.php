<?php
include '../../anjay.php';

    session_start();

    if (!isset($_SESSION['npm'])) {
      header('Location: ../../auth/login.php');
      exit();
    }


if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data for the given ID
    $sql = "SELECT * FROM matkul WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hari = $row['hari'];
        $matkul1 = $row['matkul1'];
        $matkul2 = $row['matkul2'];
        $matkul3 = $row['matkul3'];
    } else {
        echo "<script>alert('No record found!'); window.location.href='index.php';</script>";
    }
}

if(isset($_POST["submit"])) {
    $hari = $_POST["hari"];
    $matkul1 = $_POST["matkul1"];
    $matkul2 = $_POST["matkul2"];
    $matkul3 = $_POST["matkul3"];

    try {
        $sql = "UPDATE matkul SET hari='$hari', matkul1='$matkul1', matkul2='$matkul2', matkul3='$matkul3' WHERE id=$id";

        if($conn->query($sql)) {
            echo "<script>alert('Matkul updated successfully.'); window.location.href='index.php';</script>";
        } else {
            echo "Error updating record.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error updating record: " . $e->getMessage();
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
  <title>Update Matkul</title>
</head>
<body class="bg-black font-mulish">
<div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-center mb-10">Update Matkul</h1>
        <form action="update.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class=" p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="hari" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                <input type="text" name="hari" id="hari" value="<?php echo $hari; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="matkul1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matkul Ke-1</label>
                <input type="text" id="matkul1" name="matkul1" value="<?php echo $matkul1; ?>" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="matkul2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matkul Ke-2</label>
                <input type="text" id="matkul2" name="matkul2" value="<?php echo $matkul2; ?>" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="matkul3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matkul Ke-3</label>
                <input type="text" id="matkul3" name="matkul3" value="<?php echo $matkul3; ?>" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <a href="index.php" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Back</a>
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </div>
        </form>
    </div>
</body>
</html>