<?php
require 'database.php';

$query = 'SELECT * FROM parkingold';
$statement = $db->prepare($query);
$statement->execute();
$customers = $statement->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="admin.css"/>
        <meta charset="utf-8">
        <style>
            main {
                max-width: 980px;
                margin: 0 auto;
            }
        </style>
    </head>
<body>
<?php include 'D:\wamp\www\AirlinePHP\Styling\adminHeader.php' ?>
<main>
    <h2>Parking Customers</h2>
    <div class="page-wrapper">
        <table class="parking_table">
                <tr class="parking_table">
                    <th>Id</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Vehicle type</th>
                    <th>Vehicle description</th>
                    <th>Plate province</th>
                    <th>License plate</th>
                    <th>Departure date</th>
                    <th>Return date</th>
                </tr>
            <?php foreach ($customers as $customer) : ?>
                <tr class="parking_table">
                    <td><?php echo $customer['id']; ?></td>
                    <td><?php echo $customer['first_name']; ?></td>
                    <td><?php echo $customer['last_name']; ?></td>
                    <td><?php echo $customer['vehicle_type']; ?></td>
                    <td><?php echo $customer['description']; ?></td>
                    <td><?php echo $customer['plate_province']; ?></td>
                    <td><?php echo $customer['license_plate']; ?></td>
                    <td><?php echo $customer['departure_date']; ?></td>
                    <td><?php echo $customer['return_date']; ?></td>

                    <td>
                        <form action="parking_delete.php" method="post">
                            <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>" />
                            <input type="submit" value="Delete" />
                        </form>
                    </td>

                    <td>
                        <form action="edit.php" method="post">
                            <input type="hidden" name="customer_id" value="<?php echo $customer['id']; ?>" />
                            <input type="submit" value="Update" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div>
            <a href="parking_create.php">Add customer</a>
        </div>
    </div>
</main>
<?php include 'D:\wamp\www\AirlinePHP\Styling\adminFooter.php' ?>
</body>
</html>
