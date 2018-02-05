<?php
require('inc/config.php');

session_start(); /* Starts the session */
$username = $_SESSION['UserData'];
$onlineUsers = $db->prepare("DELETE FROM command WHERE id_user ='$username' AND command.statut = 'ordered'");
$onlineUsers -> execute();
session_unset();
session_destroy(); /* Destroy started session */
header("location:index.php");
exit;
?>
