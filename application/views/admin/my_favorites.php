<?php 
if ($this->session->userdata('login_id')) {
    require('application/views/admin/admin_header.php'); 
}else{require('public_header.php');}
?>

<div class="container">
	<h2>My Favorites</h2>
	<p>List of All Favorites Proverbs</p>
	<p class="text-right">
		<?php echo "<strong>" . count($all_proverb1)."</strong> out of" . "<strong>".  
                                $total_all_proverbs ."</strong> showing"; ?>
	</p>


	<?php if (count($all_proverb1)):?>
	<?php foreach ($all_proverb1 as $all_proverbss): ?>
	<div class="smthing">
		<div class="row">
			<div class="col col-lg-6" style="background:rgb(248, 255, 255)">Added By: <?= $all_proverbss->user_name; ?> </div>
			<div class="col col-lg-6" style="background:rgb(245, 244, 244)">Created at:
				<?= date('d M Y H:i', strtotime($all_proverbss->proverb_timestamp)); ?></div>
		</div>

		<div class="row">
			<div class="col col-12" style="background:#eee; height: 50px; text-align: center; font-size: 20pt">
				<?= anchor(base_url('proverb/proverb_detail') . "/{$all_proverbss->proverb_id}", $all_proverbss->proverb_statement); ?>
			</div>
		</div>

		<div class="row">
			<div class="col col-lg-12" style="background:rgb(221, 221, 221)">Latin English:
				<?= $all_proverbss->proverb_latin_eng; ?> </div>
		</div>

		<div class="row">
			<div class="col col-lg-12" style="background:rgb(245, 244, 244)">English Meaning:
				<?= $all_proverbss->proverb_eng_meaning; ?></div>
		</div>

		<div class="row">
			<div class="col col-12" style="background:rgb(248, 255, 255)">Tags: <?= $all_proverbss->proverb_tags; ?>
			</div>
		</div>
	</div>
	</a>
	<br>
	<?php endforeach; ?>
	<?php endif; ?>


	<?php echo $this->pagination->create_links(); ?>


</div>


<br><br><br><br><br>
<?php include('admin_footer.php'); ?>
