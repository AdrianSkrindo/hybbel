<?php
session_start();
echo "session startet, for brukeren: ".$_SESSION['brukernavn'];


define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'hybelprosjekt');
$dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST; // Driver is set here

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo 'Error connecting to database: ' . $e->getMessage(); // Never do this in production
}
?>