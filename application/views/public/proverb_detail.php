<?php include('public_header.php'); ?>

<div class="container"> 

<h2>Proverb Detail</h2>
<hr>
<div class="row">
  <div class="col col-lg-12">
  
  <p> <?= "<strong>Proverb ID:</strong> " .       $my_proverbs->proverb_id . " | <strong>Proverb Language:</strong> " .       $my_proverbs->proverb_lang ; ?></p>
  <h3> <?= $my_proverbs->proverb_statement; ?></h3> 
  <p> <?= "<strong>Added By:</strong> " .       $my_proverbs->proverb_addedby; ?></p>
  <p> <?= "<strong>Latin English:</strong> " .       $my_proverbs->proverb_latin_eng; ?></p>
  <p> <?= "<strong>Proverb Introduction:</strong> " .       $my_proverbs->proverb_introduction; ?></p>
  <p> <?= "<strong>Proverb English Meaning:</strong> " .       $my_proverbs->proverb_eng_meaning; ?></p>
  <p> <?= "<strong>Proverb History:</strong> " .       $my_proverbs->proverb_history ; ?></p>
  <p> <?= "<strong>Proverb Reference:</strong> " .       $my_proverbs->proverb_reference ; ?></p>
  <p> <?= "<strong>Proverb Tags:</strong> " .       $my_proverbs->proverb_tags; ?></p>
  <p> <?= "<strong>Date Added:</strong> " .       $my_proverbs->proverb_timestamp ; ?></p>

 

  </div>
</div>

<?php include('public_footer.php'); ?>
