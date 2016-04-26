<?php
require_once 'database.php';
require '../functions.php';
require '../arrays.php';

$id = $_POST['id'];
$missing=[];
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
    else
    {
        echo "No entry updated. Check values";

    }

header("location: ./index.php");

