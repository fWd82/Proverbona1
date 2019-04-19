<?php include('admin_header.php'); ?>

<div class="container"> 
    
    
        <br><h2> DASHBOARD </h2> 
        <p> Welcome to Dashboard </p> 




    <?php    
        // echo anchor('dashboard/insert_proverb', 'Add Article', 'title="Add Article"');
    ?>
    <br>


    <div class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" title="Home Page" href= <?= base_url('home'); ?>>Home Page </a>
        <!-- <a class="btn btn-success" title="Home Page" href="../home">Home Page </a> -->
        <a class="btn btn-success" title="Register" href=<?= base_url('user/signup'); ?>>Register </a>
        <a class="btn btn-success" title="Login" href=<?= base_url('user'); ?>>Login </a>
        <a class="btn btn-success" title="Add Proverb" href=<?= base_url('dashboard/add_proverb'); ?>>Add Proverb</a>
</div>
</div>

<BR>


<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-secondary" title="My Profile" href=<?= base_url('home/my_profile'); ?>>My Profile <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="User Profile" href=<?= base_url('home/user_profile/ahmadkhan3'); ?>>User Profile <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Proverb Details" href=<?= base_url('home/proverb/3'); ?>>Proverbs Details <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Reference Profile Page" href=<?= base_url('home/reference_profile/1'); ?>>Reference Profile Page <span class="badge badge-light">WORKING</span></a>
    </div>
</div>

<BR>

<div class="row">
    <div class="col-lg-12">
    <a class="btn btn-secondary" title="Link two Proverbs" href=<?= base_url('home/link_two_proverbs'); ?>>Link two Proverbs <span class="badge badge-light">Non Functional</span></a>
    <a class="btn btn-secondary" title="Statistics" href=<?= base_url('statistics'); ?>>Statistics <span class="badge badge-light">WORKING</span></a>
    <a class="btn btn-secondary" title="Feedback" href=<?= base_url('Feedback'); ?>>Feedback <span class="badge badge-light">WORKING</span></a>
    <a class="btn btn-danger" title="Contributors" href=<?= base_url('dashboard/#'); ?>>Contributors <span class="badge badge-light">NIL</span></a>
    <a class="btn btn-danger" title="Settings" href=<?= base_url('dashboard/#'); ?>>Settings <span class="badge badge-light">NIL</span></a>
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