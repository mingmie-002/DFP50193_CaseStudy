<?php
require '../include/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryLimits = array(
        'beverages' => isset($_POST['beverages']) ? $_POST['beverages'] : null,
        'snack' => isset($_POST['snack']) ? $_POST['snack'] : null,
        'bread' => isset($_POST['bread']) ? $_POST['bread'] : null,
        'candy' => isset($_POST['candy']) ? $_POST['candy'] : null
    );

    foreach ($categoryLimits as $category => $limit){
        $sql = "UPDATE stock_limit SET limit_stock = '$limit' WHERE category = '$category'";
        $conn->query($sql);
    }

    $_SESSION['categorylimit'] = $categoryLimits;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Stock</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<?php
include('../include/header.php');
?>

<div class="container">
    <h3>Stock Limit</h3>
    <form action="stock_limit.php" method="post">
        <label for="beverages">Beverages: </label>
        <input type="number" name="beverages" id="beverages"><br><br>
        <label for="candy">Candy: </label>
        <input type="number" name="candy" id="candy"><br><br>
        <label for="snack">Snack: </label>
        <input type="number" name="snack" id="snack"><br><br>
        <label for="bread">Bread: </label>
        <input type="number" name="bread" id="bread"><br><br>
        <button type="submit">Save</button>
    </form>

    <h3>Current Stock Limits</h3>

    <?php
    $result = $conn->query("SELECT * FROM stock_limit");

    if ($result->num_rows > 0) {
        echo '<ul>';
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . ucfirst($row["category"]) . ': ' . $row["limit_stock"] . '</li>';
        }
        echo '</ul>';
    } else {
        echo "No stock limits available.";
    }
    ?>
</div>

</body>
</html>
