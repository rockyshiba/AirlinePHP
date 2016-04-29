<?php
class Flight
{
    //POST
    public function addFlight($p_id, $dep_date, $origin, $destination, $ret_date, $direction)
    {
        $db = Database::getDB();
        $sql = "INSERT INTO flights (p_id, dep_date, origin, destination, ret_date, direction)
                VALUES ('$p_id', '$dep_date', '$origin', '$destination', '$ret_date', '$direction')";
        $result = $db->exec($sql);

        return $result;
    }

    //GET
    public function getFlightById($p_id)
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM flights WHERE p_id = '$p_id'";
        $result = $db->query($sql);

        $flight = $result->fetchAll();
        return $flight;
    }
}