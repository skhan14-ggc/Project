<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: menu.php');
    exit;
}

$drink = $_POST['drink'] ?? '';
$size = $_POST['size'] ?? '';
$milk = $_POST['milk'] ?? '';
$syrup = $_POST['syrup'] ?? '';
$addon = $_POST['addon'] ?? '';

$prices = [
    'Small' => 3.50,
    'Medium' => 4.25,
    'Large' => 5.00,
];

$addonPrices = [
    'None' => 0.00,
    'Extra Shot' => 1.00,
    'Whipped Cream' => 0.50,
    'Cold Foam' => 0.75,
];

$syrupPrices = [
    'None' => 0.00,
    'Vanilla' => 0.50,
    'Caramel' => 0.50,
    'Hazelnut' => 0.50,
    'Mocha' => 0.50,
    'Lavender' => 0.50,
];

$total = 0.00;
if (isset($prices[$size])) {
    $total += $prices[$size];
}
if (isset($addonPrices[$addon])) {
    $total += $addonPrices[$addon];
}
if (isset($syrupPrices[$syrup])) {
    $total += $syrupPrices[$syrup];
}

$ordersFile = __DIR__ . '/orders.json';
$orders = [];
if (file_exists($ordersFile)) {
    $stored = file_get_contents($ordersFile);
    $orders = json_decode($stored, true) ?: [];
}

$orderId = 1;
if (!empty($orders)) {
    $ids = array_column($orders, 'order_id');
    $orderId = max($ids) + 1;
}

$newOrder = [
    'order_id' => $orderId,
    'date' => date('Y-m-d H:i:s'),
    'drink' => $drink,
    'size' => $size,
    'milk' => $milk,
    'syrup' => $syrup,
    'addon' => $addon,
    'total' => number_format($total, 2),
    'status' => 'Submitted'
];

$orders[] = $newOrder;
file_put_contents($ordersFile, json_encode($orders, JSON_PRETTY_PRINT));

function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Receipt</title>
    <link rel="stylesheet"
          href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .receipt{
            width:600px;
            margin:auto;
            margin-top:50px;
        }

        .header-area{
            padding:10px;
            text-align:center;
        }

        .logo-img{
            width:80px;
            display:block;
            margin-left:auto;
            margin-right:auto;
        }

        .receipt-row {
            margin-bottom:15px;
        }

        .receipt-row label {
            display:block;
            margin-bottom:5px;
        }

        .receipt-row input {
            width:100%;
            padding:8px;
            border:1px solid #ccc;
            border-radius:4px;
            box-sizing:border-box;
        }
    </style>
</head>
<body>
<div class="w3-container w3-card w3-white">
    <div class="header-area w3-card w3-pale-yellow">
        <img src="1.jpg" alt="Coffee Logo" class="logo-img">
        <h1 class="w3-text-brown"><b>Sunkissed Coffee</b></h1>
        <h2><b>Order Receipt</b></h2>
        <p><a href="createOrder.php" class="w3-button w3-brown w3-text-white">Place a new order</a></p>
    </div>
</div>

<div class="receipt w3-card w3-pale-yellow w3-padding">
    <h2>Order Received!</h2>

    <div class="receipt-row">
        <label><b>Drink</b></label>
        <input type="text" readonly value="<?php echo escape($drink); ?>">
    </div>

    <div class="receipt-row">
        <label><b>Size</b></label>
        <input type="text" readonly value="<?php echo escape($size); ?>">
    </div>

    <div class="receipt-row">
        <label><b>Milk</b></label>
        <input type="text" readonly value="<?php echo escape($milk); ?>">
    </div>

    <div class="receipt-row">
        <label><b>Syrup</b></label>
        <input type="text" readonly value="<?php echo escape($syrup); ?>">
    </div>

    <div class="receipt-row">
        <label><b>Add-on</b></label>
        <input type="text" readonly value="<?php echo escape($addon); ?>">
    </div>

    <div class="receipt-row">
        <label><b>Total</b></label>
        <input type="text" readonly value="$<?php echo number_format($total, 2); ?>">
    </div>
</div>
</body>
</html>
