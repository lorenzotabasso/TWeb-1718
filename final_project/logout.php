<?php
require('inc/config.php');

session_start(); # Starts the session
$user_name = $_SESSION['UserData'];
$query = $db->prepare("DELETE FROM command WHERE id_user ='$user_name' AND command.statut = 'ordered'");
$query -> execute();
session_unset();
session_destroy(); # Destroy started session
header("location:index.php");
exit;
?>
