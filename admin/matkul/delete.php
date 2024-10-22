<?php
include '../../anjay.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM matkul WHERE id = $id";

        if ($conn->query($sql)) {
            echo "<script>alert('Matkul deleted successfully.'); window.location.href='index.php';</script>";
        } else {
            echo "Error deleting Matkul.";
        }
    } catch (mysqli_sql_exception) {
        echo "Error deleting Matkul.";
    }

    $conn->close();
} else {
    echo "Invalid Matkul ID.";
}
?>