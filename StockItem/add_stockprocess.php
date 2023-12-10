<?php
require '../include/conn.php';


$category = $_POST['category'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];

$categoryLimits2 = $_SESSION['categorylimit'];

$countSql = "SELECT category, COUNT(*) AS count FROM stock WHERE category IN ('beverages', 'snack', 'bread', 'candy') GROUP BY category";
$countResult = $conn->query($countSql);
$categoryCounts = [];
while ($row = $countResult->fetch_assoc()) {
    $categoryCounts[$row['category']] = $row['count'];
}


if ($categoryCounts[$category] <  $categoryLimits2[$category]) {

    $insertSql = "INSERT INTO stock (category, name, quantity) VALUES ('$category', '$name', '$quantity')";
    $insertResult = $conn->query($insertSql);

    if ($insertResult) {
        ?>
        <script>
            alert('Data have been saved');
            window.location = 'add_stock.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error saving data');
            window.location = 'add_stock.php';
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert('Category limit exceeded');
        window.location = 'add_stock.php';
    </script>
    <?php
}

