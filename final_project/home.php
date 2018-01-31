<?php
/*PHP Login and registration script */
require('inc/config.php');
require('inc/functions.php');

/*Check for authentication otherwise user will be redirects to index.php page.*/
if (!isset($_SESSION['UserData'])) {
    header("location:index.php");
    exit("Error, redirectering to login!");
}

require('include/header.php');
?>

<!-- TODO: da implementare qui: caricamento contenuti, carrello, stile (html) -->

<!-- Qui ce la home page del sito -->
<h1>SEI DENTRO <?= print_r($_SESSION['UserData'],true)?> </h1>
<p>Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout. </p>

<?php require('include/footer.php');?>