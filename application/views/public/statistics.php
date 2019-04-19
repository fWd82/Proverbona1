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
  
  <h4> <?= "Total No of Proverbs: " .count($total_no_of_proverbs);  ?></h4>
    <ol>
        <li>English: *</li>
        <li>Urdu: *</li>
        <li>Pashto: *</li>
    </ol>
  <h4> <?= "Total No of Users: " .count($total_no_of_users);  ?></h4>
  <h4> <?= "Total No of Languages: "  .count($total_no_of_languages);  ?></h4>
<hr>
  
  <h4> <?= "Total Link - Non Linked: " ?></h4>
  <h4> <?= "Total Tags: " ?></h4>
  <h4> <?= "Rating: " ?></h4>
  <h4> <?= "Reference Items: " ?></h4>
  <h4> <?= "Most Viewed Proverb: *" ?></h4>
<hr>
  <h4> <?= "Top User - Proverb Added: " ?></h4>
  <h4> <?= "Edits by you: " ?></h4>
  <h4> <?= "Total Countries: " ?></h4>

   

 

  </div>
</div>
<br><br><br>

<?php include('public_footer.php'); ?>
