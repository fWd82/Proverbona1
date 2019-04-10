<?php include('admin_header.php'); ?>

<div class="container"> 
    
    
        <br><h2> DASHBOARD </h2> 
        <p> Welcome to Dashboard </p> 




    <?php    
        // echo anchor('http://localhost/proverbona1/dashboard/insert_proverb', 'Add Article', 'title="Add Article"');
    ?>
    <br>

<div class="row">
    <div class="col-lg-6">
        <a class="btn btn-success" title="Add Article" href="http://localhost/proverbona1/dashboard/add_proverb">Add Article</a>
        <a class="btn btn-secondary" title="Contributors" href="http://localhost/proverbona1/dashboard/contributors">Contributors <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Link two Proverbs" href="http://localhost/proverbona1/dashboard/link">Link two Proverbs <span class="badge badge-light">WORKING</span></a>
   
    </div>
    <div class="col-lg-6">
        <a class="btn btn-secondary" title="User Profile" href="http://localhost/proverbona1/dashboard/user_profile">User Profile <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Proverb Details" href="http://localhost/proverbona1/home/proverb/3">Proverbs Details <span class="badge badge-light">WORKING</span></a>
         </div>
</div>

<HR>

<div class="alert alert-warning text-center" role="alert">
  We are still working on this site
</div>

</div>

<?php include('admin_footer.php'); ?>
