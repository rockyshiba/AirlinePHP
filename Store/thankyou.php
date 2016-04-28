<?php if(isset($_GET['ty'])) : ?>

    <?php
        session_start();
        var_dump($_SESSION);
        require_once './Models/Customers.php';
        $customer = new Customer();
        $sing_customer = $customer->getCustomerId($_SESSION['new_c_id']);
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Your order details</title>
        <style>
            main {
                max-width: 980px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
    <header></header>
    <main>
        <h2>Your order details</h2>
        <p><?php echo "Name: " . $sing_customer['name'] . " " . $sing_customer['surname']; ?></p>
        <p><?php echo "Items purchased: " . $_SESSION['items']; ?></p>
        <p><?php echo "Amount charged on credit card: " . $_SESSION['total']; ?></p>
        <p><?php echo "Shipping method: " . $_SESSION['shipping']; ?></p>
        <p>Customer address:</p>
        <p><?php echo $sing_customer['address']; ?></p>
        <p><?php echo $sing_customer['city']; ?></p>
        <p><?php echo $sing_customer['province']; ?></p>
        <p><?php echo $sing_customer['postal_code']; ?></p>
        <p><?php echo "Order placed: " . $_SESSION['order_date']; ?></p>
    </main>
    <footer></footer>
    </body>
</html>

<?php else : ?>
    <?php header('location: ./index.php') ;?>
<?php endif; ?>
