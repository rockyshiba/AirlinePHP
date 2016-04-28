<?php
session_start();

require_once './Models/database.php';
require_once './Models/Products.php';

$message = '';
$product = new Product();
//$products[1] = array (
//    'name' => 'Pillow',
//    'price' => 10.00,
//    'category' => 'comfort',
//    'description' => 'A nice travel pillow for your long travels'
//    );
//
//$products[2] = array (
//    'name' => 'Blanket',
//    'price' => 15.00,
//    'category' => 'comfort',
//    'description' => 'A nice travel blanket for your long travels'
//    );
//
//$products[3] = array (
//    'name' => 'Slippers',
//    'price' => 5.00,
//    'category' => 'footware',
//    'description' => 'A pair of slippers'
//    );


//set up cart
if(!isset($_SESSION['shopping_cart']))
{
    $_SESSION['shopping_cart'] = array();
}

//empty cart
if(isset($_GET['empty_cart']))
{
    $_SESSION['shopping_cart'] = array();
    echo "cart to be emptied";
}

//add products to cart
if(isset($_POST['add_to_cart']))
{

    $product_id = $_POST['product_id'];

    //item exists in cart
    if(isset($_SESSION['shopping_cart'][$product_id]))
    {
        $message = "Item already in cart";
    }
    else //item is not in cart
    {

        $_SESSION['shopping_cart'][$product_id]['product_id'] = $_POST['product_id'];
        $_SESSION['shopping_cart'][$product_id]['stock'] = $_POST['stock'];

        $message = "Item added to cart!";
    }
}

//update cart
if(isset($_POST['update_cart']))
{
    $quantities = $_POST['stock'];
    foreach($quantities as $id => $stock)
    {
        $_SESSION['shopping_cart'][$id]['stock'] = $stock;
        echo "ID: $id - Stock: $stock<br>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <Title>AirlinePHP Store</Title>
    <meta charset = "UTF-8">
    <style>
        body {
            max-width: 980px;
            margin: 0 auto;
        }
        th {
            border: 3px solid black;
            padding: 3px;
        }
        td {
            border: 1px solid black;
            padding: 3px;
        }
    </style>
</head>
<body>
    <h1><a href="./index.php">Online Store</a></h1>
    <h3>Products</h3>
    <main>
        <p><a href="./index.php?view_cart=1">View cart</a></p>
        <p><?php echo $message; ?></p>
        <!--If user clicks a product for detailed information, page loads with just that product information-->
<?php if(isset($_GET['view_product'])) : ?>
    <?php

        $idee = $_GET['view_product'];
        $product_sing = $product->getProduct($idee);

        //breadcrumbs
        echo "<span><a href='./index.php'>Online Store</a> &gt; <a href='./index.php?category=". $product_sing['category'] ."'>" . $product_sing['category'] . "</a></span>" . "<br>";

        //product details
        echo "<b>Name: </b>" . $product_sing['name'] . "<br>" .
            "<b>Price: </b>" . $product_sing['price'] . "<br>" .
            "<b>Category: </b>" . $product_sing['category'] . "<br>" .
            "<b>Description: </b>" . $product_sing['description'] . "<br>" .
            "<b>Items left in stock: </b>" . $product_sing['stock'] . "<br>";
            if($product_sing['stock'] == 0)
            {
                echo "<p>Out of stock. <a href='./index.php'>Click here to go back to the store</a></p>";
            }
            else
            {
                echo "<p>
                        <form action='./index.php?view_product=$idee' method='post'>
                        <select name='stock'>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                        </select>
                        <input type='hidden' name='product_id' value='$idee'/>
                        <input type='submit' name='add_to_cart' value='Add to cart'/>
                        </form>
                    </p>";
            }


    ?>
<?php elseif(isset($_GET['category'])) : ?>
    <h3>Category: </h3>

    <?php
    $products = $product->getProdByCat($_GET['category']);
    //var_dump($products);
    foreach($products as $p)
    {
        echo "<a href='./index.php?view_product=" . $p['id'] . "' >". $p['name'] . "</a><br>" .
            "<b>Price: </b>" . $p['price'] . "<br>" .
            "<b>Category: </b>" . $p['category'] . "<br>" .
            "<b>Description: </b>" . $p['description'] . "<hr>";
    }
    ?>

<?php elseif(isset($_GET['view_cart'])) : ?>
    <h3>Your cart</h3>
    <?php
        echo "<p><a href='./index.php'>Back to Store</a></p>";
        echo "<a href=./index.php?empty_cart>Empty cart</a><br>";

        if(empty($_SESSION['shopping_cart']))
        {
            echo "<br>Your cart is empty";
            echo "<p><a href='./index.php'>Back to store</a></p>";
        }
        else
        {
            echo "<form action='./index.php?view_cart=1' method='post'>";
            echo "<table>";
            echo "<tr><th>Name</th><th>Price</th><th>Category</th><th>Quantity</th></tr>";
            foreach($_SESSION['shopping_cart'] as $id => $p)
            {
                $product_id = $p['product_id'];
                $product_sing = $product->getProduct($product_id);
                echo "<tr>
                        <td><a href='./index.php?view_product=$id' >" . $product_sing['name'] . "</a></td>
                        <td>" . $product_sing['price'] . "</td>
                        <td>" . $product_sing['category'] . "</td>
                        <td><input type='text' name='stock[$product_id]' value='" . $p['stock'] . "'/>
                        </td>
                         <td><a href='./index.php?remove=$id'>Remove</a></td>
                     </tr>";

                //echo $products[$product_id]['name'] . " | Quantitiy: " . $product['stock'] . "<br>";
            }
            echo "</table>";
            echo "<input type='submit' name='update_cart' value='Update cart'/>";
            echo "</form>";
            echo "<a href='./index.php?checkout=1'>Checkout</a>";
        }

    ?>
<?php elseif(isset($_GET['remove'])) : ?>

    <?php
    unset($_SESSION['shopping_cart'][$_GET['remove']]);
    header('Location: ./index.php?view_cart=1');
    ?>

<?php elseif(isset($_GET['checkout'])) : ?>
    <h3>Checkout</h3>
    <?php if(empty($_SESSION['shopping_cart'])) : ?>
    <p>Your cart is empty</p>

    <?php else : ?>
        <?php var_dump($_SESSION); ?>
        <?php if(isset($_POST['payment']))
        {
            var_dump($_POST);
        }

        ?>
        <table>
        <tr><th>Name</th><th>Item Price</th><th>Stock</th><th>Quantity</th></tr>
        <?php
        $subtotal = 0;
        $purchase_items = [];
        foreach($_SESSION['shopping_cart'] as $id => $p)
        {
            $product_id = $p['product_id'];
            $qty = $p['stock'];

            //get a product from the database by id
            $cart_product = $product->getProduct($product_id);
            $subtotal += ($cart_product['price'] * $qty);
            $purchase_items[$cart_product['name']] = $qty;
            echo "<tr><td><a href='.index.php?view_product=$product_id'>". $cart_product['name'] . "</a></td>
            <td>" . $cart_product['price'] . "</td>
            <td>" . $cart_product['stock'] . "</td>
            <td>" . $qty . "</td>
            </tr>";

        }
        $total = $subtotal * 1.15;
        $purchase_items = implode($purchase_items);
        ?>
        </table>
        <p>Subtotal = $ <?php echo $subtotal; ?></p>
        <p>Total ( + taxes) = $ <?php echo $total; ?></p>

        <h3>Payment Info</h3>
        <form action="./index.php?checkout=1" method="post">
        <table>
            <tr>
                <td>Name: </td><td><input type="text" name="name"/></td>
            </tr>
            <tr>
                <td>Surname: </td><td><input type="text" name="surname"/></td>
            </tr>
            <tr>
                <td>Address: </td><td><input type="text" name="address"/></td>
            </tr>
            <tr>
                <td>City: </td><td><input type="text" name="city"/></td>
            </tr>
            <tr>
                <td>Province: </td><td><input type="text" name="province"/></td>
            </tr>
            <tr>
                <td>Postal Code: </td><td><input type="text" name="postal_code"/></td>
            </tr>
            <tr>
                <td>Email: </td><td><input type="text" name="email"/></td>
            </tr>
            <tr>
                <td>Credit card: </td><td><input type="text" name="credit_card"/></td>
            </tr>
            <tr>
                <td>Shipping method: </td><td><select name="shipping"><option value="address">To address</option><option value="store">In store pick up</option></select></td>
            </tr>
        </table>
            <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>"/>
            <input type="hidden" name="total" value="<?php echo $total; ?>"/>
            <input type="hidden" name="items" value="<?php echo $purchase_items; ?>"/>
            <p><input type="submit" name="payment" value="Pay"/></p>
        </form>
    <?php endif; ?>
<?php else : ?>
<?php
    //Storefront PRINT ALL PRODUCTS
    $products = $product->getProducts();

    echo "<p><a href='./index.php'>Online Store</a></p>";

    foreach($products as $p)
    {
        echo "<a href='./index.php?view_product=" . $p['id'] . "' >". $p['name'] . "</a><br>" .
            "<b>Price: </b>" . $p['price'] . "<br>" .
            "<b>Category: </b>" . $p['category'] . "<br>" .
            "<b>Description: </b>" . $p['description'] . "<hr>";
    }
?>
    </main>
    <footer>

    </footer>
</body>
</html>
<?php endif; ?>
