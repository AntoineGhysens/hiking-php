<?php 
include 'header.php';

//echo $_GET['id'];

require_once 'connexion.php';

if(!isset($_GET["search"])){ 
    try {
        $sql = 'SELECT *
                FROM hikes
                WHERE hike_id = {$_GET["id"]}';
    
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Could not connect to the database $dbname :" . $e->getMessage());
    }
        $all_hikes = $q->fetchAll(PDO::FETCH_ASSOC);
}


?>

</body>
</html>