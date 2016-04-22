<?php
require_once 'database.php';
require '../functions.php';
require '../arrays.php';

$missing =[];
$required = ['first_name',
    'last_name',
    'vehicle_type',
    'description',
    'plate_province',
    'license_plate',
    'departure_date',
    'return_date'];

$id = $_POST['customer_id'];

$sql = "SELECT * FROM parking WHERE id = '$id'";
$result = $db->query($sql);
$customer = $result->fetch();

if(isset($POST['update']))
{
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
        $query = "UPDATE parking 
                  SET first_name = '$first_name',
                      last_name = '$last_name',
                      vehicle_type = '$vehicle_type',
                      description = '$description',
                      plate_province = '$plate_province',
                      license_plate = '$license_plate',
                      departure_date = '$departure_date',
                      return_date = '$return_date'
                  WHERE id = '$id'";
        $db->exec($query);
    }
    
    header('index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer edi</title>
    <link rel="stylesheet" type="text/css" href="../parking_style.css"/>
    <script type="text/javascript" src="parking_admin.js"></script>
</head>
<body>
<div class="page-wrapper">
    <form action="edit_process.php" method="post">
        <div id="missing_message" style="color: red;"></div>
        <div>
            <label>Id: <?php echo $id; ?></label>
            <input type="hidden" name="id"  id="id" value="<?php echo $id; ?>"/>
        </div>

        <div>
            <label for="first_name">First name: </label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $customer["first_name"]; ?>" />
        </div>

        <div>
            <label for="last_name">Last name: </label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $customer["last_name"]; ?>" />
        </div>

        <div>
            <label for="vehicle_type">Vehicle type</label>
            <select name="vehicle_type" id="vehicle_type">
                <?php make_list($vehicle_list) ?>
            </select>
        </div>

        <div>
            <label for="description">Vehicle description</label>
            <input type="text" name="description" id="description" value="<?php echo $customer["description"]; ?>" />
        </div>

        <div>
            <label for="plate_province">Plate province</label>
            <select name="plate_province" id="plate_province">
                <?php make_list($province_list) ?>
            </select>
        </div>

        <div>
            <label for="license_plate">License plate</label>
            <input type="text" name="license_plate" id="license_plate" value="<?php echo $customer["license_plate"]; ?>" />
        </div>

        <div>
            <label for="departure_date">Departure date</label>
            <input type="date" name="departure_date" id="departure_date" value="<?php echo $customer["departure_date"]; ?>" />
        </div>

        <div>
            <label for="return_date">Return date</label>
            <input type="date" name="return_date" id="return_date" value="<?php echo $customer["return_date"]; ?>" />
        </div>
        <a href="index.php">Back to list</a> |
        <input type="submit" name="update"  id="update" value="Update"/>
    </form>
</div>
</body>
</html>