<?php 
if ($feedback_by = $this->session->userdata('login_id')) {
    // include('../admin/admin_header.php'); 
    require_once('application/views/admin/admin_header.php'); 
}else{include('public_header.php');}
?>
 


<?php
    // echo "<pre>";
    // print_r($all_proverbs1);
    // exit();
?>

<div class="container">
    
    <h2>Home Page</h2>
    <p>List of All Proverbs</p>
    <p class="text-right">
        <?php echo "Total: <strong>".count($all_proverb1)."</strong> Proverbs Found"; ?>
    </p>

<!-- 
    <table class="table table-striped table-hover">
        <thead>
            <th>Sr/ID. No</th>
            <th>Proverb</th>
            <th>Tags</th>
            <th>Added on</th>
            <th>Added By</th>
            <th>Action</th>

        </thead>
        <tbody>
            <?php if (count($all_proverb1)):?>
            <?php foreach ($all_proverb1 as $all_proverbss): ?>
            <tr>
                <td>
                    <?= $all_proverbss->proverb_id; ?>
                </td>
                <td>
                    <?= anchor("home/proverb/{$all_proverbss->proverb_id}", ($all_proverbss->proverb_statement)); ?>
                </td>
                <td><?= $all_proverbss->proverb_tags; ?></td>
                <td>
                    <?= date('d M Y H:i', strtotime($all_proverbss->proverb_timestamp)); ?>
                </td>

                <td>
                    <?= anchor(base_url('home/user_profile')."/{$all_proverbss->user_name}", $all_proverbss->user_name);?>
                </td>


                <td>View | Edit | Delete</td>
            </tr>

            <?php endforeach; ?>
            <?php else: ?>
            <tr>
            <td colspan="4">No Record Found</td>
            </tr>

            <?php endif; ?>
        </tbody>
    </table>
    - -->
    <!-- -============================= -->


    <?php if (count($all_proverb1)):?>
        <?php foreach ($all_proverb1 as $all_proverbss): ?> 
        
            <div class="smthing">
                <div class="row">
                    <div class="col col-lg-6" style="background:rgb(255, 254, 208)">Added By:  <?= $all_proverbss->user_name; ?> </div>
                    <div class="col col-lg-6" style="background:rgb(205, 255, 243)">Created at: <?= date('d M Y H:i', strtotime($all_proverbss->proverb_timestamp)); ?></div>
                </div>

                <div class="row">
                    <div class="col col-12" style="background:rgb(179, 219, 255); height: 50px; text-align: center; font-size: 20pt"> <?= anchor(base_url('home/proverb') . "/{$all_proverbss->proverb_id}", $all_proverbss->proverb_statement); ?> </div>
                </div>

                <div class="row">
                    <div class="col col-lg-12" style="background:rgb(174, 197, 218)">Latin English: <?= $all_proverbss->proverb_latin_eng; ?> </div>
                </div>

                <div class="row">
                    <div class="col col-lg-12" style="background:rgb(226, 226, 226)">English Meaning: <?= $all_proverbss->proverb_eng_meaning; ?></div>
                </div>
        
                <div class="row">
                    <div class="col col-7" style="background:rgb(255, 254, 208)">Tags: <?= $all_proverbss->proverb_tags; ?> </div>
                    <div class="col col-5" style="background:rgb(205, 255, 243)">Reference: <?= $all_proverbss->reference_title; ?> </div>
                </div>
            </div>
            </a>
             <br>
        <?php endforeach; ?>
    <?php endif; ?>
 
 


<!-- .================================== -->

<!-- 
    <div class="smthing">
        <div class="row">
            <div class="col col-lg-6" style="background:white">Added By:  <?= $all_proverbss->user_name; ?> </div>
            <div class="col col-lg-6" style="background:blanchedalmond">Created at: <?= date('d M Y H:i', strtotime($all_proverbss->proverb_timestamp)); ?></div>
        </div>

        <div class="row">
            <div class="col col-12" style="background:aqua; height: 50px; text-align: center; font-size: 20pt">Pakhto matal ba dalta v</div>
        </div>

        <div class="row">
            <div class="col col-lg-12" style="background:cadetblue">Latin English: </div>
        </div>

        <div class="row">
            <div class="col col-lg-12" style="background:palegreen">English Meaning: </div>
        </div>
 
        <div class="row">
            <div class="col col-7" style="background:khaki">Tags: </div>
            <div class="col col-5" style="background:cyan">Reference: </div>
        </div>
    </div>
     -->
 














     
</div>

<br><br><br><br><br>
<?php include('public_footer.php'); ?>
