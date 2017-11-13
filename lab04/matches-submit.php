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

$user=array();

foreach($line as $nerd) {
    $user = explode(",", $nerd);

    if($user[0]==$name) {
        break;
    }


    //display dato
    #echo "riga".$riga .'Name: '.$info[$riga]['name'].'<br />';
    #echo [$riga]['name'];
    #echo $datoNellaRiga[0];
}

?>

<h1>Matches for <?=$name?></h1>
<?php
#echo $datoNellaRiga[0];
?>

<?php include("bottom.html"); ?>