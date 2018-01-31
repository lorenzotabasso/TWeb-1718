<?php
session_start(); # Session

# Check connection
try {
    $db = new PDO("mysql:host=localhost;dbname=progettotweb", "test", "test");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # for error detection
} catch (PDOException $exception) {
    echo "config.php: Error with the DB, details below: ";
    $exception->getMessage();
}

?>