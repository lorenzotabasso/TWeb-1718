<?php include("top.html"); ?>

<?php
/**
 * Authore: Lorenzo Tabasso, st159210, st159210@educ.di.unito.it
 * Esercizio: lab04
 * Corso: TWeb 2017-2018
 * Descrizione: una pagina con un form per un utente già registrato che ritorna sul sito e vuole verificare chi sono le persone a lui/lei affini.
 */

?>

<form action="matches-submit.php" method="get" enctype="multipart/form-data">
    <fieldset>
        <legend>Returning User:</legend>
        <label>
            <strong>Name:</strong> <input type="text" name="name" size="16">
        </label>
        <input type="submit" value="View My Matches">
    </fieldset>
</form>

<?php include("bottom.html"); ?>