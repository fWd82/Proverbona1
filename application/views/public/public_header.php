<!DOCTYPE html>
<html lang="en">
    <!-- 

https://getbootstrap.com/docs/4.3/layout/overview/
https://bootswatch.com/flatly/
http://localhost/proverbona1/user_guide/helpers/html_helper.html?highlight=css%20link
     -->
<head>
	<meta charset="utf-8">
	<title>Proverbona</title>

	<style type="text/css">

    </style>
    <!-- <?php echo link_tag('css/mystyles.css'); ?> -->

<link rel="stylesheet" type="text/css" href="http://localhost/proverbona1/assets/css/bootstrap.css">

<script type='text/javascript' src="http://localhost/proverbona1/assets/js/jquery-3.3.1.js"></script>
<script type='text/javascript' src="http://localhost/proverbona1/assets/js/bootstrap.js"></script>
<!-- <script type='text/javascript' src="<?php base_url(); ?>/assets/js/bootstrap.js"></script> -->

</head>


<body>
    

   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="http://localhost/proverbona1/home">Proverbona</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/proverbona1/user">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/proverbona1/user/signup">Register</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
