<?php 
if ($feedback_by = $this->session->userdata('login_id')) {
    // include('../admin/admin_header.php'); 
    require_once('application/views/admin/admin_header.php'); 
}else{include('public_header.php');}
?>

<div class="container"> 

<h2>Add Feedback</h2>
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


<?= form_open(base_url('feedback/insert_feedback')); ?>

<div class="form-group">
<label for="feedback_type">Feedback Type</label>
<?php 
$options = array(
        ''                  => 'Select Feedback Type ...',
        'complaint'         => 'Complaint',
        'suggestion'        => 'Suggestion',
        'bug'               => 'Bug',
        'other'             => 'Other'
);
$attributes = array(
  'id'    => 'feedback_type',
  'class' => 'form-control'
);
 
echo form_dropdown('feedback_type', $options, 'selected', $attributes);
?>
<?php echo form_error('feedback_type'); ?>
<small id="" class="form-text text-muted">Type Complaint / Bug / Suggestion</small>
</div>


<div class="form-group">
    <label for="feedback_title">Feedback Title</label>
    <?php echo form_input(['name'=>'feedback_title', 'id'=>'feedback_title', 'class'=>'form-control', 'placeholder'=>'Enter Feedback Title', 'value'=>set_value('feedback_title')]); ?>
    <?php echo form_error('feedback_title'); ?>
    <small class="form-text text-muted">Type Title here</small>
  </div>

  <div class="form-group">
    <label for="feedback_body">Feedback Body</label>
    <?php echo form_textarea(['name'=>'feedback_body', 'id'=>'feedback_body', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Feedback Body', 'value'=>set_value('feedback_body')]); ?>
    <?php echo form_error('feedback_body'); ?>
    <small id="" class="form-text text-muted">Type your Complaint Here</small>
  </div>



<!-- 
  <div class="form-group">
    <label for="feedback_context">Feedback Context</label>
    <?php echo form_textarea(['name'=>'feedback_context', 'id'=>'feedback_context', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Feedback Context', 'value'=>set_value('feedback_context')]); ?>
    <?php echo form_error('feedback_context'); ?>
    <small id="" class="form-text text-muted">Type Feedback Context</small>
  </div>
-->

  <?php
    $feedback_by = $this->session->userdata('login_id');
    echo form_hidden('feedback_by', $feedback_by);
    echo form_hidden('feedback_context', 1);
  ?>
  
 
 


<?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Submit', 'id'=>'submit']); ?>
  <!-- <button type="submit" class="btn btn-success my-2 my-sm-0">Submit</button> -->
</form>
<!-- <?php
    echo validation_errors();
?> -->


 </div>
 <br><br>


<?php include('public_footer.php'); ?>