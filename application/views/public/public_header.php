<!DOCTYPE html>
<html lang="en">
<!--
https://getbootstrap.com/docs/4.3/layout/overview/
https://bootswatch.com/flatly/
..user_guide/helpers/html_helper.html?highlight=css%20link
     -->
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Proverbona</title>

	<style type="text/css">

    </style>
    <!-- <?php echo link_tag('css/mystyles.css'); ?> -->

<link rel="stylesheet" type="text/css" href=<?= base_url('assets/css/bootstrap.css'); ?>>
<link rel="stylesheet" type="text/css" href=<?= base_url('assets/css/mystyles.css'); ?>>

<script type='text/javascript' src=<?= base_url('assets/js/jquery-3.3.1.js'); ?>></script>
<script type='text/javascript' src=<?= base_url('assets/js/bootstrap.js'); ?>></script>
<!-- <script type='text/javascript' src="<?= base_url(); ?>/assets/js/bootstrap.js"></script> -->

</head>


<body>
     

   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href=<?= base_url(); ?>>Proverbona</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href=<?= base_url('dashboard'); ?>>Dashboard <span class="sr-only">(current)</span></a>
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
    </ul>
     
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href=<?= base_url('user'); ?>>Login</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link" href=<?= base_url('user/signup'); ?>>Register</a>
    </li>
    <li class="nav-item dropdown <?php if($this->uri->uri_string() == 'feedback') { echo 'active'; } ?>">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Contact
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item <?php if($this->uri->uri_string() == 'feedback') { echo 'active'; } ?>" href=<?= base_url('feedback'); ?>>Feedback</a>
          <a class="dropdown-item" href=<?= base_url('feedback#contact'); ?>>Contact</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href=<?= base_url('feedback#bug'); ?>>Bug</a>
        </div>
      </li>
      </ul>
  </div>
</nav>