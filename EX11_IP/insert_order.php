<?php
include "db_connect.php";

$customer_name = $_POST['customer_name'];
$product_name  = $_POST['product_name'];
$quantity      = $_POST['quantity'];
$price         = $_POST['price'];

$sql = "INSERT INTO orders (customer_name, product_name, quantity, price) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssid", $customer_name, $product_name, $quantity, $price);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Status</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 10px;
        }
        .message-box {
            padding: 15px;
            background-color: #e8f8f5;
            border-left: 5px solid #2ecc71;
            margin: 20px 0;
            border-radius: 4px;
            color: #27ae60;
            font-weight: 600;
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
        <h2>Order Status</h2>
        <?php
        if ($stmt->execute()) {
            echo "<div class='message-box'>Order placed successfully!</div>";
            echo "<a href='view_orders.php' class='btn'>View All Orders</a>";
        } else {
            echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>