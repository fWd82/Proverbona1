<?php 
if ($this->session->userdata('login_id')) { 
    include(__DIR__ . '../../admin/admin_header.php'); 
}else{include('public_header.php');}
?> 

<div class="container">
    <h2>References</h2>
    <p>List of All References</p>

    <p class="text-right">
        <?php 
         echo anchor('reference/add_reference', 'Add New', "class='btn btn-warning'");
        ?>
    </p>
    <p class="text-right">
        <?php 
        echo "Total: <strong>".count($all_reference1)."</strong> References Found"; 
        ?>
    </p>

    <!-- -============================= -->

    <?php if (count($all_reference1)):?>
    <div class="row">
        <?php foreach ($all_reference1 as $all_referencee): ?> 

            <div class="col-lg-6">   
                <div class="smthing">

                    <div class="row">
                        <div class="col col-lg-6" style="background:rgb(248, 255, 255)">Added By:  <?= $all_referencee->user_name; ?> </div>
                        <div class="col col-lg-6" style="background:rgb(245, 244, 244)">Created at: <?= date('d M Y H:i', strtotime($all_referencee->reference_timestamp)); ?></div>
                    </div>

                    <div class="row">
                        <div class="col col-12" style="background:#eee; height: 50px; text-align: center; font-size: 20pt"> <?= anchor(base_url('reference/reference_profile') . "/{$all_referencee->reference_id}", $all_referencee->reference_title); ?> </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12" style="background:rgb(221, 221, 221)"><strong>Category:</strong> <?= $all_referencee->reference_category; ?> </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12" style="background:rgb(245, 244, 244)"><strong>Author:</strong> <?= $all_referencee->reference_author; ?></div>
                    </div>
            
                    <div class="row">
                        <div class="col col-6" style="background:rgb(248, 255, 255)"><strong>Published Year:</strong> <?= $all_referencee->reference_published_year; ?> </div>
                        <div class="col col-6 text-truncate" style="background:rgb(245, 244, 244)"><strong>Image Path:</strong> <?= $all_referencee->reference_img_path; ?> </div>
                    </div>

                    <div class="row">
                        <div class="col col-12" style="background:rgb(245, 244, 244)"> <strong> Introduction:</strong> <?= $all_referencee->reference_introduction; ?> </div>
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