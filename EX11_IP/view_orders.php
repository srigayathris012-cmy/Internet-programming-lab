<?php
include "db_connect.php";

$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Orders</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 900px;
        }
        h2 {
            margin-top: 0;
            color: #2c3e50;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        .action-link {
            color: #e74c3c;
            text-decoration: none;
            font-weight: 600;
        }
        .action-link:hover {
            text-decoration: underline;
        }
        .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>All Orders</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Order Date</th>
                <th>Action</th>
            </tr>
            <?php if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><a href="delete_order.php?id=<?php echo $row['order_id']; ?>" class="action-link" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr><td colspan="7" style="text-align: center;">No orders found.</td></tr>
            <?php } ?>
        </table>

        <a href="index.html" class="btn">Place Another Order</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>