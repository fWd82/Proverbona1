<?php include('admin_header.php'); ?>

<div class="container"> 

<h2>Edit Reference</h2>
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

<?= form_open(base_url("reference/update_reference/{$edit_reference->reference_id}")); ?>



<div class="form-group">
    <label for="reference_lang"> Select Language<span title="Mandatory" class="colorred">*</span> </label>
	<?php
	$nativelang = "";
	if(!empty($proverb_lang)){
		 $nativelang = set_value('reference_lang', $edit_reference->reference_lang);
	}
	?>
    <?php  echo form_dropdown('reference_lang', $user_lang, $edit_reference->reference_lang, 'id="reference_lang" class="form-control"');  ?>
    <?php echo form_error('reference_lang'); ?>
    <small id="" class="form-text text-muted">Select Language for which you want to add proverb</small>
</div>
 

<div class="form-group">
    <label for="reference_title">Reference Title - (Name)<span title="Mandatory" class="colorred">*</span> </label>
    <?php echo form_input(['name'=>'reference_title', 'id'=>'reference_title', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Proverb', 'value'=>set_value('reference_title', $edit_reference->reference_title)]); ?>
    <?php echo form_error('reference_title'); ?>
    <!-- <textarea class="form-control" id="proverbstatement" placeholder="Enter Proberb" style="font-size: 14pt"></textarea> -->
    <small id="" class="form-text text-muted">Type Title of Reference here</small>
  </div>


  <div class="form-group">
    <label for="reference_category">Reference Type <span title="Mandatory" class="colorred">*</span> </label>
    <?php 
    $options = array(
            ''               => 'Select Reference Category ...',
            'Book'           => 'Book',
            'Journal'        => 'Journal',
            'Word of Mouth'   => 'Word of Mouth',
            'Other'          => 'Other'
    );
    $attributes = array(
      'id'    => 'reference_category',
      'class' => 'form-control'
    );
    echo form_dropdown('reference_category', $options, $edit_reference->reference_category, $attributes);
    // echo form_dropdown('reference_category', $options, 'selected', $attributes);
    ?>
    <?php echo form_error('reference_category'); ?>
    <small id="" class="form-text text-muted">Type of Reference</small>
  </div>

  <div class="form-group">
    <label for="reference_author">Reference Author</label>
    <?php echo form_input(['name'=>'reference_author', 'id'=>'reference_author', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter in Latin English', 'value'=>set_value('reference_author->', $edit_reference->reference_author)]); ?>
    <?php echo form_error('reference_author'); ?>
    <small id="" class="form-text text-muted">Type Author</small>
  </div>

  <div class="form-group">
    <label for="reference_introduction">Reference Introduction</label>
    <?php echo form_textarea(['name'=>'reference_introduction', 'id'=>'reference_introduction', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Introduction to simply understand what it is all about', 'value'=>set_value('reference_introduction', $edit_reference->reference_introduction)]); ?>
    <?php echo form_error('reference_introduction'); ?>
    <small id="" class="form-text text-muted">Type Introduction of Reference Book</small>
  </div>

  <div class="form-group">
    <label for="reference_published_year">Reference Published Year</label>
    <?php echo form_input(['name'=>'reference_published_year', 'id'=>'reference_published_year', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Reference Published Year', 'value'=>set_value('reference_published_year', $edit_reference->reference_published_year)]); ?>
    <?php echo form_error('reference_published_year'); ?>
    <small id="" class="form-text text-muted">Type Reference Published Year</small>
  </div>

  <div class="form-group">
    <label for="proverb_history">Reference Image Path</label>
    <?php echo form_textarea(['name'=>'reference_img_path', 'id'=>'proverb_history', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Reference Image Path', 'value'=>set_value('reference_img_path', $edit_reference->reference_img_path)]); ?>
    <?php echo form_error('proverb_history'); ?>
    <small id="" class="form-text text-muted">Paste link of Cover of above reference</small>
  </div>
 

  <?php
    $reference_addedby = $this->session->userdata('login_id');
    echo form_hidden('reference_addedby', $reference_addedby);
  ?>


<?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Submit', 'id'=>'submit']); ?>
  <!-- <button type="submit" class="btn btn-success my-2 my-sm-0">Submit</button> -->
</form>
<!-- <?php
    echo validation_errors();
?> -->





 </div>
 <br><br>


<?php include('admin_footer.php'); ?>