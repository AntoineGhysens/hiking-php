<?php 
include 'header.php';

require_once 'connexion.php';

if(isset($_GET["id"])){ 
    $myQuery = "{$_GET['id']}";
    try {
        $searchsql =  $pdo->prepare('SELECT * FROM hikes WHERE hike_id = ?');
        $searchsql->execute([$myQuery]);
    } catch (PDOException $e) {
        die("Could not connect to the database $DB :" . $e->getMessage());
    }
    $searchresult = $searchsql->fetch();
    
    ?> <strong>Name : <?php echo $searchresult["hike_name"];?></strong> <?php
    ?> <p>Distance : <?php echo $searchresult["distance"];?></p> <?php 
    ?> <p>Duration : <?php echo $searchresult["duration"];?></p> <?php  
    ?> <p>Difficulty : <?php echo $searchresult["hike_difficulty"];?></p> <?php 
    ?> <p>Elevation : <?php echo $searchresult["duration"];?></p> <?php 
   
    
    //
} else{
    echo "Go back to the main page";
}
?>



</body>
</html>