<?php
require '../include/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $id = $_POST['stockid'];


    $sql = "UPDATE stock SET category=?, name=?, quantity=? WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $category, $name, $quantity, $id);

    if ($stmt->execute()) {
        ?>
        <script>
            alert('Data updated.');
            window.location = 'view_stock.php';
        </script>
        <?php
    } else {
        echo "Error updating data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
