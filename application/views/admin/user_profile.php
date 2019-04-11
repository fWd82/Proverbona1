<?php include('admin_header.php'); ?>

<div class="container"> 

<h2>User Profile</h2>
<hr>
<div class="row">
  <div class="col col-lg-12">
  
  <p> <?= "<strong>User ID:</strong> " . $user_profile->user_id . " | <strong> Member Since:</strong> " . date("D, d M Y", strtotime($user_profile->user_timestamp)); ?></p>
  <h3> <?= $user_profile->user_fullname; ?></h3> 
  <p> <?= "<strong>Email:</strong> " .                  $user_profile->user_email; ?></p>
  <p> <?= "<strong>Username:</strong> " .               $user_profile->user_name; ?></p>
  <p> <?= "<strong>Native Language:</strong> " .        $user_profile->user_nativelang; ?></p>
  <p> <?= "<strong>Other Languages that I know:</strong> " . $user_profile->user_otherlang; ?></p>
  <p> <?= "<strong>Country:</strong> " .                $user_profile->user_country ; ?></p>
  <p> <?= "<strong>Address:</strong> " .                $user_profile->user_address ; ?></p>
  <p> <?= "<strong>Department/Work Area:</strong> " .   $user_profile->user_department; ?></p>
  <p> <?= "<strong>Bio:</strong> " .                    $user_profile->user_bio ; ?></p>
  <br><br>
  
  </div>
</div>

<div class="row">
  <div class="col col-lg-12">
    <h3>User Contributed Proverb List</h3>
    <p> List of all Proverbs Added by this user</p>
  </div>
</div>
<br><br>



<?php include('admin_footer.php'); ?>
