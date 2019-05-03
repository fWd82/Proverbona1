<?php 
if ($this->session->userdata('login_id')) {
    require('application/views/admin/admin_header.php'); 
}else{require('public_header.php');}
?>

<div class="container">
    <h2>Home Page</h2>
    <p>List of All Proverbs</p>
    <p class="text-right">
        <?php echo "<strong>" . count($all_proverb1)."</strong> out of" . "<strong>".  
                                $total_all_proverbs ."</strong> showing"; ?>
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
                    <?= anchor("proverb/proverb_detail/{$all_proverbss->proverb_id}", ($all_proverbss->proverb_statement)); ?>
                </td>
                <td><?= $all_proverbss->proverb_tags; ?></td>
                <td>
                    <?= date('d M Y H:i', strtotime($all_proverbss->proverb_timestamp)); ?>
                </td>

                <td>
                    <?= anchor(base_url('proverb/user_profile')."/{$all_proverbss->user_name}", $all_proverbss->user_name);?>
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
                    <div class="col col-lg-6" style="background:rgb(248, 255, 255)">Added By:  <?= $all_proverbss->user_name; ?> </div>
                    <div class="col col-lg-6" style="background:rgb(245, 244, 244)">Created at: <?= date('d M Y H:i', strtotime($all_proverbss->proverb_timestamp)); ?></div>
                </div>

                <div class="row">
                    <div class="col col-12" style="background:#eee; height: 50px; text-align: center; font-size: 20pt"> <?= anchor(base_url('proverb/proverb_detail') . "/{$all_proverbss->proverb_id}", $all_proverbss->proverb_statement); ?> </div>
                </div>

                <div class="row">
                    <div class="col col-lg-12" style="background:rgb(221, 221, 221)">Latin English: <?= $all_proverbss->proverb_latin_eng; ?> </div>
                </div>

                <div class="row">
                    <div class="col col-lg-12" style="background:rgb(245, 244, 244)">English Meaning: <?= $all_proverbss->proverb_eng_meaning; ?></div>
                </div>
        
                <div class="row">
                    <div class="col col-7" style="background:rgb(248, 255, 255)">Tags: <?= $all_proverbss->proverb_tags; ?> </div>
                    <div class="col col-5" style="background:rgb(245, 244, 244)">Reference: <?= $all_proverbss->reference_title; ?> </div>
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

 Example Pagination
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>

CodeIgniter Pagination -->


<?php echo $this->pagination->create_links(); ?>


</div>


<br><br><br><br><br>
<?php include('public_footer.php'); ?>