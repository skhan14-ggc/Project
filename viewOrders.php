
<?php
// Display all submitted orders from JSON storage.
// Future: replace JSON logic with MySQL retrieval once the database is connected.

$ordersFile = __DIR__ . '/orders.json';
$orders = [];
if (file_exists($ordersFile)) {
    $json = file_get_contents($ordersFile);
    $orders = json_decode($json, true) ?: [];
}

function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submitted Orders</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body class="w3-theme-l5">

<header class="w3-container w3-center w3-padding-32">
    <h1 class="w3-xxxlarge">Submitted Orders</h1>
    <p><a href="createOrder.php" class="w3-button w3-brown w3-text-white">Place a new order</a></p>
</header>

<div class="w3-container">
    <?php if (empty($orders)): ?>
        <p>No submitted orders yet.</p>
    <?php else: ?>
        <table class="w3-table w3-striped w3-bordered w3-white">
            <tr class="w3-brown w3-text-white">
                <th>Order ID</th>
                <th>Date</th>
                <th>Drink</th>
                <th>Size</th>
                <th>Milk</th>
                <th>Syrup</th>
                <th>Add-on</th>
                <th>Total</th>
                <th>Status</th>
            </tr>

            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo escape($order['order_id']); ?></td>
                    <td><?php echo escape($order['date']); ?></td>
                    <td><?php echo escape($order['drink']); ?></td>
                    <td><?php echo escape($order['size']); ?></td>
                    <td><?php echo escape($order['milk']); ?></td>
                    <td><?php echo escape($order['syrup']); ?></td>
                    <td><?php echo escape($order['addon']); ?></td>
                    <td>$<?php echo number_format((float)$order['total'], 2); ?></td>
                    <td><?php echo escape($order['status']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

</body>
</html>
