<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
<form class="well form-horizontal" action="<?=base_url('update_vcompany');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Edit  VehicleType</h4>
    </div>
    <div class="col-md-2 float-right">
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Update"/><a href="<?=base_url('vcompany');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
     </div>
  </div>
</div>

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">Make</label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <input name="id"  value="<?=$vcompany->id?>" type="hidden">
      <select class="form-control"  id="make" name="make"> 
      <option value="">Select Make</option> 
                                                                <?php
                                                               
                                                                if(!empty($vehicle))
                                                                {
                                                                    foreach ($vehicle as $r)
                                                                    {
                                                                        ?>
                                                                        <option value="<?php echo $r->make ?>" <?php if($r->make== $vcompany->make) {echo "selected=selected";} ?>><?php echo $r->make ?></option>
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
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <input  name="others" id="others" class="form-control"     style="display: none"   type="text">
    </div>
  </div>
</div>
</div>

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">Model</label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"> 
      <input name="model"  class="form-control" value="<?=$vcompany->model?>" type="text">
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
 </div>