<?php 
if ($this->session->userdata('login_id')) { 
    include(__DIR__ . '../../admin/admin_header.php'); 
}else{include('public_header.php');}
?> 

<div class="container">
    <h2>Search</h2>
    <p>List of Proverbs</p>
    <p class="text-right">
        <?php 
         echo anchor('proverb/add_proverb', 'Add New', "class='btn btn-warning'");
        ?>
    </p>
    <p class="text-left">
    <?php 
        $search_term = $this->uri->segment(3);
        echo "Total {$total_all_proverbs} Results found for: <strong>". urldecode($search_term) . "</strong>"; 
    ?>
    </p>
    <p class="text-right">
        <?php echo "<strong>" . count($all_proverb1)."</strong> out of " . "<strong>".  
                                $total_all_proverbs ." </strong>showing"; ?>
    </p>
<div class="row">
    <div class="col-lg-10 col-sm-8" style="padding-top:4px">
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
                // $key = $this->input->post('rating_proverb_rating_value');
                // $value = $options[$key];
                // $this->input->post('DefaultSalary');
                // echo form_dropdown('rating_proverb_rating_value', $options, 'Display', $attributes);
                echo form_dropdown('rating_proverb_rating_value', $options, set_value('rating_proverb_rating_value'), $attributes);
                // $key = $this->input->post('rating_proverb_rating_value');
                // $value = $options[$key];
                // $this->input->post('DefaultSalary');
                
                echo form_error('rating_proverb_rating_value'); 
        ?>
    </div>
    <div class="col-lg-2 col-sm-4" style="padding-top:4px">
        <?php
                // echo anchor("proverb/display/{$options}", 'Submit', 'attributes');
                echo  form_submit('Submit', 'Filter', ['value', 'class'=>'form-control']);
                echo form_close();
  
  ?>
    </div>
</div>
<br>
 
    <?php if (count($all_proverb1)):?>
        <?php foreach ($all_proverb1 as $all_proverbss): ?> 
        
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
            </a>
             <br>
        <?php endforeach; ?>    
    <?php endif; ?>

    <?php if (count($all_proverb1) == 0){
        echo "<p>Nothing to display</p>";
    } else if (count($all_proverb1) > 10){ ?>

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
    
    <?php }?>
    
        

    <?php echo $this->pagination->create_links(); ?>

</div>


<br><br><br><br><br>
<?php include('public_footer.php'); ?>