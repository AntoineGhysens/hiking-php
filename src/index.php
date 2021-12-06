<?php

require_once 'connexion.php';

try {
    

    $sql = 'SELECT hike_name
            FROM hikes';

    $q = $db->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
$all_hikes = $q->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiku</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="index.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">search</button>
    </form>
    <?php 
    $arr = array(1 => "abc", 2 => "azerty");
    if(!isset($_GET["search"])){
        echo "there is no search";
        //echo $q;
        ?><ul> <?php
        
        foreach ($all_hikes as $item) { ?>
           <li> <?php echo $item; ?> </li>
           <?php
        } ?>
        </ul> <?php
    } else { 
        
    }
    ?>

</body>
</html>