<?php include('admin_header.php'); ?>


<div class="container">
    <h2>Feedback</h2>
    <p>List of All Feedbacks</p>
    <p class="text-right">
        <?php 
        //  echo anchor('proverb/add_proverb', 'Add New', "class='btn btn-warning'");
        ?>
    </p>
    <p class="text-right">
        <?php echo "<strong>" . count($all_feedbacks1)."</strong> out of " . "<strong>".  
                                $total_all_feedbacks ." </strong>showing"; ?>
    </p>
<!--    
<div class="row">
    <div class="col-lg-10 col-sm-8">
        <?php
           
            
                $options = array(
                    ''          => 'Display All Proverbs',
                    '1'         => 'Display English Proverbs',
                    '2'         => 'Display Pashto Proverbs',
                    '3'         => 'Display Urdu Proverbs',
                    '4'         => 'Display Farsi Proverbs',
                    '5'         => 'Display Arabic Proverbs',
                    'selected'  => 'selected' );
                $attributes = array(
                    'id'    => 'rating_proverb_rating_value',
                    'class' => 'form-control'
                );
                echo form_open(base_url("proverb/display/")) ;
                echo form_dropdown('rating_proverb_rating_value', $options, set_value('rating_proverb_rating_value'), $attributes);
                echo form_error('rating_proverb_rating_value'); 
        ?>
    </div>
    
    <div class="col-lg-2 col-sm-4" style="padding-top:4px">
        <?php 
                echo  form_submit('Submit', 'Filter', ['value', 'class'=>'form-control']);
                echo form_close();
  
  ?>
    </div>
</div>-->
<br>
 
    <?php if (count($all_feedbacks1)):?>
        <?php foreach ($all_feedbacks1 as $all_feedbackss): ?> 
        
            <div class="smthing">
                <div class="row">
                    <div class="col col-lg-6" style="background:rgb(248, 255, 255)">Added By:  <?= $all_feedbackss->user_name; ?> </div>
                    <div class="col col-lg-6" style="background:rgb(245, 244, 244)">Submitted at: <?= date('d M Y H:i', strtotime($all_feedbackss->feedback_timestamp)); ?></div>
                </div>

                <div class="row">
                    <!-- <div class="col col-12" style="background:#eee; height: 50px; text-align: center; font-size: 20pt"> <?= anchor(base_url('#') . "/{$all_feedbackss->feedback_id}", $all_feedbackss->feedback_title); ?> </div> -->
                    <div class="col col-12" style="background:#eee; height: 50px; text-align: center; font-size: 20pt"> <?= anchor(base_url('admin/show_feedbacks#'), $all_feedbackss->feedback_title); ?> </div>
                </div>

                <div class="row">
                    <div class="col col-lg-12" style="background:rgb(221, 221, 221)">Feedback Body:  <?= $all_feedbackss->feedback_body; ?>  </div>
                </div>

                <div class="row">
                    <div class="col col-7" style="background:rgb(248, 255, 255)">Feedback Context:  <?= $all_feedbackss->feedback_context; ?> </div>
                    <div class="col col-5" style="background:rgb(245, 244, 244)">Feedback Type:   <?= $all_feedbackss->feedback_type; ?>  </div>
                </div>
            </div>
            </a>
             <br>
        <?php endforeach; ?>    
    <?php endif; ?>

    <?php if (count($all_feedbacks1) == 0){
        echo "<p>Nothing to display</p>";
    }?>
    
        

<?php echo $this->pagination->create_links(); ?>
<div class="row">
    <div class="col-lg-1 offset-lg-8 col-md-3 offset-md-4 col-sm-3 offset-sm-4">
        Display
    </div>
    <div class="col-lg-3 col-md-5 col-sm-5">
        <div class="">
                <?php
                    echo form_open(base_url("proverb/display/"));
                    $options = array(
                        ''          => '10',
                        '1'         => '50',
                        '2'         => '100',
                        '3'         => '500',
                        '4'         => '1000');
                    $attributes = array(
                        'id'    => 'proverb_show_item',
                        'class' => 'form-control'
                    );
                    // https://stackoverflow.com/questions/16087560/codeigniter-grab-value-from-dropdown-pass-to-controller
                    echo form_dropdown('proverb_show_item', $options, set_value('proverb_show_item'), $attributes);
                    echo form_error('proverb_show_item'); 
                ?>
        </div>
    </div>        

    </div>

</div>


<br><br><br><br><br>
<?php include('admin_footer.php'); ?>