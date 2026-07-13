<!DOCTYPE html>
<html>
<head>
    <title>Sunkissed Coffee - Create Order</title>
    <link rel="stylesheet"
          href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        body{
            background-color:#f5f5f5;
        }

        .header-area{
            background-color:#f2d7b5;
            padding:20px;
            text-align:center;
        }

        .logo-img{
            width:90px;
            display:block;
            margin-left:auto;
            margin-right:auto;
        }

        .order-area{
            background-color:#fff8e6;
            padding:20px;
        }

        .price-table{
            margin-top:20px;
        }
    </style>
</head>
<body>

<div class="w3-container w3-card w3-white">
    <div class="header-area w3-card w3-sand">
        <img src="1.jpg" alt="Coffee Logo" class="logo-img">
        <h1 class="w3-text-brown"><b>Sunkissed Coffee</b></h1>
        <h3><b>Fresh • Local • Handcrafted</b></h3>
    </div>
</div>

<div class="order-area w3-pale-yellow">
    <form action="receiveOrder.php" method="post">

        <label><b>Drink</b></label>
        <select class="w3-select w3-border w3-white" name="drink" required>
            <option value="Americano">Americano</option>
            <option value="Latte">Latte</option>
            <option value="Cappuccino">Cappuccino</option>
            <option value="Espresso">Espresso</option>
            <option value="Macchiato">Macchiato</option>
            <option value="Mocha">Mocha</option>
            <option value="Cold Brew">Cold Brew</option>
            <option value="Iced Latte">Iced Latte</option>
            <option value="Iced Americano">Iced Americano</option>
            <option value="Frappe">Frappe</option>
            <option value="Hot Chocolate">Hot Chocolate</option>
            <option value="Chai Latte">Chai Latte</option>
            <option value="Matcha Latte">Matcha Latte</option>
        </select>

        <br><br>

        <label><b>Size</b></label>
        <select class="w3-select w3-border w3-white" name="size" required>
            <option value="Small">Small (12oz)</option>
            <option value="Medium">Medium (16oz)</option>
            <option value="Large">Large (20oz)</option>
        </select>

        <br><br>

        <label><b>Milk</b></label>
        <select class="w3-select w3-border w3-white" name="milk" required>
            <option value="Whole Milk">Whole Milk</option>
            <option value="2% Milk">2% Milk</option>
            <option value="Oat Milk">Oat Milk</option>
            <option value="Almond Milk">Almond Milk</option>
            <option value="Soy Milk">Soy Milk</option>
        </select>

        <br><br>

        <label><b>Syrup</b></label>
        <select class="w3-select w3-border w3-white" name="syrup">
            <option value="None">None</option>
            <option value="Vanilla">Vanilla</option>
            <option value="Caramel">Caramel</option>
            <option value="Hazelnut">Hazelnut</option>
            <option value="Mocha">Mocha</option>
            <option value="Lavender">Lavender</option>
        </select>

        <br><br>

        <label><b>Add-ons</b></label>
        <select class="w3-select w3-border w3-white" name="addon">
            <option value="None">None</option>
            <option value="Extra Shot">Extra Shot</option>
            <option value="Whipped Cream">Whipped Cream</option>
            <option value="Cold Foam">Cold Foam</option>
        </select>

        <br><br>

        <input type="submit"
               value="Submit Order"
               class="w3-button w3-brown w3-text-white">

    </form>
</div>

<div class="price-table">
    <table class="w3-table-all">

        <tr class="w3-brown w3-text-white">
            <th>Item</th>
            <th>Price</th>
        </tr>

        <tr class="w3-white">
            <td>Small (12oz)</td>
            <td>$3.50</td>
        </tr>
        <tr class="w3-sand">
            <td>Medium (16oz)</td>
            <td>$4.25</td>
        </tr>
        <tr class="w3-white">
            <td>Large (20oz)</td>
            <td>$5.00</td>
        </tr>

        <tr class="w3-sand">
            <td>Extra Shot</td>
            <td>$1.00</td>
        </tr>
        <tr class="w3-white">
            <td>Whipped Cream</td>
            <td>$0.50</td>
        </tr>
        <tr class="w3-sand">
            <td>Cold Foam</td>
            <td>$0.75</td>
        </tr>

        <tr class="w3-white">
            <td>Any Syrup</td>
            <td>$0.50</td>
        </tr>

    </table>
</div>

</body>
</html>
