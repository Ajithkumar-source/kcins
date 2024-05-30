 <div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
<form class="well form-horizontal" action="<?=base_url('updaterep');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">Edit Representative</h4>
    </div>
    <div class="col-md-2 float-right">
        <input type="submit" class="btn btn-primary float-right" style="margin-left: 1em" value="Update"/><a href="<?=base_url('rep');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
     </div>
  </div>
</div>

<!-- Text input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label">Representative Name</label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <input name="id" value="<?=$rep->id?>" type="hidden">
      <input name="name" placeholder="Name" class="form-control" value="<?=$rep->rname?>" required="required" type="text">
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">Phone</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="mobile" placeholder="Mobile" class="form-control" value="<?=$rep->rmobile?>" type="text">
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label">Email</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <input  name="email" placeholder="Email" class="form-control" value="<?=$rep->rmail?>" type="text">
    </div>
  </div>
</div>
<!-- Text input-->
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