<?php include('public_header.php'); ?>

<div class="container"> 

<h2>Proverb Detail</h2>
<hr>
<div class="row">
  <div class="col col-lg-12">

<h3> <?= "Proverb ID: " .        $my_proverbs->proverb_id; ?> </h1>
<p> <?= "Proverb Statement: " .  $my_proverbs->proverb_statement; ?> </p>
<p> <?= "Proverb Tags: " .       $my_proverbs->proverb_tags; ?></p>
  </div>
</div>

<?php include('public_footer.php'); ?>
