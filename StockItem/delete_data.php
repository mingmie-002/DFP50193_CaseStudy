<?php
require '../include/conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM stock WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        ?>
        <script>
            alert('Data deleted.');
            window.location = 'view_stock.php';
        </script>
        <?php
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
