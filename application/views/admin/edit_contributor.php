<?php 
if ($feedback_by = $this->session->userdata('login_id')) { 
    include('admin_header.php'); 
}else{include(__DIR__ . '../../public/public_header.php');}
?> 

<div class="container"> 

<h2>Edit My Profile</h2>
<p>If you want to edit your other info like Name, Country etc please edit it <?= anchor("user/user_profile/{$edit_contributor->tm_username}", 'HERE'); ?> </p>
<hr>
<?php
if ($feedback = $this->session->flashdata('feedback')):
  $feedback_class = $this->session->flashdata('feedback_class');
?>
<div class="row">
  <div class="col col-lg-6">
      <div class="alert  <?= $feedback_class ?> alert-dismissible fade show" role="alert">
      <?= $feedback ?> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </div>
  </div>
</div>  
<?php endif; ?> 


<?= form_open(base_url("contributors/update_contributor/{$edit_contributor->tm_username}")); ?>


<div class="form-group">
    <label for="tm_title">Title <span title="Mandatory" class="colorred">*</span></label>
    <?php echo form_input(['name'=>'tm_title', 'id'=>'tm_title', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Your Full Name', 'value'=>set_value('tm_title', $edit_contributor->tm_title)]); ?>
    <?php echo form_error('tm_title'); ?>
    <!-- <textarea class="form-control" id="proverbstatement" placeholder="Enter Proberb" style="font-size: 14pt"></textarea> -->
    <small id="" class="form-text text-muted">Type Title here</small>
</div>
 

<div class="form-group">
    <label for="tm_description">Description <span title="Mandatory" class="colorred">*</span></label>
    <?php echo form_textarea(['name'=>'tm_description', 'id'=>'tm_description', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter your desired tm_description here', 'value'=>set_value('tm_description', $edit_contributor->tm_description)]); ?>
    <?php echo form_error('tm_description'); ?>
    <small id="" class="form-text text-muted">Type Description here</small>
</div>


 
<div class="form-group">
    <label for="tm_image_link">Image Link</label>
    <?php echo form_input(['name'=>'tm_image_link', 'id'=>'tm_image_link', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter language(s) that you have learn\'t', 'value'=>set_value('tm_image_link', $edit_contributor->tm_image_link)]); ?>
    <?php echo form_error('tm_image_link'); ?>
    <small id="" class="form-text text-muted">Type Image Link Here</small>
</div>


<div class="form-group">
    <label for="tm_organization">Organization <span title="Mandatory" class="colorred">*</span> </label>
    <?php echo form_input(['name'=>'tm_organization', 'id'=>'tm_organization', 'class'=>'form-control', 'placeholder'=>'Enter name of your Country', 'value'=>set_value('tm_organization', $edit_contributor->tm_organization)]); ?>
    <?php echo form_error('tm_organization'); ?>
    <small id="" class="form-text text-muted">Type your Organization here</small>
</div>


<div class="form-group">
    <label for="tm_personal_website">Personal Website</label>
    <?php echo form_input(['name'=>'tm_personal_website', 'id'=>'tm_personal_website', 'class'=>'form-control', 'placeholder'=>'Enter your address', 'value'=>set_value('tm_personal_website', $edit_contributor->tm_personal_website)]); ?>
    <?php echo form_error('tm_personal_website'); ?>
    <small id="" class="form-text text-muted">Type your Personal Website here</small>
</div>

<div class="form-group">
    <label for="tm_org_website">Organization Website</label>
    <?php echo form_input(['name'=>'tm_org_website', 'id'=>'tm_org_website', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter your department or University', 'value'=>set_value('tm_org_website', $edit_contributor->tm_org_website)]); ?>
    <?php echo form_error('tm_org_website'); ?>
    <small id="" class="form-text text-muted">Type your Organization Website here</small>
</div>

<div class="form-group">
    <label for="tm_org_email">Organization Email</label>
    <?php echo form_input(['name'=>'tm_org_email', 'id'=>'tm_org_email', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter your department or University', 'value'=>set_value('tm_org_email', $edit_contributor->tm_org_email)]); ?>
    <?php echo form_error('tm_org_email'); ?>
    <small id="" class="form-text text-muted">Type your Organization Email here</small>
</div>

<div class="form-group">
    <label for="tm_personal_email">Personal Email</label>
    <?php echo form_input(['name'=>'tm_personal_email', 'id'=>'tm_personal_email', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter your department or University', 'value'=>set_value('tm_personal_email', $edit_contributor->tm_personal_email)]); ?>
    <?php echo form_error('tm_personal_email'); ?>
    <small id="" class="form-text text-muted">Type your Personal Email here</small>
</div>

<div class="form-group">
    <label for="tm_facebook">Facebook</label>
    <?php echo form_input(['name'=>'tm_facebook', 'id'=>'tm_facebook', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter your department or University', 'value'=>set_value('tm_facebook', $edit_contributor->tm_facebook)]); ?>
    <?php echo form_error('tm_facebook'); ?>
    <small id="" class="form-text text-muted">Type your Facebook Profile Link here</small>
</div>

<div class="form-group">
    <label for="tm_twitter">Twitter</label>
    <?php echo form_input(['name'=>'tm_twitter', 'id'=>'tm_twitter', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter your department or University', 'value'=>set_value('tm_twitter', $edit_contributor->tm_twitter)]); ?>
    <?php echo form_error('tm_twitter'); ?>
    <small id="" class="form-text text-muted">Type your Twitter Profile Link here</small>
</div>

<div class="form-group">
    <label for="tm_github">GitHub</label>
    <?php echo form_input(['name'=>'tm_github', 'id'=>'tm_github', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter your department or University', 'value'=>set_value('tm_github', $edit_contributor->tm_github)]); ?>
    <?php echo form_error('tm_github'); ?>
    <small id="" class="form-text text-muted">Type your GitHub here</small>
</div>

<div class="form-group">
    <label for="tm_other_link">Other Link</label>
    <?php echo form_input(['name'=>'tm_other_link', 'id'=>'tm_other_link', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter your department or University', 'value'=>set_value('tm_other_link', $edit_contributor->tm_other_link)]); ?>
    <?php echo form_error('tm_other_link'); ?>
    <small id="" class="form-text text-muted">Some other link that you want to mention</small>
</div>
 


<?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Submit', 'id'=>'submit']); ?>
   
</form>

 </div>

<br>


<?php 
if ($feedback_by = $this->session->userdata('login_id')) {
    require_once('application/views/public/public_footer.php'); 
}else{include('public_footer.php');}
?>