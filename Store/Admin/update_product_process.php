<?php if(isset($_POST['submit'])) : ?>
    <?php
        var_dump($_POST);
        $_SESSION["not_updated"] = "Updated 1 row";
        $missing = [];
        $required = ['name',
        'price',
        'stock',
        'serial_num',
        'description',
        'category',];

        foreach($_POST as $key => $value)
        {
            $value = is_array($value) ? $value : trim($value);
            if(empty($value) && in_array($key, $required))
            {
                $missing[] = $key;
                $$key = '';
            }
            elseif(in_array($key, $required))
            {
                $$key = $value;
            }
        }

    //HANDLE ERRORS
//        $errors = [];
//        if(is_numeric($price) == false)
//        {
//            $errors[] = $price;
//        }
//
//        if(is_int($stock) == false)
//        {
//            $errors[] = $stock;
//        }

        if(empty($missing) && empty($errors))
        {
            echo "ok";
            require_once "../Models/database.php";
            require_once "../Models/Products.php";
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