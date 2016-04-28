<?php
require_once 'functions.php';
require_once 'arrays.php';
//initiate missing array for missing fields
$missing = [];

$first_name = '';
$last_name = '';
$vehicle_type = '';
$description = '';
$plate_province = '';
$license_plate = '';
$departure_date = '';
$return_date = '';

//license plate conflict
$license_conflict = false;
$license_message = '';

if(isset($_POST['submit']))
{
    $required = ['first_name',
    'last_name',
    'vehicle_type',
    'description',
    'plate_province',
    'license_plate',
    'departure_date',
    'return_date'];

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

    if(!$missing)
    {
        $dsn = 'mysql:host=localhost;dbname=newdb';
        $user = 'root';
        $password = '';
        try
        {
            $db = new PDO($dsn, $user, $password);
            echo "connected<br/>";

            //check for existing plate and license combination. If there are more than 0, do not insert into db.
            $check = "SELECT COUNT(*) FROM parking WHERE 'plate_province' = $plate_province AND 'license_plate' = $license_plate";
            $statement = $db->prepare($check);
            $statement->execute();
            $count = $statement->fetchAll();

            if($count == 0)
            {
                echo "No license plate conflict";
                $query = "INSERT INTO parking
                      (first_name, last_name, vehicle_type, description, plate_province,
                      license_plate, departure_date, return_date)
                      VALUES('$first_name', '$last_name', '$vehicle_type', '$description', '$plate_province', '$license_plate',
                      '$departure_date', '$return_date')";
                $db->exec($query);
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
                <p>
                    <label for="departure_date">Departure date: </label><input type="date" name="departure_date" id="departure_date" value="<?php echo $departure_date; ?>"/><span style="color:red;">*</span>
                    <?php if($missing && in_array('departure_date', $missing)) : ?>
                        <span style="color:red;">Departure date required</span>
                    <?php endif; ?>
                </p>
                <p>
                    <label for="return_date">Return date: </label><input type="date" name="return_date" id="return_date" value="<?php echo $return_date; ?>"/><span style="color:red;">*</span>
                    <?php if($missing && in_array('return_date', $missing)) : ?>
                        <span style="color:red;">Return date required</span>
                    <?php endif; ?>
                </p>

                <div><input type="submit" name="submit" id="submit"/></div>
            </form>
        </div>
    </main>
    </body>
</html>

