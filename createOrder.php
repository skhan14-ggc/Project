<?php
require_once "config.php";

function escape($v) {
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

// Fetch product groups
function getProducts($catId, $link) {
    $sql = "SELECT * FROM products WHERE category_id = $catId ORDER BY product_id";
    return mysqli_query($link, $sql);
}

$coffee = getProducts(1, $link);
$milk   = getProducts(2, $link);
$syrup  = getProducts(3, $link);
$addon  = getProducts(4, $link);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
    <link rel="stylesheet"
          href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-theme-l5">

<header class="w3-container w3-center w3-padding-32 w3-sand">
    <img src="images/1.jpg" style="width:90px;">
    <h1 class="w3-xxxlarge w3-text-brown"><b>Create Your Order</b></h1>
</header>

<div class="w3-container w3-padding">

<form action="receiveOrder.php" method="POST" class="w3-card w3-white w3-padding">

    <label><b>Select Drink</b></label>
    <select name="drink" class="w3-select w3-border" required>
        <option value="">Choose...</option>
        <?php while ($d = mysqli_fetch_assoc($coffee)): ?>
            <option value="<?php echo $d['product_id']; ?>">
                <?php echo escape($d['name']); ?> ($<?php echo number_format($d['price'], 2); ?>)
            </option>
        <?php endwhile; ?>
    </select>

    <br><br>

    <label><b>Milk Option</b></label>
    <select name="milk" class="w3-select w3-border" required>
        <option value="">Choose...</option>
        <?php while ($m = mysqli_fetch_assoc($milk)): ?>
            <option value="<?php echo $m['product_id']; ?>">
                <?php echo escape($m['name']); ?> ($<?php echo number_format($m['price'], 2); ?>)
            </option>
        <?php endwhile; ?>
    </select>

    <br><br>

    <label><b>Syrup</b></label>
    <select name="syrup" class="w3-select w3-border" required>
        <option value="">Choose...</option>
        <?php while ($s = mysqli_fetch_assoc($syrup)): ?>
            <option value="<?php echo $s['product_id']; ?>">
                <?php echo escape($s['name']); ?> ($<?php echo number_format($s['price'], 2); ?>)
            </option>
        <?php endwhile; ?>
    </select>

    <br><br>

    <label><b>Add-on</b></label>
    <select name="addon" class="w3-select w3-border" required>
        <option value="">Choose...</option>
        <?php while ($a = mysqli_fetch_assoc($addon)): ?>
            <option value="<?php echo $a['product_id']; ?>">
                <?php echo escape($a['name']); ?> ($<?php echo number_format($a['price'], 2); ?>)
            </option>
        <?php endwhile; ?>
    </select>

    <br><br>

    <button class="w3-button w3-brown w3-xlarge w3-text-white" type="submit">
        Submit Order
    </button>

</form>

</div>
</body>
</html>
