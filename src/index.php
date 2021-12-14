<?php

function getDifficulty($param){
    if($param == 1){
        return 'Easy';
    }
    elseif($param == 2){
        return 'Medium';
    }
    elseif($param == 3){
        return 'Hard';
    }
    elseif($param == 4){
        return 'Very hard';
    }
    elseif($param == 5){
        return 'Extreme';
    }
};

function itemContent($dist, $difficulty){
    return $dist . ' km - ' . getDifficulty($difficulty) . ' by author';
};

require_once 'connexion.php';

if(!isset($_GET["search"])){ 
    try {
        #$sql = 'SELECT * FROM hikes ORDER BY hike_name ASC'; # sort by alphabetic order
        $sql = 'SELECT * FROM hikes ORDER BY hike_id DESC'; # sort by newest
    
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }
    $all_hikes = $q->fetchAll(PDO::FETCH_ASSOC);
} else {
    $myQuery = "%{$_GET['search']}%";
    try {
        # $searchsql =  $pdo->prepare('SELECT * FROM hikes WHERE hike_name LIKE ?');
        $searchsql =  $pdo->prepare('SELECT * FROM hikes WHERE hike_name LIKE ? ORDER BY hike_name ASC');
        $searchsql->execute([$myQuery]);
    } catch (PDOException $e) {
        die("Could not connect to the database $DB :" . $e->getMessage());
    }
    $searchresult = $searchsql->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hiku</title>
        <link rel="stylesheet" href="./style/style.css">
        <link rel="icon" type="image/x-icon" href="./favicon.ico?v1">
    </head>
    <body>
<?php
include 'header.php';

    $arr = array(1 => "abc", 2 => "azerty"); ?>
    <ul>
        <?php
    if(!isset($_GET["search"])){
        
        foreach ($all_hikes as $item) { ?>
           <li><a href="./hike.php?id=<?php echo $item['hike_id'] ?> "> <?php echo $item['hike_name']; ?></a>
           <p><?php echo itemContent($item['distance'], $item['hike_difficulty']); ?></p></li>
           <?php
        } ?>
        <?php
    } elseif (isset($_GET["search"])) { 
        foreach ($searchresult as $searchitem) { ?>
            <li><a href="./hike.php?id=<?php echo $searchitem["hike_id"];?>"> <?php echo $searchitem["hike_name"]; ?></a>
            <p><?php echo itemContent($item['distance'], $item['hike_difficulty']); ?></p></li> 
            <?php
       }
    }
        ?>
        </ul>
        
    </body>
    </html>