<?php if(isset($_GET['update_prod'])) : ?>
    <?php
        require_once "../Models/database.php";
        require_once "../Models/Products.php";

        $prod_id = $_GET['prod_id'];
        $product = new Product();
        $p = $product->getProduct($prod_id);

    if(isset($_POST['submit']))
    {
        $missing = [];
        $required = ['name', 'price', 'stock', 'serial_num', 'description', 'category'];
        foreach($_POST as $key => $value)
        {
            $value = is_array($value) ? $value : trim($value);
            if(strlen($value) == 0  && in_array($key, $required))
            {
                $missing[] = $key;
                $$key = '';
            }
            else
            {
                $$key = $value;
            }
        }

        if(!empty($missing))
        {
            $message = "<span style='color: red;'>All fields required</span>";
        }
        else
        {
            $add_p = $product->updateProd($id, $name, $price, $stock, $serial_num, $description, $category);
            var_dump($add_p);
        }
    }
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
            <form action="./update_product.php?update_prod=1&prod_id=<?php echo $p['id']; ?>" method="post">
            <table>
                <tr>
                    <th>Now viewing:</th><th><?php echo $p['name']; ?></th>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Product Id: </td><td><?php echo $p['id']; ?></td>
                    <input type="hidden" name="id" value="<?php echo $p['id']; ?>"/>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Name: </td><td><input type="text" name="name" value="<?php echo $p['name']; ?>"/></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Price: </td><td><input type="text" name="price" value="<?php echo $p['price']; ?>"/></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Stock: </td><td><input type="text" name="stock" value="<?php echo $p['stock']; ?>"/></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Serial number: </td><td><input type="text" name="serial_num" value="<?php echo $p['serial_num']; ?>"/></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Description: </td><td><input type="text" name="description" value="<?php echo $p['description']; ?>"/></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Category: </td><td><input type="text" name="category" value="<?php echo $p['category']; ?>"/></td>
                </tr>
            </table>
                <input type="submit" name="submit" value="Update product" />
            </form>
        </main>
        <footer>

        </footer>
    </body>
</html>

<?php else : ?>

<?php header('location: ./index.php'); ?>

<?php endif; ?>
