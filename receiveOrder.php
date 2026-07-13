<?php
require_once "config.php";

function escape($v) {
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: createOrder.php");
    exit;
}

$drink = intval($_POST['drink']);
$milk  = intval($_POST['milk']);
$syrup = intval($_POST['syrup']);
$addon = intval($_POST['addon']);

$items = [$drink, $milk, $syrup, $addon];

// Fetch product prices
$total = 0;
$details = [];

foreach ($items as $pid) {
    $sql = "SELECT * FROM products WHERE product_id = $pid";
    $res = mysqli_query($link, $sql);
    $p = mysqli_fetch_assoc($res);

    $total += floatval($p['price']);
    $details[] = $p;
}

// Insert order
$orderSql = "INSERT INTO orders (customer_id, date, status, total)
             VALUES (NULL, NOW(), 'Submitted', $total)";
mysqli_query($link, $orderSql);

$orderId = mysqli_insert_id($link);

// Insert order items
foreach ($items as $pid) {
    $itemSql = "INSERT INTO order_items (order_id, product_id, quantity)
                VALUES ($orderId, $pid, 1)";
    mysqli_query($link, $itemSql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Receipt</title>
    <link rel="stylesheet"
          href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-theme-l5">

<div class="w3-container w3-card w3-white w3-padding">

    <h2 class="w3-text-brown">Order Received!</h2>
    <p><b>Order ID:</b> <?php echo escape($orderId); ?></p>

    <table class="w3-table-all">
        <tr class="w3-brown w3-text-white">
            <th>Item</th>
            <th>Price</th>
        </tr>

        <?php foreach ($details as $d): ?>
            <tr>
                <td><?php echo escape($d['name']); ?></td>
                <td>$<?php echo number_format($d['price'], 2); ?></td>
            </tr>
        <?php endforeach; ?>

        <tr class="w3-pale-yellow">
            <td><b>Total</b></td>
            <td><b>$<?php echo number_format($total, 2); ?></b></td>
        </tr>
    </table>

    <p><a href="createOrder.php" class="w3-button w3-brown w3-text-white">Place Another Order</a></p>

</div>

</body>
</html>
