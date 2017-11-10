<?php include("top.html"); ?>

<?php
/**
 * Author: Lorenzo Tabasso, st159210, st159210@educ.di.unito.it
 * Esercizio:
 * Corso: TWeb 2017-2018
 * Descrizione: la pagina che riceve i dati inviati da signup.php e che effettivamente registra l'account del nuovo utente.
 * Contenuto:
 */

/* Campi passati tramite il metodo POST a questa pagina,
da inserire nel file singles.txt
*/

$name = $_REQUEST["name"];
$gender = $_REQUEST["gender"];
$age = $_REQUEST["age"];
$personality = $_REQUEST["personality"];
$favoriteOS = $_REQUEST["favoriteOS"];
$minAge = $_REQUEST["minAge"];
$maxAge = $_REQUEST["maxAge"];

$newLine = "$name,$gender,$age,$personality,$favoriteOS,$minAge,$maxAge";
file_put_contents("singles.txt", $newLine, FILE_APPEND);


?>

<h1>Thank you!</h1>
<p>Welcome to NerdLuv, <?=$name?>!</p>
<p>Now <a href="matches.php">log in to see your matches!</a></p>

<?php include("bottom.html"); ?>