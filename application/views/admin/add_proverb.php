<?php include('admin_header.php'); ?>

<div class="container"> 

<h2>Add Proverb</h2>
<?php
if ($feedback = $this->session->flashdata('feedback')):
  $feedback_class = $this->session->flashdata('feedback_class');
?>
<div class="row">
  <div class="col col-lg-6">
      <div class="alert alert-dismisible <?= $feedback_class ?>" role="alert">
      <?= $feedback ?> 
      </div>
  </div>
</div>  
<?php endif; ?> 


<?= form_open('http://localhost/proverbona1/dashboard/insert_proverb'); ?>
<!-- <form> dashboard/insert_proverb -->
  <div class="form-group">
  <label for="proverb_lang">Select Language</label>
    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="proverb_lang">
          <option selected>Choose Language...</option>
          <option value="1">Pashto</option>
          <option value="2">English</option>
          <option value="3">Urdu</option>
          <option value="4">Add Your Language</option>
    </select>
    <small id="" class="form-text text-muted">Choose language for which you want to enter proverb</small>

</div>


<?php echo form_hidden('proverb_lang', '1'); ?>
    

<div class="form-group">
    <label for="proverb_statement">Proverb - (Proverb Statement)</label>
    <?php echo form_textarea(['name'=>'proverb_statement', 'id'=>'proverb_statement', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Proverb', 'value'=>set_value('proverb_statement')]); ?>
    <?php echo form_error('proverb_statement'); ?>
    <!-- <textarea class="form-control" id="proverbstatement" placeholder="Enter Proberb" style="font-size: 14pt"></textarea> -->
    <small id="" class="form-text text-muted">Type statement of Proverb here</small>
  </div>

  <div class="form-group">
    <label for="proverb_latin_eng">Proverb in Latin English</label>
    <?php echo form_textarea(['name'=>'proverb_latin_eng', 'id'=>'proverb_latin_eng', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter in Latin English', 'value'=>set_value('proverb_latin_eng')]); ?>
    <?php echo form_error('proverb_latin_eng'); ?>
    <small id="" class="form-text text-muted">Type in Latin English</small>
  </div>


  <div class="form-group">
    <label for="proverb_introduction">Proverb Introduction</label>
    <?php echo form_textarea(['name'=>'proverb_introduction', 'id'=>'proverb_introduction', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Proverb introduction to simply understand what it is all about', 'value'=>set_value('proverb_introduction')]); ?>
    <?php echo form_error('proverb_introduction'); ?>
    <small id="" class="form-text text-muted">Type Introduction of Proverb in plan Pashto</small>
  </div>

  <div class="form-group">
    <label for="proverb_eng_meaning">Proverb English Meaning</label>
    <?php echo form_textarea(['name'=>'proverb_eng_meaning', 'id'=>'proverb_eng_meaning', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter English Meaning', 'value'=>set_value('proverb_eng_meaning')]); ?>
    <?php echo form_error('proverb_eng_meaning'); ?>
    <small id="" class="form-text text-muted">Type meaning of Proberb in English</small>
  </div>

  <div class="form-group">
    <label for="proverb_history">Proverb History</label>
    <?php echo form_textarea(['name'=>'proverb_history', 'id'=>'proverb_history', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter History', 'value'=>set_value('proverb_history')]); ?>
    <?php echo form_error('proverb_history'); ?>
    <small id="" class="form-text text-muted">Type History/Historical Reference/Story or Reference for above entered Proberb</small>
  </div>


  <div class="form-group">
    <label for="proverb_reference">Proverb Reference</label>
    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="proverb_reference">
          <option selected>Choose...</option>
          <option value="1">Rohi Mataluna - Raj Wali Shah et al</option>
          <option value="2">Matalona - Dr. Sultan Room</option>
          <option value="3">Someones mouth</option>
          <option value="3">Other</option>
    </select>
    <small id="" class="form-text text-muted">From where Proverb is taken, where did you see this proverb?</small>
    <div style="display: none">
      <label for="otherref">Other (If selected other)</label>
      <input type="text" class="form-control" id="otherref" placeholder="Reference">
    </div>
  </div>


  <?php echo form_hidden('proverb_reference', '1'); ?>
    

  <div class="form-group">
    <label for="proverb_tags">Proverb Tags</label>
    <?php echo form_textarea(['name'=>'proverb_tags', 'id'=>'proverb_tags', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'Enter Tags', 'value'=>set_value('proverb_tags')]); ?>
    <?php echo form_error('proverb_tags'); ?>
    <small id="" class="form-text text-muted">Type History/Historical Reference/Story or Reference for above entered Proberb</small>
  </div>

  <?php echo form_hidden('proverb_addedby', '1'); ?>
    


<?php echo form_submit(['name'=>'Submit', 'class'=>'btn btn-success my-2 my-sm-0', 'value'=>'Submit', 'id'=>'submit']); ?>
  <!-- <button type="submit" class="btn btn-success my-2 my-sm-0">Submit</button> -->
</form>
<!-- <?php
    echo validation_errors();
?> -->





 </div>



<?php include('admin_footer.php'); ?>