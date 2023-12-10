<?php
require '../include/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $icnumber = $_POST['icnumber'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobilenumber = $_POST['mobilenumber'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $status = $_POST['status'];

    $sql = "UPDATE employee_data SET name=?, dob=?, email=?, mobilenumber=?, gender=?, address=?, city=?, state=?, status=? WHERE icnumber=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $name, $dob, $email, $mobilenumber, $gender, $address, $city, $state, $status, $icnumber);

    if ($stmt->execute()) {
        ?>
        <script>
            alert('Data updated.');
            window.location = 'view_employeedata.php';
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
