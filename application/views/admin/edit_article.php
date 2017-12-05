<?php include 'admin_head.php'?>
   <div class="container">
    
     <?= form_open("admin/update_article/{$article_id}",['class'=>'form-horizontal']);?>
     
  <fieldset>
    <legend>Edit Articles</legend>
    
   
      <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Article Title</label>
      <div class="col-lg-6">
       <?= form_input(['name'=>'title', 'class'=>'form-control', 'id' => 'title', 'placeholder' => 'Article Title', 'value'=>set_value('title',$article->title)]);?>
        <!--input type="text" class="form-control" id="inputEmail" placeholder="Email"-->
      </div>
      <div class="col-lg-4">
       <?= form_error('title','<p class ="text-danger">','</p>'); ?>
        
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Article body</label>
      <div class="col-lg-6">
        <?= form_textarea(['name'=>'body', 'class'=>'form-control', 'id' => 'body', 'placeholder' => 'Article body', 'value'=>set_value('body',$article->body)]);?>
        <!--input type="password" class="form-control" id="inputPassword" placeholder="Password"-->
        
      </div>
      <div class="col-lg-4">
       <?= form_error('body','<p class ="text-danger">','</p>'); ?>
        
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