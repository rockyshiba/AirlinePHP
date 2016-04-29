<?php
class Passenger
{
    //POST
    public function addPassenger($first_name, $last_name, $passport, $passport_country, $email)
    {
        $db = Database::getDB();
        $sql = "INSERT INTO passengers (first_name, last_name, passport, passport_country, email)
                VALUES ('$first_name', '$last_name', '$passport', '$passport_country', '$email')";
        $result = $db->exec($sql);
        
        return $result;
    }
    
    //GET
    public function getPassengerByEmail($email)
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM passengers WHERE email  = '$email'";
        $result = $db->query($sql);
        
        $passenger = $result->fetch();
        return $passenger;
    }
    
    //GET
    public function getPassengerById($id)
    {
        $db = Database::getDB();
        $sql = "SELECT * FROM passengers WHERE id = '$id'";
        $result = $db->query($sql);
        
        $passenger = $result->fetch();
        return $passenger;
    }
}