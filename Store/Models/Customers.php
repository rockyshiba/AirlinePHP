<?php

class Customer
{
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

}