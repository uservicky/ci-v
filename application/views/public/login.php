<?php include 'public_header.php'; ?>
  <div class="container"> 
      <?= form_open('user/login',['class'=>'form-horizontal']);?>
  <fieldset>
    <legend>Admin Form</legend>
    <?php if($error = $this->session->flashdata('login_failed')):?>
    <div class="row">
        <div class="col-lg-6">
            <div class="alert alert-dismissible alert-danger">
       
                <?= $error; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
   
      <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-6">
       <?= form_input(['name'=>'uname', 'class'=>'form-control', 'id' => 'inputEmail', 'placeholder' => 'user name', 'value'=>set_value('uname')]);?>
        <!--input type="text" class="form-control" id="inputEmail" placeholder="Email"-->
      </div>
      <div class="col-lg-4">
       <?= form_error('uname','<p class ="text-danger">','</p>'); ?>
        
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-6">
        <?= form_password(['name'=>'pword', 'class'=>'form-control', 'id' => 'inputPassword', 'placeholder' => 'Password'])?>
        <!--input type="password" class="form-control" id="inputPassword" placeholder="Password"-->
        
      </div>
      <div class="col-lg-4">
       <?= form_error('pword','<p class ="text-danger">','</p>'); ?>
        
      </div>
    </div>
   
  
   
    <div class="form-group">
      <div class="col-lg-6 col-lg-offset-2">
        <!--button type="reset" class="btn btn-default">Cancel</button-->
        <?= form_reset(['type'=>'reset', 'class'=>'btn btn-default','value' => 'Reset'])?>
        <?= form_submit([ 'class'=>'btn btn-primary','value' => 'Login'])?>
        <!--button type="submit" class="btn btn-primary">Submit</button-->
      </div>
    </div>
  </fieldset>
</form>
  
</div>
<?php include 'public_footer.php'; ?>