<?php
require '../include/conn.php';
if (isset($_GET['category'])) {
    $selectedStatus = $_GET['category'];
    $sql = "SELECT * FROM stock WHERE category = '$selectedStatus'";
} else {
    $sql = "SELECT * FROM stock";
}

$result = $conn->query($sql);
$selectedStatus = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Stock</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
include ('../include/header.php');
?>
<div class="view">
<h2>Stock Data</h2>
<form action="" method="get">
    <label for="status">Search by Status:</label>
    <select name="status" id="status">
        <option value="allcategory" >All category</option>
        <option value="beverages" <?= ($selectedStatus === 'beverages') ? 'selected' : ''; ?>>Beverages</option>
        <option value="snack" <?= ($selectedStatus === 'snack') ? 'selected' : ''; ?>>Snack</option>
        <option value="candy" <?= ($selectedStatus === 'candy') ? 'selected' : ''; ?>>Candy</option>
        <option value="bread" <?= ($selectedStatus === 'bread') ? 'selected' : ''; ?>>Bread</option>
    </select>
    <button type="submit">Search</button>
</form>

<table border="1">
    <tr>
        <th>Category</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['category']); ?></td>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['quantity']); ?></td>
            <td>
                <a href="#" class="button" onclick="showUpdateForm('<?= $row['id']; ?>')">Update</a>
                <a class="button" href="delete_data.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) { ?>
    <div class="update-form" data-id="<?= $row['id']; ?>">
        <h2>Update Employee Data</h2>
        <form action="update_data.php" method="post">
            <input type="hidden" name="stockid" value="<?= $row['id']; ?>">
            <label for="category">Category: </label>
            <select name="category" id="category">
                <option value="snack" <?= ($row['category'] === 'snack') ? 'selected' : ''; ?>>Snack</option>
                <option value="beverages" <?= ($row['category'] === 'beverages') ? 'selected' : ''; ?>>Beverages</option>
                <option value="candy" <?= ($row['category'] === 'candy') ? 'selected' : ''; ?>>Candy</option>
                <option value="bread" <?= ($row['category'] === 'bread') ? 'selected' : ''; ?>>Bread</option>
            </select><br><br>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= $row['name'];?>" required><br><br>
            <label for="quantity">Quantity:</label>
            <input type="number" required name="quantity" id="quantity" value="<?= $row['quantity'];?>"><br><br>
            <button type="submit">Save</button>
        </form>
    </div>
<?php } ?>

<script>
    function showUpdateForm(id) {
        var updateForms = document.querySelectorAll('.update-form');
        updateForms.forEach(function (form) {
            form.style.display = 'none';
        });

        var updateForm = document.querySelector('.update-form[data-id="' + id + '"]');
        updateForm.style.display = 'block';
    }
</script>
</div>
</body>
</html>
