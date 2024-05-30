 <div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('addnewclient');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">View Client</h4>
    </div>
    <div class="col-md-2 float-right">
      
        <a href="<?=base_url('editclient/'.$client->id);?>" class="btn btn-primary float-right" style="margin-left: 1em">Edit</a><a href="<?=base_url('clients');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>

<!-- Text input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>Client ID</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <?=$client->cid?>
    </div>
  </div>
</div>
</div>



<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>Name</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <?=$client->name?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
   <div id="profile-container">
       <?php if($client->profile_photo!=""){ ?>
       
   <image id="profileImage" src="<?=base_url('uploads/client/')."".$client->profile_photo;?>" />
       <?php }else{?>
   <image id="profileImage" src="<?=base_url('assets/img/user.png')?>" />
       <?php }?>
</div>

</div>
<!-- Text input-->
</div>


<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Careof</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"> 
  <?=
   $careof="";
   if($this->user_model->getcareofById($client->careof)){
           $careof=$this->user_model->getcareofById($client->careof)->name;
           echo $careof;
   }
  ?>
    
</div>
</div>
</div>
</div>   



<div class="form-row">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>Address</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <?=$client->address?>
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>Phone</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$client->phone?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>Mobile</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
     <?=$client->mobile?>
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>GSTIN</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$client->gstin?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>TIN</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=$client->tin?>
      
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>Email</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$client->email?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>Reference</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=$client->ref?>
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>Contact Person</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <?=$client->cp?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
    <label class="col-md-12 control-label"><b>Representative </b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=
  $rep="";
  if($this->user_model->getrepById($client->rep))
  {
   $rep=$this->user_model->getrepById($client->rep)->rname;
   echo $rep;
 }?>
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