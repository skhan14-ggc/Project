<?php
require_once "config.php";

function escape($v) {
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

$sql = "
SELECT o.order_id, o.date, o.status, o.total,
       p.name AS product_name, p.price AS product_price
FROM orders o
JOIN order_items oi ON o.order_id = oi.order_id
JOIN products p ON oi.product_id = p.product_id
ORDER BY o.order_id DESC, oi.order_item_id ASC
";

$result = mysqli_query($link, $sql);

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $orders[$row['order_id']]['info'] = [
        'date' => $row['date'],
        'status' => $row['status'],
        'total' => $row['total']
    ];
    $orders[$row['order_id']]['items'][] = [
        'name' => $row['product_name'],
        'price' => $row['product_price']
    ];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Submitted Orders</title>
    <link rel="stylesheet"
          href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-theme-l5">

<header class="w3-container w3-center w3-padding-32">
    <h1 class="w3-xxxlarge">Submitted Orders</h1>
</header>

<div class="w3-container">

<?php if (empty($orders)): ?>
    <p>No orders yet.</p>
<?php else: ?>

    <?php foreach ($orders as $id => $order): ?>
        <div class="w3-card w3-white w3-margin-bottom w3-padding">

            <h3>Order #<?php echo escape($id); ?></h3>
            <p><b>Date:</b> <?php echo escape($order['info']['date']); ?></p>
            <p><b>Status:</b> <?php echo escape($order['info']['status']); ?></p>

            <table class="w3-table-all">
                <tr class="w3-brown w3-text-white">
                    <th>Item</th>
                    <th>Price</th>
                </tr>

                <?php foreach ($order['items'] as $item): ?>
                    <tr>
                        <td><?php echo escape($item['name']); ?></td>
                        <td>$<?php echo number_format($item['price'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>

                <tr class="w3-pale-yellow">
                    <td><b>Total</b></td>
                    <td><b>$<?php echo number_format($order['info']['total'], 2); ?></b></td>
                </tr>
            </table>

        </div>
    <?php endforeach; ?>

<?php endif; ?>

</div>
</body>
</html>
