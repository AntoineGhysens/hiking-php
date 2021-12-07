<?php

require 'connexion.php';

if(!isset($_GET["search"])){ 
    try {
        $sql = 'SELECT *
                FROM hikes
                ORDER BY id DESC';
    
        $q = $db->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }
        $all_hikes = $q->fetchAll(PDO::FETCH_ASSOC);
} else {
    try {
        $sql =  "SELECT *
                 FROM hikes
                 WHERE hike_name
                 LIKE %{$_GET['search']}%";
    
        $q = $db->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }
        $searchresult = $q->fetchAll(PDO::FETCH_ASSOC);
}
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
        ?><ul> <?php
        
        foreach ($all_hikes as $item) { ?>
           <li><a href="./hike.php?id=<?php echo $item['id'] ?> "> <?php echo $item['hike_name']; ?></a> </li>
           <?php
        } ?>
        </ul> <?php
    } else { 
        foreach ($searchresult as $item) { ?>
            <li><a href="./hike.php?id=<?php echo $item['id'] ?> "> <?php echo $item['hike_name']; ?></a> </li>
            <?php
         }
    }
    ?>

</body>
</html>