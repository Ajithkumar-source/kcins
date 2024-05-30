<div class="card shadow mb-4">

<form id="form" class="well form-horizontal" action="<?=base_url('sendsms');?>"   method="post"  >
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-4">
       <h4 class="m-0 font-weight-bold text-primary">Send SMS</h4>
    </div>
    
    <div class="col-md-4">
           <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                
          <div class="alert alert-danger alert-dismissable" style="padding-top: 0.2rem;
    padding-right: 0.5rem;
    padding-bottom: 0.2rem;
    padding-left: 0.5rem;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
          <div class="alert alert-success alert-dismissable" style="padding-top: 0.2rem;
    padding-right: 0.5rem;
    padding-bottom: 0.2rem;
    padding-left: 0.5rem;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                
      </div>

<div class="col-md-4 float-right"> 
      <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Send">

   </div>

   </div>
</div>

<div class="form-row my-8">
     <div class="form-group col-md-8 offset-md-3">
    <label class="col-md-12 control-label"><b>To</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <select class="form-control"  id="to_sms" name="to_sms" multiple>
  <?php
                                            if(!empty($tosms))
                                            {
                                                foreach ($tosms as $r)
                                                {
                                                    
                                                    if($r->mobile!="")
                                                    
                                                    {
                                                    ?>
                                                    <option value="<?php echo $r->mobile ?>"/><?php echo $r->name." ".htmlspecialchars('<').$r->mobile.htmlspecialchars('>') ?>
                                                    </option>
                                                    <?php } ?>

                                                    <?php
                                                }
                                            }
                                            ?>                                    
    </select>
     </div>
      </div>
      </div>
      </div>
      
      <div class="form-row my-8">
     <div class="form-group col-md-8 offset-md-3">
    <label class="col-md-12 control-label"><b>Message</b></label>  
    <div class="col-md-12 inputGroupContainer">
    <textarea name="editor"></textarea>
                                          </div>
                    </div>
                    </div>
</form>
</div>