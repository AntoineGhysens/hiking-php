<?php 
include 'header.php';

echo $_GET['id'];

require_once 'connexion.php';

if(isset($_GET["id"])){ 
    $myQuery = "{$_GET['id']}";
    try {
        $searchsql =  $pdo->prepare('SELECT * FROM hikes WHERE hike_id = ?');
        $searchsql->execute([$myQuery]);
    } catch (PDOException $e) {
        die("Could not connect to the database $DB :" . $e->getMessage());
    }
    $searchresult = $searchsql->fetchAll();
    print_r($searchresult);
}
?>


</body>
</html>