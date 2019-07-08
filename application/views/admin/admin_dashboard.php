<?php include('admin_header.php'); ?>

<div class="container"> 
    
    
        <br><h2> DASHBOARD </h2> 
        <p> Welcome to Dashboard </p> 
    <br>
    <br>
<div class="row">
    <div class="col-lg-12">
        <h3>Feedbacks By Users</h3>
        <p> List of all Feedbacks</p>
        <?= anchor('admin/show_feedbacks', 'All Feedbacks', 'class="btn btn-success"'); ?>
    </div>
</div>

<br>
 

<div class="row">
    <div class="col-lg-12">
        <h3>Newly Users Registered</h3>
        <p> List of all Users Registered</p>
        <?= anchor('admin/show_users', 'All Users', 'class="btn btn-success"'); ?>

    </div>
</div>
<HR>

<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
  We are still working on this site
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</div>

</div>

<?php include('admin_footer.php'); ?>