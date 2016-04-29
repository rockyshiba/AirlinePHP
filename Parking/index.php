<?php
session_start();
require_once 'functions.php';
require_once 'arrays.php';
require_once 'Models/database.php';
require_once 'Models/Parking.php';
require_once 'Models/Passengers.php';
require_once 'Models/Flights.php';
//initiate missing array for missing fields
$missing = [];
//var_dump($_SESSION);
var_dump($_POST);
$first_name = '';
$last_name = '';
$vehicle_type = '';
$description = '';
$plate_province = '';
$license_plate = '';
$departure_date = '';
$return_date = '';
$passport = '';
$passport_country = '';
$email = '';

//license plate conflict
$license_conflict = false;
$license_message = '';

if(isset($_POST['submit']))
{
    $required = ['first_name',
    'last_name',
    'vehicle_type',
        'passport_country',
        'passport',
    'description',
    'plate_province',
    'license_plate'];

    foreach($_POST as $key => $value)
    {
        $value = is_array($value) ? $value : trim($value);
        if(empty($value) && in_array($key, $required))
        {
            $missing[] = $key;
            $$key = '';
        }
        elseif(in_array($key, $required))
        {
            $$key = $value;
        }
    }

    foreach($_SESSION as $key => $value)
    {
        $$key =  $value;
    }

    if(!$missing)
    {
        $dsn = 'mysql:host=localhost;dbname=airlinephp';
        $user = 'root';
        $password = '';
        try
        {
            $db = new PDO($dsn, $user, $password);
            echo "connected<br/>";

            //this is old cold. use model for later version
            //check for existing plate and license combination. If there are more than 0, do not insert into db.
//            $check = "SELECT COUNT(*) FROM parking WHERE 'plate_province' = $plate_province AND 'license_plate' = $license_plate";
//            $statement = $db->prepare($check);
//            $statement->execute();
//            $count = $statement->fetchAll();
            $parking = new Parking();
            $find_plate = $parking->findLicense($license_plate, $plate_province);
            if($find_plate == 0)
            {
                echo "No license plate conflict";
                $passenger = new Passenger();
                $flight =  new Flight();

                $new_passenger = $passenger->addPassenger($first_name, $last_name, $passport, $passport_country, $email);
                $get_email = $passenger->getPassengerByEmail($email);
                //for the thank you page
                $_SESSION['new_p_id'] = $get_email['id'];
                //find a new passenger id to insert into the flight and parking tables for the newly created passenger
                $new_passenger_id = $get_email['id'];
                $new_flight = $flight->addFlight($new_passenger_id, $dep_date, $origin, $destination, $ret_date, $direction);
                $new_parking = $parking->addParking($new_passenger_id, $license_plate, $plate_province, $vehicle_type, $description);
                header('location: thankyou.php');
            }
            else
            {
                $license_conflict = true;
                //$license_message = "License plate and province already exists";
            }
        }
        catch(PDOException $e)
        {
            $error_message = $e->getMessage();
            echo $error_message;
            exit();
        }
    }

}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Parking</title>
        <link rel="stylesheet" href="index.css"/>
        <meta charset="utf-8">
        <script type="text/javascript">alert("This is the parking section. In the original flow of the website" +
                " before group disbandment, the user would first be asked if they were going to register a vehicle for" +
                " airport parking. In this scenario, it's assumed that the user wants to register for parking. Passenger " +
                "information is asked here for demo purposes only. In the final version of the website the user is asked" +
                " for this information beforehand in another page.");</script>
    </head>
    <body>
    <?php include 'D:\wamp\www\AirlinePHP\Styling\header.php'; ?>
    <main id="main">
        <div class="page-wrapper">
            <form action='' method="post">
                <?php if($license_conflict) : ?>
                    <span style="color: red;">License plate already exists. Please check province and plate number</span>
                <?php endif; ?>
                <p>
                    <label for="first_name">First Name: </label><input type="text" name="first_name" id="first_name" value=<?php echo "$first_name"; ?>><span style="color:red;">*</span>
                    <?php if($missing && in_array('first_name', $missing)) : ?>
                        <span style="color:red;">First name required</span>
                    <?php endif; ?>
                </p>
                <p>
                    <label for="last_name">Last Name: </label><input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>"/><span style="color:red;">*</span>
                    <?php if($missing && in_array('last_name', $missing)) : ?>
                        <span style="color:red;">Last name required</span>
                    <?php endif; ?>
                </p>
                <p>
                    <label for="email">Email: </label><input type="text" name="email" id="last_name" value="<?php echo $email; ?>"><span style="color: red;">*</span>
                    <?php if($missing && in_array('email', $missing)) :?>
                        <span style="color: red;">Email required</span>
                    <?php endif; ?>
                </p>
                <p>
                    <label for="passport">Passport: </label><input type="text" name="passport" id="passport" value="<?php echo $passport; ?>"/><span style="color: red;">*</span>
                    <?php if($missing && in_array('passport', $missing)) : ?>
                        <span style="color: red;">Passport required</span>
                    <?php endif; ?>
                </p>
                <p>
                    <label for="passport_country">Passport country: </label><input type="text" name="passport_country" value="<?php echo $passport_country; ?>"/><span style="color: red;">*</span>
                    <?php if($missing && in_array('passport_country', $missing)) : ?>
                        <span style="color: red;">Passport country required</span>
                    <?php endif; ?>
                </p>
                <p>
                    <label for="vehicle_type">Vehicle Type: </label><select name="vehicle_type"><?php make_list($vehicle_list); ?></select><span style="color:red;">*</span>
                    <?php if($missing && in_array('vehicle_type', $missing)) : ?>
                        <span style="color:red;">Vehicle type required </span>
                    <?php endif; ?>
                </p>
                <p>
                    <label for="description">Vehicle Description: </label><input type="text" name="description" id="description" value="<?php echo $description; ?>"/><span style="color:red;">*</span>
                    <?php if($missing && in_array('description', $missing)) : ?>
                        <span style="color:red;">Vehicle description required</span>
                    <?php endif; ?>
                </p>
                <p>
                    <label for="plate_province">License plate province: </label><select name="plate_province" id="plate_province"><?php make_list($province_list); ?></select><span style="color:red;">*</span>
                    <?php if($missing && in_array('plate_province', $missing)) : ?>
                        <span style="color:red;">License plate province required</span>
                    <?php endif; ?>
                </p>
                <p>
                    <label for="license_plate">License plate number: </label><input type="text" name="license_plate" id="LicensePlate" value="<?php echo $license_plate; ?>"/><span style="color:red;">*</span>
                    <?php if($missing && in_array('license_plate', $missing)) : ?>
                        <span style="color:red;">License plate number required</span>
                    <?php endif; ?>
                </p>

                <div><input type="submit" name="submit" id="submit"/></div>
            </form>
        </div>
    </main>
    </body>
</html>

