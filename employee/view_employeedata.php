<?php
require '../include/conn.php';
$selectedStatus2 = 'permanent';
if (isset($_GET['status'])) {
    $selectedStatus = $_GET['status'];
    $sql = "SELECT * FROM employee_data WHERE status = '$selectedStatus'";
} else {
    $sql = "SELECT * FROM employee_data WHERE status = '$selectedStatus2'";
}

$result = $conn->query($sql);
$selectedStatus = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
include "../include/header.php";

?>
<div class="viewemployee">
<h2>Employee Data</h2>

<form action="" method="get">
    <label for="status">Search by Status:</label>
    <select name="status" id="status">
        <option value="permanent" <?= ($selectedStatus === 'permanent') ? 'selected' : ''; ?>>Permanent</option>
        <option value="training" <?= ($selectedStatus === 'training') ? 'selected' : ''; ?>>Training</option>
        <option value="part-time" <?= ($selectedStatus === 'part-time') ? 'selected' : ''; ?>>Part-Time</option>
    </select>
    <button type="submit">Search</button>
</form>

<table border="1">
    <tr>
        <th>Name</th>
        <th>IC Number</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['icnumber']); ?></td>
            <td><?= htmlspecialchars($row['status']); ?></td>
            <td>
                <a href="#" class="button" onclick="showUpdateForm('<?= $row['icnumber']; ?>')">Update</a>
                <a class="button" href="delete_employeedata.php?icnumber=<?= $row['icnumber']; ?>"
                   onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) { ?>
    <div class="update-form" data-icnumber="<?= $row['icnumber']; ?>">
        <h2>Update Employee Data</h2>
        <form action="update_employeedata.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= $row['name']; ?>"> <br>
            <label for="icnumber">Ic Number:</label>
            <input type="text" name="icnumber" id="icnumber" value="<?= $row['icnumber']; ?>"><br>
            <label for="dob">Date Of Birth:</label>
            <input type="date" name="dob" id="dob" value="<?= $row['dob']; ?>"><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $row['email']; ?>"><br>
            <label for="mobilenumber">Phone Number:</label>
            <input type="text" name="mobilenumber" id="mobilenumber" value="<?= $row['mobilenumber']; ?>"><br>
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" id="male"
                   value="male" <?= ($row['gender'] === 'male') ? 'checked' : ''; ?>>Male
            <input type="radio" name="gender" id="female"
                   value="female" <?= ($row['gender'] === 'female') ? 'checked' : ''; ?>>Female <br>
            <label for="address">Address: </label>
            <textarea name="address" id="address" cols="40" rows="5"><?= $row['address']; ?></textarea><br>
            <label for="city">City: </label>
            <input type="text" name="city" id="city" value="<?= $row['city']; ?>"><br>
            <label for="state">State:</label>
            <input type="text" name="state" id="state" value="<?= $row['state']; ?>"><br>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="permanent" <?= ($row['status'] === 'permanent') ? 'selected' : ''; ?>>Permanent</option>
                <option value="training" <?= ($row['status'] === 'training') ? 'selected' : ''; ?>>Training</option>
                <option value="part-time" <?= ($row['status'] === 'part-time') ? 'selected' : ''; ?>>Part-Time</option>
            </select><br>
            <button type="submit">Update</button>
        </form>
    </div>
<?php } ?>

<script>
    function showUpdateForm(icnumber) {
        var updateForms = document.querySelectorAll('.update-form');
        updateForms.forEach(function (form) {
            form.style.display = 'none';
        });

        var updateForm = document.querySelector('.update-form[data-icnumber="' + icnumber + '"]');
        updateForm.style.display = 'block';
    }
</script>
</div>
</body>
</html>
