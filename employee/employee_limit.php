<?php
require '../include/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statusLimits = array(
        'permanent' => isset($_POST['permanent']) ? $_POST['permanent'] : null,
        'training' => isset($_POST['training']) ? $_POST['training'] : null,
        'part-time' => isset($_POST['part-time']) ? $_POST['part-time'] : null,
    );

    foreach ($statusLimits as $category => $limit){
        $sql = "UPDATE employee_limit SET limit_employee = '$limit' WHERE status = '$category'";
        $conn->query($sql);
    }

    $_SESSION['statuslimit'] = $statusLimits;
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
    <form action="employee_limit.php" method="post">
        <label for="permanent">Permanent: </label>
        <input type="number" name="permanent" id="permanent"><br><br>
        <label for="training">Training: </label>
        <input type="number" name="training" id="training"><br><br>
        <label for="part-time">Part-time: </label>
        <input type="number" name="part-time" id="part-time"><br><br>
        <button type="submit">Save</button>
    </form>

    <h3>Current Employee Limits</h3>

    <?php
    $result = $conn->query("SELECT * FROM employee_limit");

    if ($result->num_rows > 0) {
        echo '<ul>';
        while ($row = $result->fetch_assoc()) {
            echo '<li>' . ucfirst($row["status"]) . ': ' . $row["limit_employee"] . '</li>';
        }
        echo '</ul>';
    } else {
        echo "No employee limits available.";
    }
    ?>
</div>

</body>
</html>
