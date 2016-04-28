<?php
//remove values from input fields
$message = '';
if(isset($_POST['add_prod']))
{
    require_once '../Models/database.php';
    require_once '../Models/Products.php';
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
    $product = new Product();
    $is_existing_product = $product->getProdBySer($serial_num);


    if($is_existing_product[0][0] > 0)
        {
            $message = "<span style='color: red;'>Serial number already exists. No Item added.</span>";
        }
    elseif(!empty($missing))
        {
            $message = "<span style='color: red;'>All fields required. No item Added.</span>";
        }
    else
        {
            if(!is_numeric($price) || !is_numeric($stock))
            {
                $message = "<span style='color: red;'>Price or stock must be numbers</span>";
            }
            else
            {
                $product_Sing = $product->addProduct($name, $price, $stock, $serial_num, $description, $category);

                //remove values from input fields
                foreach($_POST as $key => $value)
                {
                    $$key = '';
                }
                $message = "<span style='color: green;'>Item added to catalog.</span>";
            }

        }
}
else
{
    //on page load make all fields blank
    $name = '';
    $price = '';
    $stock = '';
    $serial_num = '';
    $description = '';
    $category= '';
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add a product</title>
    <style>
        main {
            font-family: Arial, Helvetica, sans-serif;
        }
        table, td {
            border: 1px solid black;
            padding: 3px;
        }
    </style>
</head>
<body>
<header>

</header>
<main style="max-width: 980px; margin: 0 auto;">
    <form action="./add_product.php" method="post">
    <table>
        <tr>
            <th>All fields required</th><th>Enter values here</th>
        </tr>
        <tr>
            <td>Product name: </td>
            <td><input type="text" name="name" id="name" value=" <?php echo htmlentities($name); ?>"/></td>
        </tr>
        <tr>
            <td>Price: </td>
            <td><input type="text" name="price" id="price" value="<?php echo htmlentities($price); ?>"/></td>
        </tr>
        <tr>
            <td>Stock: </td>
            <td><input type="text" name="stock" id="stock" value="<?php echo htmlentities($stock); ?>"/></td>
        </tr>
        <tr>
            <td>Serial number: </td>
            <td><input type="text" name="serial_num" id="serial_num" value="<?php echo htmlentities($serial_num); ?>"/></td>
        </tr>
        <tr>
            <td>Description: </td>
            <td><input type="text" name="description" id="description" value="<?php echo htmlentities($description); ?>"/></td>
        </tr>
        <tr>
            <td>Category: </td>
            <td><input type="text" name="category" id="category" value="<?php echo htmlentities($category); ?>"/></td>
        </tr>
    </table>
        <input type="submit" name="add_prod" id="add_prod" value="Add product"/>
        <p><?php echo $message; ?></p><!--User action message-->
    </form>
    <a href="./index.php?view_products=1">Back to admin home</a>
</main>
<footer>

</footer>
</body>
</html>
