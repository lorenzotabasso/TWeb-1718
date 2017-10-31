<!--
Autore: Lorenzo Tabasso, lorenzo-tabasso@edu.unito.it, matricola: 812499
Esercizio: lab03
Corso: TWeb 2017-2018
Descrizione:
Contenuto:
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
    <?php $movie=$_GET["film"]; # Variabile in cui inserisco la cartella tramite URL
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
    			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/overview.png" alt="general overview" />
    		</div>

    		<dl>

          <?php
          foreach (file("../{$movie}/overview.txt") as $file) {
            list ($dettaglio, $contenuto) = explode(":", $file);
          ?>
          <dt> <?= $dettaglio ?> </dt>
          <dd> <?= $contenuto ?> </dd>
          <?php } ?>
      </div> <!-- Tag areaDestra chiuso -->

      <div id="areaSinistra">
    		<div id="classifica">
    			<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rottenbig.png" alt="Rotten" />
    			33%
    		</div> <!-- Tag classifica chiuso -->

        <div id="recensioniSX">
        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
        	  <q>Ditching the cheeky, self-aware wink that helped to excuse the concept's inherent corniness, the movie attempts to look polished and 'cool,' but the been-there animation can't compete with the then-cutting-edge puppetry of the 1990 live-action movie.</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Peter Debruge <br />
        		Variety
        	</p>

        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" />
        		<q>TMNT is a fun, action-filled adventure that will satisfy longtime fans and generate a legion of new ones.</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Todd Gilchrist <br />
        		IGN Movies
        	</p>

        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
        		<q>It stinks!</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Jay Sherman (unemployed)
        	</p>

        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
        		<q>The rubber suits are gone and they've been redone with fancy computer technology, but that hasn't stopped them from becoming dull.</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Joshua Tyler <br />
        		CinemaBlend.com
        	</p>

        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
        		<q>Just amazing!</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Dierre Brown<br />
        		The Verge
        	</p>
        </div> <!-- Tag recensioniSX chiuso -->

        <div id="recensioniDX">
        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
        		<q>The turtles themselves may look prettier, but are no smarter; torn irreparably from their countercultural roots, our superheroes on the half shell have been firmly co-opted by the industry their creators once sought to spoof.</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Jeannette Catsoulis <br />
        		New York Times
        	</p>

        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
        		<q>Impersonally animated and arbitrarily plotted, the story appears to have been made up as the filmmakers went along.</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Ed Gonzalez <br />
        		Slant Magazine
        	</p>

        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" />
        		<q>The striking use of image and motion allows each sequence to leave an impression. It's an accomplished restart to this franchise.</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Mark Palermo <br />
        		Coast (Halifax, Nova Scotia)
        	</p>

        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
        		<q>The script feels like it was computer generated. This mechanical presentation lacks the cheesy charm of the three live action films.</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Steve Rhodes <br />
        		Internet Reviews
        	</p>

        	<p class="boxRecensione">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
        		<q>It's horrible, I'm never gonna watch this movie again in my whole life.</q>
        	</p>
        	<p class="autore">
        		<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
        		Chris Friedman<br />
        		The Wall Street Journal
        	</p>
        </div> <!-- Tag recensioniDX chiuso -->
      </div> <!-- Tag areaSinistra chiuso -->

    <div id="numeroRecensioni">
      <p>(1-10) of 88</p>
    </div> <!-- Tag numeroRecensioni chiuso -->

  </div> <!-- Tag areaTotale chiuso -->

	<div id="validatore">
		<a href="ttp://validator.w3.org/check/referer"><img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/w3c-xhtml.png" alt="Validate HTML" /></a> <br />
		<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
	</div> <!-- Tag validatore chiuso -->

	</body> <!-- Tag body chiuso -->
</html> <!-- Tag html chiuso -->
