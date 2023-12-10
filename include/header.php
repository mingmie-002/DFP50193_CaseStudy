<div class="admin-menu">
    <h1>Welcome <?= $_SESSION['username'] ?></h1>
</div>
<ul class="navi">
    <li><a href="../manager/index.php">Home</a></li>
    <li>
        <a href="">Stock Item</a>
        <ul class="navi">
            <li><a href="../StockItem/view_stock.php">View Stock</a></li>
            <li><a href="../StockItem/add_stock.php">Add Stock</a></li>
            <li><a href="../StockItem/stock_limit.php">Stock Limit</a></li>
        </ul>
    </li>
    <li>
        <a href="#">Employee</a>
        <ul class="navi">
            <li><a href="../employee/register_employee.php">Register Employee</a></li>
            <li><a href="../employee/view_employeedata.php">View Employee</a></li>
            <li><a href="../employee/employee_limit.php">Employee Limit</a></li>
        </ul>
    </li>
    <li><a href="../logout.php">Logout</a></li>
</ul>