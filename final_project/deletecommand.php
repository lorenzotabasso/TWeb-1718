<?php
session_start();

require('inc/config.php');
require('inc/functions.php');

if (isset($_GET['id'])) {
   $id=$_GET['id'];
   $sessionID = $_SESSION['UserData'];

   $query_deleteProductInCart = $db->query("DELETE FROM command WHERE id_user = '$sessionID' AND id_produit = '$id' AND statut != 'paid'");

   $_SESSION['item'] -= 1;

header('Location: ' . $_SERVER['HTTP_REFERER']);
}else {
  header('Location: sign');
}
?>
