<?php if(isset($_POST['delete_prod'])) : ?>
    <?php
        require_once '../Models/database.php';
        require_once '../Models/Products.php';
        var_dump($_POST);

        $id = $_POST['prod_id'];

        $product = new Product();
        $product_sing = $product->deleteProd($id);
        header("location: ./index.php?view_products=1");
    ?>
<?php else : ?>

    <?php header("location: ./index.php"); ?>

<?php endif; ?>
