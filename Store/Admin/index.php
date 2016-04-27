<?php
session_start();

require_once "../Models/database.php";
require_once "../Models/Products.php";
require_once "../Models/Customers.php";

$product = new Product();
$products = $product->getProducts();

$customer = new Customer();
$customers = $customer->getCustomers();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Store admin</title>
    <style>
        tr, td, th {
            border: 1px solid black;
            padding: 3px;
        }
        h3 {
            display: inline;
            padding: 10px;
        }
        #nav {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>

    </header>
    <main style="max-width: 980px; margin: 0 auto;">
        <div id="nav">
            <h3><a href="./index.php?view_products=1">View products</a></h3>
            <h3><a href="./index.php?view_customers=1">View customers</a></h3>
            <h3><a href="./index.php?view_orders=1">View orders</a></h3>
        </div>
        <?php
            if(!empty($_SESSION["not_updated"]))
            {
                echo "<p style=color: red;>" . $_SESSION["not_updated"] . "</p>";
            }
        ?>
        <?php if(isset($_GET['view_products'])) : ?>
            <h2>Products</h2>
        <table id="products_table" style="border: 1px solid black;">
            <tr>
                <th>Product id</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Serial No.</th>
                <th>Description</th>
                <th>Category</th>
            </tr>
            <?php foreach ($products as $p) : ?>
                <tr>
                    <td><?php echo $p["id"] ?></td>
                    <td><?php echo $p["name"] ?></td>
                    <td><?php echo $p["price"] ?></td>
                    <td><?php echo $p["stock"] ?></td>
                    <td><?php echo $p["serial_num"] ?></td>
                    <td><?php echo $p["description"] ?></td>
                    <td><?php echo $p["category"] ?></td>
                    <td>
                        <form action="./update_product.php" method="post">
                            <input type="hidden" name="prod_id" value="<?php echo $p['id']; ?>"/>
                            <input type="submit" name="update_prod" value="Update"/>
                        </form>
                    </td>
                    <td>
                        <form action="./delete_product.php" method="post">
                            <input type="hidden" name="prod_id" value="<?php echo $p['id']; ?>" />
                            <input type="submit" name="delete_prod" value="Delete"/>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php elseif(isset($_GET['view_customers'])) : ?>
            <h2>Customers</h2>
            <table style="border: 1px solid black;">
                <tr>
                    <th>id</th><th>Name</th><th>Surname</th><th>Address</th><th>City</th><th>Province</th><th>Postal Code</th><th>Email</th><th>Credit card</th>
                </tr>
                <?php foreach($customers as $c) : ?>
                <tr>
                    <td><?php echo $c['id']; ?></td>
                    <td><?php echo $c['name']; ?></td>
                    <td><?php echo $c['surname']; ?></td>
                    <td><?php echo $c['address']; ?></td>
                    <td><?php echo $c['city']; ?></td>
                    <td><?php echo $c['province']; ?></td>
                    <td><?php echo $c['postal_code']; ?></td>
                    <td><?php echo $c['email']; ?></td>
                    <td><?php echo $c['credit_card']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

    </main>
    <footer>

    </footer>
</body>
</html>
