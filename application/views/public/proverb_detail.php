<?php 
if ($feedback_by = $this->session->userdata('login_id')) {
    // include('../admin/admin_header.php'); 
    require_once('application/views/admin/admin_header.php'); 
}else{include('public_header.php');}
?>


<?php $user_id = $this->session->userdata('login_id'); ?>
<div class="container"> 

    <h2>Proverb Detail</h2>
    <hr>
    <div class="row">
        <div class="col col-lg-12">
        
            <p> <?= "<strong>Proverb ID:</strong> " .       $my_proverbs->proverb_id . " | <strong>Proverb Language:</strong> " .       $my_proverbs->lang_name ; ?></p>
            <h3> <?= $my_proverbs->proverb_statement; ?></h3> 
            <p> <?= "<strong>Added By:</strong> " .   anchor(base_url('home/user_profile'). "/{$my_proverbs->user_name}", $my_proverbs->user_name);?></p>
            <p> <?= "<strong>Latin English:</strong> " .       $my_proverbs->proverb_latin_eng; ?></p>
            <p> <?= "<strong>Proverb Introduction:</strong> " .       $my_proverbs->proverb_introduction; ?></p>
            <p> <?= "<strong>Proverb English Meaning:</strong> " .       $my_proverbs->proverb_eng_meaning; ?></p>
            <p> <?= "<strong>Proverb History:</strong> " .       $my_proverbs->proverb_history ; ?></p>
            <p> <?= "<strong>Proverb Reference:</strong> " .  anchor(base_url('home/reference_profile')."/{$my_proverbs->reference_id}", $my_proverbs->reference_category . ": " . $my_proverbs->reference_title . " " . $my_proverbs->reference_author); ?></p>
            <p> <?= "<strong>Proverb Tags:</strong> " .       $my_proverbs->proverb_tags; ?></p>
            <p> <?= "<strong>Date Added:</strong> " .       $my_proverbs->proverb_timestamp ; ?></p>
        </div>
    </div>
<hr>

    <div class="row">
          
      <?= form_open(base_url('dashboard/rate_proverb')); ?> 
        <div class="form-group">
        <label for="rating_proverb_rating_value">Proverb Rating</label>
        <?php echo form_input(['name'=>'rating_proverb_rating_value', 'id'=>'rating_proverb_rating_value', 'class'=>'form-control', 'placeholder'=>'Enter rating', 'value'=>set_value('rating_proverb_rating_value')]); ?>
        <?php echo form_error('proverb_latin_eng'); ?>
        <small id="" class="form-text text-muted">Type in Latin English</small>
      </div> 
    <?php echo form_hidden('user_id', $user_id); ?>
    <?php echo form_hidden('proverb_id', $my_proverbs->proverb_id); ?>

    <?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Submit', 'id'=>'submit']); ?>
      <!-- <button type="submit" class="btn btn-success my-2 my-sm-0">Submit</button> -->
    </form>
    
    </div>
<br><br><br><br>



</div>

<?php include('public_footer.php'); ?>
