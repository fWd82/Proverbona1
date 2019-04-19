<?php include('admin_header.php'); ?>

<div class="container"> 
    
    
    <br><h2> Link </h2> 
    <p> Link two proverbs of same context but of different language </p> 
 
    <div class="row">
        <div class="col-lg-12">
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


            <?= form_open(base_url('dashboard/#')); ?>
        
            <h3> First Proverb </h3> 

            <div class="form-group">
                <label for="proverb_lang"> Select Language<span title="Mandatory" class="colorred">*</span> </label>
                <?php
                $nativelang = "";
                if(!empty($proverb_lang)){
                    $nativelang = set_value('proverb_lang', $user_nativelang);
                }
                ?>
                <?php  echo form_dropdown('proverb_lang', $user_lang, $nativelang, 'id="proverb_lang" class="form-control"');  ?>
                <?php echo form_error('proverb_lang'); ?>
                <small id="" class="form-text text-muted">Select First Language for which you want to link with another proverb</small>
            </div>



            <div class="form-group">
                <label for="proverb_statement">Proverb - (Proverb Statement)</label>
                <?php echo form_input(['name'=>'proverb_statement', 'id'=>'proverb_statement', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter First Proverb', 'value'=>set_value('proverb_statement')]); ?>
                <?php echo form_error('proverb_statement'); ?>
                <!-- <textarea class="form-control" id="proverbstatement" placeholder="Enter Proberb" style="font-size: 14pt"></textarea> -->
                <small id="" class="form-text text-muted">Type statement of Proverb here</small>
            </div>

            <!-- -=============================== -->
        
        <hr>
        <h3> Second Proverb </h3> 
            <div class="form-group">
                <label for="proverb_lang"> Select Language<span title="Mandatory" class="colorred">*</span> </label>
                <?php
                $nativelang = "";
                if(!empty($proverb_lang)){
                    $nativelang = set_value('proverb_lang', $user_nativelang);
                }
                ?>
                <?php  echo form_dropdown('proverb_lang', $user_lang, $nativelang, 'id="proverb_lang" class="form-control"');  ?>
                <?php echo form_error('proverb_lang'); ?>
                <small id="" class="form-text text-muted">Select Language of another Proberb that you want to link with first one</small>
            </div>

            
            <div class="form-group">
                <label for="proverb_statement">Proverb - (Proverb Statement)</label>
                <?php echo form_input(['name'=>'proverb_statement', 'id'=>'proverb_statement', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Second Proverb', 'value'=>set_value('proverb_statement')]); ?>
                <?php echo form_error('proverb_statement'); ?>
                <!-- <textarea class="form-control" id="proverbstatement" placeholder="Enter Proberb" style="font-size: 14pt"></textarea> -->
                <small id="" class="form-text text-muted">Type statement of Proverb here</small>
            </div>

            <!-- -=============================== -->
        
            <?php echo form_hidden('proverb_addedby', '1'); ?>
                
            <?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Link', 'id'=>'submit']); ?>
            </form>


        </div>
    </div>
</div>
<br><br>
<?php include('admin_footer.php'); ?>