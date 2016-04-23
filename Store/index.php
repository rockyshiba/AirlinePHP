<?php
session_start();

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
        echo "Item already in cart";
    }
    else //item is not in cart
    {

        $_SESSION['shopping_cart'][$product_id]['product_id'] = $_POST['product_id'];
        $_SESSION['shopping_cart'][$product_id]['quantity'] = $_POST['quantity'];

        echo "Item added to cart!";
    }
}

//update cart
if(isset($_POST['update_cart']))
{
    $quantities = $_POST['quantity'];
    foreach($quantities as $id => $quantity)
    {
        $_SESSION['shopping_cart'][$id]['quantity'] = $quantity;
        echo "ID: $id - Quantity: $quantity<br>";
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
        <!--If user clicks a product for detailed information, page loads with just that product information-->
<?php if(isset($_GET['view_product'])) : ?>
    <?php
        $idee = $_GET['view_product'];
        //breadcrumbs
        echo "<span><a href='./index.php'>Online Store</a> &gt; <a href='#'>" . $products[$idee]['category'] . "</a></span>" . "<br>";

        //product details
        echo "<b>Name: </b>" . $products[$idee]['name'] . "<br>" .
            "<b>Price: </b>" . $products[$idee]['price'] . "<br>" .
            "<b>Category: </b>" . $products[$idee]['category'] . "<br>" .
            "<b>Description: </b>" . $products[$idee]['description'] . "<br>" .

            "<p>
            <form action='./index.php?view_product=$idee' method='post'>
            <select name='quantity'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
            <input type='hidden' name='product_id' value='$idee'/>
            <input type='submit' name='add_to_cart' value='Add to cart'/>
            </form>
            </p>"
            ;
    ?>
<?php elseif(isset($_GET['category'])) : ?>
    <h3>Category: </h3>

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
            foreach($_SESSION['shopping_cart'] as $id => $product)
            {
                $product_id = $product['product_id'];
                echo "<tr>
                        <td><a href='./index.php?view_product=$id' >" . $products[$product_id]['name'] . "</a></td>
                        <td>" . $products[$product_id]['price'] . "</td>
                        <td>" . $products[$product_id]['category'] . "</td>
                        <td><input type='text' name='quantity[$product_id]' value='" . $product['quantity'] . "'/>
                        </td>
                         <td><a href='./index.php?remove=$id'>Remove</a></td>
                     </tr>";

                //echo $products[$product_id]['name'] . " | Quantitiy: " . $product['quantity'] . "<br>";
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
    <?php
    if(empty($_SESSION['shopping_cart']))
    {
    echo "<br>Your cart is empty";
    }
    else
    {
        echo "<form action='./index.php?checkout=1' method='post'>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Item Price</th><th>Quantity</th><th>Cost</th></tr>";

        $total_price = 0;
        foreach($_SESSION['shopping_cart'] as $id => $product)
        {
            $product_id = $product['product_id'];
            $total_price += ($products[$product_id]['price'] * $product['quantity']);
            echo "<tr>
                <td><a href='./index.php?view_product=$id' >" . $products[$product_id]['name'] . "</a></td>
                <td>" . $products[$product_id]['price'] . "</td>
                <td>" . $products[$product_id]['category'] . "</td>
                <td>$" . ($products[$product_id]['price'] * $product['quantity'])  . "</td>
                <td><a href='#'>Remove</a></td>
            </tr>";

            //echo $products[$product_id]['name'] . " | Quantitiy: " . $product['quantity'] . "<br>";
        }
            echo "</table>";
        echo "</form>";
        echo "<p>Total price = $" . $total_price . "</p>";
    }
    ?>
<?php else : ?>
<?php
    echo "<p><a href='./index.php'>Online Store</a></p>";
    foreach($products as $id => $product)
    {
        echo "<b>Name: </b><a href='./index.php?view_product=$id'>" . $product['name'] . "</a><br>" .
            "<b>Price: </b>" . $product['price'] . "<br>" .
            "<b>Category: </b>" . $product['category']. "<br>" .
            "<b>Description</b>" . $product['description'] . "<br><br>";
    }
?>
    </main>
    <footer>

    </footer>
</body>
</html>
<?php endif; ?>
