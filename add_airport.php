<?php
require_once './Index_Models/database.php';
require_once './Index_Models/Airports.php';

$airport = new Airport();

$message = "";
if(isset($_POST['submit']))
{
    $name = $_POST['Name'];
    $city = $_POST['City'];
    $code = $_POST['Code'];

    if(empty($name) || empty($city) || empty($code))
    {
        $message = "<span style='color: red;'>All fields required</span>";
    }
    elseif(strlen($code) != 3)
    {
        $message = "<span style='color: red;'>Airport codes are 3 letters</span>";
    }
    else
    {
        $add_airport = $airport->addAirport($name, $city, $code);
        $message = "<span style='color: green;'>Airport added!</span>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add an airport</title>
        <link rel="stylesheet" href="Styling/css/admin.css" type="text/css"/>
        <style>
            main {
                max-width: 980px;
                margin: 0 auto;
            }
            footer {
                position: absolute;
                bottom: 0;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php include 'Styling/adminHeader.php'; ?>
        <main>
            <h2>Add an airport</h2>
            <form action="" method="post">
            <table>
                <tr>
                    <th>Airport name</th><th>City</th><th>Code</th>
                </tr>
                <tr>
                    <td><input type="text" name="Name" /></td>
                    <td><input type="text" name="City" /></td>
                    <td><input type="Code" name="Code" /></td>
                </tr>
            </table>
                <input type="submit" name="submit" value="Add"/>
                <p><?php echo $message; ?></p>
            </form>
        </main>
        <?php include 'Styling/adminFooter.php';?>
    </body>
</html>
