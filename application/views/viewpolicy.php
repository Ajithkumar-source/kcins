<div class="card shadow mb-4">
<!--                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
                            
                        </div>-->
 <form class="well form-horizontal" action="<?=base_url('addnewpolicy');?>" method="post"  id="contact_form">
<div class="card-header py-3">
  <div class="row">
    <div class="col-md-10">
       <h4 class="m-0 font-weight-bold text-primary">View Policy</h4>
    </div>
    <div class="col-md-2 float-right">
      
        <a href="<?=base_url('editpolicy/'.$policy->pid);?>" class="btn btn-primary float-right" style="margin-left: 1em">Edit</a><a href="<?=base_url('policies');?>" class="btn btn-primary float-right" style="margin-left: 1em">Back</a>
        
     </div>
  </div>
</div>



<div style="padding-top: 0.8rem;"> 
<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b> Policy Number</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->pno?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  
</div>
</div>
</div>






<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Receipt No</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->rno?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Receipt Date</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->rdate?>
    </div>
  </div>
</div>
</div>

<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
<label class="col-md-6 control-label"><b>Insurance Company</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <?=
   $inscompany="";
   if($this->user_model->getinscompanyById($policy->inscompany)){
   $inscompany=$this->user_model->getinscompanyById($policy->inscompany)->inscompany;
   echo $inscompany;
   }
  ?>
    </div>
  </div>
</div>



<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b> Insured Name</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <?=$policy->insname?>
</div>
</div>
</div>


<div class="form-row">
<div class="form-group col-md-12 offset-md-3">
  <label class="col-md-6 control-label"><b>Address</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <?=$policy->address?>
    </div>
  </div>
</div>
</div>


<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Phone</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->phone?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Mobile</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->mobile?>
    </div>
  </div>
</div>
</div>


<div class="form-row my-8">
<div class="form-group col-md-12 offset-md-3">
<label class="col-md-6 control-label"><b>Careof</b></label>  
  <div class="col-md-6 inputGroupContainer">
  <?=
   $careof="";
   if($this->user_model->getcareofById($policy->careof)){
           $careof=$this->user_model->getcareofById($policy->careof)->name; 
           echo $careof;
   }
  ?>
    </div>
  </div>
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Policy Type</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=
   $pytype="";
   if($this->user_model->getpytypeBypId($policy->pytype))
   {
      $pytype=$this->user_model->getpytypeBypId($policy->pytype)->pytype;
      echo $pytype;
   }
 ?>
    </div>
  </div>
</div>


<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>Sub Type</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=
   $stype="";
   if($this->user_model->getstypeBysId($policy->stype)){
           $stype=$this->user_model->getstypeBysId($policy->stype)->stype;
           echo $stype;
   }
  ?>
    </div>
  </div>
</div>

</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label">
    <b>Non-Motor Type </b>
</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=
$nmtype="";
         if( $this->user_model->getnmtypeById($policy->nmtype)){
          $nmtype= $this->user_model->getnmtypeById($policy->nmtype)->nmtype;
          echo $nmtype;
          }
  ?>
    </div>
  </div>
</div>
<div class="form-group col-md-3">

 </div>
</div>



<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>Vehicle Number</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->vno?>
    </div>
  </div>
</div>
  <div class="form-group col-md-3">

 </div>
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>Make</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->make?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>Model</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->model?>
    </div>
  </div>
</div>
  </div>



<div class="form-row justify-content-md-center">
<label for="col-md-6 control-label"><b>PERIOD OF INSURANCE</b></label>
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"> <b> Period From</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->pfrom?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b> Period To</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group" >
  <?=$policy->pto?> 
    </div>
  </div>
</div>
</div>

<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>OD Premium</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->odprem?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>TP Premium</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->tpprem?>
    </div>
  </div>
</div>
</div>


<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
<label class="col-md-12 control-label"><b>Premium Without Tax</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->prem_wotax?>
    </div>
  </div>
</div>

<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Service Tax</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->stax?>
    </div>
  </div>
</div>
</div>



<div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Service Charge</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->scharge?>
    </div>
  </div>
</div>


<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Total Premium </b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <?=$policy->tprem?>
    </div>
  </div>
</div>
  </div>


  <div class="form-row justify-content-md-center">
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Remarks</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
      <?=$policy->remarks?>
    </div>
  </div>
</div>
  
<div class="form-group col-md-3">
  <label class="col-md-12 control-label"><b>Representative</b></label>  
  <div class="col-md-12 inputGroupContainer">
  <?=
  $rep="";
  if($this->user_model->getrepById($policy->rep)){
   $rep=$this->user_model->getrepById($policy->rep)->rname;
   echo $rep;
 }?>
    </div>
  </div>
</div>



   <!-- Text input-->
</div>      