<?php 
if ($feedback_by = $this->session->userdata('login_id')) {
    require_once('application/views/admin/admin_header.php'); 
}else{include('public_header.php');}
?>

<?php $user_id = $this->session->userdata('login_id'); ?>

<div class="container"> 

    <h2>Proverb Detail</h2>
    <hr>

    <?php // Show Edit and Add to Favorite Buttons only if user if logged in. Otherwise hide it.
      if($this->session->userdata('login_id')){
        echo '<div class="text-right">';
        echo anchor("proverb/edit_proverb/{$my_proverbs->proverb_id}", 'Edit Proverb', "class='btn btn-success'"); 
        echo '&nbsp';
        echo anchor("proverb/add_to_favorite/{$my_proverbs->proverb_id}", 'Add to Favorites', "class='btn btn-warning'"); 
        echo '</div>';
      }
    ?>

    <div class="row">
        <div class="col col-lg-12">
            <p> <?= "<strong>Proverb ID:</strong> " .               $my_proverbs->proverb_id . " | <strong>Proverb Language:</strong> " .       $my_proverbs->lang_name ; ?></p>
            <h3 class=""> <?= $my_proverbs->proverb_statement; ?></h3> 
            <p> <?= "<strong>Added By:</strong> " .                 anchor(base_url('user/user_profile'). "/{$my_proverbs->user_name}", $my_proverbs->user_name);?></p>
            <p> <?= "<strong>Latin English:</strong> " .            $my_proverbs->proverb_latin_eng; ?></p>
            <p> <?= "<strong>Proverb Introduction:</strong> " .     $my_proverbs->proverb_introduction; ?></p>
            <p> <?= "<strong>Proverb English Meaning:</strong> " .  $my_proverbs->proverb_eng_meaning; ?></p>
            <p> <?= "<strong>Proverb History:</strong> " .          $my_proverbs->proverb_history ; ?></p>
            <p> <?= "<strong>Proverb Reference:</strong> " .        anchor(base_url('reference/reference_profile')."/{$my_proverbs->reference_id}", $my_proverbs->reference_category . ": " . $my_proverbs->reference_title . " " . $my_proverbs->reference_author); ?></p>
            <p> <?= "<strong>Proverb Tags:</strong> " .             $my_proverbs->proverb_tags; ?></p>
            <p> <?= "<strong>Date Added:</strong> " .               date("D, d M Y", strtotime($my_proverbs->proverb_timestamp));?></p>
            
            <!-- Fetching list of contributors for edit page -->
            <?php if (count($proverb_contributors)):?>
              <p> <?= "<strong>Contributors:</strong> "?>
                <?php foreach ($proverb_contributors as $proverb_contributors1): ?> 
                <?= anchor(base_url('user/user_profile'). "/{$proverb_contributors1->user_name}", $proverb_contributors1->user_name) . ", "; ?>
                <?php endforeach; ?>
              </p>
            <?php endif; ?>
           

        </div>
    </div>

    <!-- Fetch Proverb Rating for individual Proverb -->
    <div class="text-right">
        <?php $rating_given = 0; $total_rating = 0;
          if ($proverbs_rating) {
            foreach ($proverbs_rating as $total_no_of_proverbs_starss){
              $rating_given += $total_no_of_proverbs_starss->rating_proverb_rating_value; 
            }
            $total_rating = count($proverbs_rating);
            $total_rating_divide = ($rating_given/$total_rating);
            echo "<h4>Proverb Rating: " . round($total_rating_divide, 1) . " (of total: " . $total_rating . ")</h4>";
          }else{ $proverbs_rating = 0;
            echo "<h4>Proverb Rating: 0"; 
          }
        ?>
    </div>

    <hr>
    
  <?php // Show rate proverb only if user if logged in. Otherwise hide it.
  if($this->session->userdata('login_id')){ ?>
    <!-- Inser Proverb Rating ti DB -->
    <div class="row">      
      <?= form_open(base_url('proverb/rate_proverb')); ?> 
        <div class="form-group">
        <label for="rating_proverb_rating_value">Proverb Rating</label>
        <!-- <?php echo form_input(['name'=>'rating_proverb_rating_value', 'id'=>'rating_proverb_rating_value', 'class'=>'form-control', 'placeholder'=>'Enter rating', 'value'=>set_value('rating_proverb_rating_value')]); ?> -->
        
        <?php 
        $options = array(
          ''          => 'Rate Proverb ...',
          '1'         => '1',
          '2'         => '2',
          '3'         => '3',
          '4'         => '4',
          '5'         => '5' );
        $attributes = array(
          'id'    => 'rating_proverb_rating_value',
          'class' => 'form-control'
        );
        echo 
        form_dropdown('rating_proverb_rating_value', $options, 'Rate Proverb', $attributes);
        ?>
        <?php echo form_error('rating_proverb_rating_value'); ?>
        <small id="" class="form-text text-muted">Rate this proverb out of 5</small>
    </div> 
  
    <?php echo form_hidden('user_id', $user_id); ?>
    <?php echo form_hidden('proverb_id', $my_proverbs->proverb_id); ?>
    <?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Submit', 'id'=>'submit']); ?>
    
    </form>  

  <?php }else{
      echo '<small id="" class="form-text text-muted">Login to Rate/Edit this Proverb</small>';
    } ?>

  <hr>

    </div>

<br><br><br><br>


 
</div>

<?php include('public_footer.php'); ?>