<?php 
require_once 'connexion.php';

if(isset($_GET["id"])){ 
    $myQuery = "{$_GET['id']}";
    try {
        $searchsql =  $pdo->prepare('SELECT * FROM hikes WHERE hike_id = ?');
        $searchsql->execute([$myQuery]);
    } catch (PDOException $e) {
        die("Could not connect to the database $DB :" . $e->getMessage());
    }
    $searchresult = $searchsql->fetch(); ?>

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
        <?php include 'header.php'; ?>
        <main> <?php
    
    ?> <strong>Name : <?php echo $searchresult["hike_name"];?></strong> <?php
    ?> <p>Distance : <?php echo $searchresult["distance"];?></p> <?php 
    ?> <p>Duration : <?php echo $searchresult["duration"];?></p> <?php  
    ?> <p>Difficulty : <?php echo $searchresult["hike_difficulty"];?></p> <?php 
    ?> <p>Elevation : <?php echo $searchresult["duration"];?></p>
    <a href="https://placeholder.com"><img class="hikes_pictures" src="https://via.placeholder.com/160x90"></a> <?php 
   
   
   //
} else{
    echo "Go back to the main page";
}
?>


</main>
</body>
</html>