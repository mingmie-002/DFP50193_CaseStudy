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
    <title>Add Stock</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
include('../include/header.php');
?>
  <div class="container">
      <h3>Add Stock</h3>
      <form action="add_stockprocess.php" method="post">
          <label for="category">Category: </label>
          <select name="category" id="category">
              <option value="snack">Snack</option>
              <option value="beverages">Beverages</option>
              <option value="candy">Candy</option>
              <option value="bread">Bread</option>
          </select><br><br>
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" required><br><br>
          <label for="quantity">Quantity:</label>
          <input type="number" required  name="quantity" id="quantity"><br><br>
          <button type="submit">Save</button>
      </form>
  </div>
</body>
</html>