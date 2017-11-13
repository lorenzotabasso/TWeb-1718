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

// 1° VERSIONE
//$FILE = file_get_contents("singles.txt");
//$righeFile = explode("\n", $FILE);
//
//foreach($righeFile as $riga => $dato)
//{
//    //get riga dato
//    $datoNellaRiga = explode(',', $dato);
//    /* 0 = name
//     * 1 = gender
//     * 2 = age
//     * 3 = personality
//     * 4 = favoriteOS
//     * 5 = minAge
//     * 6 = maxAge
//     *
//     * $datoNellaRiga[0] = "Ada Lovelace"
//     */
//
//    $info[$riga]['nome'] = $datoNellaRiga[0];
//    $info[$riga]['gender'] = $datoNellaRiga[1];
//    $info[$riga]['age'] = $datoNellaRiga[2];
//    $info[$riga]['personality'] = $datoNellaRiga[3];
//    $info[$riga]['favoriteOS'] = $datoNellaRiga[4];
//    $info[$riga]['minAge'] = $datoNellaRiga[5];
//    $info[$riga]['maxAge'] = $datoNellaRiga[6];
//
//    //display dato
//    #echo "riga".$riga .'Name: '.$info[$riga]['name'].'<br />';
//    #echo [$riga]['name'];
//    #echo $datoNellaRiga[0];
//}

// VERSIONE ANDRE
//$user=array();
//
//foreach($line as $nerd) {
//    $user = explode(",", $nerd);
//
//    if($user[0]==$name) {
//        break;
//    }
//
//
//    //display dato
//    #echo "riga".$riga .'Name: '.$info[$riga]['name'].'<br />';
//    #echo [$riga]['name'];
//    #echo $datoNellaRiga[0];
//}

$lines = file("singles.txt");
foreach ($lines as $line) {
    $user1 = explode(",", $line);
    $name1 = $user1[0];
    if($name == $name1){
        $gender = $user1[1];
        $age = $user1[2];
        $personality = $user1[3];
        $favoriteOS = $user1[4];
        $minAge = $user1[5];
        $maxAge = $user1[6];
    }
}

foreach ($lines as $line) {
    $user2 = explode(",", $line);
    $name2 = $user2[0];
    $gender2 = $user2[1];
    $age2 = $user2[2];
    $personality2 = $user2[3];
    $favoriteOS2 = $user2[4];
    $minAge2 = $user2[5];
    $maxAge2 = $user2[6];

    if (confront($user1,$user2)){

    }
}

function confront($user1, $user2){
    /* 0 = name
     * 1 = gender
     * 2 = age
     * 3 = personality
     * 4 = favoriteOS
     * 5 = minAge
     * 6 = maxAge
     */
    $result = 0; #numero parametri true totali = 6!!

    #confronto il nome
    if($user1[0] != $user2[0]){
        $result++;
    }

    #confronto genere
    else if ($user1[1] != $user2[1]){
        $result++;
    }

    #confronto la personalità
    else if ($user1[3] == $user2[3]){
        $result++;
    }

    #confronto il favoriteOS
    else if ($user1[4] != $user2[4]){
        $result++;
    }

    #controllo se l'età dell'utente 2 rientra nelle preferenze dell'utente 1
    else if ($user1[5] <= $user2[2] && $user1[6] >= $user2[2]){
        $result++;
    }

    #confronto finale, se tutto va bene.
    else if ($result == 6){
        return true;
    }
    else {
        return false;
    }
}

?>

<h1>Matches for <?=$name?></h1>
<?php
#echo $datoNellaRiga[0];
?>

<?php include("bottom.html"); ?>