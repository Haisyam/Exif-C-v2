<?php
include '../../anjay.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT image_path FROM anggota WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $image_path = $row['image_path'];

    $sql = "DELETE FROM anggota WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        unlink("../../uploads/$image_path");
        echo "<script>alert('Image deleted successfully.'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
