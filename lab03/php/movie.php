<!--
Autore: Lorenzo Tabasso, lorenzo.tabasso@edu.unito.it, matricola: 812499
Esercizio: lab03
Corso: TWeb 2017-2018
Curricola: Reti e Sistemi
Descrizione: Implementazione del codice PHP all'interno della pagina web Rancid Tomatoes.
Contenuto: Codice sorgente HTML e PHP del compito.
-->

<!DOCTYPE html>
<html lang="en">
	<head>
	  <title>Rancid Tomatoes</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" type="image/gif" rel="icon"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../css/movie.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
    <?php
      $movie=$_GET["film"]; # Variabile in cui inserisco la cartella tramite URL
      list ($titolo, $anno, $valutazione) = file("../$movie/info.txt",FILE_IGNORE_NEW_LINES);
    ?>

    <div id="banner">
			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes"/>
		</div> <!-- Tag banner chiuso -->

		<h1>
      <?= $titolo ?> (<?= $anno ?>)
    </h1>

    <div id="areaTotale">
      <div id="areaDestra">
    		<div>
    			<img src="../<?=$movie?>/overview.png" alt="general overview" />
    		</div>

    		<dl> <!-- Intestazione Overview-->

          <?php # recupero titoli in grassetto e testo sotto i titoli
            foreach (file("../{$movie}/overview.txt") as $file) {
              list ($dettaglio, $contenuto) = explode(":", $file);
          ?>

          <dt> <?= $dettaglio ?> </dt>
          <dd> <?= $contenuto ?> </dd>

          <?php
            } # foreach chiuso
          ?>

        </dl> <!-- Intestazione Overview chiusa-->
      </div> <!-- Tag areaDestra chiuso -->

      <div id="areaSinistra">
    		<div id="classifica">

          <?php # se la valutazione supera 60%, il film è FRESH, altrimenti è ROTTEN
            if($valutazione < 60){
              ?>
                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rottenbig.png" alt="Rotten" />
              <?php
            } # branch if chiuso
            else {
              ?>
                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/freshbig.png" alt="Fresh" />
              <?php
            } # branch else chiuso
          ?>

    			<?= $valutazione ?>% <!-- output della valutazione sullo schermo-->

    		</div> <!-- Tag classifica chiuso -->

        <?php # Inizio codice per l'area delle recensioni

          $reviews = glob("../{$movie}/review*.txt");
          $reviewCounter = counterMax10($reviews);
          $halfCounter = round($reviewCounter/2);

          # Funzione che controlla che il numero delle recensioni non superi 10,
          # se supera 10, il valore di ritorno viene opportunamente sostituito.
          function counterMax10 ($recensioni){
            $counter = count($recensioni);
            if($counter > 10){
              $counter = 10;
            }
            return $counter;
          }
        ?>

        <div id="recensioniSX">
          <!-- Codice PHP (di seguito) per la colonna sinistra delle recensioni-->
          <?php
            for($i=0; $i < $halfCounter; $i++){
              $singleReview = file($reviews[$i], FILE_IGNORE_NEW_LINES);
              ?>

                <p class="boxRecensione">
                  <?php
                    if($singleReview[1] == "FRESH"){
                      ?>
                        <img src="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" />
                      <?php
                    }
                    else {
                      ?>
                        <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
                      <?php
                    }
                  ?>
                  <q><?=$singleReview[0]?></q>
                </p>
                <p class="autore">
                  <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
                  <?=$singleReview[2]?> <br/>
                  <?=$singleReview[3]?>
                </p>
            <?php
            } # END FOR
          ?> <!-- END PHP area recensioniSX-->
        </div> <!-- Tag recensioniSX chiuso -->

        <div id="recensioniDX">
          <!-- Codice PHP (di seguito) per la colonna destra delle recensioni-->
          <?php
            for($j=$halfCounter; $j < $reviewCounter; $j++){
              $singleReview = file($reviews[$j], FILE_IGNORE_NEW_LINES);
              ?>

                <p class="boxRecensione">
                  <?php
                    if($singleReview[1] == "FRESH"){
                      ?>
                        <img src="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" />
                      <?php
                    }
                    else {
                      ?>
                        <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
                      <?php
                    }
                  ?>
                  <q><?=$singleReview[0]?></q>
                </p>
                <p class="autore">
                  <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
                  <?=$singleReview[2]?> <br/>
                  <?=$singleReview[3]?>
                </p>
            <?php
            } # END FOR
          ?> <!-- END PHP area recensioniDX-->
        </div> <!-- Tag recensioniDX chiuso -->
      </div> <!-- Tag areaSinistra chiuso -->

    <div id="numeroRecensioni">
      <p>(1-<?=$reviewCounter?>) of <?=$reviewCounter?></p>
    </div> <!-- Tag numeroRecensioni chiuso -->

  </div> <!-- Tag areaTotale chiuso -->

	<div id="validatore">
		<a href="ttp://validator.w3.org/check/referer"><img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/w3c-xhtml.png" alt="Validate HTML" /></a> <br />
		<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
	</div> <!-- Tag validatore chiuso -->

	</body> <!-- Tag body chiuso -->
</html> <!-- Tag html chiuso -->
