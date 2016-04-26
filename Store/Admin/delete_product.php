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
    <main>
        <h4><a href="./index.php?view_products=1">Back to Admin home page</a></h4>
        <form action="./delete_product_process.php" method="post">
            
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>
<?php else : ?>

    <?php header("location: ./index.php"); ?>

<?php endif; ?>
