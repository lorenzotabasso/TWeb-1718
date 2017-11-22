<?php
/**
 * Authore: Lorenzo Tabasso, st159210, st159210@educ.di.unito.it
 * Esercizio:
 * Corso:
 * Descrizione: contiene codice di servizio comune che può essere usato da tutte le varie pagine del sito
 */

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

$query = "SELECT M.name, M.year 
              FROM movies M JOIN roles R ON M.id = R.movie_id JOIN actors A ON R.actor_id = A.id 
              WHERE A.first_name='$firstnamePerQuery%' AND A.last_name =$lastnamePerQuery
              ORDER BY M.year DESC;";