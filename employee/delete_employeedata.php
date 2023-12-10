<?php
require '../include/conn.php';

if (isset($_GET['icnumber'])) {
    $icnumber = $_GET['icnumber'];

    $sql = "DELETE FROM employee_data WHERE icnumber = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $icnumber);

    if ($stmt->execute()) {
        ?>
        <script>
            alert('Data deleted.');
            window.location = 'view_employeedata.php';
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
