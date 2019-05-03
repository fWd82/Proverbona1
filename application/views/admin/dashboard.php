<?php include('admin_header.php'); ?>

<div class="container"> 
    
    
        <br><h2> DASHBOARD </h2> 
        <p> Welcome to Dashboard </p> 
    <br>

    <div class="row">
    <div class="col-lg-12">
        <a class="btn btn-warning" title="TODO" href= <?= base_url('dashboard/todo'); ?>>TODO </a>
        <a class="btn btn-success" title="Home Page" href= <?= base_url(); ?>>Home Page </a>
        <a class="btn btn-success" title="Register" href=<?= base_url('user/signup'); ?>>Register </a>
        <a class="btn btn-success" title="Login" href=<?= base_url('user'); ?>>Login </a>
        <a class="btn btn-success" title="Add Proverb" href=<?= base_url('proverb/add_proverb'); ?>>Add Proverb</a>
        <a class="btn btn-success" title="Add Reference" href=<?= base_url('reference/add_reference'); ?>>Add Reference</a>
        <a class="btn btn-success" title="Feedback" href=<?= base_url('Feedback'); ?>>Feedback</a>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-secondary" title="My Profile" href=<?= base_url('user/my_profile'); ?>>My Profile <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="User Profile" href=<?= base_url('user/user_profile/ahmadkhan3'); ?>>User Profile <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Proverb Details" href=<?= base_url('proverb/proverb_detail/3'); ?>>Proverbs Details <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Edit Proverb" href=<?= base_url('proverb/edit_proverb/3'); ?>>Edit Proverb <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="References" href=<?= base_url('reference'); ?>>References <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Reference Profile Page" href=<?= base_url('reference/reference_profile/1'); ?>>Reference Profile Page <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Edit Reference" href=<?= base_url('reference/edit_reference/1'); ?>>Edit Reference <span class="badge badge-light">WORKING</span></a>
    </div>
</div>

<br>
 

<div class="row">
    <div class="col-lg-12">
    <a class="btn btn-secondary" title="Link two Proverbs" href=<?= base_url('proverb/link_two_proverbs'); ?>>Link two Proverbs <span class="badge badge-light">Non Functional</span></a>
    <a class="btn btn-secondary" title="Statistics" href=<?= base_url('statistics'); ?>>Statistics <span class="badge badge-light">WORKING</span></a>
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