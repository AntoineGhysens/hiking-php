<?php 
include 'header.php';

echo $_GET['id'];

require_once 'connexion.php';

if(isset($_GET["id"])){ 
    $myQuery = "%{$_GET['id']}%";
    try {
        $searchsql =  $pdo->prepare('SELECT * FROM hikes WHERE hike_id LIKE ?');
        $searchsql->execute([$myQuery]);
        
        
        /* $searchq = $pdo->query($searchsql);
        $searchq->setFetchMode(PDO::FETCH_ASSOC); */
    } catch (PDOException $e) {
        die("Could not connect to the database $DB :" . $e->getMessage());
    }
    /* $searchresult = $searchq->fetchAll(PDO::FETCH_ASSOC); */
    $searchresult = $searchsql->fetchAll();
}

echo $item['hike_name']; ?>


</body>
</html>