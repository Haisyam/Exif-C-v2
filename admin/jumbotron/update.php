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
    $sql = "SELECT * FROM jumbotron WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $subtitle = $row['subtitle'];
        $text = $row['text'];
    } else {
        echo "<script>alert('No record found!'); window.location.href='index.php';</script>";
    }
}

if(isset($_POST["submit"])) {
    $title = $_POST["title"];
    $subtitle = $_POST["subtitle"];
    $text = $_POST["text"];

    try {
        $sql = "UPDATE jumbotron SET title='$title', subtitle='$subtitle', text='$text' WHERE id=$id";

        if($conn->query($sql)) {
            echo "<script>alert('Updated successfully.'); window.location.href='index.php';</script>";
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
    <meta name="user:language" content="in" />
    <link href="../../style/output.css" rel="stylesheet">
    <link
      href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <title>Edit Jumbotron</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-center mb-10">Update Jumbotron</h1>
        <form action="update.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subtitle</label>
                <!-- <input type="text" name="subtitle" id="subtitle" value="<?php echo $subtitle; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
                <input type="text" id="subtitle" name="subtitle" value="<?php echo $row['subtitle']; ?>" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text</label>
                <!-- <input type="text" name="subtitle" id="subtitle" value="<?php echo $subtitle; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
                <input type="text" id="text" name="text" value="<?php echo $row['text']; ?>" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <a href="index.php" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back</a>
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
