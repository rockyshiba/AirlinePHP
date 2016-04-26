<?php if(isset($_POST['submit'])) : ?>
    <?php
        var_dump($_POST);
        $_SESSION["not_updated"] = "Updated 1 row";
        $missing = [];
        $required = ['id', 'name', 'price', 'stock', 'serial_num', 'description', 'category', 'submit'];
        $post_variables = [];
        foreach($_POST as $key => $value)
        {
            $value = is_array($value) ? $value : trim($value);
            if(strlen($value) == 0  && in_array($key, $required))
            {
                $missing[] = $key;
                $$key = '';
            }
            elseif(in_array($key, $required))
            {
                $$key = $value;
            }
            $post_variables[] = $$key;
        }
        var_dump($post_variables);
//        $name = $_POST['name'];
//        $price = $_POST['price'];
//        $stock = $_POST['stock'];
//        $serial_num = $_POST['serial_num'];
//        $description = $_POST['description'];
//        $category = $_POST['category'];

        //HANDLE ERRORS
//        $errors = false;
//        if(is_numeric($price) == false)
//        {
//            $errors = true;
//            echo $errors . "<br>";
//        }

        if(empty($missing) && is_numeric($price))
        {
            echo "ok";
            require_once "../Models/database.php";
            require_once "../Models/Products.php";

            $product = new Product();
            $product->updateProd($id, $name, $price, $stock, $serial_num, $description, $category);
            header("location: ./index.php?view_products=1");
        }
        else
        {
            echo "errors" . "<br>";
            echo $_SESSION["not_updated"] . "<br>";
            $_SESSION["not_updated"] = "Item was not updated. Please check all fields.";
            echo $_SESSION["not_updated"];
            //header('location: ./index.php');
        }

    ?>


<?php else : ?>

    <?php header('location: ./index.php'); ?>
<?php endif; ?>