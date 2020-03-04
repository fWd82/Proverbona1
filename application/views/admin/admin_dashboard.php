<?php include('admin_header.php'); ?>

<div class="container">
        <br><h2> ADMIN DASHBOARD </h2> 
        <p> Welcome to Administrator Dashboard </p> 
    <br>
    <br>

<div class="row">
    <div class="col-lg-4">
            <h3>Feedbacks By Users</h3>
            <p> List of all Feedbacks</p>
            <?= anchor('admin/show_feedbacks', 'All Feedbacks', 'class="btn btn-success"'); ?>
    </div>

    <div class="col-lg-4">
        <h3>Newly Users Registered</h3>
        <p> List of all Users Registered</p>
        <?= anchor('admin/show_users', 'All Users', 'class="btn btn-success"'); ?>
    </div>
    <div class="col-lg-4">
        <h3>Newly Edited Proverbs</h3>
        <p> List of Edited Proverbs</p>
        <?= anchor('admin/#', 'Edited Proverbs', 'class="btn btn-success"'); ?>
    </div>
</div><!-- eof row -->

<br>
 

<div class="row">
    <div class="col-lg-4">
        <h3>Newly Proverbs Added</h3>
        <p> List of Proverbs Added</p>
        <?= anchor('#', 'Latest Proverbs', 'class="btn btn-success"'); ?>
    </div>
    <div class="col-lg-4">
        <h3>Newly References Added</h3>
        <p> List of References Added</p>
        <?= anchor('#', 'Latest References', 'class="btn btn-success"'); ?>
    </div>

</div><!-- eof row -->


<HR>


<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
  We are still working on this site
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</div>

</div>

<?php include('admin_footer.php'); ?>