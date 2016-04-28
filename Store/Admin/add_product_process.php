<?php

if(isset($_POST['add_prod']))
{
    echo "button pressed";
}
else{
    header('location: ./index.php');
}