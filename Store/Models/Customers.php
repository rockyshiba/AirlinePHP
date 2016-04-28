<?php

class Customer
{
    //POST
    public function addCustomer($id, $name, $surname, $address, $city, $province, $postal_code, $email, $credit_card)
    {
        $db = Database::getDB();
        $sql = "INSERT INTO `airlinephp`.`customers` (`id`, `name`, `surname`, `address`, `city`, `province`, `postal_code`, 'email', 'credit_card') 
                VALUES (NULL, '$name', '$surname', '$address', '$city', '$province', '$postal_code', '$email', '$credit_card')";
        $result = $db->exec($sql);

        return $result;
    }

    //GET
    public function getCustomers()
    {
        //returns all customers
        $db = Database::getDB();
        $sql = "SELECT * FROM customers";
        $result = $db->query($sql);

        $customers_tolist = $result->fetchAll();
        return $customers_tolist;
    }

    //GET
    public function getCustomer($x)
    {
        //returns one customer from id
        $db = Database::getDB();
        $sql = "SELECT * FROM customers WHERE id = '$x'";
        $result = $db->query($sql);

        $customer_single = $result->fetch();
        return $customer_single;
    }
    
    //POST
    public function updateCustomer($id, $name, $surname, $address, $city, $province, $postal_code, $email, $credit_card)
    {
        //updates a single customer based on id
        $db = Database::getDB();
        $sql = "UPDATE customers
                SET name = '$name', surname = '$surname', address = '$address', city = '$city', province = '$province', postal_code = '$postal_code', email = '$email', credit_card = '$credit_card'
                WHERE id = '$id'";
                
        $row_count = $db->exec($sql);
        
        return $row_count;
    }
    
    //POST
    public function deleteCustomer($id)
    {
        $db = Database::getDB();
        $sql = "DELETE FROM customers WHERE id = '$id'";
        $row_count = $db->exec($sql);

        return $row_count;
    }

}