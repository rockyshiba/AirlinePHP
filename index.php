<?php
session_start();
require_once 'Index_Models/database.php';
require_once 'Index_Models/Airports.php';

//makes options out of airports

function makeOptionsAirport($code, $city)
{
    return "<option value='" . $code . "'>" . $city . "</option>";
}

$airport = new Airport();
$airports = $airport->getAirports();

$message = "";
if(isset($_GET['submit']))
{
//VALIDATE
    $missing = [];
    $required = ['dep_date', 'origin', 'destination', 'ret_date'];
    foreach ($_GET as $key => $value) {
        $value = is_array($value) ? $value : trim($value);
        if (strlen($value) == 0 and in_array($key, $required)) {
            $missing[] = $key;
            $$key = '';
        } else {
            $_SESSION[$key] = $value;
            $$key = $value;
        }
    }

    $errors = false;
    $message = '';
    $date1 = strtotime($dep_date);
    $date2 = strtotime($ret_date);
    if (idate('U', $date1) > idate('U', $date2) && $direction == 'Round trip') {
        $message .= "<span style='color: red;'>Departure date must be earlier than return date</span><br>";
        $errors = true;
    }

    if ($origin == $destination) {
        $message .= "<span style='color: red;'>Origin and destination must be different</span><br>";
        $errors = true;
    }

    if ($direction == "One way")
    {
        $missing=[];
    }

    if($missing)
    {
        $message .= "<span style='color: red;'>All fields required</span><br>";
    }

    if($errors == false && empty($missing))
    {
        header('location: parking/index.php');
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
            table, td {
                border: 1px solid black;
                padding: 3px;
            }
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
            <form action="" method="get">
                <table>
                    <tr>
                        <th>Start your Journey here</th>
                    </tr>
                    <tr>
                        <td>When are you leaving?</td>
                        <td><input type="date" name="dep_date" /></td>
                    </tr>
                    <tr>
                        <td>From: </td>
                        <td>
                            <select name="origin">
                                <?php foreach($airports as $ap) { echo makeOptionsAirport($ap['Code'], $ap['City']);} ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>To: </td>
                        <td><select name="destination">
                                <?php foreach($airports as $ap) { echo makeOptionsAirport($ap['Code'], $ap['City']);} ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>One way or return?</td>
                        <td><input type="radio" name="direction" value="One way"/>One way
                            <input type="radio" name="direction" value="Round trip" checked="checked"/>Round trip</td>
                    </tr>
                    <tr>
                        <td>When are you coming back?</td>
                        <td><input type="date" name="ret_date"/></td>
                    </tr>
                </table>
                <input type="submit" name="submit" value="Start booking" />
                <p><?php echo $message; ?></p>
            </form>
        </main>
    </body>
</html>
