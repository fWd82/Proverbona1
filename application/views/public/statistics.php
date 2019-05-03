<?php 
if ($feedback_by = $this->session->userdata('login_id')) {
    // include('../admin/admin_header.php'); 
    require_once('application/views/admin/admin_header.php'); 
}else{include('public_header.php');}
?>

<div class="container"> 

<h2>Statistics</h2>
<hr>
<div class="row">
  <div class="col col-lg-12">
  
  <h4> <?= "Total No of Proverbs: " . count($total_no_of_proverbs); ?></h4>
    <ol>
        <li>English: <?= count($total_no_of_eng_proverbs); ?></li>
        <li>Urdu:    <?= count($total_no_of_ur_proverbs);  ?></li>
        <li>Pashto:  <?= count($total_no_of_ps_proverbs);  ?></li>
    </ol>
  <h4> <?= "Total No of Users: " . count($total_no_of_users);  ?></h4>
  <h4> <?= "Total No of Languages: "  .count($total_no_of_languages);  ?></h4>
  <h4> <?= "Reference Items: " . count($total_no_of_reference_items);  ?></h4>

  <?php $rating_given = 0; $total_rating = 0;
  foreach ($total_no_of_proverbs_stars as $total_no_of_proverbs_starss){
    $rating_given += $total_no_of_proverbs_starss->rating_proverb_rating_value; 
  } 
  $total_rating = count($total_no_of_proverbs_stars);
  $total_rating_divide = ($rating_given/$total_rating);
  ?>
<h4><?= "Total Rating proverbs: " . round($total_rating_divide, 1) . " (of total: " . $total_rating . ")"  ?></h4>
    
  <hr>
  <h4> <?= "Total Link - Non Linked: " ?></h4>
  <h4> <?= "Total Tags: " ?></h4>
  <h4> <?= "Rating: " ?></h4>
  <h4> <?= "Most Viewed Proverb: *" ?></h4>
<hr>
  <h4> <?= "Top User - Proverb Added: " ?></h4>
  <h4> <?= "Edits by you: " ?></h4>
  <h4> <?= "Total Countries: " ?></h4>

  </div>
</div>
<br><br><br>

<?php include('public_footer.php'); ?>