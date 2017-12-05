<?php include 'admin_head.php'?>
   <div class="container">
    
     <?= form_open_multipart('admin/store_article',['class'=>'form-horizontal']);?>
     <?= form_hidden('user_id',$this->session->userdata('userid'))?>
     <?= form_hidden('c_date',date('Y-m-d H:i:s'))?>
  <fieldset>
    <legend>Add Articles</legend>
    
   <div class="row">
     <div class="col-lg-6">
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Article Title</label>
            <div class="col-lg-6">
               <?= form_input(['name'=>'title', 'class'=>'form-control', 'id' => 'title', 'placeholder' => 'Article Title', 'value'=>set_value('title')]);?>
                  <!--input type="text" class="form-control" id="inputEmail" placeholder="Email"-->
            </div>
            <div class="col-lg-4">
              <?= form_error('title','<p class ="text-danger">','</p>'); ?>
            </div>
        </div>
     </div>
   </div>

   

   <div class="row">
     <div class="col-lg-6">
             <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">Article body</label>
              <div class="col-lg-6">
                  <?= form_textarea(['name'=>'body', 'class'=>'form-control', 'id' => 'body', 'placeholder' => 'Article body', 'value'=>set_value('body')]);?>
                  <!--input type="password" class="form-control" id="inputPassword" placeholder="Password"-->
                  
              </div>
              <div class="col-lg-4">
                 <?= form_error('body','<p class ="text-danger">','</p>'); ?>
                
              </div>
    </div>
     </div>
   </div>
      
   
  <div class="row">
     <div class="col-lg-6">
          <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Select Image</label>
            <div class="col-lg-6">
               <?= form_upload(['name'=>'image', 'class'=>'form-control']);?>
                  <!--input type="text" class="form-control" id="inputEmail" placeholder="Email"-->
            </div>
            <div class="col-lg-4">
              <?php if(isset($upload_error)) echo $upload_error; ?>
            </div>
        </div>
     </div>
   </div>
  
   
    <div class="form-group">
      <div class="col-lg-6 col-lg-offset-2">
        <!--button type="reset" class="btn btn-default">Cancel</button-->
        <?= form_reset(['type'=>'reset', 'class'=>'btn btn-default','value' => 'Reset'])?>
        <?= form_submit([ 'class'=>'btn btn-primary','value' => 'Submit'])?>
        <!--button type="submit" class="btn btn-primary">Submit</button-->
      </div>
    </div>
  </fieldset>
</form>

</div>
<?php include 'admin_foot.php'?> 