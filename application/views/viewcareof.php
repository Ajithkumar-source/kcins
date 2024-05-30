<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('addnewcareof');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">View Careof</h4>
    </div>
    <div class="col-md-2 float-right">
      
    <a href="<?=base_url('editcareof/'.$careof->id);?>" class="btn btn-primary float-right" style="margin-left: 1em">Edit</a><a href="<?=base_url('careof');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>

   




<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
    <label class="col-md-6 control-label"><b>CAREID </b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
      <?=$careof->careid?>
    </div>
  </div>
</div>
</div>

<!-- Text input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Name </b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <?=$careof->name?>
    </div>
  </div>
</div>
</div>
<div class="form-row">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Address</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <?=$careof->address?>
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
  <?=$careof->phone?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Mobile</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=$careof->mobile?>
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>FAX</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$careof->fax?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-6 control-label"><b>Credit </b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  
  <?=$careof->credit?> days
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
  <?=$careof->gstin?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>TIN</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=$careof->tin?>
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
  <?=$careof->email?>
    </div>  
  </div>
</div>


<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Reference</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=$careof->ref?>
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Contact</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$careof->cp?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Representative</b></label>  
  <div class="col-md-12 inputGroupContainer"> 
  <?=
  $rep="";
  if($this->user_model->getrepById($careof->rep))
  {
   $rep=$this->user_model->getrepById($careof->rep)->rname;
   echo $rep;
 }?>
    </div>
  </div>
</div>
<div class="form-row justify-content-md-center">
<div class="form-group col-md-6">
  <label class="col-md-6 control-label"><b>Open Balance</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <?=$careof->openbal?>
    </div>  
  </div>
</div>
 </div>









<!-- Text input-->

                        
      
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
 
