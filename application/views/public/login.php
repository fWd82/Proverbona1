<?php include('public_header.php'); ?>

<div class="container"> 

<h2>Login</h2>
<hr>

<div class="alert alert-warning text-left alert-dismissible fade show" role="alert">
  Dummy Username/Password
  <br>
  <strong>Username:</strong> fWd82
  <br>
  <strong>Password:</strong> fawad82
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</div>

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

<?= form_open(base_url('user/user_login')); ?>


<div class="form-group">
    <label for="user_name">Username or Email</label>
    <?php echo form_input(['name'=>'user_name', 'id'=>'user_name', 'class'=>'form-control', 'placeholder'=>'Enter Your Username', 'value'=>set_value('user_name', 'fWd82')]); ?>
    <?php echo form_error('user_name'); ?>
    </div>

<div class="form-group">
    <label for="user_password">Password</label>
    <?php echo form_input(['name'=>'user_password', 'id'=>'user_password', 'class'=>'form-control', 'placeholder'=>'Enter Your Password here', 'value'=>set_value('user_password', 'fawad82')]); ?>
    <?php echo form_error('user_password'); ?>
</div>


<?php echo form_submit(['name'=>'Login', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Login', 'id'=>'login']); ?>
  <!-- <button type="submit" class="btn btn-success my-2 my-sm-0">Submit</button> -->

  <div class="form-group">
    <p>Don't have account? Register <strong><?= anchor('user/signup', 'HERE'); ?></strong></p>
    
  </div>

</form>
<!-- <?php
    // echo validation_errors();
?> -->
</div>



<?php include('public_footer.php'); ?>