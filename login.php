<?php
require 'include/conn.php';

// Function to write log information to a text file
function writeLog($userId, $logTime)
{
    $logFile = 'login_log.txt';
    $logData = "User ID: $userId | Login Time: $logTime\n";

    // Open the log file in append mode and write the log data
    file_put_contents($logFile, $logData, FILE_APPEND);
}

$idp = $_POST['username'];
$password = $_POST['pass'];

if ($idp == 'azfar') {
    $sql = 'SELECT * FROM admin';
    $row = $conn->query($sql)->fetch_object();
    if (password_verify($password, $row->katalaluan)) {
        // Record login information
        $userId = 'azfar';
        $logTime = date('Y-m-d H:i:s'); // Get the current date and time
        writeLog($userId, $logTime);

        // Set session and redirect
        $_SESSION['username'] = 'azfar';
        header('location: manager/');
    } else {
        ?>
        <script>
            alert('Maaf, kata laluan salah.');
            window.location = './';
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert('Maaf, kata username ataupun password anda salah.');
        window.location = './';
    </script>
    <?php
}
?>
