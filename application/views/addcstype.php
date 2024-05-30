<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
<form class="well form-horizontal" action="<?=base_url('addnew_cstype');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Add Claim Subtype</h4>
    </div>
    <div class="col-md-2 float-right">
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Save"/><a href="<?=base_url('cstype');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
     </div>
  </div>
</div>

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Claim Type</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <select class="form-control" required="required" id="ctype" name="ctype">
  <option value="">Select ClaimType</option>
  <?php
                                                    if(!empty($ctype))
                                                    {
                                                        foreach ($ctype as $r)
                                                        {
                                                            ?>
                                                            <option value="<?php echo $r->claimid ?>" /><?php echo $r->ctype?></option>
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
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Sub Type</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <input name="cstype"  id="cstype" placeholder=" Claim SubType" class="form-control" required="required" type="text">
    </div>
  </div>
</div>
</div>
     
</form>
<div class="form-row justify-content-md-center">
     <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
</div>