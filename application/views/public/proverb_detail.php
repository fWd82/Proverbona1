<?php 
if ($this->session->userdata('login_id')) { 
    include(__DIR__ . '../../admin/admin_header.php'); 
}else{include('public_header.php');}
?>

<?php $user_id = $this->session->userdata('login_id'); ?>

<div class="container"> 

    <h2>Proverb Detail</h2>
    <hr>

    <?php // Show Edit and Add to Favorite Buttons only if user if logged in. Otherwise hide it.
      if($this->session->userdata('login_id')){
        echo '<div class="text-right">';

        // Edit proverb only if user have editing previlige
        if (!$my_proverbs->proverb_is_protected && $my_proverbs->user_can_contribute) {
            echo anchor("proverb/edit_proverb/{$my_proverbs->proverb_id}", 'Edit Proverb', "class='btn btn-success'"); 
        }
        // Delete Proverb, only if user logged in Admin
        if ($this->session->userdata('login_usertype') == 'admin') {
          echo '&nbsp';
          echo anchor("admin/delete_proverb/{$my_proverbs->proverb_id}", 'Delete Proverb', "class='btn btn-danger'");           
        }
        echo '&nbsp';

        

        if (!$if_added_to_favorite > 0) {
          // print_r("True: " . $if_added_to_favorite);
          echo anchor("favorites/add_to_favorite/{$my_proverbs->proverb_id}/{$my_proverbs->lang_id}", 'Add to Favorites', "class='btn btn-warning'"); 
        }else{
          echo anchor("favorites/delete_favorite/{$my_proverbs->user_id}/{$my_proverbs->proverb_id}", 'Delete from Favorites', "class='btn btn-danger'");  
        }
        echo '</div>';
      }
    ?>

    <div class="row">
        <div class="col col-lg-12">
            <p> <?= "<strong>Proverb ID:</strong> " .               $my_proverbs->proverb_id . " | <strong>Proverb Language:</strong> " .       $my_proverbs->lang_name ; ?></p>
            <h3 class=""> <?= $my_proverbs->proverb_statement; ?></h3> 
            <p> <?= "<strong>Added By:</strong> " .                 anchor(base_url('user/user_profile'). "/{$my_proverbs->user_name}", $my_proverbs->user_name);?></p>
            <p> <?= "<strong>Latin English:</strong> " .            htmlspecialchars($my_proverbs->proverb_latin_eng); ?></p>
            <p> <?= "<strong>Proverb Introduction:</strong> " .     htmlspecialchars($my_proverbs->proverb_introduction); ?></p>
            <p> <?= "<strong>Proverb English Meaning:</strong> " .  htmlspecialchars($my_proverbs->proverb_eng_meaning); ?></p>
            <p> <?= "<strong>Proverb History:</strong> " .          htmlspecialchars($my_proverbs->proverb_history); ?></p>
            <p> <?= "<strong>Proverb Reference:</strong> " .        anchor(base_url('reference/reference_profile')."/{$my_proverbs->reference_id}", $my_proverbs->reference_category . ": " . $my_proverbs->reference_title . " " . $my_proverbs->reference_author); ?></p>
            <p> <?= "<strong>Proverb Tags:</strong> " .             $my_proverbs->proverb_tags; ?></p>
            <p> <?= "<strong>Date Added:</strong> " .               date("D, d M Y", strtotime($my_proverbs->proverb_timestamp));?></p>
            <p> <?= "<strong>Last Updated:</strong> " .             date("D, d M Y", strtotime($my_proverbs->proverb_last_updated)); ?></p>

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
  
  <!-- Show rate proverb only if user if logged in. Otherwise hide it. -->
  <?php
  if($this->session->userdata('login_id')){ ?>
    <!-- Inser Proverb Rating to DB -->
    <div class="row">      
      <?= form_open(base_url('proverb/rate_proverb')); ?> 
        <div class="form-group">
        <label for="rating_proverb_rating_value">Proverb Rating</label>

      <!--
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
      -->
   <br>
    <?php echo form_hidden('user_id', $user_id); ?>
    <?php echo form_hidden('proverb_id', $my_proverbs->proverb_id); ?>
    
    <div class="form-check form-check-inline">
      <label class="form-check-label">
        <input class="form-check-input" type="radio" name="rating_proverb_rating_value" id="inlineRadio1" value="1">1
      </label>
    </div>
    <div class="form-check form-check-inline">
      <label class="form-check-label">
          <input class="form-check-input" type="radio" name="rating_proverb_rating_value" id="inlineRadio2" value="2">2
      </label>
    </div>
    <div class="form-check form-check-inline">
      <label class="form-check-label">
          <input class="form-check-input" type="radio" name="rating_proverb_rating_value" id="inlineRadio3" value="3">3
      </label>
    </div>
    <div class="form-check form-check-inline">
      <label class="form-check-label">
          <input class="form-check-input" type="radio" name="rating_proverb_rating_value" id="inlineRadio4" value="4">4
      </label>
    </div>
    <div class="form-check form-check-inline">
      <label class="form-check-label">
          <input class="form-check-input" type="radio" name="rating_proverb_rating_value" id="inlineRadio5" value="5">5
      </label>
    </div>

    <br>  
    <?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Submit', 'id'=>'submit']); ?>
    
    </form>  

    <?php }else{
      echo '<small id="" class="form-text text-muted">' . anchor('user', 'Login') . ' to Rate/Edit this Proverb</small>';
    } ?>

  <hr>


  <div class="col col-lg-12">
      <h4>LINKED Proverbs - Same proverb in other Languages</h4>
      <div class="smthing">
        <div class="row">
          Linked Proverbs will be shown here (for example in English).
      </div>
    </div>
    <br>
    <div class="smthing">
        <div class="row">
          Other Linked Proverbs will be shown here (for example in Urdu) .
      </div>
    </div>

    </div>
  <!-- div to show all related links  
  <?php if (count($all_proverb1)):?>
    <?php foreach ($all_proverb1 as $all_proverbss): ?> 
    

      


    <div class="col col-lg-12">
      <h4>LINKED - Same verson in other Languages</h4>
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
    <?php endforeach; ?>    
  <?php endif; ?>  
             --> 
    


  </div>


    </div>

  <br><br> <br><br>


  </div>
</div> <!-- eof class="container" -->
<?php include('public_footer.php'); ?>