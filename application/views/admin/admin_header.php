<!DOCTYPE html>
<html lang="en">
<!-- 
https://stackoverflow.com/a/30367673/5737774
https://getbootstrap.com/docs/4.3/layout/overview/
https://bootswatch.com/flatly/
..user_guide/helpers/html_helper.html?highlight=css%20link
 -->
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?php if (isset($title)) {
        echo $title;
      }else{
        echo "Proverbona"; 
      }?>
    </title>

    <link rel="stylesheet" type="text/css" href=<?= base_url('assets/css/bootstrap.css'); ?>>
    <link rel="stylesheet" type="text/css" href=<?= base_url('assets/css/mystyles.css'); ?>>
    <script type='text/javascript' src=<?= base_url('assets/js/jquery-3.3.1.js'); ?>></script>
    <script type='text/javascript' src=<?= base_url('assets/js/bootstrap.js'); ?>> </script>

    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('assets/images/favicon.ico'); ?> "type="image/x-icon">
</head>

<body>
<?php
   $username = $this->session->userdata('login_username');
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href=<?= base_url(); ?>>Proverbona</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">

      <!-- <li class="nav-item <?php if($this->uri->uri_string() == 'admin') { echo 'active'; } ?>">
      <a class="nav-link"  href=<?= base_url('admin'); ?>>Dashboard</a> 
      </li> -->
 
      <li class="nav-item dropdown <?php if($this->uri->uri_string() == 'admin') { echo 'active'; } ?>">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dashboard
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?php if($this->uri->uri_string() == 'admin') { echo 'active'; } ?>" href=<?= base_url('admin'); ?>>Admin Dashboard</a>
          <a class="dropdown-item <?php if($this->uri->uri_string() == 'dashboard') { echo 'active'; } ?>" href=<?= base_url('dashboard'); ?>>User Dashboard</a>
      </li>  





      <li class="nav-item dropdown <?php if($this->uri->uri_string() == 'user/my_profile') { echo 'active'; } ?>">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Proverbs
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?php if($this->uri->uri_string() == 'proverb/add_proverb') { echo 'active'; } ?>" href=<?= base_url('proverb/add_proverb'); ?>>Add Proverb</a>
          <a class="dropdown-item <?php if($this->uri->uri_string() == 'proverb') { echo 'active'; } ?>" href=<?= base_url('proverb'); ?>>View All Proverbs</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item <?php if($this->uri->uri_string() == 'favorites') { echo 'active'; } ?>" href=<?= base_url('favorites'); ?>>My Favorite Proverbs</a>
        </div>
      </li>    
      
      <li class="nav-item dropdown <?php if($this->uri->uri_string() == 'user/my_profile') { echo 'active'; } ?>">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        References
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?php if($this->uri->uri_string() == 'reference') { echo 'active'; } ?>" href=<?= base_url('reference'); ?>>All References</a>
          <a class="dropdown-item <?php if($this->uri->uri_string() == 'reference/add_reference') { echo 'active'; } ?>" href=<?= base_url('reference/add_reference'); ?>>Add Reference</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href=<?= base_url('#'); ?>>--</a>
        </div>
      </li>      

      <li class="nav-item <?php if($this->uri->uri_string() == 'statistics') { echo 'active'; } ?>">
        <a class="nav-link" href=<?= base_url('statistics'); ?>>Statistics</a>
      </li>

      <li class="nav-item <?php if($this->uri->uri_string() == 'contributors') { echo 'active'; } ?>">
        <a class="nav-link" href=<?= base_url('contributors'); ?>>Contributors</a>
      </li>


    </ul>

    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form> -->

    <!-- <form class="form-inline my-2 my-lg-0"> -->
    <?= form_open('proverb/search', ['class'=>'form-inline my-2 my-lg-0', 'role'=>'search']); ?>
      <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search">
      <div class="dropdown">
        <!-- <button class="btn btn-secondary dropdown-toggle my-2 my-sm-0" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
        <button class="btn btn-secondary my-2 my-sm-0" type="submit" id="dropdownMenuButton" >
          Search
        </button>
        <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="proverb/search">In All</a>
          <a class="dropdown-item" href="#">In English</a>
          <a class="dropdown-item" href="#">In Urdu</a>
          <a class="dropdown-item" href="#">In Pashto</a>
          <a class="dropdown-item" href="#">In Farsi</a>
          <a class="dropdown-item" href="#">In Arabic</a>
        </div> -->
      </div>
      <?= form_close(); ?>
      <!-- <?= form_error('query', "<p class='navbar-text text-dager'>", '</p>'); ?> -->
      
    



    
    <ul class="navbar-nav">

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Contact
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item " href=<?= base_url('feedback'); ?>>Feedback</a>
          <a class="dropdown-item" href=<?= base_url('feedback#contact'); ?>>Contact</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href=<?= base_url('feedback#bug'); ?>>Bug</a>
        </div>
      </li>


      <li class="nav-item dropdown <?php if($this->uri->uri_string() == "user/user_profile/{$username}") { echo 'active'; } ?>">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        My Profile

        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item " href=<?= base_url("user/user_profile/{$username}"); ?>>My Profile @<?= $username ?> </a>
          <a class="dropdown-item" href=<?= base_url('favorites'); ?>>My Favorites</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href=<?= base_url('user/logout'); ?>>Logout</a>
        </div>
      </li>

      </ul>


  </div>
</nav>