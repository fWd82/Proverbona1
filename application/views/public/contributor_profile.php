<?php 
if ($this->session->userdata('login_id')) { 
    include(__DIR__ . '../../admin/admin_header.php'); 
}else{include('public_header.php');}
?> 
<div class="container">

  <?php
    $my_id = $this->session->userdata("login_id");
    if ($contributor_profile->user_id == $my_id) {
  ?>
    <h2>My Profile - (Contributor)</h2>
    <hr>
    <div class="text-right">
      <?= anchor("/contributors/edit_contributor/{$contributor_profile->user_name}", 'Edit My Contributor Profile', "class='btn btn-warning'");
    echo "</div>";
    
    }else{
      echo "<h2>Contributor Profile</h2>";
    } ?>
<hr>


<div class="row">
    <div class="col col-lg-8">
      <p> <?= "<strong> User ID:</strong> " . $contributor_profile->user_id . " | <strong> Member Since:</strong> " . date("D, d M Y", strtotime($contributor_profile->user_timestamp)); ?></p>
      <h3> <?= $contributor_profile->user_fullname; ?></h3> 
      <p> <?= "<strong> Email:</strong> " .               $contributor_profile->user_email; ?></p>
      <p> <?php echo "<strong> Username:</strong> " .     $contributor_profile->user_name; echo " | " . anchor(current_url() . '#', 'Dev Account'); echo " | " . anchor("user/user_profile/{$contributor_profile->user_name}", 'User Account'); ?></p>
      <p> <?= "<strong> Country:</strong> " .             $contributor_profile->user_country ; ?></p>
      <p> <?= "<strong> Title:</strong> " .               $contributor_profile->tm_title ; ?></p>
      <p> <?= "<strong> Description:</strong> " .         $contributor_profile->tm_description ; ?></p>
      
      <p> <?= "<strong> Organization:</strong> " .        $contributor_profile->tm_organization ; ?></p>
      <p> <?= "<strong> Organization Website :</strong> ".$contributor_profile->tm_org_website ; ?></p>
      <p> <?= "<strong> Organization Email :</strong> " . $contributor_profile->tm_org_email ; ?></p>
      
      <p> <?= "<strong> Personal Website :</strong> " .   $contributor_profile->tm_personal_website ; ?></p>
      <p> <?= "<strong> Personal Email :</strong> " .     $contributor_profile->tm_personal_email ; ?></p>
      <p> <?= "<strong> Facebook :</strong> " .           $contributor_profile->tm_facebook ; ?></p>
      <p> <?= "<strong> Twitter :</strong> " .            $contributor_profile->tm_twitter ; ?></p>
      <p> <?= "<strong> GitHub :</strong> " .             $contributor_profile->tm_github ; ?></p>
      <p> <?= "<strong> Other Link :</strong> " .         $contributor_profile->tm_other_link ; ?></p>
      <p> <?= "<strong>Last Updated:</strong> " .         date("D, d M Y", strtotime($contributor_profile->tm_last_updated)); ?></p>

      <br>
    </div>
    <div class="col col-lg-4">
      <img src=' <?= base_url("uploads/{$contributor_profile->tm_image_link}") ?>' width="200px" alt="">
    </div>

</div>
<div class="row">
  <div class="col col-lg-12">

<!-- ----------------- -->
  <?php
    $my_id = $this->session->userdata("login_id");
    if ($contributor_profile->user_id == $my_id) {
  ?>
  <h3>View Proverbona Profile</h3> 
  <p> User: <?= $contributor_profile->user_name ?> has contributed <?= $total_all_proverbs ?>  Proverbs </p>
  <?= anchor("user/user_profile/{$contributor_profile->user_name}", 'Profile', "class='btn btn-warning'"); 
  }
  ?>

<!-- ----------------- -->

  </div>  
</div>
<br>
<div class="row">
  <div class="col col-lg-12">
<!-- ----------------- -->
 
<!-- ----------------- -->

  </div>
</div>
<br><br>
 
</div>
<?php include('public_footer.php'); ?>