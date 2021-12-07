<?php 

define("HOST", "188.166.24.55");
define("DB", "jepsen5-buddybackpacker");
define("PORT", "3306");
define("LOGIN", "jepsen5-buddybackpacker");
define("PASSWORD", "o[ncR4Q>VIV9VvN1(HH1");

try {
    
    // We create a new instance of the class PDO
    $pdo = new PDO("mysql:host=".HOST.";dbname=".DB.";port=".PORT, LOGIN, PASSWORD);
    
    //We want any issues to throw an exception with details, instead of a silence or a simple warning
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(Exception $e) {
    // We intantiate an Exception object in $e so we can use methods within this object to display errors nicely
    echo $e->getMessage();
    exit;
}
    ?>