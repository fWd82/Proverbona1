<?php 
if ($this->session->userdata('login_id')) { 
    include(__DIR__ . '../../admin/admin_header.php'); 
}else{include('public_header.php');}
?> 

<div class="container">
    <h2>Contributors List</h2>
    <p>List of All Contributors</p>

    <!-- <p class="text-right">
        <?= anchor('reference/add_reference', 'Add New', "class='btn btn-warning'"); ?>
    </p> -->
    <p class="text-right">
        <?php 
        echo "Total: <strong>".count($all_contributors1)."</strong> Contributors Found"; 
        ?>
    </p>

    <!-- -============================= -->

    <?php if (count($all_contributors1)):?>
    <div class="row">
        <?php foreach ($all_contributors1 as $all_contributorss): ?> 

            <div class="col-lg-6">   
                <div class="smthing">

                    <div class="row">
                        <div class="col col-lg-12" style="background:rgb(248, 255, 255)">Username:  <?= $all_contributorss->user_name; ?> </div>
                    </div>

                    <div class="row">
                        <div class="col col-12" style="background:#eee; height: 50px; text-align: center; font-size: 20pt"> <?= anchor(base_url('contributors/contributors_profile/') . "{$all_contributorss->user_name}", $all_contributorss->user_fullname); ?> </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12" style="background:rgb(248, 255, 255)">
                        <img src="<?= base_url("uploads/{$all_contributorss->tm_image_link}")?>" width="100px" >
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col col-lg-12" style="background:rgb(248, 255, 255)">
                            <div class="col col-lg-12" style="background:rgb(245, 244, 244)"><strong>Position:</strong> <?= $all_contributorss->tm_title; ?> </div>                         
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12" style="background:rgb(221, 221, 221)"><strong>Description:</strong> <?= $all_contributorss->tm_description; ?> </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12" style="background:rgb(245, 244, 244)"><strong>Organization:</strong> <?= $all_contributorss->tm_organization; ?></div>
                    </div>
            
                    <div class="row">
                        <div class="col col-6" style="background:rgb(248, 255, 255)"><strong>Personal Website:</strong> <?= $all_contributorss->tm_personal_website; ?> </div>
                        <div class="col col-6 text-truncate" style="background:rgb(245, 244, 244)"><strong>Organization Website:</strong> <?= $all_contributorss->tm_org_website; ?> </div>
                    </div>
                    
                    <div class="row">
                        <div class="col col-6" style="background:rgb(248, 255, 255)"><strong>Organization Email:</strong> <?= $all_contributorss->tm_org_email; ?> </div>
                        <div class="col col-6 text-truncate" style="background:rgb(245, 244, 244)"><strong>Personal Email:</strong> <?= $all_contributorss->tm_personal_email; ?> </div>
                    </div>

                    <div class="row">
                        <div class="col col-6" style="background:rgb(248, 255, 255)"><strong>Facebook:</strong> <?= $all_contributorss->tm_facebook; ?> </div>
                        <div class="col col-6 text-truncate" style="background:rgb(245, 244, 244)"><strong>Twitter:</strong> <?= $all_contributorss->tm_twitter; ?> </div>
                    </div>

                    <div class="row">
                        <div class="col col-6" style="background:rgb(248, 255, 255)"><strong>Github:</strong> <?= $all_contributorss->tm_github; ?> </div>
                        <div class="col col-6 text-truncate" style="background:rgb(245, 244, 244)"><strong>Other Link:</strong> <?= $all_contributorss->tm_other_link; ?> </div>
                    </div>                                 

                </div> <!-- eof smthing -->
            </div> <!-- eof col-lg-6 -->
            <br>
        <?php endforeach; ?>
    </div> <!-- eof row -->
    <?php endif; ?>

<!-- .================================== -->
     
</div><!-- eof container -->
<br><br><br><br><br>
<?php include('public_footer.php'); ?>