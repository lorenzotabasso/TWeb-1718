<?php
/**
 * Authore: Lorenzo Tabasso, st159210, st159210@educ.di.unito.it
 * Esercizio:
 * Corso:
 * Descrizione: la pagina che mostra i risultati della ricerca di tutti i film, dato un determinato attore
 */

try {
    # connect to world database on local server
    $db = new PDO("mysql:dbname=imdb_small; host=localhost", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $firstname = $_REQUEST["firstname"];
    $firstnamePerQuery = $db->quote($firstname);
    $lastname = $_REQUEST["lastname"];
    $lastnamePerQuery = $db->quote($lastname);

    $query = "SELECT M.name, M.year 
              FROM movies M JOIN roles R ON M.id = R.movie_id JOIN actors A ON R.actor_id = A.id 
              WHERE A.first_name=$firstnamePerQuery AND A.last_name =$lastnamePerQuery
              ORDER BY M.year DESC;";

    $rows = $db->query($query);

    printSearchAll();
} catch (PDOException $ex) { ?>
    <p>Sorry, a database error occurred. Please try again later.</p>
    <p>(Error details: <?= $ex->getMessage() ?>)</p>
    <?php
}

function printSearchAll (){
    ?>
    <table>
        <tr><td>#</td><td>Title:</td><td>Year</td></tr>
    <?php
    global $rows;
    $counter = 0;
    foreach ($rows as $row){
        ?>
            <tr><td><?=$counter?></td><td><?=$row[0]?></td><td><?=$row[1]?></td></tr>
        <?php
        $counter++;
    }
    ?>
    </table>
    <?php
}
