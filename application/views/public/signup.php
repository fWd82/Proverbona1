<?php include('public_header.php'); ?>

<div class="container"> 

<h2>Signup</h2>
<hr>
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


<?= form_open(base_url('user/user_register')); ?>




<div class="form-group">
    <label for="user_fullname">Full Name <span title="Mandatory" class="colorred">*</span></label>
    <?php echo form_input(['name'=>'user_fullname', 'id'=>'user_fullname', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Your Full Name', 'value'=>set_value('user_fullname')]); ?>
    <?php echo form_error('user_fullname'); ?>
    <!-- <textarea class="form-control" id="proverbstatement" placeholder="Enter Proberb" style="font-size: 14pt"></textarea> -->
    <small id="" class="form-text text-muted">Type your full name here</small>
</div>

<div class="form-group">
    <label for="user_email">Email <span title="Mandatory" class="colorred">*</span></label>
    <?php echo form_input(['name'=>'user_email', 'id'=>'user_email', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Your Email here', 'value'=>set_value('user_email')]); ?>
    <?php echo form_error('user_email'); ?>
    <small id="" class="form-text text-muted">Type your email here</small>
</div>


<div class="form-group">
    <label for="username">Username <span title="Mandatory" class="colorred">*</span></label>
    <?php echo form_input(['name'=>'user_name', 'id'=>'user_name', 'class'=>'form-control', 'placeholder'=>'Enter your desired username here', 'value'=>set_value('user_name')]); ?>
    <?php echo form_error('user_name'); ?>
    <small id="" class="form-text text-muted">Type your desired username here</small>
</div>

<div class="form-group">
    <label for="user_password">Password <span title="Mandatory" class="colorred">*</span></label>
    <?php echo form_input(['name'=>'user_password', 'id'=>'user_password', 'class'=>'form-control', 'placeholder'=>'Enter your desired password here', 'value'=>set_value('user_password')]); ?>
    <?php echo form_error('user_password'); ?>
    <small id="" class="form-text text-muted">Type your desired password here</small>
</div>

<div class="form-group">
    <label for="user_conf_password">Confirm Password <span title="Mandatory" class="colorred">*</span></label>
    <?php echo form_input(['name'=>'user_conf_password', 'id'=>'user_conf_password', 'class'=>'form-control', 'placeholder'=>'Confirm your password', 'value'=>set_value('user_conf_password')]); ?>
    <?php echo form_error('user_conf_password'); ?>
    <small id="" class="form-text text-muted">Type  your desired password again</small>
</div>

<!-- <div class="form-group">
    <label for="user_nativelang">Native Language</label>
    <?php echo form_input(['name'=>'user_nativelang', 'id'=>'user_nativelang', 'class'=>'form-control', 'placeholder'=>'Enter your native language here', 'value'=>set_value('user_nativelang')]); ?>
    <?php echo form_error('user_nativelang'); ?>
    <small id="" class="form-text text-muted">Type your Native Language here</small>
</div> -->

<div class="form-group">
    <label for="user_nativelang">Native Language <span title="Mandatory" class="colorred">*</span> </label>
	<?php
	$nativelang = "";
	if(!empty($user_nativelang)){
		 $nativelang = set_value('user_nativelang', $user_nativelang);
	}
	?>
    <?php  echo form_dropdown('user_nativelang', $user_lang, $nativelang, 'id="user_nativelang" class="form-control"');  ?>
    <?php echo form_error('user_nativelang'); ?>
    <small id="" class="form-text text-muted">Select your Native Language here </small>
</div>




<!-- <?php 
    // $js = 'id="shirts" class="form-control" onChange="myfunc('.[$select_langs->lang_id].');"';
    // echo form_dropdown('select_lang', $select_langs, '', $js);
    // echo form_dropdown('user_nativelang', $select_langs, '', 'id="project" class="form-control"');
    // echo $this->$select_langs->lang_id;
    // echo form_dropdown("project",     $project_list,'',);
?> -->


<div class="form-group">
    <label for="user_otherlang">Other Language(s)</label>
    <?php echo form_input(['name'=>'user_otherlang', 'id'=>'user_otherlang', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter language(s) that you have learn\'t', 'value'=>set_value('user_otherlang')]); ?>
    <?php echo form_error('user_otherlang'); ?>
    <small id="" class="form-text text-muted">Type your Language(s) that you know and speak</small>
</div>


<div class="form-group">
    <label for="user_country">Country <span title="Mandatory" class="colorred">*</span> </label>
    <?php echo form_input(['name'=>'user_country', 'id'=>'user_country', 'class'=>'form-control', 'placeholder'=>'Enter name of your Country', 'value'=>set_value('user_country')]); ?>
    <?php echo form_error('user_country'); ?>
    <small id="" class="form-text text-muted">Type your country here</small>
</div>


<div class="form-group">
    <label for="user_address">State/Province</label>
    <?php echo form_input(['name'=>'user_address', 'id'=>'user_address', 'class'=>'form-control', 'placeholder'=>'Enter your address', 'value'=>set_value('user_address')]); ?>
    <?php echo form_error('user_address'); ?>
    <small id="" class="form-text text-muted">Type your address here</small>
</div>

<div class="form-group">
    <label for="user_department">Department</label>
    <?php echo form_input(['name'=>'user_department', 'id'=>'user_department', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter your department or University', 'value'=>set_value('user_department')]); ?>
    <?php echo form_error('user_department'); ?>
    <small id="" class="form-text text-muted">Type your department/university here</small>
</div>

<div class="form-group">
    <label for="user_bio">Bio</label>
    <?php echo form_textarea(['name'=>'user_bio', 'id'=>'user_bio', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter little bio of yourself - Mandatory', 'value'=>set_value('user_bio')]); ?>
    <?php echo form_error('user_bio'); ?>
    <small id="" class="form-text text-muted">What else you want to tell us. It will be shown on your profile</small>
</div>




<?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Submit', 'id'=>'submit']); ?>
  <!-- <button type="submit" class="btn btn-success my-2 my-sm-0">Submit</button> -->
</form>
<!-- <?php
    // echo validation_errors();
?> -->


 </div>

<br>

<!-- <script> 
document.getElementById('user_nativelang').addEventListener('change', selectId);
function selectId(){
    // alert ($('#user_nativelang').val());
    // alert(this.options[this.selectedIndex].id);
}
</script>
-->
<!-- https://stackoverflow.com/questions/40257737/getting-a-drop-down-list-from-a-database-in-codeigniter/40257838 -->
<!-- https://maangatech.com/how-to-populate-drop-down-input-from-database-in-codeigniter/ -->


<?php include('public_footer.php'); ?>
