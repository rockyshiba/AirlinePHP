<?php
session_start();
require_once 'Index_Models/database.php';
require_once 'Index_Models/Airports.php';

//makes options out of airports

function makeOptionsAirport()
{
    $airport = new Airport();
    $airports = $airport->getAirports();
    foreach ($airports as $air) {
        return "<option value='" . $air['Code'] . "'>" . $air['City'] . "</option>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Airline PHP</title>
        <link rel="stylesheet" type="text/css" href="Styling/css/index.css" />
        <style>
            main {
                max-width: 980px;
                margin: 0 auto;
            }
            footer {
                bottom: 0;
                position: absolute;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php include './Styling/header.php'; ?>
        <main>
            <form action="Parking/parking.php" method="get">
                <table>
                    <tr>
                        <td>When are you leaving?</td>
                        <td><input type="date" name="dep_date" /></td>
                    </tr>
                    <tr>
                        <td>From: </td>
                        <td>
                            <select name="origin">
                                <?php echo makeOptionsAirport(); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>To: </td>
                        <td><select name="destination">
                                <?php echo makeOptionsAirport(); ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>One way or return?</td>
                        <td><input type="radio" name="direction" value="One way"/>One way
                            <input type="radio" name="direction" value="Round trip"/>Round trip</td>
                    </tr>
                    <tr>
                        <td>When are you coming back?</td>
                        <td><input type="date" name="ret_Date"/></td>
                    </tr>
                </table>
            </form>
        </main>
    </body>
</html>
