<?php include('admin_header.php'); ?>
<div class="container"> 
  <h2>Reference Profile</h2>
  <hr>
  <?php // Show Edit Button only if user if logged in. Otherwise hide it.
      if($this->session->userdata('login_id')){
      echo '<div class="text-right">';
      echo anchor("reference/edit_reference/{$reference_profile->reference_id}", 'Edit reference', "class='btn btn-warning'"); 
      echo '</div>';
  }
  ?>

  <div class="row">
    <div class="col col-lg-12">
    
      <p> <?= "<strong>Reference ID:</strong> " .             $reference_profile->reference_id . " | <strong> Added On:</strong> " . date("D, d M Y", strtotime($reference_profile->reference_timestamp)); ?></p>
      <p> <?= "<strong>Category:</strong> " .                 $reference_profile->reference_category; ?></p>
      <h3> <?=                  $reference_profile->reference_title; ?></h3> 
      <p> <?= "<strong>Author:</strong> " .                   $reference_profile->reference_author; ?></p>
      <p> <?= "<strong>Published Year:</strong> " .           $reference_profile->reference_published_year; ?></p>
      <p> <?= "<strong>Introduction:</strong> " .             $reference_profile->reference_introduction; ?></p>
      <p> <?= "<strong>Image Path:</strong> " .               $reference_profile->reference_img_path ; ?></p> 
      <br>
      <br>

    </div>
  </div>
</div> 
 
<br>
<br>
<br>

<?php include('admin_footer.php'); ?>