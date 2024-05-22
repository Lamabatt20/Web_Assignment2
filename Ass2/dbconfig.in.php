<?php
define('DBHOST', 'localhost');
define('DBNAME', 'clothingstore');
define('DBUSER', 'root');
define('DBPASS', '');
function db_connect($dbhost = DBHOST, $dbname = DBNAME , $username = DBUSER, $password = DBPASS){
    try {
        /*
        * Create the pdo object
        * host: is the host name
        * dbname: database name
        */

        $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);

        return $pdo;

    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
?>
