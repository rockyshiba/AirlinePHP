<?php
function make_list($list)
{
    foreach($list as $item)
    {
        echo "<option value='". $item . "'>$item</option>";
    }
}