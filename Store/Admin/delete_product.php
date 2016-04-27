<?php if(isset($_POST['delete_prod'])) : ?>

    <?php
        require_once "../Models/database.php";
        require_once "../Models/Products.php";

        $prod_id = $_POST['prod_id'];
        $product = new Product();
        $p = $product->getProduct($prod_id);
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table, tr, td {
            border: 1px solid black;
            padding: 3px;
        }
    </style>
</head>
<body>
    <header>

    </header>
    <main style="max-width: 980px; margin: 0 auto;">
        <h4><a href="./index.php?view_products=1">Back to Admin home page</a></h4>
        <form action="./delete_product_process.php" method="post">
            <table>
                <tr>
                    <th>Are you sure you want to delete: </th><th><?php echo $p['name']; ?></th>
                </tr>
                <tr>
                    <td>Id: </td><td><?php echo $p["id"]; ?></td>
                </tr>
                <tr>
                    <td>Name: </td><td><?php echo $p["name"]; ?></td>
                </tr>
                <tr>
                    <td>Price: </td><td><?php echo $p["price"]; ?></td>
                </tr>
                <tr>
                    <td>Stock: </td><td><?php echo $p["stock"]; ?></td>
                </tr>
                <tr>
                    <td>Serial number: </td><td><?php echo $p["serial_num"]; ?></td>
                </tr>
                <tr>
                    <td>Description: </td><td><?php echo $p["description"]; ?></td>
                </tr>
                <tr>
                    <td>Category: </td><td><?php echo $p["category"]; ?></td>
                </tr>
                <tr>
                    <td>
                        <form action="./delete_product_process.php" method="post">
                            <input type="hidden" name="prod_id" value="<?php echo $p["id"]; ?>"/>
                            <input type="submit" name="delete_prod" value="Delete product"/>
                        </form>
                    </td>
                    <td>
                        <span style="font-size: 2em;"><a href="./index.php?view_products=1">No</a></span>
                    </td>
                </tr>

            </table>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>
<?php else : ?>

    <?php header("location: ./index.php"); ?>

<?php endif; ?>
