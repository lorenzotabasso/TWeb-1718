<?php include("top.html"); ?>

<?php
/**
 * Authore: Lorenzo Tabasso, st159210, st159210@educ.di.unito.it
 * Esercizio:
 * Corso:
 * Descrizione: la pagina che mostra i risultati della ricerca di tutti i film, dato un determinato attore
 */

try {
    # Connessione al database imdb_small su localhost
    $db = new PDO("mysql:dbname=imdb_small; host=localhost", "root", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    # Campi per le funzioni della pagina.
    $firstname = $_REQUEST["firstname"];
    $lastname = $_REQUEST["lastname"];

    # Campi per le funzioni del DB, "Puliscono" l'input per la query e lo inseriscono in una variabile.
    $firstnamePerQuery = $db->quote($firstname);
    $lastnamePerQuery = $db->quote($lastname);

    # Comando in SQL della query
    $query = "SELECT M.name, M.year 
              FROM actors A1 JOIN roles R1 ON A1.id=R1.actor_id JOIN	actors A2 JOIN roles R2 ON A2.id=R2.actor_id Join movies M ON R1.movie_id=M.id AND R2.movie_id=M.id 
              WHERE A1.first_name=$firstnamePerQuery AND A1.last_name=$lastnamePerQuery AND A2.first_name='Kevin' AND A2.last_name='Bacon';
              ORDER BY M.year DESC;";

    $rows = $db->query($query);

    printSearchAll();
}
catch (PDOException $ex) { ?>
    <p>Sorry, a database error occurred. Please try again later.</p>
    <p>(Error details: <?= $ex->getMessage() ?>)</p>
    <?php
}

# Funzione che cerca in quali film l'attore è comparso.
# Mostra i film sullo schermo nell'ordine specificato dalla query.
function printSearchAll (){
    global $rows;
    ?>
    <table>
        <tr><td>#</td><td>Title:</td><td>Year</td></tr>
        <?php
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
?>



<?php include("bottom.html"); ?>
