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
    <meta name="user:language" content="in" />
    <link href="../../style/output.css" rel="stylesheet">
    <link
      href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <title>Edit Gallery</title>
</head>
<body>
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-bold text-center mb-10">Edit Gallery</h1>
        <?php
        include '../../anjay.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM gallery WHERE id=$id";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                ?>
                <form action="update.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
                    <div class="mb-4">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Gallery</label>
                        <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help">
                    </div>
                    <div class="flex justify-end">
                    <a
                        href="index.php"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Back
                    </a>
                    <button
                        type="submit"
                        name="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                    </button>
                    </div>
                </form>
                <?php
            } else {
                echo "Image not found.";
            }
        }

        if (isset($_POST['submit'])) {
            $id = $_GET['id'];
            $image = $_FILES['image']['name'];
            $target_dir = "../../uploads/";
            $target_file = $target_dir . basename($image);

            if ($image) {
                // Get old image path
                $sql = "SELECT image_path FROM gallery WHERE id=$id";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $old_image_path = $row['image_path'];

                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $sql = "UPDATE galery SET image_path='$image' WHERE id=$id";

                    if ($conn->query($sql) === TRUE) {
                        // Delete old image
                        unlink($target_dir . $old_image_path);
                        echo "<script>alert('Image updated successfully.'); window.location.href='index.php';</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error uploading file.";
                }
            } else {
              echo "<script>alert('No image updated.'); window.location.href='index.php';</script>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
