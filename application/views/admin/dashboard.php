<?php include('admin_header.php'); ?>

<div class="container"> 
    
    
        <br><h2> DASHBOARD </h2> 
        <p> Welcome to Dashboard </p> 




    <?php    
        // echo anchor('http://localhost/proverbona1/dashboard/insert_proverb', 'Add Article', 'title="Add Article"');
    ?>
    <br>


    <div class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" title="Register" href="http://localhost/proverbona1/user/signup">Register </a>
        <a class="btn btn-success" title="Login" href="http://localhost/proverbona1/user">Login </a>
        <a class="btn btn-success" title="Add Proverb" href="http://localhost/proverbona1/dashboard/add_proverb">Add Proverb</a>
        
</div>
</div>

<BR>


<div class="row">
    <div class="col-lg-12">
        <a class="btn btn-secondary" title="My Profile" href="http://localhost/proverbona1/home/my_profile">My Profile <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="User Profile" href="http://localhost/proverbona1/home/user_profile/fWd82Test">User Profile <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Proverb Details" href="http://localhost/proverbona1/home/proverb/3">Proverbs Details <span class="badge badge-light">WORKING</span></a>
        </div>
</div>

<BR>

<div class="row">
    <div class="col-lg-12">
    <a class="btn btn-danger" title="Statistics" href="#">Statistics <span class="badge badge-light">NIL</span></a>
    <a class="btn btn-danger" title="Reference Profile Page" href="#">Reference Profile Page <span class="badge badge-light">NIL</span></a>
    <a class="btn btn-danger" title="Contributors" href="http://localhost/proverbona1/dashboard/contributors">Contributors <span class="badge badge-light">NIL</span></a>
    <a class="btn btn-danger" title="Link two Proverbs" href="http://localhost/proverbona1/dashboard/link">Link two Proverbs <span class="badge badge-light">NIL</span></a>
    <a class="btn btn-danger" title="Settings" href="#">Settings <span class="badge badge-light">NIL</span></a>
 </div>
</div>
<HR>

<div class="alert alert-warning text-center" role="alert">
  We are still working on this site
</div>

</div>

<?php include('admin_footer.php'); ?>
