<?php
require_once 'Index_Models/database.php';
require_once 'Index_Models/Airports.php';

$message = "";
$airport = new Airport();
$airports = $airport->getAirports();

if(isset($_POST['edit']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $code = $_POST['code'];

    //got too tired at this point
    if(strlen($city) == 0 || strlen($code) == 0)
    {
        $message = "<span style='color: red;'>City and/or code required</span>";
        header("location: Admin.php?edit=1&id=$id");
    }
    else
    {
        $edit_airport = $airport->editAirport($id, $name, $city, $code);
        $message = "<span style='color: green;'>Airport updated</span>";
    }

}

if(isset($_POST['delete']))
{
    $id = $_POST['id'];

    $delete_airport = $airport->deleteAirport($id);
    $message = "<span style='color: green;'>Airport removed</span>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Homepage admin</title>
        <link rel="stylesheet" href="Styling/css/admin.css" type="text/css"/>
        <style>
            main {
                max-width: 980px;
                margin: 0 auto;
            }
            footer {
                position: relative;
                bottom: 0;
                width: 100%;
            }
            th, tr, td {
                border: 1px solid black;
                padding: 3px;
            }
        </style>
        <script type="text/css" src="Styling/js/index.js"></script>
    </head>
    <body>
        <?php include './Styling/adminHeader.php'?>
        <main>
            <h4><a href="add_airport.php">Add an airport</a></h4>
            <table>
                <tr>
                    <th>Airport name</th><th>City</th><th>Code</th>
                </tr>
                <?php foreach($airports as $a) : ?>
                <tr>
                    <td><?php echo $a['Name']?></td><td><?php echo $a['City'] ?></td><td><?php echo $a['Code']; ?></td>
                    <td>
                        <form action="./Admin.php?edit=1" method="get">
                            <input type="hidden" name="id" value="<?php echo $a['id']; ?>" />
                            <input type="submit" name="edit" value="Edit" />
                        </form>
                    </td>
                    <td>
                        <form action="./Admin.php?delete=1" method="get">
                            <input type="hidden" name="id" value="<?php echo $a['id']; ?>" />
                            <input type="submit" name="delete" Value="Delete"/>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(isset($_GET['edit'])) : ?>
                    <?php
                        $airport_sing = $airport->getAirport($_GET['id']);
                        foreach($airport_sing as $key => $value)
                        {
                            $$key = $value;
                        }
                        $edit_airport = $airport->editAirport($_GET['id'], $Name, $City, $Code);

                    ?>
                    <form action="./Admin.php" method="get">
                    <table>
                        <tr>
                            <th>Id</th><th>Name</th><th>City</th><th>Code</th>
                        </tr>
                        <tr>
                            <td><?php echo $airport_sing['id']; ?></td>
                            <td><input type="text" name="Name" value="<?php echo $airport_sing['Name']; ?>"</td>
                            <td><input type="text" name="City" value="<?php echo $airport_sing['City']; ?>"</td>
                            <td><input type="text" name="Code" value="<?php echo $airport_sing['Code']; ?>"</td>
                        </tr>
                    </table>
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                        <input type="submit" name="edit" value="Edit"/><p><?php echo $message ?></p>
                    </form>
                <?php elseif(isset($_GET['delete'])) : ?>
                    <?php
                        $airport_sing = $airport->getAirport($_GET['id']);
                        foreach($airport_sing as $key => $value)
                        {
                            $$key = $value;
                        }

                        $delete_airport = $airport->deleteAirport($id);
                    ?>
                    <form action="admin.php" method="post">
                    <table>
                        <tr>
                            <th>Id</th><th>Name</th><th>City</th><th>Code</th>
                        </tr>
                        <tr>
                            <td><?php echo $airport_sing['id']; ?></td>
                            <td><?php echo $airport_sing['Name']; ?></td>
                            <td><?php echo $airport_sing['City']; ?></td>
                            <td><?php echo $airport_sing['Code']; ?></td>
                        </tr>
                    </table>
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                        <input type="submit" name="delete" value="Delete" /><p><a href="Admin.php">Return to admin</a></p>
                    </form>
                <?php endif; ?>
            </table>
        </main>
        <?php include './Styling/adminFooter.php'?>
    </body>
</html>
