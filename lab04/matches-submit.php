<?php include("top.html"); ?>

<?php
/**
 * Authore: Lorenzo Tabasso, st159210, st159210@educ.di.unito.it
 * Esercizio: lab04
 * Corso: TWeb 2017-2018
 * Descrizione: la pagina che riceve i dati inviati da matches.php e che mostra chi sono le persone a lui/lei affini.
 */

# Campi passati tramite il metodo GET a questa pagina
$name = $_REQUEST["name"];
$lines = file("singles.txt");

#Funzione che dato il nome di uno User ci trova tutti i Nerd affini e li stampa a video
function findUser($name){
    global $name;
    global $lines;
    $user1 = array();

    foreach ($lines as $line){
        $user = explode(",", $line);
        if (strcmp($user[0],$name) == 0){
            $user1 = $user;
        }
    }

    foreach ($lines as $line){
        $user2 = explode(",", $line);
        if (confront($user1, $user2) == true) {
            ?>
            <div class="match">
                <img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/user.jpg">
                <div class="match">
                    <p><?=$user2[0]?></p>
                </div>
                <div>
                    <ul>
                        <li>
                            <strong>gender:</strong> <?=$user2[1]?>
                        </li>
                        <li>
                            <strong>age:</strong> <?=$user2[2]?>
                        </li>
                        <li>
                            <strong>personality:</strong> <?=$user2[3]?>
                        </li>
                        <li>
                            <strong>OS:</strong> <?=$user2[4]?>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
        }
    }
}

# Funzione che confronta 2 Nerd, ritorna TRUE se i 2 nerd sono compatibili, FALSE altrimenti.
function confront($user1, $user2){
    list($user1Name, $user1Gender, $user1Age, $user1Personality, $user1FavOS, $user1MinAge, $user1MaxAge) = $user1;
    list($user2Name, $user2Gender, $user2Age, $user2Personality, $user2FavOS, $user2MinAge, $user2MaxAge) = $user2;

    #confronto il genere, se diverso, entro nell'if, altrimenti ritorno FALSE;
    if ($user1Gender != $user2Gender){

        #confronto l'età compatibile, se tra il minimo e il massimo, entro nell'if, altrimenti, ritorno FALSE;
        if ($user1MinAge <= $user2Age && $user1MaxAge >= $user2Age){

            #confronto il Sistema operativo, se è lo stesso, entro nell'if, altrimenti, ritorno FALSE;
            if ($user1FavOS == $user2FavOS){

                #controllo se l'età dell'utente 2 rientra nelle preferenze dell'utente 1
                if (confrontPersonality($user1Personality, $user2Personality) == true){
                    return true;
                }
            }
        }
    }

    return false;
}

# Funzione che confronta 2 tipi di personalità. ritorna TRUE se almeno 1 lettera delle 4 della
# prima personalità è uguale alla lettera nella stessa posizione nelal seconda. FALSE alteimenti.
function confrontPersonality($personality1, $personality2){
    list($p1l1, $p1l2, $p1l3, $p1l4) = $personality1;
    list($p2l1, $p2l2, $p2l3, $p2l4) = $personality2;
    if($p1l1 == $p2l1) { return true; }
    else if($p1l2 == $p2l2) { return true; }
    else if($p1l3 == $p2l3) { return true; }
    else if($p1l4 == $p2l4) { return true; }
    else { return false; }
}

?>

<h1>Matches for <?=$name?></h1>
<?php
findUser($name);
?>

<?php include("bottom.html"); ?>