<?php
require_once "config.php";

function escape($v) {
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}

// Fetch categories
$catQuery = "SELECT * FROM categories ORDER BY category_id";
$categories = mysqli_query($link, $catQuery);

// Fetch products grouped by category
$prodQuery = "SELECT * FROM products ORDER BY category_id, product_id";
$products = mysqli_query($link, $prodQuery);

$grouped = [];
while ($p = mysqli_fetch_assoc($products)) {
    $grouped[$p['category_id']][] = $p;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sunkissed Coffee - Menu</title>
    <link rel="stylesheet"
          href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-theme-l5">

<header class="w3-container w3-center w3-padding-32 w3-sand">
    <img src="images/1.jpg" style="width:90px;">
    <h1 class="w3-xxxlarge w3-text-brown"><b>Sunkissed Coffee - Menu</b></h1>
</header>

<div class="w3-container">

<?php while ($cat = mysqli_fetch_assoc($categories)): ?>
    <h2 class="w3-text-brown"><?php echo escape($cat['category_name']); ?></h2>

    <table class="w3-table-all w3-margin-bottom">
        <tr class="w3-brown w3-text-white">
            <th>Item</th>
            <th>Price</th>
        </tr>

        <?php if (!empty($grouped[$cat['category_id']])): ?>
            <?php foreach ($grouped[$cat['category_id']] as $prod): ?>
                <tr>
                    <td><?php echo escape($prod['name']); ?></td>
                    <td>$<?php echo number_format($prod['price'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
<?php endwhile; ?>

    <div class="w3-center w3-margin-top">
        <a href="createOrder.php" class="w3-button w3-brown w3-xlarge w3-text-white">
            Create New Order
        </a>
    </div>

</div>
</body>
</html>
