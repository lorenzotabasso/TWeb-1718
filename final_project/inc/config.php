<?php

# Session
if(!isset($_SESSION)){
    session_start();
} else {
    session_unset();
    session_destroy();
}

# Check connection
try {
    $db = new PDO("mysql:host=localhost;dbname=kinon", "test", "test");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # for error detection
} catch (PDOException $exception) {
    echo "config.php: Error with the DB, details below: ";
    $exception->getMessage();
}

?>