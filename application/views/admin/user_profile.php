<?php include('admin_header.php'); ?>

<div class="container">

    <?php
      $my_id = $this->session->userdata("login_id");
      if ($user_profile->user_id == $my_id) {
    ?>
    <h2>My Profile</h2>
    <hr>

    <div class="text-right">
      <?= anchor('user/edit_my_profile', 'Edit My Profile', "class='btn btn-warning'");
    echo "</div>";
    }else{
      echo "<h2>User Profile</h2>";
      echo '<div class="text-right">';
      if($this->session->userdata('login_usertype') == "admin"){
        echo anchor("admin/temp_ban_user/{$user_profile->user_name}", 'Ban This User', "class='btn btn-warning'"); 
      }
      echo "</div>";
    } ?>
<hr>
 
 
<div class="row">
  <div class="col col-lg-12">
  <p> <?= "<strong>User ID:</strong> " . $user_profile->user_id . " | <strong> Member Since:</strong> " . date("D, d M Y", strtotime($user_profile->user_timestamp)); ?></p>
  <h3> <?= $user_profile->user_fullname; ?></h3> 
  <p> <?= "<strong>Email:</strong> " .                  $user_profile->user_email; ?></p>
  <p> <?= "<strong>Username:</strong> " .               $user_profile->user_name; ?></p>
  <p> <?= "<strong>Native Language:</strong> " .        $user_profile->lang_name; ?></p>
  <p> <?= "<strong>Other Languages that I know:</strong> " . $user_profile->user_otherlang; ?></p>
  <p> <?= "<strong>Country:</strong> " .                $user_profile->user_country ; ?></p>
  <p> <?= "<strong>Address:</strong> " .                $user_profile->user_address ; ?></p>
  <p> <?= "<strong>Department/Work Area:</strong> " .   htmlspecialchars($user_profile->user_department); ?></p>
  <p> <?= "<strong>Bio:</strong> " .                    htmlspecialchars($user_profile->user_bio); ?></p>
  <p> <?= "<strong>Last Updated:</strong> " .           date("D, d M Y", strtotime($user_profile->user_last_updated)); ?></p>

  <br>
  
  </div>
</div>
<div class="row">
  <div class="col col-lg-12">

<!-- ----------------- -->
  <?php
    $my_id = $this->session->userdata("login_id");
    if ($user_profile->user_id == $my_id) {
  ?>
  <h3>My Favorite Proverb List</h3>
  <h5> Total Favorite Proverb: <?= $total_all_fav_proverbs; ?></h5> 
  <p> List of all Favorites</p>
  <?= anchor("favorites/", 'My Favorites', "class='btn btn-warning'"); 
  }
  ?>

<!-- ----------------- -->

  </div>  
</div>
<br>
<div class="row">
  <div class="col col-lg-12">
<!-- ----------------- -->
<?php
    $my_id = $this->session->userdata("login_id");
    if ($user_profile->user_id == $my_id) {
  ?>
    <h3>My Contributed Proverb List</h3>
    <h5> Total Proverb Added: <?= $total_all_proverbs; ?></h5> 
    <p> List of all Proverbs Added by me</p>
    <?= anchor("user/contribution/{$user_profile->user_name}", 'Contribution', "class='btn btn-warning'"); 
    }else{?>
    <h3>User Contributed Proverb List</h3>
    <h5> Total Proverb Added: <?= $total_all_proverbs; ?></h5> 
    <p> List of all Proverbs Added by this user</p>
    <?= anchor("user/contribution/{$user_profile->user_name}", 'Contribution', "class='btn btn-warning'"); 
    }
    ?>

<!-- ----------------- -->

  </div>
</div>
<br><br>
 
</div>
<?php include('admin_footer.php'); ?>