<?php if(isset($_GET['customer_id'])) : ?>
    <?php
        require_once "../Models/database.php";
        require_once "../Models/Customers.php";

        $message = "";
        $customer_id = $_GET['customer_id'];
        $customer = new Customer();
        $c = $customer->getCustomer($customer_id);

    if(isset($_POST['submit']))
    {

        $missing = [];
        $required = ['name', 'surname', 'address', 'city', 'province', 'postal_code', 'email', 'credit_card'];


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
        elseif(strlen($postal_code) != 6)
        {
            $message = "<span sttyle='color: red;'>Postal code must be 6 continuous characters</span>";
        }
        elseif(!is_numeric($credit_card))
        {
            $message = "<span style='color: red;'>Credit card must be a number.</span>";
        }
        else
        {
            $update_customer = $customer->updateCustomer($id, $name, $surname, $address, $city, $province, $postal_code, $email, $credit_card);
            $message = "<span style='color: green;'>$update_customer row affected. Customer " . $c['name'] . " " . $c['surname'] . " updated.</span>";
            $c = $customer->getCustomer($customer_id); //needs to be called again to update the text fields
        }

    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" >
        <style>
            table, tr, td {
                border: 1px solid black;
                padding: 3px;
            }
            main {
                max-width: 980px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <header></header>
        <main>
            <h4><a href="./index.php?view_products=1">Back to Admin home page</a></h4>
            <form action="" method="post">
            <table>
                <tr>
                    <th>Customer: </th><th><?php echo $c['name'] . " " . $c['surname']; ?></th>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Id: </td><td><?php echo $c['id']; ?><input type="hidden" name="id" value="<?php echo $c['id']; ?>"</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Name: </td><td><input type="text" name="name" value="<?php echo $c['name']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Surname: </td><td><input type="text" name="surname" value="<?php echo $c['surname']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Address: </td><td><input type="text" name="address" value="<?php echo $c['address']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">City: </td><td><input type="text" name="city" value="<?php echo $c['city']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Province: </td><td><input type="text" name="province" value="<?php echo $c['province']; ?>"></td>
                </tr>                
                <tr>
                    <td style="font-weight: bold;">Postal code: </td><td><input type="text" name="postal_code" value="<?php echo $c['postal_code']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Email: </td><td><input type="text" name="email" value="<?php echo $c['email']; ?>"></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Credit card: </td><td><input type="text" name="credit_card" value="<?php echo $c['credit_card']; ?>"></td>
                </tr>
            </table>
                <input type="submit" name="submit" value="Update customer" />
                <p><?php echo $message; ?></p>
            </form>
        </main>
        <footer></footer>
    </body>
</html>
<?php else : ?>
    <?php header('location: ./index.php'); ?>
<?php endif; ?>
