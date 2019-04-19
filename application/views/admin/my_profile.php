<?php include('admin_header.php'); ?>

<div class="container"> 

<h2>My Profile</h2>
<hr>

<div class="text-right">
<?php
  echo anchor('home/edit_my_profile', 'Edit My Profile', "class='btn btn-warning'");
?>
</div>

<div class="row">
  


<div class="col col-lg-12">
  <p> <?= "<strong>User ID:</strong> " . $my_profile->user_id . " | <strong> Member Since:</strong> " . date("D, d M Y", strtotime($my_profile->user_timestamp)); ?></p>
  <h3> <?= $my_profile->user_fullname; ?></h3> 
  <p> <?= "<strong>Email:</strong> " .                  $my_profile->user_email; ?></p>
  <p> <?= "<strong>Username:</strong> " .               $my_profile->user_name; ?></p>
  <p> <?= "<strong>Native Language:</strong> " .        $my_profile->lang_name; ?></p>
  <p> <?= "<strong>Other Languages that I know:</strong> " . $my_profile->user_otherlang; ?></p>
  <p> <?= "<strong>Country:</strong> " .                $my_profile->user_country ; ?></p>
  <p> <?= "<strong>Address:</strong> " .                $my_profile->user_address ; ?></p>
  <p> <?= "<strong>Department/Work Area:</strong> " .   $my_profile->user_department; ?></p>
  <p> <?= "<strong>Bio:</strong> " .                    $my_profile->user_bio ; ?></p>
  <br><br>
  
  </div>
</div>
<div class="row">
  <div class="col col-lg-12">
    <h3>My Favorite Proverb List</h3>
    <p> List of all Favorites</p>
  </div>
</div>

<div class="row">
  <div class="col col-lg-12">
    <h3>My Contributed Proverb List</h3>
    <p> List of all Proverbs Added by me</p>
  </div>
</div>
<br><br>



<?php include('admin_footer.php'); ?>
