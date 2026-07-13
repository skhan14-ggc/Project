<!DOCTYPE html>
<html>
<head>
    <title>Sunkissed Coffee - Menu</title>
    <link rel="stylesheet"
          href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        body {
            background-color:#f5f5f5;
        }

        .header-area {
            background-color:#f2d7b5;
            padding:20px;
            text-align:center;
        }

        .logo-img {
            width:90px;
            display:block;
            margin-left:auto;
            margin-right:auto;
        }

        .menu-section {
            padding:20px;
        }

        .category-title {
            margin-top:40px;
            margin-bottom:10px;
            font-size:28px;
            color:#6b4f33;
            font-weight:bold;
        }

        .menu-table {
            margin-bottom:40px;
        }

        .create-order-btn {
            text-align:center;
            margin-top:40px;
            margin-bottom:60px;
        }
    </style>
</head>
<body>

<div class="w3-container w3-card w3-white">
    <div class="header-area w3-card w3-sand">
        <img src="1.jpg" alt="Coffee Logo" class="logo-img">
        <h1 class="w3-text-brown"><b>Sunkissed Coffee - Menu</b></h1>
        <h3><b>Fresh • Local • Handcrafted</b></h3>
    </div>
</div>

<div class="menu-section">

    <div class="category-title">Coffee</div>
    <table class="w3-table-all menu-table">
        <tr class="w3-brown w3-text-white">
            <th>Drink</th>
            <th>Description</th>
            <th>Prices</th>
        </tr>

        <tr>
            <td>Americano</td>
            <td>Bold espresso with hot water</td>
            <td>$3.50 • $4.25 • $5.00</td>
        </tr>

        <tr>
            <td>Latte</td>
            <td>Espresso with steamed milk</td>
            <td>$4.00 • $4.75 • $5.50</td>
        </tr>

        <tr>
            <td>Cappuccino</td>
            <td>Espresso, steamed milk, foam</td>
            <td>$4.00 • $4.50 • $5.25</td>
        </tr>

        <tr>
            <td>Espresso</td>
            <td>Single or double shot</td>
            <td>$2.50 • $3.00</td>
        </tr>

        <tr>
            <td>Macchiato</td>
            <td>Espresso topped with milk</td>
            <td>$3.25 • $4.00</td>
        </tr>

        <tr>
            <td>Mocha</td>
            <td>Chocolate latte with whipped cream</td>
            <td>$4.50 • $5.25 • $6.00</td>
        </tr>

        <tr>
            <td>Cold Brew</td>
            <td>Slow-steeped cold coffee</td>
            <td>$4.00 • $4.75 • $5.50</td>
        </tr>

        <tr>
            <td>Iced Latte</td>
            <td>Chilled espresso with cold milk</td>
            <td>$4.00 • $4.75 • $5.50</td>
        </tr>

        <tr>
            <td>Iced Americano</td>
            <td>Cold espresso + water</td>
            <td>$3.50 • $4.25 • $5.00</td>
        </tr>

        <tr>
            <td>Frappe</td>
            <td>Blended iced coffee</td>
            <td>$4.75 • $5.50 • $6.25</td>
        </tr>

        <tr>
            <td>Hot Chocolate</td>
            <td>Rich cocoa topped with cream</td>
            <td>$3.75 • $4.50 • $5.25</td>
        </tr>

        <tr>
            <td>Chai Latte</td>
            <td>Spiced tea with steamed milk</td>
            <td>$4.00 • $4.75 • $5.50</td>
        </tr>

        <tr>
            <td>Matcha Latte</td>
            <td>Green tea matcha with milk</td>
            <td>$4.25 • $5.00 • $5.75</td>
        </tr>
    </table>

    <div class="category-title">Sizes</div>
    <table class="w3-table-all menu-table">
        <tr class="w3-brown w3-text-white">
            <th>Size</th>
            <th>Price</th>
        </tr>
        <tr><td>Small (12oz)</td><td>$3.50</td></tr>
        <tr><td>Medium (16oz)</td><td>$4.25</td></tr>
        <tr><td>Large (20oz)</td><td>$5.00</td></tr>
    </table>

    <div class="category-title">Milk Options</div>
    <table class="w3-table-all menu-table">
        <tr class="w3-brown w3-text-white">
            <th>Milk Type</th>
            <th>Price</th>
        </tr>
        <tr><td>Whole Milk</td><td>Included</td></tr>
        <tr><td>2% Milk</td><td>Included</td></tr>
        <tr><td>Oat Milk</td><td>$0.50</td></tr>
        <tr><td>Almond Milk</td><td>$0.50</td></tr>
        <tr><td>Soy Milk</td><td>$0.50</td></tr>
    </table>

    <div class="category-title">Syrups</div>
    <table class="w3-table-all menu-table">
        <tr class="w3-brown w3-text-white">
            <th>Syrup</th>
            <th>Price</th>
        </tr>
        <tr><td>Vanilla</td><td>$0.50</td></tr>
        <tr><td>Caramel</td><td>$0.50</td></tr>
        <tr><td>Hazelnut</td><td>$0.50</td></tr>
        <tr><td>Mocha</td><td>$0.50</td></tr>
        <tr><td>Lavender</td><td>$0.50</td></tr>
    </table>

    <div class="category-title">Add-ons</div>
    <table class="w3-table-all menu-table">
        <tr class="w3-brown w3-text-white">
            <th>Add-on</th>
            <th>Price</th>
        </tr>
        <tr><td>Extra Shot</td><td>$1.00</td></tr>
        <tr><td>Whipped Cream</td><td>$0.50</td></tr>
        <tr><td>Cold Foam</td><td>$0.75</td></tr>
    </table>

    <div class="create-order-btn">
        <a href="createOrder.php" class="w3-button w3-brown w3-xlarge w3-text-white">
            Create New Order
        </a>
    </div>

</div>

</body>
</html>
