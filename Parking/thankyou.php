<?php
session_start();
var_dump($_SESSION);
require_once './Models/database.php';
require_once './Models/Flights.php';
require_once './Models/Parking.php';
require_once './Models/Passengers.php';

$flight = new Flight();
$parking = new Parking();
$passenger = new Passenger();

$thank_passenger = $passenger->getPassengerById($_SESSION['new_p_id']);
$parking_details = $parking->getParkingByPId($_SESSION['new_p_id']);
$flight_details = $flight->getFlightById($_SESSION['new_p_id']);

$fname = $thank_passenger['first_name'];
$lname = $thank_passenger['last_name'];
$passport = $thank_passenger['passport'];
$country = $thank_passenger['passport_country'];

$license_plate = $parking_details['license_plate'];
$plate_province = $parking_details['plate_province'];

$d_date = $flight_details['dep_date'];
$r_date = $flight_details['ret_date'];
$origin = $flight_details['origin'];
$destination = $flight_details['destination'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" >
</head>
<body>
    <header>

    </header>
    <main>
        <h2>Flight details</h2>
        <p>Name: <?php echo $fname . " " . $lname; ?></p>
        <p>Passport details:<?php echo $passport . " " . $country; ?></p>
        <p>Flight 1 details: <?php echo $origin . " " . $d_date; ?></p>
        <p>Flight 2 details: <?php echo $destination . " " . $r_date; ?></p>
        <p>Parking: <?php echo $plate_province . " " . $license_plate ?></p>
    </main>
    <footer>

    </footer>
</body>
</html>
