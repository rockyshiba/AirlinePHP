<?php
//get id
$id = $_POST['customer_id'];

//delete customer from database
require_once ('database.php');
$query = "DELETE FROM parking
          WHERE id = '$id'";
$db->exec($query);

header('location: index.php');
?>
