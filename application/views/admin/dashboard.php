<?php include('admin_header.php'); ?>

<div class="container"> 
    <?php
    
        echo "<br><h2> DASHBOARD </h2>"; 
        echo "<p> Welcome to Dashboard, Here will show all the components </p>"; 
        echo anchor('http://localhost/proverbona1/dashboard/insert_proverb', 'Add Article', 'title="Add Article"');
    ?>
    <br>

<div class="row">
    <div class="col-lg-6">
        <a class="btn btn-success" title="Add Article" href="http://localhost/proverbona1/dashboard/insert_proverb">Add Article</a>
        <a class="btn btn-secondary" title="Contributors" href="http://localhost/proverbona1/dashboard/contributors">Contributors</a>
    
    </div>
    <div class="col-lg-6">
        <a class="btn btn-secondary" title="User Profile" href="http://localhost/proverbona1/dashboard/user_profile">User Profile</a>
        <a class="btn btn-secondary" title="Link two Proverbs" href="http://localhost/proverbona1/dashboard/link">Link two Proverbs</a>
    
    </div>
</div>

    


</div>
<?php include('admin_footer.php'); ?>
