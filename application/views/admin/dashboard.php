<?php include('admin_header.php'); ?>

<?php
    $username = $this->session->userdata('login_username');
?>

<div class="container">
    <br><h2> USERS DASHBOARD </h2> 
    <p> Welcome to Dashboard </p> 
    <br>


    <div class="row">
        <!-- My Profile -->
        <div class="col-lg-4">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">My Profile</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href=<?= base_url("contributors/contributors_profile/{$username}"); ?>  class="card-link">My Profile</a> 
                </div>
            </div>
        </div>

        <!-- My Favorite Proverb -->
        <div class="col-lg-4">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">My Favorite Proverbs</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">You have <span class="badge badge-pill badge-info"> <?= $total_all_fav_proverbs ?> </span> favorite proverbs</p>
                    <a href="#" class="card-link">Favorite Proverbs</a> 
                </div>
            </div>
        </div>

        <!-- My Contribution -->
        <div class="col-lg-4">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">My Contribution</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Feeling being hero</h6>
                    <p class="card-text">You have added <span class="badge badge-pill badge-info"> <?= $total_all_proverbs ?> </span> proverbs</p>
                    <a href=<?= base_url("user/contribution/{$username}"); ?>  class="card-link">Proverb Added</a> <br>
                    <a href=<?= base_url("contributors/contributors_profile/{$username}"); ?> class="card-link">Development Contribution</a>
                </div>
            </div>
        </div>     

    </div><!-- eof row -->

<br /> 

    <div class="row">

        <!-- Add Proverb -->
        <div class="col-lg-4">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Add Proverbs</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Add Proverbs</a><br>
                    <a href="#" class="card-link">View All Proverbs</a>
                </div>
            </div>
        </div>

        <!-- Add Reference -->
        <div class="col-lg-4">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Add Reference</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Add Reference</a>
                    <a href="#" class="card-link">View All References</a>
                </div>
            </div>
        </div>   

        <!-- Feedback/Contact/Suggestion -->
        <div class="col-lg-4">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">Feedback / Contact / Suggestion</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Send Feedback to Admin</a>
                </div>
            </div>
        </div>

    </div>

<br>

    <div class="row">
        <!-- //// -->
        <div class="col-lg-4">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">------------ </h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>


    </div> <!-- eof row -->

<br>
<hr>






    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-warning" title="TODO" href= <?= base_url('dashboard/todo'); ?>>TODO </a>
            <a class="btn btn-warning" title="Settings" href=<?= base_url('dashboard/for_ui_ux'); ?>>For UI/UX</a>
        </div>
    </div>
<br>

 
<br>  
 

<!-- <div class="row">
    <div class="col-lg-12">
        <a class="btn btn-secondary" title="Link two Proverbs" href=<?= base_url('proverb/link_two_proverbs'); ?>>Link two Proverbs <span class="badge badge-light">Non Functional</span></a>
        <a class="btn btn-secondary" title="Statistics" href=<?= base_url('statistics'); ?>>Statistics <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="Admin Dashboard" href=<?= base_url('admin/'); ?>>Admin Dashboard <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-secondary" title="All Feedbacks" href=<?= base_url('admin/show_feedbacks'); ?>>All Feedbacks <span class="badge badge-light">WORKING</span></a>
        <a class="btn btn-warning" title="Contributors" href=<?= base_url('contributors'); ?>>Contributors  </a>
        <a class="btn btn-danger" title="Settings" href=<?= base_url('dashboard/#'); ?>>Settings <span class="badge badge-light">NIL</span></a>
    </div>
</div> -->
<HR>

<!-- <div class="alert alert-warning text-center alert-dismissible fade show" role="alert">
  We are still working on this site
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</div> -->

</div>

<?php include('admin_footer.php'); ?>