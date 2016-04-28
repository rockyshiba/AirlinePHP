<?php
class Airport
{
    //POST
    public function addAirport($name, $city, $code)
    {
        $db = Database::getDB();
        $sql = "INSERT INTO airports (name, code, city)
                VALUES ('$name', '$city', '$code')";
        $result = $db->exec($sql);

        return $result;
    }

    //GET
    public function getAirports()
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM airports";
        $results = $db->query($sql);

        $airports = $results->fetchAll();
        return $airports;
    }

    //GET
    public function getAirport($id)
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM airports WHERE id = '$id'";
        $result = $db->query($sql);

        $airport = $result->fetch();
        return $airport;
    }

    //POST
    public function deleteAirport($id)
    {
        $db = Database::getDB();
        $sql = "DELETE FROM airports WHERE id = '$id'";
        $result = $db->exec($sql);

        return $result;
    }

    //POST
    public function editAirport($id, $Name, $City, $Code)
    {
        $db = Database::getDB();
        $sql = "UPDATE airports SET Name = '$Name', City = '$City', Code = '$Code' WHERE id = '$id'";
        $row_count = $db->exec($sql);

        return $row_count;
    }
}