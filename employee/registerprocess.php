<?php
require '../include/conn.php';


$name = $_POST['name'];
$icnumber = $_POST['icnumber'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$mobilenumber = $_POST['mobilenumber'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$status = $_POST['status'];
$categoryLimits2 = $_SESSION['statuslimit'];

$countSql = "SELECT status, COUNT(*) AS count FROM employee_data WHERE status IN ('permanent', 'training', 'part-time') GROUP BY status";
$countResult = $conn->query($countSql);
$categoryCounts = [];
while ($row = $countResult->fetch_assoc()) {
    $categoryCounts[$row['status']] = $row['count'];
}
if ($categoryCounts[$status] < $categoryLimits2[$status]) {

    $sql = "INSERT INTO employee_data(icnumber, name, dob, email, mobilenumber, gender, address, city, state, status) VALUES ('$icnumber', '$name', '$dob', '$email', '$mobilenumber', '$gender', '$address', '$city', '$state', '$status')";
    $result = $conn->query($sql);

    if ($result) {
        ?>
        <script>
            alert('Data have been saved');
            window.location = 'register_employee.php';
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('Error saving data');
            window.location = 'register_employee.php';
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert('Category limit exceeded');
        window.location = 'register_employee.php';
    </script>
    <?php
}




