<?php
$reviews = glob("review*.txt");
$counter = count($reviews);
$halfCounter = $counter/2;

for($i=0; $i < $counter; $i++){
if($i==0 or $i==$halfCounter){
?>
<div id="recensioniSX">
<?php
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
}
}
?>
