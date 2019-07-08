<?php 
if ($this->session->userdata('login_id')) { 
    include(__DIR__ . '../../admin/admin_header.php'); 
}else{include('public_header.php');}
?> 

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
    <div class="col col-lg-7">
      <p> <?= "<strong>Reference ID:</strong> " .             $reference_profile->reference_id . " | <strong>Added By:</strong> " .  anchor(base_url('user/user_profile/' . $reference_profile->user_name), $reference_profile->user_name ) . " | <strong> Added On:</strong> " . date("D, d M Y", strtotime($reference_profile->reference_timestamp)); ?></p>
      <p> <?= "<strong>Category:</strong> " .                 $reference_profile->reference_category; ?></p>
      <h3> <?=                  $reference_profile->reference_title; ?></h3> 
      <p> <?= "<strong>Author:</strong> " .                   $reference_profile->reference_author; ?></p>
      <p> <?= "<strong>Published Year:</strong> " .           $reference_profile->reference_published_year; ?></p>
      <p> <?= "<strong>Introduction:</strong> " .             $reference_profile->reference_introduction; ?></p>
      <p> <?= "<strong>Image Path:</strong> " .               $reference_profile->reference_img_path ; ?></p> 
      <p> <?= "<strong>Last Updated:</strong> " .             date("D, d M Y", strtotime($reference_profile->reference_last_updated)); ?></p>

      <br><br>
    </div>
    <div class="col col-lg-5 text-center">
    <?php if (! is_null($reference_profile->reference_img_path)): ?>
    <a href="<?= $reference_profile->reference_img_path ?>"> <img src="<?= $reference_profile->reference_img_path ?>" alt="<?= $reference_profile->reference_img_path ?>" width='250px'> </a>  
<?php endif; ?>
    </div>
  </div>
</div> 
 
<br>
<br>
<br>

<?php include('public_footer.php'); ?>