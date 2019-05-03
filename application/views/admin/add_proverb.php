<?php include('admin_header.php'); ?>

<div class="container"> 

<h2>Add Proverb</h2>
<?php
if ($feedback = $this->session->flashdata('feedback')):
  $feedback_class = $this->session->flashdata('feedback_class');
?>
<div class="row">
  <div class="col col-lg-6">
      <div class="alert <?= $feedback_class ?> alert-dismissible fade show" role="alert">
      <?= $feedback ?> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </div>
  </div>
</div>  
<?php endif; ?> 

<?= form_open(base_url('proverb/insert_proverb')); ?>
<!-- <form> proverb/insert_proverb -->

<div class="form-group">
    <label for="proverb_lang"> Select Language<span title="Mandatory" class="colorred">*</span> </label>
	<?php
	$nativelang = "";
	if(!empty($proverb_lang)){
		 $nativelang = set_value('proverb_lang', $user_nativelang);
	}
	?>
    <?php  echo form_dropdown('proverb_lang', $user_lang, $nativelang, 'id="proverb_lang" class="form-control"');  ?>
    <?php echo form_error('proverb_lang'); ?>
    <small id="" class="form-text text-muted">Select Language for which you want to add proverb</small>
</div>

<!-- <?php echo form_hidden('proverb_lang', '1'); ?> -->
    

<div class="form-group">
    <label for="proverb_statement">Proverb - (Proverb Statement)<span title="Mandatory" class="colorred">*</span></label>
    <?php echo form_textarea(['name'=>'proverb_statement', 'id'=>'proverb_statement', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Proverb', 'value'=>set_value('proverb_statement')]); ?>
    <?php echo form_error('proverb_statement'); ?>
    <!-- <textarea class="form-control" id="proverbstatement" placeholder="Enter Proberb" style="font-size: 14pt"></textarea> -->
    <small id="" class="form-text text-muted">Type statement of Proverb here</small>
  </div>

  <div class="form-group">
    <label for="proverb_latin_eng">Proverb in Latin English</label>
    <?php echo form_textarea(['name'=>'proverb_latin_eng', 'id'=>'proverb_latin_eng', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter in Latin English', 'value'=>set_value('proverb_latin_eng')]); ?>
    <?php echo form_error('proverb_latin_eng'); ?>
    <small id="" class="form-text text-muted">Type in Latin English</small>
  </div>


  <div class="form-group">
    <label for="proverb_introduction">Proverb Introduction</label>
    <?php echo form_textarea(['name'=>'proverb_introduction', 'id'=>'proverb_introduction', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Proverb introduction to simply understand what it is all about', 'value'=>set_value('proverb_introduction')]); ?>
    <?php echo form_error('proverb_introduction'); ?>
    <small id="" class="form-text text-muted">Type Introduction of Proverb in plan Pashto</small>
  </div>

  <div class="form-group">
    <label for="proverb_eng_meaning">Proverb English Meaning</label>
    <?php echo form_textarea(['name'=>'proverb_eng_meaning', 'id'=>'proverb_eng_meaning', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter English Meaning', 'value'=>set_value('proverb_eng_meaning')]); ?>
    <?php echo form_error('proverb_eng_meaning'); ?>
    <small id="" class="form-text text-muted">Type meaning of Proberb in English</small>
  </div>

  <div class="form-group">
    <label for="proverb_history">Proverb History</label>
    <?php echo form_textarea(['name'=>'proverb_history', 'id'=>'proverb_history', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter History', 'value'=>set_value('proverb_history')]); ?>
    <?php echo form_error('proverb_history'); ?>
    <small id="" class="form-text text-muted">Type History/Historical Reference/Story or Reference for above entered Proberb</small>
  </div>




  <!-- <?php echo form_hidden('proverb_reference', '1'); ?> -->

  <div class="form-group">
    <label for="proverb_reference">Proverb Reference <span title="Mandatory" class="colorred">*</span> </label>
	<?php
	$p_ref = "";
	if(!empty($proverb_reference)){
		 $p_ref = set_value('proverb_reference', $proverb_reference);
	}
	?>
    <?php  echo form_dropdown('proverb_reference', $dd_reference, $p_ref, 'id="proverb_reference" class="form-control"');  ?>
    <?php echo form_error('proverb_reference'); ?>
    <small id="" class="form-text text-muted">Select Reference of Proverb  </small>
</div>

  <div class="form-group">
    <label for="proverb_tags">Proverb Tags</label>
    <?php echo form_textarea(['name'=>'proverb_tags', 'id'=>'proverb_tags', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Tags', 'value'=>set_value('proverb_tags')]); ?>
    <?php echo form_error('proverb_tags'); ?>
    <small id="" class="form-text text-muted">Type History/Historical Reference/Story or Reference for above entered Proberb</small>
  </div>

  <?php echo form_hidden('proverb_addedby', '1'); ?>
    


<?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Submit', 'id'=>'submit']); ?>
  <!-- <button type="submit" class="btn btn-success my-2 my-sm-0">Submit</button> -->
</form>
<!-- <?php
    echo validation_errors();
?> -->





 </div>
 <br><br>


<?php include('admin_footer.php'); ?>