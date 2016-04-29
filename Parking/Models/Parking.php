<?php
class Parking
{
    //POST
    public function addParking($p_id, $license_plate, $plate_province, $vehicle_type, $description)
    {
        $db = Database::getDB();
        $sql = "INSERT INTO parking (p_id, license_plate, plate_province, vehicle_type, description)
                VALUES ('$p_id', '$license_plate', $plate_province, '$vehicle_type', '$description')";
        $result = $db->exec($sql);
        
        return $result;
    }
    
    //GET
    public function getParking()
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM parking";
        $results = $db->query($sql);
        
        $parking = $results->fetchAll();
        return $parking;
    }

    //GET
    public function findLicense($license_plate, $plate_province)
    {
        $db = Database::getDB();
        $sql = "SELECT COUNT(*) FROM parking WHERE license_plate = '$license_plate' AND plate_province = '$plate_province'";
        $statement = $db->prepare($sql);
        $statement->execute();
        $count = $statement->fetchAll();
        
        return $count;
    }
    
    //GET
    public function getParkingByPId($p_id)
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM parking WHERE p_id = '$p_id'";
        $result = $db->query($sql);
        
        $parking = $result->fetch();
        return $parking;
    }
    //need to add edit and delete
}