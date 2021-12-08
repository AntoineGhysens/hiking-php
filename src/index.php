<?php

require_once 'connexion.php';

if(!isset($_GET["search"])){ 
    try {
        $sql = 'SELECT *
                FROM hikes
                ORDER BY hike_id DESC';
    
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }
        $all_hikes = $q->fetchAll(PDO::FETCH_ASSOC);
} else {
    $myQuery = "%{$_GET['search']}%";
    try {
        $searchsql =  $pdo->prepare('SELECT * FROM hikes WHERE hike_name LIKE ?');
        $searchsql->execute([$myQuery]);
        
        
        /* $searchq = $pdo->query($searchsql);
        $searchq->setFetchMode(PDO::FETCH_ASSOC); */
    } catch (PDOException $e) {
        die("Could not connect to the database $DB :" . $e->getMessage());
    }
    /* $searchresult = $searchq->fetchAll(PDO::FETCH_ASSOC); */
    $searchresult = $searchsql->fetchAll();
}

include 'header.php';

    $arr = array(1 => "abc", 2 => "azerty"); ?>
    <ul>
        <?php
    if(!isset($_GET["search"])){
        
        foreach ($all_hikes as $item) { ?>
           <li><a href="./hike.php?id=<?php echo $item['hike_id'] ?> "> <?php echo $item['hike_name']; ?></a> </li>
           <?php
        } ?>
        <?php
    } elseif (isset($_GET["search"])) { 
        foreach ($searchresult as $searchitem) { 
            foreach ($searchitem as $searchitemproperty)?>
            <li><a href="./hike.php?id=<?php echo $searchitem["id"];?>"> 
            <h1><?php echo $searchitem["hike_name"]; ?></h1>
            </a></li>
            <?php
         }
        }
        ?>
        </ul>
        
    </body>
    </html>