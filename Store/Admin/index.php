<?php
session_start();

require_once "../Models/database.php";
require_once "../Models/Products.php";

$product = new Product();
$products = $product->getProducts();
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
    </style>
</head>
<body>
    <header>

    </header>
    <main style="max-width: 980px; margin: 0 auto;">
        <h3><a href="./index.php?view_products=1">View products</a></h3>
        <?php
            if(!empty($_SESSION["not_updated"]))
            {
                echo "<p style=color: red;>" . $_SESSION["not_updated"] . "</p>";
            }
        ?>
        <?php if(isset($_GET['view_products'])) : ?>
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
        <?php endif; ?>

    </main>
    <footer>

    </footer>
</body>
</html>
