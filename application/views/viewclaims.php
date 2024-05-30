<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Claims</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('addnewclaims');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">View Claims</h4>
    </div>
    <div class="col-md-2 float-right">
      
    <a href="<?=base_url('editclaims/'.$claims->sno);?>" class="btn btn-primary float-right" style="margin-left: 1em">Edit</a><a href="<?=base_url('claims');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
        
     </div>
  </div>
</div>

   


<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b> Client Name</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group"> 
  <input name="sno" value="<?=$claims->sno?>" type="hidden">  
  <?=$claims->insname?>  
                                          </div>
                                          </div>
                                          </div>

  <div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Inward Date</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=$claims->indate?>
    </div>
  </div>
</div>
</div>
<!-- Text input-->
<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Careof</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group"> 
  <?=$careof="";
   if($this->user_model->getcareofById($claims->careof)){
           $careof=$this->user_model->getcareofById($claims->careof)->name; 
           echo $careof;
   }?>
  </div>
</div>
</div>
</div>


<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Policy Number</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$claims->pno?> 
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Claim Number</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=$claims->cno?> 
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Claim Type</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=
   $ctype="";
   if($this->user_model->getctypeById($claims->ctype))
   {
      $ctype=$this->user_model->getctypeById($claims->ctype)->ctype;
      echo $ctype;
   }
 ?>
    </div>
  </div>
</div>


<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>Claim SubType</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=
   $cstype="";
   if($this->user_model->getcstypeById($claims->cstype)){
           $cstype=$this->user_model->getcstypeById($claims->cstype)->cstype;
           echo $cstype;
   }
  ?>
    </div>
  </div>
</div>

</div>


<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Claimed Amount</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$claims->camount?> 
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Total Premium</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=$claims->tprem?> 
    </div>
  </div>
</div>
<!-- Text input-->
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Expected SettledDate</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  
  <?=$claims->edate?>
    </div>
  </div>
</div>


<!-- Text input-->

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Status</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$claims->status?> 
    </div>
  </div>
</div>
  </div>

<!-- Text input-->
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Settled Date</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$claims->sdate?> 

    </div>  
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Settled Amount</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$claims->samount?> 
    </div>  
  </div>
</div>
</div>

<!-- Text input-->

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Representative</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">

  <?=
 $rep="";
 if($this->user_model->getrepById($claims->rep)){
  $rep=$this->user_model->getrepById($claims->rep)->rname;
  echo $rep;
}?>
    </div>
  </div>
</div>

<!--Text input-->
                                          

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Remarks</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$claims->remarks?> 
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
 
