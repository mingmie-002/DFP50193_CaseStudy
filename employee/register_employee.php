<?php
require '../include/conn.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
include ('../include/header.php')
?>
<div class="container2">
    <form action="registerprocess.php" method="post">
        <h1>7E EMPLOYEE REGISTRATION</h1>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"><br><br>
        <label for="icnumber">Ic Number:</label>
        <input type="text" name="icnumber" id="icnumber"><br><br>
        <label for="dob">Date Of Birth:</label>
        <input type="date" name="dob" id="dob"><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br><br>
        <label for="mobilenumber">Phone Number:</label>
        <input type="text" name="mobilenumber" id="mobilenumber"><br><br>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" id="male" value="male">Male
        <input type="radio" name="gender" id="female" value="female">Female<br><br>
        <label for="address">Address: </label><br>
        <textarea name="address" id="address" cols="40" rows="5"></textarea><br><br>
        <label for="city">City: </label>
        <input type="text" name="city" id="city"><br><br>
        <label for="state">State:</label>
        <input type="text" name="state" id="state"><br><br>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="permanent">Permanent</option>
            <option value="training">Training</option>
            <option value="part-time">Part-Time</option>
        </select><br><br>
        <button type="submit">Save</button>
    </form>
</div>
</body>
</html>
